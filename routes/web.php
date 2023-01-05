<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogsController;

Route::get('/', 'App\Http\Controllers\PagesController@welcome');
Route::get('/navbar', 'App\Http\Controllers\PagesController@navbar');
Route::get('/search', 'App\Http\Controllers\PagesController@search');
Route::get('/how', 'App\Http\Controllers\PagesController@how');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/dogdeets', 'App\Http\Controllers\PagesController@dogdeets');

// Route::get('/welcome', 'App\Http\Controllers\PagesController@welcome');
// Route::get('/dogs', 'App\Http\Controllers\PagesController@welcome');

Route::resource('/', 'App\Http\Controllers\DogsController');

// Route::get('/editdog', 'App\Http\Controllers\PagesController@editdog');
Route::get('/ownprofile', 'App\Http\Controllers\PagesController@ownprofile');

Route::get('/dogdetails', 'App\Http\Controllers\PagesController@dogdetails');
Route::get('/myprofile', 'App\Http\Controllers\PagesController@myprofile');
Route::get('/personalinfo', 'App\Http\Controllers\PagesController@personalinfo');



Route::resource('contacts', 'App\Http\Controllers\ContactsController');
Route::resource('ownprofile', 'App\Http\Controllers\DogprofileController');

Route::get('/postdog', 'App\Http\Controllers\PagesController@postdog');

Route::resource('/dogprofile', 'App\Http\Controllers\DogprofileController');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('profiletabs');