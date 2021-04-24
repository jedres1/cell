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

Route::get('/assignments', 'AssignmentCellphoneEmployeeController@index');
Route::get('/assignments/create','AssignmentCellphoneEmployeeController@create')->name('assignments.create');
Route::post('/assgnments','AssignmentCellphoneEmployeeController@store')->name('assignments.store');
//Route::get('/cellphones/show', 'CellphoneController@show')->name('cellphones.show');