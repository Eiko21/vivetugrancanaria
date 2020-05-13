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

Route::get('/', function () {
    return view('client.activities');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/companies', 'CompanyController@index')->name('index');
Route::get('/companies/{companyid}', 'CompanyController@show')->name('showcompany');
Route::get('/companies/{companyid}/edit', 'CompanyController@edit')->name('edit');
Route::put('/companies/{companyid}', 'CompanyController@update')->name('update');

Route::get('/activities', 'ActivityController@index')->name('indexactivities');
Route::get('/activities/{activityid}', 'ActivityController@show')->name('showactivity');
Route::get('/activities/create', 'ActivityController@create')->name('createactivity');
Route::post('/activities', 'ActivityController@store')->name('storeactivity');
Route::get('/activities/{activityid}/edit', 'ActivityController@edit')->name('editactivity');
Route::put('/activities/{activityid}', 'ActivityController@update')->name('updateactivity');
Route::delete('/activities/{activityid}', 'ActivityController@destroy')->name('deleteactivity');

Route::get('/tickets', 'TicketController@index')->name('indextickets');

Route::get('/users', 'UserController@index');