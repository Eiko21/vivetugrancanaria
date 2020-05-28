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

Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/companies/{companyid}', 'CompanyController@show')->name('showcompany');
Route::get('/companies/{companyid}/edit', 'CompanyController@edit')->name('editcompany');
Route::put('/companies/{companyid}', 'CompanyController@update')->name('updatecompany');
Route::post('/companies/{companyid}', 'CompanyController@updatePassword')->name('updateCompanyPassword');

Route::get('/activities', 'ActivityController@index')->name('indexactivities');
Route::get('/activities/create', 'ActivityController@create')->name('createactivity');
Route::get('/activities/{activityid}', 'ActivityController@show')->name('showactivity');
Route::post('/activities', 'ActivityController@store')->name('storeactivity');
Route::get('/activities/{activityid}/edit', 'ActivityController@edit')->name('editactivity');
Route::put('/activities/{activityid}', 'ActivityController@update')->name('updateactivity');
Route::delete('/activities/{activityid}', 'ActivityController@destroy')->name('deleteactivity');

Route::get('/tickets', 'TicketController@index')->name('indextickets');
Route::get('/tickets/create/{activityid}', 'TicketController@create')->name('createticket');
Route::post('/tickets/{activityid}', 'TicketController@store')->name('storeticket');

Route::get('/users', 'UserController@index')->name('indexusuarios');
Route::get('/users/create', 'UserController@create')->name('createuser');
Route::post('/users', 'UserController@store')->name('storeuser');
Route::get('/users/{userid}', 'UserController@show')->name('showclient');
Route::get('/users/{userid}/edit', 'UserController@edit')->name('editclient');
Route::put('/users/{userid}', 'UserController@update')->name('updateclient');
Route::post('/users/{userid}', 'UserController@updatePassword')->name('updatePassword');
Route::delete('/users/{userid}', 'UserController@destroy')->name('deleteclient');