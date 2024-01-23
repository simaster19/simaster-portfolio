<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        return response()->view("App.Admin.Project.index", [
            "datas" => $project
        ]);
    }
    public function create()
    {
        return response()->view("App.Admin.Project.create");
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            "cover" => ["required", "mimes:jpg,png,webp"],
            "jenis_project" => ["required"],
            "judul" => ["required", "min:5"],
            "nama_client" => ["required"],
            "dibuat_dengan" => ["required"],
            "status" => ["required"]
        ]);

        if ($data->fails()) {
            return back()->withErrors($data, "messageError");
        }



        if ($request->hasFile("cover")) {
            $cover = $request->file("cover");
            $coverName = time() . "." . $cover->getClientOriginalExtension();
            $tmp = "images/cover/" . $coverName;

            if (!File::exists("public/images/cover/")) {
                File::makeDirectory("public/images/cover/", 0777, true, true);
            }

            Storage::disk("public")->put($tmp, file_get_contents($cover->getRealPath()));
            $coverImage = $coverName;
        }




        $project = Project::create([
            "cover" => $coverImage,
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

    public function edit($id)
    {
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
}
