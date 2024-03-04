<?php

namespace App\Http\Controllers;

use App\Mail\ContactEmail;
use App\Notifications\EmailNotification;
use App\Models\Message;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class DashboardUserController extends Controller
{
  public function index() {
    $user = User::where("nama", "Miftakhul Kirom")->where("role", 1)->get(
      ["nama", "email", "alamat", "foto", "no_hp"]
    )->first();
    $project = Project::where("status", "FREELANCE")->with(["image"])->get();
    $skill = Skill::all();
    $cv = Cv::where("status", 1)->get()->first();

    $testimonial = Testimonial::with(["project"])->get();
    //dd($testimonial);
    $allData = collect(["user" => $user, "projects" => $project, "skills" => $skill, "testimonials" => $testimonial, "cv" => $cv]);
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
      "status" => 1
    ]);

    $mail = Mail::to("miftakhulkirom@simaster19.my.id")->send(new ContactEmail($message));
    //$notification = $message->notify(new EmailNotification($message));

    return response()->json([], 200);
  }
}