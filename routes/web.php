<?php

use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;



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


Route::get('/todos', 'TodoController@index')->name('todo.index');

Route::get('/todos/create', 'TodoController@create');

Route::post('/todos/create', 'TodoController@store');

Route::get('/todos/{todo}/edit', 'TodoController@edit');

Route::patch('/todos/{todo}/update', 'TodoController@update')->name('todo.update');




Route::get('/', function () {
    return view('welcome');
});



Route::get('/user', 'UserController@index');

Route::post('/upload', 'UserController@uploadAvatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');





Route::get('/companies', 'CompanyController@index')->name('company.index');

Route::get('/companies/ajaxpagination', 'CompanyController@ajaxpagination')->name('company.ajaxpagination');

Route::post('/createcompany', 'CompanyController@store')->name('createcompany');

Route::get('/fetchcompany/{id}', 'CompanyController@fetch')->name('fetchcompany');

Route::post('/editcompany', 'CompanyController@edit')->name('editcompany');


