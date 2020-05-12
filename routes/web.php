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

/*rutas para actividades (listar, añadir, modificar y eliminar)*/
Route::get('/home/activities/{companyid}/list', 'ActivityController@listActivitiesCompany')->name('listActivities'); //listado actividades propias empresa
Route::get('/home/activities/{companyid}/create', 'ActivityController@create')->name('create'); //Vista añadir actividades
Route::post('/home/activities/{companyid}/list', 'ActivityController@store')->name('store'); //Método para guardar actividad en BD

Route::get('/home/activities/{activityid}/edit', 'ActivityController@edit')->name('edit'); //Vista para modificar actividades
Route::put('/home/activities/{companyid}/list', 'ActivityController@update')->name('update'); //Método para modificar actividad en BD
Route::delete('/activities/{companyid}', 'ActivityController@delete')->name('delete'); //Método para eliminar
Route::get('/home', 'HomeController@index')->name('home');

