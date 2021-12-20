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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::resource('/user', \App\Http\Controllers\UserController::class);
Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::get('/signup', [\App\Http\Controllers\Auth\SessionController::class, 'login'])->name('login');
Route::post('/signup', [\App\Http\Controllers\Auth\SessionController::class, 'store'])->name('login');
