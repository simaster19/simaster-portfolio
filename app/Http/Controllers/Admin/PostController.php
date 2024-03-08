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
    public function index()
    {
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
    public function create()
    {
        $category = Category::all(["id_category", "nama_category"]);
        return response()->view("App.Admin.Post.create", [
            "categories" => $category
        ]);
    }
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            "judul" => ["required", "min:5"],
            "gambar" => ["required", "image", "mimes:jpg,png,webp"],
            "nama_category" => ["required", "array"],
            "content" => ["required"]
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
            "id_user" => auth()->user()->id_user,
            "judul" => $request->input("judul"),
            "slug" => Str::slug($request->input("judul")),
            "gambar" => $finalGambar,
            "id_category" => 1,
            "content" => $request->input("content")
        ]);

        return back()->with("message", ToastrMessage::message("error", "Error", "Data anda berhasil di Post", "topRight"));
    }
    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function show($id)
    {
    }
    public function destroy($id)
    {
    }
}
