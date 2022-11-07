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
    return redirect('/home');
});

Route::get('/home', function () {
    return view('home');
})->name('homepage');

Route::get('/service', function () {
    return route('course.index');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/menu_add/tool', function () {
    return view('menuadd',['mode' => 'tool']);
});
Route::get('/menu_add/material', function () {
    return view('menuadd',['mode' => 'material']);
});
Route::get('/menu_add/employee', function () {
    return view('menuadd',['mode' => 'employee']);
});
Route::get('/menu_add/course', function () {
    return view('menuadd',['mode' => 'course']);
});

Route::get('/serviceorder', function () {
    return view('serviceorder');
});

Route::get('/employees', function () {
    return view('employees');
});

Route::get('/payment', function () {
    return view('payment');
});

Route::get('/register', function (){
    return route('customer-register.create');
});


Route::get('/logout', [\App\Http\Controllers\AuthUser\UserLoginAuthController::class, 'logout']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/cancel-service-order/{service_order}',[\App\Http\Controllers\Resource\ServiceOrderController::class, 'cancelServiceOrder'])
    ->name('service_order.cancel');

Route::resource('customer-register', \App\Http\Controllers\AuthUser\UserRegisterAuthController::class);
Route::resource('customer-login', \App\Http\Controllers\AuthUser\UserLoginAuthController::class);
Route::resource('course', \App\Http\Controllers\Resource\CourseController::class);
Route::resource('customer', \App\Http\Controllers\Resource\CustomerController::class);
Route::resource('employee', \App\Http\Controllers\Resource\EmployeeController::class);
Route::resource('tool', \App\Http\Controllers\Resource\ToolController::class);
Route::resource('material', \App\Http\Controllers\Resource\MaterialController::class);
Route::resource('service_order', \App\Http\Controllers\Resource\ServiceOrderController::class);
