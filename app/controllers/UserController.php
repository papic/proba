<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class UserController extends \BaseController {
	
	public function logIn() {
		if (\Auth::check()) {
			return Redirect::route('welcome');
		}
		$validator = \Validator::make(
				array(
						'email' => Input::get('email'),
						'password' => Input::get('password'),
				),
				array(
						'email' => 'required|email',
						'password' => array('required', 'min:6')
				)
		);
		if ($validator->fails()) {
			return Redirect::route("loginpage")->withErrors($validator);
		}
		if (\Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
    		if (Auth::user()->activated==true) {
				return Redirect::route('welcome');
    		} else {
    			\Auth::logout();
    			return Redirect::route("loginpage")->with('message', 'The user has not yet been activated!');
    		}
		} else {
			return Redirect::route("loginpage")->with('message', 'Email or password are incorrect!');
		}
	}
	
	public function logInPage() {
		if (\Auth::check()) {
			return Redirect::route('welcome');
		} else {
			return \View::make('login');
		}
	}
	
	public function logOut() {
		if (!\Auth::check()) {
			return Redirect::route("start")->with('message', 'You are not logged in!');
		}
		\Auth::logout();
		return Redirect::route('start');
	}
	
	public function welcome() {
		if (\Auth::check()) {
			return \View::make('welcome');
		} else {
			return Redirect::route("start");
		}
	}
	
	public function signUpPage() {
		if (\Auth::check()) {
			return Redirect::route("welcome");
		} else {
			return View::make('signup');
		}
	}

	public function signUp() {
		if (\Auth::check()) {
			return Redirect::route('welcome');
		}
		$validator = \Validator::make(
				array(
						'email' => Input::get('email'),
						'password' => Input::get('password'),
						'firstName' => Input::get('firstName'),
						'lastName' => Input::get('lastName'),
				),
				array(
						'email' => 'required|email|unique:proba_users',
						'password' => array('required', 'min:6'),
						'firstName' => 'required|alpha',
						'lastName' => 'required|alpha',
				)
		);
		if ($validator->fails()) {
			return Redirect::route("signuppage")->withErrors($validator);
		}
		if (Input::get('password')!=Input::get('confirmPassword')) {
			return Redirect::route("signuppage")->with('message', 'The passwords do not match!');
		}
		$user = new ProbaUser();
		$user->first_name=Input::get('firstName');
		$user->last_name=Input::get('lastName');
		$user->email=Input::get('email');
		$user->password=Hash::make(Input::get('password'));
		$token_unique=false;
		$token;
		while (!$token_unique) {
			$token = $this->generateRandomString();
			$validator = \Validator::make(
				array('token' => $token),
				array('token' => 'unique:proba_users')
			);
			$token_unique=!$validator->fails();
		}
		$user->token=$token;
		$user->activated=false;
		$user->save();
		$this->sendActivationEmail($user);
		return Redirect::route('start')->with('message', 'You have signed up successfully, an activation mail has been sent to confirm your registration!');
	}
	
	public function start() {
		if (\Auth::check()) {
			return Redirect::route('welcome');
		} else {
			return View::make('start');
		}
	}
	
	public function activate() {
		$token = Input::get('token');
		$user=null;
		$user = \DB::table('proba_users')->where('token', $token)->first();
		if ($user==null) {
			return Redirect::route('start')->with('message', 'The user does not exist');
		}
		$model=ProbaUser::find($user->id);
		$model->activated=true;
		$model->save();
		return Redirect::route('start')->with('message', 'Your account has been activated successfully!');
	}
	
	public function changeLanguage() {
		$url = route(Request::get('route'));
		$lang = Request::get('lang');
		$root = route('root');
		if ($lang=='en') {
			if (str_contains($url, '/sr/')) {
				$url = preg_replace('#/sr/#', '/en/', $url, 1);
			}
		} else if ($lang=='sr') {
			if (str_contains($url, '/en/')) {
				$url = preg_replace('#/en/#', '/sr/', $url, 1);
			} else if (!str_contains($url, '/sr/')) {
				$url = preg_replace('#'.$root.'#', $root.'sr/', $url, 1);
			}
		}
		return Redirect::to($url);
	}
	
	public function sendActivationEmail($user) {
		Mail::send('emails.activation', array('user' => $user), function($message) use ($user)
		{
			$message->to($user->email, ($user->first_name).($user->last_name))->subject('Activation!');
		});
	}
	
	public function generateRandomString($length = 60) {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		}
		return $randomString;
	}
	
}

?>