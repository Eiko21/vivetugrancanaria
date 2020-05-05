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



/*rutas para actividades (listar, añadir, modificar y eliminar)*/
Route::get('/activities/{companyid}/list', 'ActivityController@listActivitiesCompany')->name('listActivities'); //listado actividades propias empresa
Route::get('/activities/{companyid}/create', 'ActivityController@create')->name('create'); //Vista añadir actividades
Route::post('/activities/{companyid}/list', 'ActivityController@store')->name('store'); //Método para guardar actividad en BD

Route::get('/activities/{companyid}/edit', 'ActivityController@edit')->name('edit'); //Vista para modificar actividades
Route::put('/activities/{companyid}', 'ActivityController@update')->name('update'); //Método para modificar actividad en BD
Route::delete('/activities/{companyid}', 'ActivityController@delete')->name('delete'); //Método para eliminar
