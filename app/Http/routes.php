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



// Route::get('/', 'Frontend\NewsCategoryController@news_category');

// mv_frontend_route_start

    Route::get('{lang}/news_categories', function () {
        return view('frontend/news_categories');
    })->name('news_categories');       
// mv_frontend_route_end
// ========== Backend ========== //
Route::get('admin', 'Auth\HomeController@index');
Route::get('admin/home', 'Auth\HomeController@index')->name('admin.home');
// Filemanager Routes
    Route::get('filemanager/show', 'FilemanagerLaravelController@getShow');
    Route::get('filemanager/connectors', 'FilemanagerLaravelController@getConnectors');
    Route::post('filemanager/connectors', 'FilemanagerLaravelController@postConnectors');
// Route::auth();

// Login Routes
Route::get('admin/login', 'Auth\AuthController@showLoginForm')->name('admin.login');
Route::post('admin/login', 'Auth\AuthController@login')->name('admin.login.post');
Route::post('admin/logout', 'Auth\AuthController@logout')->name('admin.logout');

// Registration Routes
Route::get('register', 'Auth\AuthController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\AuthController@register')->name('register.post');

// Password Reset Routes
// Route::get('password/reset/{token}', 'Auth\PasswordController@showResetForm')->name('password.reset.token');
// Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail')->name('password.email');
// Route::post('password/reset', 'Auth\PasswordController@reset')->name('password.reset.post');

Route::resource('admin/team/{team_id}/milestone/{milestone_id}/files', 'Backend\FileController', ['names' => [
    'index'   => 'admin.files.index',
    'create'  => 'admin.files.create',
    'store'   => 'admin.files.store',
    'edit'    => 'admin.files.edit',
    'update'  => 'admin.files.update',
    'show'    => 'admin.files.show',
    'destroy' => 'admin.files.destroy',
    
],'parameters' => ['files' => 'file_id']]);
Route::get('admin/team/{team_id}/milestone/{milestone_id}/files/{file_id}/moveup', 'Backend\FileController@move_up')->name('admin.files.move_up');
Route::get('admin/team/{team_id}/milestone/{milestone_id}/files/{file_id}/movedown', 'Backend\FileController@move_down')->name('admin.files.move_down');

Route::resource('admin/team', 'Backend\TeamController', ['names' => [
    'index'   => 'admin.team.index',
    'create'  => 'admin.team.create',
    'store'   => 'admin.team.store',
    'edit'    => 'admin.team.edit',
    'update'  => 'admin.team.update',
    'show'    => 'admin.team.show',
    'destroy' => 'admin.team.destroy',
    
],'parameters' => ['team' => 'team_id']]);
Route::get('admin/team/{team_id}/moveup', 'Backend\TeamController@move_up')->name('admin.team.move_up');
Route::get('admin/team/{team_id}/movedown', 'Backend\TeamController@move_down')->name('admin.team.move_down');

Route::resource('admin/team/{team_id}/milestone', 'Backend\MilestoneController', ['names' => [
    'index'   => 'admin.milestone.index',
    'create'  => 'admin.milestone.create',
    'store'   => 'admin.milestone.store',
    'edit'    => 'admin.milestone.edit',
    'update'  => 'admin.milestone.update',
    'show'    => 'admin.milestone.show',
    'destroy' => 'admin.milestone.destroy',
    
],'parameters' => ['milestone' => 'milestone_id']]);
Route::get('admin/team/{team_id}/milestone/{milestone_id}/moveup', 'Backend\MilestoneController@move_up')->name('admin.milestone.move_up');
Route::get('admin/team/{team_id}/milestone/{milestone_id}/movedown', 'Backend\MilestoneController@move_down')->name('admin.milestone.move_down');

