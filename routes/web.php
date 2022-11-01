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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('course', \App\Http\Controllers\Resource\CourseController::class);
Route::resource('customer', \App\Http\Controllers\Resource\CustomerController::class);
Route::resource('employee', \App\Http\Controllers\Resource\EmployeeController::class);
Route::resource('tool', \App\Http\Controllers\Resource\ToolController::class);
Route::resource('material', \App\Http\Controllers\Resource\MaterialController::class);
Route::resource('service_order', \App\Http\Controllers\Resource\ServiceOrderController::class);
