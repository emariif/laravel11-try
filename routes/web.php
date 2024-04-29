<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/', 'welcome');
Route::view('/', 'dashboard');
Route::view('/team', 'team')->middleware('auth');
Route::view('/projects', 'projects')->middleware('auth');
Route::view('/calender', 'calender')->middleware('auth');
Route::view('/reports', 'reports')->middleware('auth');

Route::resource('users', Controllers\UserController::class)->middleware('auth');
// Route::get('/users', [Controllers\UserController::class, 'index'])->name('users.index');
// Route::get('/users/create', [Controllers\UserController::class, 'create'])->name('users.create');
// Route::post('/users', [Controllers\UserController::class, 'store'])->name('users.store');
// Route::get('/users/{user:id}', [Controllers\UserController::class, 'show'])->name('users.show');
// Route::get('users/{user:id}/edit', [Controllers\UserController::class, 'edit'])->name('users.edit');
// Route::put('/users/{user:id}', [Controllers\UserController::class, 'update'])->name('users.update');
// Route::delete('/users/{user:id}', [Controllers\UserController::class, 'destroy'])->name('users.destroy');

Route::get('login', [Controllers\AuthController::class, 'loginForm'])->name('login')->middleware('guest');
Route::post('login', [Controllers\AuthController::class, 'authenticate']);

Route::post('logout', [Controllers\AuthController::class, 'logout'])->middleware('auth');
