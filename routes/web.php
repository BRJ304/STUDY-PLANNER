<?php

use Illuminate\Support\Facades\Route;



use App\Http\Controllers\HomeController;


// ========== PUBLIC PAGES ==========
Route::get('/', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'about_us']);
Route::get('/contact-us', [HomeController::class, 'contact_us']);
Route::get('/features', [HomeController::class, 'feature']);
Route::get('/login', [HomeController::class, 'logins']);
Route::get('/register', [HomeController::class, 'register']);
Route::get('/dashboard', [HomeController::class, 'dashboards']);

