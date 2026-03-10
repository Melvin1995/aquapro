<?php

use App\Http\Controllers\AquariumController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

// Guest middleware routes
Route::middleware('guest')->group(function() {

    // Register
    Route::view('/register', 'auth.register');
    Route::post('/register', Register::class)->name('register');

    // Login
    Route::view('/login', 'auth.login');
    Route::post('/login', Login::class)->name('login');
});

// Auth middleware routes
Route::middleware('auth')->group(function() {
    // Home
    Route::get('/', function () {
        return view('home');
    })->name('home');

    // Logout
    Route::post('/logout', Logout::class)->name('logout');

    // Pages //


    // Aquaria
    Route::post('/aquaria/store', [AquariumController::class, 'store']);

    Route::resource('/aquaria', AquariumController::class)->name('index', 'aquaria');
});
