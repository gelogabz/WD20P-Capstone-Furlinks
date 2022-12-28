<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\PagesController@welcome');
Route::get('/navbar', 'App\Http\Controllers\PagesController@navbar');
Route::get('/search', 'App\Http\Controllers\PagesController@search');
Route::get('/how', 'App\Http\Controllers\PagesController@how');
Route::get('/about', 'App\Http\Controllers\PagesController@about');
Route::get('/dogdeets', 'App\Http\Controllers\PagesController@dogdeets');
Route::get('/editdog', 'App\Http\Controllers\PagesController@editdog');
Route::get('/ownprofile', 'App\Http\Controllers\PagesController@ownprofile');

Route::resource('contacts', 'App\Http\Controllers\ContactsController');
Route::resource('dogsprofile', 'App\Http\Controllers\DogsprofileController');


// Route::get('/', function () {
//     return view('welcome');
// });
