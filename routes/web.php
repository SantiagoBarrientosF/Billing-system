<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\customerController;
use App\Http\Controllers\productController;
use App\Http\Controllers\invoiceController;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::resource('customer',customerController::class);
Route::resource('product',productController::class);
Route::resource('invoice',invoiceController::class);

Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', function () {
    return view('user.register');
})->name('register');

Route::post('/register', [AuthController::class, 'register']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::get('/principal', function () {
    return view('principal.index');
})->name('principal');

