<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ToastrMessage;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
  public function index() {
    $category = Category::orderBy("created_at", "desc")->get();
    return response()->view("App.Admin.Category.index", [
      "datas" => $category
    ]);
  }
  public function create() {
    return response()->view("App.Admin.Category.create");
  }
  public function store(Request $request) {
    $data = Validator::make($request->all(), [
      "nama_category" => ["required", "min:3"]
    ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    Category::create([
      "nama_category" => ucwords($request->input("nama_category")),
      "slug" => Str::slug($request->input('nama_category'))
    ]);

    return redirect()->route("create-category")->with("message", ToastrMessage::message("success", "Success", "Data berhasil ditambahkan!", "topRight"));
  }
  public function edit($id) {
    $category = Category::find($id);
    return response()->view("App.Admin.Category.edit", [
      "data" => $category
    ]);
  }
  public function update(Request $request, $id) {
    $data = Validator::make($request->all(), [
      "nama_category" => ["required", "min:3", "unique:categories,nama_category"]
    ]);
    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    $category = Category::find($id);
    $category->update([
      "nama_category" => $request->input("nama_category"),
      "slug" => Str::slug($request->input("nama_category"))
    ]);

    return redirect()->route("data-category")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!", "topRight"));
  }
  public function destroy($id) {
    $category = Category::find($id);
    $post = Post::where("id_category", $category->id_category)->get();

    if ($post->isEmpty()) {
      $category->delete();
    }else{
    return back()->with("message", ToastrMessage::message("error", "Error", "Data gagal dihapus!", "topRight"));
    }
    return redirect()->route("data-category")->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!", "topRight"));

  }
}