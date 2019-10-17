<?php

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

Route::get('/index','PagesController@index');
Route::get('/emp_info','EMP_INFOController@emp_info');
Route::get('/create_emp','EMP_INFOController@create_emp');
Route::post('/ajax_sumit_company','AjaxController@get_company_data')->name('ajax_sumit_company');
Route::post('/ajax_sumit_employee','AjaxController@get_employee_data')->name('ajax_sumit_employee');
Route::post('/delete_employee_data','AjaxController@delete_employee_data')->name('delete_employee_data');
Route::post('/delete_company_data','AjaxController@delete_company_data')->name('delete_company_data');

Route::resource('forms', 'FormsController');
