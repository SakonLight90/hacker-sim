<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SoftwareController;

Route::get('/', function () {
    return view('welcome');
});

// Auth routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Area protetta (gioco)
Route::middleware(['auth', 'ip.session'])->group(function () {
    Route::get('/console', function () {
        return view('console');
    });

    // Software management
    Route::get('/software', [SoftwareController::class, 'index'])->name('software.index');
    Route::post('/software/upgrade/{type}', [SoftwareController::class, 'upgrade'])->name('software.upgrade');
    // ...altre route gioco...
});
