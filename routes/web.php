<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;
use Illuminate\Support\Facades\Route;

Route::get('', function () {
    return view('welcome');
});


Route::get('home', function () {
    return view('home');
})->name('home');


Route::get('/users/{user}/posts', [UserPostController::class, 'index'])->name('users.posts');



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('store');

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts{post}', [PostController::class, 'destroy'])->name('posts.destroy');
Route::get('/posts{post}', [PostController::class, 'show'])->name('posts.show');


Route::post('post/{post}/likes', [PostLikeController::class, 'store'])->name('posts.likes');
Route::delete('post/{post}/likes', [PostLikeController::class, 'destroy']);
