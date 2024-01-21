<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\LoginController;

//Halaman Portofolio
Route::get("/", [DashboardUserController::class, "index"]);

//Halamn Login
Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "proccessLogin"])->name("proccess-login");


// Halaman Register
Route::get("/register", [RegisterController::class, "register"])->name("register");
Route::post("/register", [RegisterController::class, "proccessRegister"])->name("proccessRegister");

Route::prefix("admin/")->group(function () {
    Route::get('dashboard', [DashboardController::class, "dashboard"])->name("dashboard-admin");

    //USER
    Route::get("user", [UserController::class, "index"])->name("data-user");
})->middleware(['auth']);


// Rute Verifikasi Email
// Route::get('/verify-email', [RegisterController::class, 'showEmailVerificationNotice'])
//     ->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', [RegisterController::class, 'verifyEmail'])
    // ->middleware(['auth', 'signed', 'throttle:6,1'])
    ->name('verification.verify');
Route::post('/email/verification-notification', [RegisterController::class, 'resendVerificationEmail'])
    // ->middleware(['auth', 'throttle:6,1'])
    ->name('verification.send');
