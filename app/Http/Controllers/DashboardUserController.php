<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Notifications\EmailNotification;
use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Post;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Helpers\ToastrMessage;

class DashboardUserController extends Controller
{
  public function index() {
    $user = User::where("nama", "Miftakhul Kirom")->where("role", 1)->get(
      ["nama", "email", "alamat", "foto", "no_hp"]
    )->first();
    $project = Project::with(["image"])
    ->orderByRaw("FIELD(jenis_project, 'WEB', 'DESKTOP', 'ANDROID')")
    ->get();
    //dd($project);
    $posts = Post::with(["category", "user" => function($query) {
      return $query->select("id_user", "nama", "foto", "username");
    }])->orderBy("id_post", "desc")->take(6)->get();
    //dd($posts);
    $skill = Skill::all();
    $cv = Cv::where("status", 1)->get()->first();

    $testimonial = Testimonial::with(["project"])->get();

    //dd($testimonial);
    $allData = collect(["user" => $user, "projects" => $project, "posts" => $posts, "skills" => $skill, "testimonials" => $testimonial, "cv" => $cv]);
    //dd($allData);
    return response()->view("index", [
      "datas" => $allData
    ]);
  }


  public function sendMessage(Request $request) {
    $admin = User::all(["email"])[0];

    $message = Message::create([
      "id_user" => null,
      "nama" => $request->input("name"),
      "email" => $request->input("email"),
      "subject" => $request->input("subject"),
      "message" => $request->input("message"),
      "status" => 0
    ]);

    $mail = Mail::to("miftakhulkirom@simaster19.my.id")->send(new ContactEmail($message));
    //$notification = $message->notify(new EmailNotification($message));

    //return response()->json([], 200);
    return back()->with("message", ToastrMessage::message("success", "Success", "Pesan berhasil terkirim!"));

    //return redirect()->route('my-profile')->with("message", "Pesan berhasil terkirim!");
  }


  //Project
  public function detailProject($slug) {
    $project = Project::where("slug", $slug)->with([ "image"])->first();
    return response()->view("project-detail", [
      "data" => $project
    ]);
  }
}