<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        $post = Post::with(["user" => function ($query) {
            $query->select("id_user", "nama", "foto");
        }])->get();
        return response()->view(
            "App.Admin.Post.index",
            [
                "datas" => $post

            ]
        );
    }
    public function create()
    {
        return response()->view("App.Admin.Post.create");
    }
    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            "judul" => ["required", "min:5"],
            "gambar" => ["required", "image", "mimes:jpg,png,webp"],
            "id_category" => ["required", "numeric", "min:1"],
            "nama_category" => ["required"],
        ]);
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
