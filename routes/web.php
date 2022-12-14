<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DogsController;

Route::get('/', 'App\Http\Controllers\PagesController@welcome');
Route::get('/navbar', 'App\Http\Controllers\PagesController@navbar');
Route::get('/search', 'App\Http\Controllers\SearchController@index');
Route::get('/how', 'App\Http\Controllers\PagesController@how');
Route::get('/about', 'App\Http\Controllers\PagesController@about');

// For OWN DOG DETAILS - create, edit, view applications
Route::resource('/', 'App\Http\Controllers\DogsController');
Route::get('/dogsposted', 'App\Http\Controllers\PagesController@dogsposted');
Route::resource('dogsposted', 'App\Http\Controllers\DogprofileController');
Route::resource('/dogprofile', 'App\Http\Controllers\DogprofileController');
Route::put('dogprofile/{id}/edit', [DogprofileController::class, 'update']);
Route::get('/dogsrehomed', 'App\Http\Controllers\PagesController@dogsrehomed');
Route::resource('dogsrehomed', 'App\Http\Controllers\AdoptionsController');

// For PUBLIC PAGES
Route::resource('/pages', 'App\Http\Controllers\DogsController');
Route::get('/publicprofile', 'App\Http\Controllers\PagesController@publicprofile');
Route::resource('/users', 'App\Http\Controllers\PublicprofileController');

// For APPLICATIONS
Route::get('/applications', 'App\Http\Controllers\ApplicationsController@applications');
Route::get('/applications/create/{id}', 'App\Http\Controllers\ApplicationsController@create');
Route::resource('applications', 'App\Http\Controllers\ApplicationsController');
Route::put('applications/{id}/edit', [ApplicationsController::class, 'update']);
Route::put('applications/{id}', [ApplicationsController::class, 'update2']);

// For ADOPTIONS
Route::get('/adoptions/create/{id}', 'App\Http\Controllers\AdoptionsController@create');
Route::resource('adoptions', 'App\Http\Controllers\AdoptionsController');

// FOR USER PROFILE
Route::get('/showprofile', 'App\Http\Controllers\PagesController@showprofile');
Route::get('/accountsetting', 'App\Http\Controllers\PagesController@accountsetting');
Route::get('/changepassword', 'App\Http\Controllers\PagesController@changepassword');
Route::resource('showprofile', 'App\Http\Controllers\UserprofileController');
Route::get('/profiletabs', 'App\Http\Controllers\PagesController@profiletabs');
Route::resource('/userprofile', 'App\Http\Controllers\UserprofileController');
Route::get('/navbar', 'App\Http\Controllers\UserprofileController@index');
Route::put('userprofile/{id}/edit', [UserprofileController::class, 'update']);

//FOR USER PASSWORD
Route::get('change-password', [App\Http\Controllers\ChangePasswordController::class, '__invoke'])->name('changePassword');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('search');

//Search.Blade
Route::resource('/search', 'App\Http\Controllers\SearchController');


