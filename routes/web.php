<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', 'HomeController@index');
//Route::get('/{referal?}', 'HomeController@registerForm');
//Route::post('/register', 'HomeController@register');
Route::get('/verify', 'HomeController@verify');
// Route::get('/confirm', 'HomeController@beforeConfirm');
Route::get('/confirm/{conflink}', 'HomeController@confirmEmailPage');
Route::get('/send-mail', 'HomeController@sendConfirmMail');
Route::get('/invite-mail', 'HomeController@sendInviteMail');

/*
	Route::get('/post/{slug}', 'HomeController@show')->name('post.show');
	Route::get('/tag/{slug}', 'HomeController@tag')->name('tag.show');
	Route::get('/category/{slug}', 'HomeController@category')->name('category.show');

	Route::group(['middleware' => 'guest'], function() {
	Route::get('/register', 'AuthController@registerForm');
	Route::post('/register', 'AuthController@register');

	Route::get('/login', 'AuthController@loginForm')->name('login');
	Route::post('/login', 'AuthController@login');
});
*/

// Route::group(['middleware' => 'auth'], function() {
// 	Route::get('/', 'RegisterController@index');
// // 	Route::get('/profile', 'ProfileController@index');
// // 	Route::post('/profile', 'ProfileController@store');
// // 	Route::get('/logout', 'AuthController@logout');
// });


//Route::group(['middleware' => 'guest'], function() {
	Route::get('/reguser', 'AuthController@reguserForm');
	Route::post('/reguser', 'AuthController@reguser');

	Route::get('/login', 'AuthController@loginForm')->name('login');
	Route::post('/login', 'AuthController@login');
//});


Route::group([
		'prefix'=>'admin',
		'namespace'=>'Admin',
		//'middleware' => 'admin'
	], function() {
		// Route::get('/', 'DashboardController@index');
//		Route::get('/', 'SettingsController@getProjectPage');
		Route::get('/project', 'SettingsController@getProjectPage');
		Route::get('/design', 'SettingsController@getDesignPage');
		Route::get('/content', 'SettingsController@getContentPage');
		
		Route::get('/subscribers', 'SubsController@getList');
		Route::get('/testimonials', 'TestimonialsController@getList');

		// Route::resource('/users', 'UsersController@index');
});

