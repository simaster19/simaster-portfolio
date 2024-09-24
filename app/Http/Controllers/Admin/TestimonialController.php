<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ToastrMessage;
use Intervention\Image\ImageManagerStatic as Image;

class TestimonialController extends Controller
{
  public function index() {
    $testimonial = Testimonial::with(["project" => function ($query) {
      return $query->select("id_project", "judul");
    }])->orderBy("id_testimonial", "desc")->get();

    return response()->view("App.Admin.Testimonial.index", [
      "datas" => $testimonial
    ]);
  }
  public function create() {
    $project = Project::all(["id_project", "judul", "slug"]);
    return response()->view("App.Admin.Testimonial.create", [
      "projects" => $project
    ]);
  }
  public function store(Request $request) {
    $data = Validator::make($request->all(), [
      "nama_client" => ["required"],
      "id_project" => ["required", "numeric"]
    ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    if ($request->hasFile("foto")) {
      $foto = $request->file("foto");
      $fotoName = "Testimonial-".time() . "." . $foto->getClientOriginalExtension();
      $tmp = "images/testimonial/" . $fotoName;

      if (!File::exists("public/images/testimonial/")) {
        File::makeDirectory("public/images/testimonial/", 0777, true, true);
      }


      $resizeImage = Image::make($foto)->fit(600, 600);

      Storage::disk("public")->put($tmp, $resizeImage->stream());
      $fotoImage = $fotoName;
    } else {
      $fotoImage = null;
    }

    $testimonial = Testimonial::create([
      "id_project" => $request->input("id_project"),
      "nama_client" => $request->input("nama_client"),
      "foto" => $fotoImage,
      "keterangan" => $request->input("keterangan")
    ]);

    return back()->with("message", ToastrMessage::message("success", "Success", "Data berhasil ditambahkan!", "topRight"));
  }
  public function edit($id) {
    $testimonial = Testimonial::where("id_testimonial", $id)->with(["project"])->get()->first();

    $project = Project::all(["id_project", "judul", "slug"]);
    return response()->view("App.Admin.Testimonial.edit", [
      "data" => $testimonial,
      "projects" => $project
    ]);
  }
  public function update(Request $request, $id) {
    $data = Validator::make($request->all(), [
      "nama_client" => ["required"],
      "id_project" => ["required", "numeric"]
    ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"));
    }

    $testimonial = Testimonial::where("id_testimonial", $id)->get()->first();
    if ($request->hasFile("foto")) {
      $foto = $request->file("foto");
      $fotoName = "Testimonial-".time() . "." . $foto->getClientOriginalExtension();
      $tmp = "images/testimonial/" . $fotoName;

      if (!File::exists("public/images/testimonial/")) {
        File::makeDirectory("public/images/testimonial/", 0777, true, true);
      }
      if (!$testimonial->foto == null || !$testimonial->foto == "") {
        Storage::disk("public")->delete("images/testimonial/" . $testimonial->foto);
      }

      $resizeImage = Image::make($foto)->fit(600, 600);

      Storage::disk("public")->put($tmp, $resizeImage->stream());
      $fotoImage = $fotoName;
    } else {
      $fotoImage = $testimonial->foto;
    }

    Testimonial::find($id)->update([
      "id_project" => $request->input("id_project"),
      "foto" => $fotoImage,
      "nama_client" => $request->input("nama_client"),
      "keterangan" => $request->input("keterangan")
    ]);

    return redirect()->route("data-testimonial")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!", "topRight"));
  }

  public function show($id) {
    $testimonial = Testimonial::with(["project"])->find($id);

    return response()->view("App.Admin.Testimonial.detail", [
      "data" => $testimonial
    ]);

  }
  public function destroy($id) {
    $testimonial = Testimonial::find($id);

    Storage::disk("public")->delete("images/testimonial/" . $testimonial->gambar);
    $testimonial->delete();

    return back()->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!", "topRight"));
  }
}