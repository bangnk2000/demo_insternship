<?php

use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CountryController;
use App\Http\Controllers\Backend\StateController;
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\DepartmentController;
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// User controller
Route::post('user/{user}/change-password', [UserController::class, 'change_password'])->name('users.change.password');
Route::resource('users', UserController::class)->except(['show']);

Route::resource('countries', CountryController::class)->except(['show']);

Route::resource('states', StateController::class)->except(['show']);

Route::resource('cities', CityController::class)->except(['show']);

Route::resource('departments', DepartmentController::class)->except(['show']);

Route::get('{any}', function (){
   return view('employees.index');
})->where('any', '.*');
