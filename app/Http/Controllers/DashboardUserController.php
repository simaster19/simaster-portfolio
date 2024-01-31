<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardUserController extends Controller
{
    public function index()
    {
        $user = User::where("nama", "Miftakhul Kirom")->where("role", 1)->get(
            ["nama", "email", "alamat", "foto", "no_hp"]
        )->first();
        $project = Project::with(["image"])->get();
        $skill = Skill::all();

        $allData = collect(["user" => $user, "projects" => $project, "skills" => $skill]);
        //dd($allData);
        return response()->view("index", [
            "datas" => $allData
        ]);
    }
}
