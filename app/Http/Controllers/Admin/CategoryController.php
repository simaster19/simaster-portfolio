<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Facades\Validator;
use App\Helpers\ToastrMessage;

class CategoryController extends Controller
{
  public function index() {
    $category = Category::all();
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
      "nama_category" => $request->input("nama_category")
      ]);
      
      return redirect()->route("create-category")->with("message", ToastrMessage::message("success", "Success", "Data berhasil ditambahkan!", "topRight"));

  }
  public function edit($id) {}
  public function update(Request $request, $id) {}
  public function destroy($id) {}
}