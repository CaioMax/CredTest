<?php

use Illuminate\Support\Facades\Auth;
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

Route::middleware('auth')->group(function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::get('/creates', 'App\Http\Controllers\HomeController@creates')->name('creates');

    Route::get('/months/{id}', 'App\Http\Controllers\HomeController@months')->name('months');

    Route::put('/months/update', 'App\Http\Controllers\Monthly_PaymentController@update')->name('months.update');

    Route::get('/clients', 'App\Http\Controllers\ClientsController@index')->name('clients');

    Route::get('/owners', 'App\Http\Controllers\OwnersController@index')->name('owners');

    Route::get('/properties/{id}', 'App\Http\Controllers\PropertiesController@index')->name('properties');

    Route::post('/clients/store', 'App\Http\Controllers\ClientsController@store')->name('clients.store');

    Route::post('/owners/store', 'App\Http\Controllers\OwnersController@store')->name('owners.store');

    Route::post('/properties/store', 'App\Http\Controllers\PropertiesController@store')->name('properties.store');

    Route::post('/contracts/store', 'App\Http\Controllers\ContractsController@store')->name('contract.store');

});
