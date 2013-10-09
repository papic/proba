<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

$languages = array('en','sr');
$locale = Request::segment(1);
if( in_array($locale, $languages)) {
	App::setLocale($locale);
} else {
	$locale = null;
}
Route::group(array('prefix' => $locale), function() {
	
	Route::get('/', array( 'as' => 'root', function() {
		return Redirect::route('welcome');
	}));
	
	Route::group(array('before' => 'auth'), function() {
	
		Route::get('welcome', array ('as' => 'welcome', 'uses' => 'UserController@welcome'));
		
		Route::get('logout', array ('as' => 'logout', 'uses' => 'UserController@logOut'));
		
	});
	
	Route::group(array('before' => 'guest'), function() {
		
		Route::get('start', array ('as' => 'start', 'uses' =>'UserController@start'));
		
		Route::get('login', array ('as' => 'loginpage', 'uses' =>'UserController@logInPage'));
		
		Route::post('login', array ('as' => 'login', 'uses' =>'UserController@logIn'));
		
		Route::get('signup', array ('as' => 'signuppage', 'uses' => 'UserController@signUpPage'));
		
		Route::post('signup', array ('as' => 'signup', 'uses' => 'UserController@signUp'));
		
	});
	
	Route::get('activate', array ('as' => 'activation', 'uses' => 'UserController@activate'));
	
	Route::get('changelanguage', array ('as' => 'language', 'uses' => 'HomeController@changeLanguage'));
	
});

Route::group(array('prefix' => 'todos'), function() {
	
	Route::get('/', array( 'as' => 'todoshome', function() {
		return View::make('todoshome');
	}));
	
	Route::put('/changepriority', array('as' => 'changepriority', 'uses' => 'TodosController@changePriority'));
	
	Route::put('{id}/edit', array('as' => 'edit', 'uses' => 'TodosController@edit'));
	
	Route::post('new', array('as' => 'new', 'uses' => 'TodosController@newTodo'));
	
	Route::put('{id}/changedone', array('as' => 'changedone', 'uses' => 'TodosController@changeDone'));
	
	Route::delete('{id}/delete', array('as' => 'delete', 'uses' => 'TodosController@delete'));
	
	Route::get('/list', array('as' => 'list', 'uses' => 'TodosController@listTodos'));
	
	Route::get('/{id}/get', array('as' => 'get', 'uses' => 'TodosController@get'));
	
});