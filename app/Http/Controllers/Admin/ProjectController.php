<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ToastrMessage;
use App\Models\Image as Images;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Helpers\ListBahasaPemograman;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Intervention\Image\ImageManagerStatic as Image;

class ProjectController extends Controller
{
  public function index() {
    $project = Project::with(["testimonial" => function ($query) {
      $query->select("id_testimonial", "nama_client", "id_project");
    }])->orderBy("id_project", "desc")->get();
    //dd($project);
    return response()->view("App.Admin.Project.index", [
      "datas" => $project
    ]);
  }
  public function create() {
    $listBahasa = ListBahasaPemograman::class;
    return response()->view("App.Admin.Project.create", [
      "listBahasa" => $listBahasa::listBahasa(),
      "jenisProject" => $listBahasa::jenisProject(),
      "statusProject" => $listBahasa::statusProject()
    ]);
  }

  public function store(Request $request) {
    // dd($request->all());
    $data = Validator::make($request->all(), [
      "cover" => ["required", "image", "mimes:jpg,png,webp"],
      "image.*" => ["required", "image", "mimes:jpg,png,webp"],
      "jenis_project" => ["required"],
      "judul" => ["required", "string", "min:5"],
      "dibuat_dengan" => ["required"],
      "status" => ["required", "string"]
    ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }


    if ($request->hasFile("cover")) {
      $cover = $request->file("cover");
      $coverName = "Project-cover-" . time() . rand(10, 99999) . "." . $cover->getClientOriginalExtension();
      $tmp = "images/cover/" . $coverName;

      if (!File::exists("public/images/cover/")) {
        File::makeDirectory("public/images/cover/", 0777, true, true);
      }

      $resizeImage = Image::make($cover)->fit(600, 600);

      Storage::disk("public")->put($tmp, $resizeImage->stream());
      $coverImage = $coverName;
    }

    if ($request->hasFile("image")) {
      $finalImage = [];
      $images = $request->file("image");


      if (!File::exists("public/images/image/")) {
        File::makeDirectory("public/images/image/", 0777, true, true);
      }

      foreach ($images as $image) {

        $imageName = "Project-image-" . time() . rand(10, 99999) . "." . $image->getClientOriginalExtension();
        $tmp = "images/image/" . $imageName;

        $resizeImage = Image::make($image)->fit(600, 600);
        Storage::disk("public")->put($tmp, $resizeImage->stream());
        $imageImage[] = $imageName;
      }

      $finalImage[] = $imageImage;
    }

    $tech = [];
    foreach ($request->input("dibuat_dengan") as $dibuat_dengan) {
      $tech[] = $dibuat_dengan;
    }


    $project = Project::create([
      "cover" => $coverImage,
      "jenis_project" => $request->input("jenis_project"),
      "judul" => $request->input("judul"),
      "slug" => Str::slug($request->input("judul")),
      "project_url" => $request->input("project_url"),
      "keterangan" => $request->input("keterangan"),
      "dibuat_dengan" => json_encode($tech),
      "tahun_project" => $request->input("tahun_project"),
      "status" => $request->input("status")
    ]);

    $images = Images::create([
      "id_project" => $project->id_project,
      "gambar" => json_encode($finalImage[0])

    ]);

    return back()->with("message", ToastrMessage::message("success", "Success", "Data berhasil ditambahkan!"));
  }

  public function edit($id) {
    $project = Project::with(["image"])->where("id_project", $id)->get()->first();
    $listBahasa = ListBahasaPemograman::class;
    return response()->view("App.Admin.Project.edit", [
      "data" => $project,
      "listBahasa" => $listBahasa::listBahasa(),
      "jenisProject" => $listBahasa::jenisProject(),
      "statusProject" => $listBahasa::statusProject()

    ]);
  }
  public function update(Request $request, $id) {
    $data = Validator::make($request->all(), [
      "cover" => ["image", "mimes:jpg,png,webp,jpeg"],
      "image.*" => ["image", "mimes:jpg,png,webp,jpeg"],
      "jenis_project" => ["required"],
      "judul" => ["required", "min:5"],
      "dibuat_dengan" => ["required"],
      "status" => ["required"]
    ]);

    //dd($request->all());

    if ($data->fails()) {
      //dd($data->errors()->messages());
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages()));
    }



    $project = Project::with(["image"])->where("id_project", $id)->get()->first();

    if ($request->hasFile("cover")) {
      $cover = $request->file("cover");
      $coverName = "Project-cover-" . time() . rand(10, 99999) . "." . $cover->getClientOriginalExtension();
      $tmp = "images/cover/" . $coverName;

      Storage::disk("public")->delete("images/cover/" . $project->cover);

      if (!File::exists("public/images/cover/")) {
        File::makeDirectory("public/images/cover/", 0777, true, true);
      }

      $resizeImage = Image::make($cover)->fit(600, 600);

      Storage::disk("public")->put($tmp, $resizeImage->stream());
      $coverImage = $coverName;
    } else {
      $coverImage = $project->cover;
    }

    if ($request->hasFile("image")) {
      $finalImage = [];
      $images = $request->file("image");


      if (!File::exists("public/images/image/")) {
        File::makeDirectory("public/images/image/", 0777, true, true);
      }

      $projectImage = json_decode($project->image[0]->gambar);
      foreach ($projectImage as $oldImage) {

        Storage::disk("public")->delete("images/image/" . $oldImage);
      }

      foreach ($images as $image) {

        $imageName = "Project-image-" . time() . rand(10, 99999) . "." . $image->getClientOriginalExtension();
        $tmp = "images/image/" . $imageName;

        $resizeImage = Image::make($image)->fit(600, 600);
        Storage::disk("public")->put($tmp, $resizeImage->stream());
        $imageImage[] = $imageName;
      }

      $finalImage[] = $imageImage;
    } else {
      if (count($project->image) != 0) {

        $finalImage = $project->image[0]->gambar;
      } else {
        $finalImage = '[""]';
      }
    }




    $project->update([
      "cover" => $coverImage,
      "jenis_project" => $request->input("jenis_project"),
      "judul" => $request->input("judul"),
      "slug" => Str::slug($request->input("judul")),
      "project_url" => $request->input("project_url"),
      "keterangan" => $request->input("keterangan"),
      "dibuat_dengan" => $request->input("dibuat_dengan"),
      "tahun_project" => $request->input("tahun_project"),
      "status" => $request->input("status")
    ]);


    $image = Images::where("id_project", $project->id_project);
    $image->update([
      "id_project" => $project->id_project,
      "gambar" => !$request->file('image') ? $finalImage : json_encode($finalImage[0])
    ]);

    return redirect()->route("data-project")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!"));
  }

  public function show($id) {
    $project = Project::with(['image'])->where("id_project", $id)->get()->first();
    return response()->view("App.Admin.Project.detail", [
      "data" => $project
    ]);
  }
  public function destroy($id) {
    return back()->with("message", ToastrMessage::message("info", "Info", "Fitur Nonaktif!"));

    $project = Project::with(["image"])->where("id_project", $id)->get()->first();

    Storage::disk("public")->delete("images/cover/" . $project->cover);
    if (!empty($project->image)) {
      foreach (json_decode($project->image[0]->gambar) as $gambar) {
        Storage::disk("public")->delete("images/image/" . $gambar);
      }
      Images::where("id_project", $id)->delete();
    }

    Project::where("id_project", $id)->delete();
    return back()->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!"));
  }
}