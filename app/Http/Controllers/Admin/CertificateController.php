<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ToastrMessage;

class CertificateController extends Controller
{
  public function index() {
    $certificate = Certificate::orderBy("id_certificate","desc")->get();

    return response()->view("App.Admin.Certificate.index", [
      "datas" => $certificate
    ]);
  }

  public function create() {
    return response()->view("App.Admin.Certificate.create");
  }
  public function store(Request $request) {
    $data = Validator::make($request->all(), [
      "gambar" => ["required", "image", "mimes:jpg,png,webp"],
      "judul" => ["required"],
      "nama_online_course" => ["required"],
    ], [
      "gambar.required" => "Gambar tidak boleh kosong!",
      "gambar.mimes" => "File harus berformat jpg, png, webp",
      "judul.required" => "Judul tidak boleh kosong!",
      "nama_online_course.required" => "Online course wajib diisi!"
    ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    if ($request->hasFile("gambar")) {
      $gambar = $request->file("gambar");

      $gambarName = time() . "." . $gambar->getClientOriginalExtension();
      $tmp = "images/certificate/" . $gambarName;

      if (!File::exists("public/images/certificate/")) {
        File::makeDirectory("public/images/certificate/", 0777, true, true);
      }

      Storage::disk("public")->put($tmp, file_get_contents($gambar->getRealPath()));
      $gambarImage = $gambarName;
    }


    $certificate = Certificate::create([
      "gambar" => $gambarImage,
      "nama_online_course" => $request->input("nama_online_course"),
      "judul" => $request->input("judul"),
      "slug" => Str::slug($request->input("judul")),
      "link_certificate" => $request->input("link_certificate")
    ]);

    return back()->with("message", ToastrMessage::message("success", "Success", "Data berhasil ditambahkan!", "topRight"));
  }
  public function edit($id) {
    $certificate = Certificate::where("id_certificate", $id)->get()->first();

    return response()->view("App.Admin.Certificate.edit", [
      "data" => $certificate
    ]);
  }
  public function update(Request $request, $id) {
    $data = Validator::make($request->all(), [
      "gambar" => ["image", "mimes:jpg,png,webp"],
      "judul" => ["required"],
      "nama_online_course" => ["required"],
    ],
      [
        "gambar.mimes" => "File harus berformat jpg, png, webp",
        "judul.required" => "Judul tidak boleh kosong!",
        "nama_online_course.required" => "Online course wajib diisi!"

      ]);

      if ($data->fails()) {
        return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"));
      }

      $certificate = Certificate::find($id);

      if ($request->hasFile("gambar")) {
        $gambar = $request->file("gambar");

        $gambarName = time() . "." . $gambar->getClientOriginalExtension();
        $tmp = "images/certificate/" . $gambarName;

        Storage::disk("public")->delete("images/certificate/" . $certificate->gambar);

        if (!File::exists("public/images/certificate/")) {
          File::makeDirectory("public/images/certificate/", 0777, true, true);
        }

        Storage::disk("public")->put($tmp, file_get_contents($gambar->getRealPath()));

        $gambarImage = $gambarName;
      } else {

        $gambarImage = $certificate->gambar;
      }

      $certificate->update([
        "gambar" => $gambarImage,
        "nama_online_course" => $request->input("nama_online_course"),
        "judul" => $request->input("judul"),
        "slug" => Str::slug($request->input("judul")),
        "link_certificate" => $request->input("link_certificate")
      ]);

      return redirect()->route("data-certificate")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!", "topRight"));
    }
    public function show($id) {
      $certificate = Certificate::find($id);

      return response()->view("App.Admin.Certificate.detail", [
        "data" => $certificate
      ]);
    }
    public function destroy($id) {
      $certificate = Certificate::find($id);

      Storage::disk("public")->delete("images/certificate/" . $certificate->gambar);

      $certificate->delete();

      return redirect()->route("data-certificate")->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!", "topRight"));
    }
  }