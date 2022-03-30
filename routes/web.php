<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use  App\Http\Controllers;
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

Route::get('/', function () {
    return redirect(route("employee.home"));
});

Route::get('home', function () {
    return redirect(route("employee.home"));
});

Route::name('employee.')->prefix('employee')->group(function (){

    Route::any('/', 'EmployeeController@index')->name('home');
    
    Route::get('login', 'EmployeeAccountController@ShowLogin')->name('login.show');

    Route::post('login', 'EmployeeAccountController@Login')->name('login');

    Route::any('logout', 'EmployeeAccountController@logout')->name('logout');
    
    Route::get('register', 'EmployeeAccountController@create')->name('register.show');

    Route::post('register', 'EmployeeAccountController@store')->name('register');

    Route::get('search', 'PostController@index')->name('search');

    Route::post('search', 'PostController@search')->name('searchpost');

    Route::get('job/{id}','PostController@show')->name("job.show");
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
