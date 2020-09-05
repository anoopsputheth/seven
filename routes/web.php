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



Route::get('/', function () {
    return view('welcome');
});



Route::get('/user', 'UserController@index');

Route::post('/upload', 'UserController@uploadAvatar');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/generate-pdf','PDFController@generatePDF');




Route::get('/permission-denied', function() {
    return View::make('permission-denied'); 
   });



Route::get('/roles', 'RoleController@index')->name('role.index')->middleware('auth')->middleware('checkaccess');

Route::get('/roles/indexsearch', 'RoleController@indexsearch')->name('role.indexsearch')->middleware('auth');

Route::get('/roles/ajaxpagination', 'RoleController@ajaxpagination')->name('role.ajaxpagination')->middleware('auth');

Route::post('/roles/create', 'RoleController@insert')->name('role.create')->middleware('auth');

Route::get('/roles/fetch/{id}', 'RoleController@fetch')->name('role.fetch')->middleware('auth');

Route::post('/roles/update', 'RoleController@update')->name('role.update')->middleware('auth');


Route::get('/companies', 'CompanyController@index')->name('company.index')->middleware('auth')->middleware('checkaccess');

Route::get('/companies/indexsearch', 'CompanyController@indexsearch')->name('company.indexsearch')->middleware('auth');

Route::get('/companies/ajaxpagination', 'CompanyController@ajaxpagination')->name('company.ajaxpagination')->middleware('auth');

Route::post('/companies/create', 'CompanyController@insert')->name('company.create')->middleware('auth');

Route::get('/companies/fetch/{id}', 'CompanyController@fetch')->name('company.fetch')->middleware('auth');

Route::post('/companies/update', 'CompanyController@update')->name('company.update')->middleware('auth');



Route::get('/clients', 'ClientController@index')->name('client.index')->middleware('auth')->middleware('checkaccess');

Route::get('/clients/indexsearch', 'ClientController@indexsearch')->name('client.indexsearch')->middleware('auth');

Route::get('/clients/ajaxpagination', 'ClientController@ajaxpagination')->name('client.ajaxpagination')->middleware('auth');

Route::post('/clients/create', 'ClientController@insert')->name('client.create')->middleware('auth');

Route::get('/clients/fetch/{id}', 'ClientController@fetch')->name('client.fetch')->middleware('auth');

Route::post('/clients/update', 'ClientController@update')->name('client.update')->middleware('auth')->middleware('checkaccess');





