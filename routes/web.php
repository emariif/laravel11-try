<?php

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
