<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
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
    Route::controller(UserController::class)->group(function () {
        Route::get("user", "index")->name("data-user");
        Route::get("user/{id}/edit", "edit")->name("edit-user");
        Route::put("user/{id}/update", "update")->name("update-user");
        Route::get("user/{id}/detail", "show")->name("detail-user");
        Route::delete("user/{id}/delete", "destroy")->name("delete-user");
        Route::get("logout", "logout")->name("logout");
    });

    //Project
    Route::controller(ProjectController::class)->group(function () {
        Route::get("project", "index")->name("data-project");
        Route::get("project/create", "create")->name("create-project");
        Route::post("project", "store")->name("store-project");
        Route::get("project/{id}/edit", "edit")->name("edit-project");
        Route::put("project/{id}/update", "update")->name("update-project");
        Route::get("project/{id}/detail", "show")->name("detail-project");
        Route::delete("project{id}/delete", "destroy")->name("delete-project");
    });
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
