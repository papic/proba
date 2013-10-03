<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	public function changeLanguage()
	{
		try {
			$url = route(Request::get('route'));
		} catch (\Symfony\Component\Routing\Exception\RouteNotFoundException $e) {
			return Redirect::route('root');
		}
		$lang = Request::get('lang');
		$root = route('root');
		if ($lang=='en') {
			if (str_contains($url, '/sr/')) {
				$url = preg_replace('#/sr/#', '/en/', $url, 1);
			}
		} elseif ($lang=='sr') {
			if (str_contains($url, '/en/')) {
				$url = preg_replace('#/en/#', '/sr/', $url, 1);
			} else if (!str_contains($url, '/sr/')) {
				$url = preg_replace('#'.$root.'#', $root.'sr/', $url, 1);
			}
		}
		return Redirect::to($url);
	}

}