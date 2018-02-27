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
Route::post('/register', 'HomeController@register');
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

Route::group(['middleware' => 'auth'], function() {
 	Route::get('/logout', 'AuthController@logout');
});


Route::group(['middleware' => 'guest'], function() {
	// Route::get('/reguser', 'AuthController@reguserForm');
	// Route::post('/reguser', 'AuthController@reguser');

	Route::get('/login', 'AuthController@loginForm');
	Route::post('/login', 'AuthController@login');
});


Route::group([
		'prefix'=>'admin',
		'namespace'=>'Admin',
		'middleware' => 'admin'
	], function() {
		Route::get('/', 'SettingsController@getProjectPage');
		Route::get('/project', 'SettingsController@getProjectPage');
		Route::post('/project', 'SettingsController@setProject');
		
		Route::get('/color', 'SettingsController@getColorPage');
		Route::post('/color', 'SettingsController@setColor');

		Route::get('/background', 'SettingsController@getBackgroundPage');
		Route::post('/background', 'SettingsController@setBackground');

		// Route::get('/content', 'SettingsController@getContentPage');
		// Route::post('/content', 'SettingsController@setContent');
		
		Route::get('/subscribers', 'SubsController@getList');
		
		Route::get('/testimonials', 'TestimonialsController@getList');
		Route::get('/testimonial/edit/{id}', 'TestimonialsController@getEditPage');
		Route::post('/testimonial/edit-item', 'TestimonialsController@editItem');
		
		Route::get('/testimonial/add', 'TestimonialsController@getAddPage');
		Route::post('/testimonial/add-item', 'TestimonialsController@addItem');

		Route::get('/testimonial/delete/{id}', 'TestimonialsController@deleteItem');
});

