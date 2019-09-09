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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/home', 'DataController@displayData');

Route::get('/users','DataController@displayData')->name('users');
Route::any('/search', 'DataController@search');

Route::get('/profile', 'UserController@show')->name('profile');

Route::get('profile/{user}',  ['as' => 'profile.edit', 'uses' => 'UserController@edit']);
Route::post('profile/update', 'UserController@update')->name('profile.update');
Route::post('profile-pic', 'UserController@updateProfilePic')->name('profile-pic');


Route::get('displaydata', 'DisplayDataController@displaydata')->name('displaydata');
Route::get('index', 'DisplayDataController@index');
