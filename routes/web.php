<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\CvController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TestimonialController;

//Halaman Portofolio
Route::get("/", [DashboardUserController::class, "index"])->name("my-profile");
Route::post("/sendMessage", [DashboardUserController::class, "sendMessage"])->name("send");
//Halamn Login
Route::get("/login", [LoginController::class, "index"])->name("login");
Route::post("/login", [LoginController::class, "proccessLogin"])->name("proccess-login");


// Halaman Register
Route::get("/register", [RegisterController::class, "register"])->name("register");
Route::post("/register", [RegisterController::class, "proccessRegister"])->name("proccessRegister");

Route::prefix("admin/")->group(function () {
  Route::controller(DashboardController::class)->group(function(){
  Route::get('dashboard', "dashboard")->name("dashboard-admin");
  Route::get('getMessage', "getMessage")->name("dashboard-getmessage");
    
  });

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
    Route::delete("project/{id}/delete", "destroy")->name("delete-project");
  });

  //Post
  Route::controller(PostController::class)->group(function () {
    Route::get("post", "index")->name("data-post");
    Route::get("post/create", "create")->name("create-post");
    Route::post("post", "store")->name("store-post");
    Route::get("post/{id}/edit", "edit")->name("edit-post");
    Route::put("post/{id}/update", "update")->name("update-post");
    Route::get("post/{id}/detail", "show")->name("detail-post");
    Route::delete("post/{id}/delete", "destroy")->name("delete-post");
  });

  //Skill
  Route::controller(SkillController::class)->group(function () {
    Route::get("skill", "index")->name("data-skill");
    Route::get("skill/create", "create")->name("create-skill");
    Route::post("skill", "store")->name("store-skill");
    Route::get("skill/{id}/edit", "edit")->name("edit-skill");
    Route::put("skill/{id}/update", "update")->name("update-skill");
    //Route::get("skill/{id}/detail", "show")->name("detail-skill");
    Route::delete("skill/{id}/delete", "destroy")->name("delete-skill");
  });

  //Message
  Route::controller(MessageController::class)->group(function () {
    Route::get("message", "index")->name("data-message");
    Route::get("message/{id}/detail", "show")->name("detail-message");
    Route::delete("message/{id}/delete", "destroy")->name("delete-message");
  });

  //Testimonial
  Route::controller(TestimonialController::class)->group(function () {
    Route::get("testimonial", "index")->name("data-testimonial");
    Route::get("testimonial/create", "create")->name("create-testimonial");
    Route::post("testimonial", "store")->name("store-testimonial");
    Route::get("testimonial/{id}/edit", "edit")->name("edit-testimonial");
    Route::put("testimonial/{id}/update", "update")->name("update-testimonial");
    Route::get("testimonial/{id}/detail", "show")->name("detail-testimonial");
    Route::delete("testimonial/{id}/delete", "destroy")->name("delete-testimonial");
  });

  //Certificate
  Route::controller(CertificateController::class)->group(function () {
    Route::get("certificate", "index")->name("data-certificate");
    Route::get("certificate/create", "create")->name("create-certificate");
    Route::post("certificate", "store")->name("store-certificate");
    Route::get("certificate/{id}/edit", "edit")->name("edit-certificate");
    Route::put("certificate/{id}/update", "update")->name("update-certificate");
    Route::get("certificate/{id}/detail", "show")->name("detail-certificate");
    Route::delete("certificate/{id}/delete", "destroy")->name("delete-certificate");
  });

  //Certificate
  Route::controller(CvController::class)->group(function () {
    Route::get("cv", "index")->name("data-cv");
    Route::get("cv/create", "create")->name("create-cv");
    Route::post("cv", "store")->name("store-cv");
    Route::get("cv/{id}/edit", "edit")->name("edit-cv");
    Route::put("cv/{id}/update", "update")->name("update-cv");
    Route::delete("cv/{id}/delete", "destroy")->name("delete-cv");
    //Ajax
    Route::get("cv/{id}/default", "getDefault")->name("getDefault");
  });
})->middleware(['auth']);


// Rute Verifikasi Email
Route::get('/verify-email', [RegisterController::class, 'showEmailVerificationNotice'])
     ->name('verification.notice');
Route::get('/verify-email/{id}/{hash}', [RegisterController::class, 'verifyEmail'])
// ->middleware(['auth', 'signed', 'throttle:6,1'])
->name('verification.verify');
Route::post('/email/verification-notification', [RegisterController::class, 'resendVerificationEmail'])
// ->middleware(['auth', 'throttle:6,1'])
->name('verification.send');