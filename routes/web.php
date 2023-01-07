<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the " web" middleware group. Now create something great!
|
*/

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
Route::get('/doghistory', 'App\Http\Controllers\PagesController@doghistory');
Route::get('/accountsetting', 'App\Http\Controllers\PagesController@accountsetting');



Route::resource('contacts', 'App\Http\Controllers\ContactsController');
Route::resource('ownprofile', 'App\Http\Controllers\DogprofileController');

Route::get('/postdog', 'App\Http\Controllers\PagesController@postdog');

Route::resource('/dogprofile', 'App\Http\Controllers\DogprofileController');
Route::resource('/pages', 'App\Http\Controllers\DogprofileController');

//Search.Blade


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('profiletabs');
