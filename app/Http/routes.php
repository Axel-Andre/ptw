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

Route::get('/traject', function () {
    return view('traject');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/profile/general', function () {
    return view('profile');
});


Route::get('/information', function () {
    return view('addinformation');
});


Route::get('/testmap', function () {
    return view('testmap');
});

Route::get('/messages', function () {
    return view('messages');
});


Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::auth();

Route::get('/home', 'HomeController@index');
