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

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index')->name('home');

// mv_route_start
Route::resource('news_categories', 'Backend\NewsCategoryController', ['parameters' => ['news_categories' => 'news_category_id']]);
Route::get('news_categories/{news_category_id}/moveup', 'Backend\NewsCategoryController@move_up')->name('news_categories.move_up');
Route::get('news_categories/{news_category_id}/movedown', 'Backend\NewsCategoryController@move_down')->name('news_categories.move_down');
// mv_route_end