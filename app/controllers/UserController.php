<?php

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class UserController extends \BaseController {
	
	public function logIn()
	{
		$validator = Validator::make(
			Input::only('email', 'password'),
			ProbaUser::$logInRules
		);
		if ($validator->fails()) {
			return Redirect::route("loginpage")->withErrors($validator);
		}
		if (Auth::attempt(array('email' => Input::get('email'), 'password' => Input::get('password')))) {
    		if (Auth::user()->activated==true) {
				return Redirect::route('welcome');
    		} else {
    			Auth::logout();
    			return Redirect::route("loginpage")->with('message', 'The user has not yet been activated!');
    		}
		} else {
			return Redirect::route("loginpage")->with('message', 'Email or password are incorrect!');
		}
	}
	
	public function logInPage()
	{
		return View::make('login');
	}
	
	public function logOut()
	{
		Auth::logout();
		return Redirect::route('start');
	}
	
	public function welcome()
	{
		return View::make('welcome');
	}
	
	public function signUpPage()
	{
		return View::make('signup');
	}

	public function signUp()
	{
		$validator = Validator::make(
			Input::all(),
			ProbaUser::$signUpRules
		);
		if ($validator->fails()) {
			return Redirect::route("signuppage")->withErrors($validator);
		}
		$userData = Input::except('password_confirmation');
		$token_unique=false;
		$token;
		while (!$token_unique) {
			$token = str_random(60);
			$validator = Validator::make(
				array('token' => $token),
				array('token' => 'unique:proba_users')
			);
			$token_unique=!$validator->fails();
		}
		$userData['token']=$token;
		$user = ProbaUser::create($userData);
		ProbaUtil::sendActivationEmail($user);
		return Redirect::route('start')->with('message', 'You have signed up successfully, an activation mail has been sent to confirm your registration!');
	}
	
	public function start()
	{
		return View::make('start');
	}
	
	public function activate()
	{
		$token = Input::get('token');
		$user=null;
		$user = ProbaUser::where('token', $token)->first();
		if ($user==null) {
			return Redirect::route('start')->with('message', 'The user does not exist');
		}
		$user->activated=true;
		$user->save();
		return Redirect::route('start')->with('message', 'Your account has been activated successfully!');
	}
	
	public function sendActivationEmail($user)
	{
		Mail::send('emails.activation', array('user' => $user), function($message) use ($user)
		{
			$message->to($user->email, ($user->first_name).($user->last_name))->subject('Activation!');
		});
	}
	
}

?>