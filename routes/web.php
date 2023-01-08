<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilepicController;
use App\Http\Controllers\DogsController;

Route::get('/', 'App\Http\Controllers\PagesController@welcome');
Route::get('/navbar', 'App\Http\Controllers\PagesController@navbar');
Route::get('/search', 'App\Http\Controllers\PagesController@search');
Route::get('/how', 'App\Http\Controllers\PagesController@how');
Route::get('/about', 'App\Http\Controllers\PagesController@about');

Route::resource('/', 'App\Http\Controllers\DogsController');

// For OWN PROFILE and DOG DETAILS - create, edit, view applications
Route::get('/ownprofile', 'App\Http\Controllers\PagesController@ownprofile');
Route::get('/dogdetails', 'App\Http\Controllers\PagesController@dogdetails');
Route::resource('ownprofile', 'App\Http\Controllers\DogprofileController');
Route::resource('/dogprofile', 'App\Http\Controllers\DogprofileController');
Route::put('dogprofile/{id}/edit', [DogprofileController::class, 'update']);

// Route::resource('/pages', 'App\Http\Controllers\DogprofileController'); MARGUS, please update this using DogsController::

//For dog adoption applications
Route::resource('applications', 'App\Http\Controllers\ApplicationsController');
Route::get('/applications', 'App\Http\Controllers\ApplicationsController@applications');
Route::put('applications/index', [ApplicationsController::class, 'update']);

// This is Profiletabs - User
// Route::get('/myprofile', 'App\Http\Controllers\PagesController@myprofile');

Route::get('/editprofile', 'App\Http\Controllers\PagesController@editprofile');
Route::get('/showprofile', 'App\Http\Controllers\PagesController@showprofile');

Route::resource('/showprofile', 'App\Http\Controllers\Userprofile2Controller');

Route::resource('/userprofile', 'App\Http\Controllers\UserprofileController');

//Search.Blade

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/createprofile', 'App\Http\Controllers\UserprofileController');
