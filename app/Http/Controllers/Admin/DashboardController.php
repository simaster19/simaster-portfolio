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
    //Count
    $userCount = User::count();
    $messageCount = Message::count();
    $projectCount = Project::count();
    $postCount = Post::count();

    $blog = Post::with(["category" => function ($query) {
      return $query->select("id_category", "nama_category");
    }, "user" => function ($query) {
      return $query->select("id_user", "nama", "foto", "username");
    }])->orderBy("id_post", "desc")->take(8)->get();


    $allData = collect([
      "userCount" => $userCount,
      "messageCount" => $messageCount,
      "projectCount" => $projectCount,
      "postCount" => $postCount,
      "blog" => $blog
    ]);

    return response()->view("App.Admin.Dashboard.dashboard", [
      "data" => $allData
    ]);
  }

  public function getMessage() {
    $message = Message::where('status', 0)->orderBy('id_message', 'desc')->get(["id_message", "nama", "message", "created_at", "status"])->take(5);
    //dd($message);
    return response()->json([
      "status" => true,
      "data" => $message
    ], 200);
  }

  public function readAllMessage(Request $request) {
    $message = Message::where('status', 0)->update([
      "status" => 1
    ]);
    if ($message > 0) {
      $status = true;
    } else {
      $status = false;
    }


    return response()->json([
      "status" => $status,
      "data" => $message
    ], 200);

  }
}