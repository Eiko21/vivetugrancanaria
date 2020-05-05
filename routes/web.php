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

