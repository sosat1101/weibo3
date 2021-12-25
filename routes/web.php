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

Route::get('/user-list', [\App\Http\Controllers\StaticController::class, 'userList'])->name('user-list');

Route::resource('/user', \App\Http\Controllers\UserController::class);

Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'create'])->name('register');
Route::get('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
Route::get('/signup', [\App\Http\Controllers\Auth\SessionController::class, 'login'])->name('login');
Route::post('/signup', [\App\Http\Controllers\Auth\SessionController::class, 'store'])->name('login');
Route::delete('/sign-out', [\App\Http\Controllers\Auth\SessionController::class, 'destroy'])->name('sign-out');

Route::resource('user', \App\Http\Controllers\UserController::class);
Route::resource('status', \App\Http\Controllers\StatusController::class);

Route::post('/user/follow/{user}', [\App\Http\Controllers\FollowerController::class, 'follow'])->name('follow');
Route::delete('/user/follow/{user}', [\App\Http\Controllers\FollowerController::class, 'unfollow'])->name('unfollow');

//显示文章和相应的评论
Route::get('/status/show/{status}', [\App\Http\Controllers\CommentController::class, 'show'])->name('comment.show');

//用户进行评论
Route::post('/status/{status}/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('commit.store');

