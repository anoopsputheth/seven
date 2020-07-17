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

Route::get('/generate-pdf','PDFController@generatePDF');




Route::get('/companies', 'CompanyController@index')->name('company.index');

Route::get('/companies/indexsearch', 'CompanyController@indexsearch')->name('company.indexsearch');

Route::get('/companies/ajaxpagination', 'CompanyController@ajaxpagination')->name('company.ajaxpagination');

Route::post('/companies/create', 'CompanyController@insert')->name('company.create');

Route::get('/companies/fetch/{id}', 'CompanyController@fetch')->name('company.fetch');

Route::post('/companies/update', 'CompanyController@update')->name('company.update');


Route::get('/clients', 'ClientController@index')->name('client.index');

Route::post('/clients/create', 'ClientController@insert')->name('client.create');
