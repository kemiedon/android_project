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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', 'Frontend\NewsCategoryController@news_category');





// ========== Backend ========== //
Route::get('admin', 'Auth\HomeController@index');
Route::get('admin/home', 'Auth\HomeController@index')->name('admin.home');

// Route::auth();

// Login Routes
Route::get('admin/login', 'Auth\AuthController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AuthController@login')->name('admin.login.post');
Route::post('admin/logout', 'Auth\AuthController@logout')->name('admin.logout');

// Registration Routes
// Route::get('register', 'Auth\AuthController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\AuthController@register')->name('register.post');

// Password Reset Routes
// Route::get('password/reset/{token}', 'Auth\PasswordController@showResetForm')->name('password.reset.token');
// Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail')->name('password.email');
// Route::post('password/reset', 'Auth\PasswordController@reset')->name('password.reset.post');

// mv_route_start
Route::resource('admin/news_categories', 'Backend\NewsCategoryController', ['parameters' => ['news_categories' => 'news_category_id']]);
Route::get('admin/news_categories/{news_category_id}/moveup', 'Backend\NewsCategoryController@move_up')->name('admin.news_categories.move_up');
Route::get('admin/news_categories/{news_category_id}/movedown', 'Backend\NewsCategoryController@move_down')->name('admin.news_categories.move_down');
// mv_route_end