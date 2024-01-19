<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardUserController;


Route::get("/", [DashboardUserController::class, "index"]);