<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
  public function index() {
    $project = Project::all()
    return respose()->view("App.Admin.Project.index", [
      "datas" => $project
    ]);
  }
  public function create() {
    return response()->view("App.Admin.Project.create");
  }

  public function store(Request $request) {
    $data = Validator::make($request->all, [
      "cover" => ["required", "mimes:jpg,png,webp"],
      "jenis_project" => ["required"],
      "judul" => ["required", "min:5"],
      "nama_client" => ["required"],
      "dibuat_dengan" => ["required"]
      "status" => ["required"]
    ]);

    if ($data->fails()) {
      return back()->withErrors($data, "messageError");
    }

    $project = Project::create([
      "cover" => $request->input("cover"),
      "jenis_project" => $request->input("jenis_project"),
      "judul" => $request->input("judul"),
      "slug" => Str::slug($request->input("judul")),
      "project_url" => $request->input("project_url"),
      "nama_client" => $request->input("nama_client"),
      "keterangan" => $request->input("keterangan"),
      "dibuat_dengan" => $request->input("dibuat_dengan"),
      "status" => $request->input("status")
    ]);
    
    return back()->with("message", "Data berhasil ditambahkan!");
  }
  
  public function edit($id) {}
  public function update(Request $request, $id) {}
  public function destroy($id) {}
}