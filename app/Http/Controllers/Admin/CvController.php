<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ToastrMessage;

class CvController extends Controller
{
  public function index() {
    $cv = Cv::with(["user" => function($query){
      $query->select("id_user","nama","username");
      }])->orderBy("id_cv", "desc")->get();
    return response()->view("App.Admin.Cv.index", [
      "datas" => $cv
    ]);
  }

  public function create() {
    return response()->view("App.Admin.Cv.create");
  }

  public function store(Request $request) {
    $data = Validator::make(
      $request->all(),
      [
        "file_cv" => ["required", "mimes:pdf,word"]
      ],
      [
        "file_cv.required" => "File tidak boleh kosong!",
        "file_cv.mimes" => "File harus berformat pdf atau word"
      ]
    );

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    $fileCv = $request->file("file_cv");
    $fileName = time() . "." . $fileCv->getClientOriginalExtension();
    $tmp = "files/cv/" . $fileName;

    if (!File::exists("public/files/cv/")) {
      File::makeDirectory("public/files/cv/", 0777, true, true);
    }
    // if (!$user->foto == null || !$user->foto == "") {
    //     Storage::disk("public")->delete("images/foto/" . $user->foto);
    // }

    Storage::disk("public")->put($tmp, file_get_contents($fileCv));
    $file = $fileName;


    Cv::create([
      "id_user" => Auth::user()->id_user,
      "file_cv" => $file
    ]);

    return redirect()->route("data-cv")->with("message", ToastrMessage::message("success", "Success", "Data berhasil ditambahkan!", "topRight"));
  }


  public function edit($id) {
    $cv = Cv::where("id_cv", $id)->with(["user"])->get()->first();

    return response()->view("App.Admin.Cv.edit", [
      "data" => $cv
    ]);
  }
  public function update(Request $request, $id) {

    $cv = Cv::find($id);

    if ($request->hasFile("file_cv")) {
      $fileCv = $request->file("cv");
      $fileName = time() . "." . $fileCv->getClientOriginalExtension();
      $tmp = "files/cv/" . $fileName;

      if (!File::exists("public/files/cv/")) {
        File::makeDirectory("public/files/cv/", 0777, true, true);
      }
      if (!$cv->file_cv == null || !$cv->file_cv == "") {
        Storage::disk("public")->delete("files/cv/" . $cv->file_cv);
      }

      Storage::disk("public")->put($tmp, file_get_contents($fileCv));
      $file = $fileName;
    } else {
      $file = $cv->file_cv;
    }

    $cv->update([
      "file_cv" => $file
    ]);

    return redirect()->route("data-cv")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!", "topRight"));
  }
  public function destroy($id) {
    $cv = Cv::find($id);

    Storage::disk("public")->delete("files/cv/" . $cv->file_cv);

    $cv->delete();

    return redirect()->route("data-cv")->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!", "topRight"));
  }


  public function getDefault(Request $request, $id) {

    $data = Cv::where("status", 1)->orWhere("status", 0);
    $cv = Cv::find($id);

    if ($data) {
      $data->update([
        "status" => 0
      ]);
    }

    $cv->update([
      "status" => 1
    ]);


    return response()->json([
      "data" => $cv,
    ]);
  }
}