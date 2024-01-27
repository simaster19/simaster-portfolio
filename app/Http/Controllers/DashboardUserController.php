<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $user = User::where("nama", "Miftakhul Kirom")->where("role", 1)->get()->first();

        return response()->view("index", [
            "data" => $user
        ]);
    }
}
