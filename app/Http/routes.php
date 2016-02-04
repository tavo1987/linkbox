<?php


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
 * @param string route
 * @param string controller
 */


Route::get('/',[

        'uses' => 'HomeController@index',
        'as'  => 'home'
]);


Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {

	Route::resource('users','UserController');


	Route::get('search/{name}','UserController@listing');

//	Route::get('search/{name}',[
//		'uses' => 'UserController@listing',
//		'as'   => 'search'
//	]);

    Route::resource('links','LinksController');
	Route::resource('categories','CategoryController');
});


// Authentication routes...
Route::get('login', [
    'uses' => 'Auth\AuthController@getLogin',
    'as'  => 'login'

]);

Route::post('login',[
	'uses'=>'Auth\AuthController@postLogin',
	'as'  => 'login'
]);

Route::get('auth/facebook',[
	'uses' => 'Auth\AuthController@redirectToProvider',
	'as'   => 'login.facebook'
]);

Route::get('auth/facebook/callback',[
	'uses'=>'Auth\AuthController@handleProviderCallback',
	'as'=>'login.facebook.callback',

]);



Route::get('logout',[
    'uses'=>'Auth\AuthController@getLogout',
    'as' => 'logout'
] );

// Registration routes...
Route::get('register', [
    'uses'=>'Auth\AuthController@getRegister',
    'as' => 'register'
]);

Route::post('register',[
	'uses'=>'Auth\AuthController@postRegister',
	'as'  => 'register'
]);

Route::get('confirmation/{email}/{token}',[

    'uses' => 'Auth\AuthController@getConfirmation',
    'as'   => 'confirmation'
]);




// Password reset link request routes...
Route::get('password/email',[
	'uses'=>'Auth\PasswordController@getEmail',
	'as' => 'password'

]);


Route::post('password/email', [
	'uses' => 'Auth\PasswordController@postEmail',
	'as'   => 'password'
]);


// Password reset routes...
Route::get('password/reset/{token}',[
		'uses'=>'Auth\PasswordController@getReset',
		'as'=> 'password.reset'
]);
Route::post('password/reset', [
	'uses' => 'Auth\PasswordController@postReset',
	'as'   => 'password.reset'
]);



