<?php

namespace App\Http\Controllers\Admin;

use DOMDocument;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ToastrMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
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
    $category = Category::all(["id_category", "nama_category"]);
    return response()->view("App.Admin.Post.create", [
      "categories" => $category
    ]);
  }
  public function store(Request $request) {
    // dd($request->input("nama_category")[0]);
    $data = Validator::make($request->all(), [
      "judul" => ["required", "min:5"],
      "gambar" => ["required", "image", "mimes:jpg,png,webp"],
      "nama_category" => ["required", "numeric"],
      "content" => ["required"]
    ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    if ($request->hasFile("gambar")) {
      $gambar = $request->file("gambar");
      $gambarName = time() . "." . $gambar->getClientOriginalExtension();
      $tmp = "images/post/cover/" . $gambarName;

      if (!File::exists("public/images/post/cover/")) {
        File::makeDirectory("public/images/post/cover/", 0777, true, true);
      }

      Storage::disk("public")->put($tmp, file_get_contents($gambar));
      $finalGambar = $gambarName;
    }

    Post::create([
      "id_user" => auth()->user()->id_user,
      "judul" => $request->input("judul"),
      "slug" => Str::slug($request->input("judul")),
      "gambar" => $finalGambar,
      "id_category" => $request->input("nama_category"),
      "content" => $request->input("content")
    ]);

    return back()->with("message", ToastrMessage::message("error", "Error", "Data anda berhasil di Post", "topRight"));
  }
  public function edit($id) {
    $post = Post::where("id_post", $id)->get()->first();
    $category = Category::all();
    dd($category);
    return response()->view("App.Admin.Post.edit", [
      "data" => $post,
      "categories" => $category
    ]);
  }
  public function update(Request $request, $id) {
    $data = Validator::make($request->all(), [
      "judul" => ["required", "min:5"],
      "gambar" => ["image", "mimes:jpg,png,webp", "nullable"],
      "nama_category" => ["required", "numeric"],
      "content" => ["required"]
    ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    $post = Post::find($id);
    if ($request->hasFile("gambar")) {
      $gambar = $request->file("gambar");
      $gambarName = time() . "." . $gambar->getClientOriginalExtension();
      $tmp = "images/post/cover/" . $gambarName;

      if (!File::exists("public/images/post/cover/")) {
        File::makeDirectory("public/images/post/cover/", 0777, true, true);
      }

      Storage::disk("public")->put($tmp, file_get_contents($gambar));
      $finalGambar = $gambarName;
    } else {
      $finalGambar = $post->gambar;
    }

    $post->update([
      "judul" => $request->input("judul"),
      "slug" => Str::slug($request->input("judul")),
      "gambar" => $finalGambar,
      "id_category" => $request->input("nama_category"),
      "content" => $request->input("content")
    ]);

    return redirect()->route("data-post")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!", "topRight"));

  }
  public function show($id) {}
  public function destroy($id) {}
}