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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/contacts', 'ContactController@indexView')->name('contacts');
Route::get('/contact/json', 'ContactController@indexJson')->name('contact.indexJson');
Route::get('/contact/jsonSearch/{search}', 'ContactController@indexJsonSearch')->name('contact.indexJsonSearch');

Route::resource('/contact', 'ContactController')->names('contact');