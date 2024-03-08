<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
  public function index() {
    $post = Post::with(["user" => function ($query) {
      $query->select("id_user", "nama", "foto");
    }])->orderBy("id_post", "desc")->get();
    return response()->view(
      "App.Admin.Post.index",
      [
        "datas" => $post

      ]
    );
  }
  public function create() {
    return response()->view("App.Admin.Post.create");
  }
  public function store(Request $request) {
    $data = Validator::make($request->all(), [
      "judul" => ["required", "min:5"],
      "gambar" => ["required", "image", "mimes:jpg,png,webp"],
      "id_category" => ["required", "numeric"],
      "nama_category" => ["required"],
    ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    if ($request->hasFile("gambar")) {
      $gambar = $request->file("gambar");
      $gambarName = time() . "." . $gambar->getClientOriginalExtension();
      $tmp = "images/post/" . $gambarName;

      if (!File::exists("public/images/post/")) {
        File::makeDirectory("public/images/post/", 0777, true, true);
      }

      Storage::disk("public")->put($tmp, file_get_contents($gambar));
      $finalGambar = $gambarName;
    }
    
    Post::create([
      
      ]);
  }
  public function edit($id) {}
  public function update(Request $request, $id) {}
  public function show($id) {}
  public function destroy($id) {}
}