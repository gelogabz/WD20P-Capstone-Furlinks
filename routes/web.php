<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilepicController;

use App\Http\Controllers\DogsController;

Route::get('/', 'App\Http\Controllers\PagesController@welcome');
Route::get('/navbar', 'App\Http\Controllers\PagesController@navbar');
Route::get('/search', 'App\Http\Controllers\PagesController@search');
Route::get('/how', 'App\Http\Controllers\PagesController@how');
Route::get('/about', 'App\Http\Controllers\PagesController@about');

// For OWN PROFILE AND DOG DETAILS - create, edit, view applications
Route::resource('/', 'App\Http\Controllers\DogsController');
Route::get('/ownprofile', 'App\Http\Controllers\PagesController@ownprofile');
Route::resource('ownprofile', 'App\Http\Controllers\DogprofileController');
Route::resource('/dogprofile', 'App\Http\Controllers\DogprofileController');
Route::put('dogprofile/{id}/edit', [DogprofileController::class, 'update']);

// For PUBLIC PAGES
Route::resource('/pages', 'App\Http\Controllers\DogsController');
// Route::get('/dogdetails', 'App\Http\Controllers\PagesController@dogdetails');

// For DOG ADOPTION APPLICATIONS
Route::resource('applications', 'App\Http\Controllers\ApplicationsController');
Route::get('/applications', 'App\Http\Controllers\ApplicationsController@applications');
Route::put('applications/index', [ApplicationsController::class, 'update']);

// This is Profiletabs - User
Route::get('/accountsetting', 'App\Http\Controllers\PagesController@accountsetting');
Route::get('/editprofile', 'App\Http\Controllers\PagesController@editprofile');
Route::get('/showprofile', 'App\Http\Controllers\PagesController@showprofile');
Route::resource('/showprofile', 'App\Http\Controllers\Userprofile2Controller');

//Search.Blade

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/createprofile', 'App\Http\Controllers\UserprofileController');
