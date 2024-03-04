<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Post;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
  public function dashboard() {
    $user = User::all();
    $message = Message::all();
    $project = Project::all();
    $post = Post::all();

    $allData = collect(["user" => $user, "message" => $message, "project" => $project, "post" => $post]);

    return response()->view("App.Admin.Dashboard.dashboard", [
      "data" => $allData
    ]);
  }

  public function getMessage() {
    $message = Message::where("status", 1)->get(["id_message", "nama", "message", "created_at", "status"]);
    //dd($message);
    return response()->json([
      "status" => true,
      "data" => $message
    ], 200);
  }
}