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

Route::get('/welcome', function () {
     return view('welcome');
 });

Route::get('/', function () {
    return view('home');
});

Route::get('/information', function () {
    return view('addinformation');
});


Route::get('/testmap', function () {
    return view('testmap');
});


Route::get('/traject', 'HomeController@traject')->name('traject');
Route::get('/contact', 'HomeController@contact');
Route::get('/profile/general', 'HomeController@profile');
Route::get('/messages', 'HomeController@messages');
Route::get('/result', 'HomeController@result');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
