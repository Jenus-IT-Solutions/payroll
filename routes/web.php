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
    return redirect(route('login'));
});

Auth::routes();

Route::middleware('auth')->group(function() {
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('admin/permissions', 'PermissionsController');

    Route::prefix('hr')->group(function () {
        // Route::get('', '');
        Route::resource('employees', 'HumanResource\EmployeesController');
        Route::resource('departments', 'HumanResource\DepartmentsController');
        Route::resource('designations', 'HumanResource\DesignationsController');
    });
});