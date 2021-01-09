<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('welcome');
});


Auth::routes();

/**
 * Routes for companies
 */
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/company/add', 'HomeController@create');
Route::post('/company/store', 'HomeController@store');
Route::get('/company/edit/{company}', 'HomeController@edit');
Route::post('/company/update/{company}', 'HomeController@update');
Route::get('/company/delete/{id}', 'HomeController@destroy');

/**
 * Routes for employees
 */
Route::get('/employee', 'EmployeeController@index');
Route::get('/employee/add', 'EmployeeController@create');
Route::post('/employee/store', 'EmployeeController@store');
Route::get('/employee/edit/{employee}', 'EmployeeController@edit');
Route::post('/employee/update/{employee}', 'EmployeeController@update');
Route::get('/employee/delete/{id}', 'EmployeeController@destroy');
