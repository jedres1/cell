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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Route assignments
Route::get('/assignments', 'AssignmentCellphoneEmployeeController@index');
Route::get('/assignments/create','AssignmentCellphoneEmployeeController@create')->name('assignments.create');
Route::post('/assignments','AssignmentCellphoneEmployeeController@store')->name('assignments.store');
//Routes cellphone
Route::get('/cellphones', 'CellphoneController@index');
Route::get('/cellphones/create','CellphoneController@create')->name('cellphones.create');
Route::post('/cellphones','CellphoneController@store')->name('cellphones.store');
//Route employee
Route::get('/employees', 'EmployeeController@index');
Route::get('/employees/create','EmployeeController@create')->name('employees.create');
Route::post('/employees','EmployeeController@store')->name('employees.store');