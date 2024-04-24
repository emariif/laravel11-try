<?php

use App\Http\Controllers;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/', 'welcome');
Route::view('/', 'dashboard');
Route::view('/team', 'team');
Route::view('/projects', 'projects');
Route::view('/calender', 'calender');
Route::view('/reports', 'reports');

Route::get('/users', [Controllers\UserController::class, 'index']);
Route::get('/users/create', [Controllers\UserController::class, 'create']);
