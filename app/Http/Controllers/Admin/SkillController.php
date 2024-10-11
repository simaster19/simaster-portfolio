<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Imagick;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ToastrMessage;
use App\Http\Requests\StoreSkillRequest;
use App\Helpers\ListBahasaPemograman;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;


class SkillController extends Controller
{
  public function index() {
    $skill = Skill::orderBy("id_skill", "desc")->orderBy("nama_skill", "asc")->get();
    return response()->view("App.Admin.Skill.index", [
      "datas" => $skill
    ]);
  }

  public function create() {
    $listSkill = ListBahasaPemograman::class;

    return response()->view("App.Admin.Skill.create", [
      "levelSkill" => $listSkill::levelSkill(),
      "typeSkill" => $listSkill::typeSkill()
    ]);
  }

  public function store(Request $request) {
    $data = Validator::make(
      $request->all(),
      [
        "logo" => "image|mimes:jpg,png,jpeg,webp",
        "nama_skill" => ["required", "string"],
        "level" => ["required", "string"],
        "type" => ["required", "string"]
      ]
    );

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }
    //Convert Logo to PNG Transparant
    if ($request->hasFile("logo")) {
      $logo = $request->file("logo");
      $logoName = "Logo_".time().".png";
      $tmp = "images/logo/".$logoName;

      if (!File::exists("public/images/logo/")) {
        File::makeDirectory("public/images/logo/", 0777, true, true);
      }// Load the image with Intervention Image
        $image = Image::make($logo->getRealPath());

        // Create a white background image with the same size
        $background = Image::canvas($image->width(), $image->height(), '#ffffff');

        // Insert the loaded image onto the white background
        $background->insert($image, 'center');

        // Convert to PNG format
        $background->encode('png');

        // Save the image to storage
        Storage::disk('public')->put($tmp, (string) $background);


      // Storage::disk("public")->put($tmp,$logoImage->stream());
      $imageLogo = $logoName;

    }

    $skill = Skill::create([
      "logo" => $imageLogo,
      "nama_skill" => strtoupper($request->input("nama_skill")),
      "link" => $request->input("link"),
      "level" => strtoupper($request->input("level")),
      "type" => strtoupper($request->input('type'))
    ]);
    return redirect()->route("create-skill")->with("message",
      ToastrMessage::message("success", "Success", "Data berhasil ditambahkan!", "topRight"));
  }

  public function edit($id) {
    $skill = Skill::where("id_skill",
      $id)->get()->first();
    $listSkill = ListBahasaPemograman::class;
    return response()->view("App.Admin.Skill.edit",
      [
        "data" => $skill,
        "levelSkill" => $listSkill::levelSkill(),
        "typeSkill" => $listSkill::typeSkill()
      ]);
  }

  public function update(Request $request,
    $id) {
    $data = Validator::make($request->all(),
      [
        "logo" => "image|mimes:jpg,png,jpeg,webp",
        "nama_skill" => ["required"],
        "level" => ["required"],
        "type" => ["required"]
      ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"));
    }

    $skill = Skill::findOrFail($id);

    //Prosses Upload Convert
    if ($request->hasFile("logo")) {
      $logo = $request->file("logo");
      $logoName = "Logo_".time().".png";
      $tmp = "images/logo/".$logoName;

      if (!File::exists("public/images/logo/")) {
        File::makeDirectory("public/images/logo/", 0777, true, true);
      }

      if (!$skill->logo == null || !$skill->logo == "") {
        Storage::disk("public")->delete("images/logo/" . $skill->logo);
      }

        $image = Image::make($logo->getRealPath());

        // Create a white background image with the same size
        $background = Image::canvas($image->width(), $image->height(), '#ffffff');

        // Insert the loaded image onto the white background
        $background->insert($image, 'center');

        // Convert to PNG format
        $background->encode('png');

        // Save the image to storage
        Storage::disk('public')->put($tmp, (string) $background);

      $imageLogo = $logoName;

    } else {
      $imageLogo = $skill->logo;
    }

    $skill->update([
      "logo" => $imageLogo,
      "nama_skill" => strtoupper($request->input("nama_skill")),
      "link" => $request->input("link"),
      "level" => strtoupper($request->input("level")),
      "type" => strtoupper($request->input("type"))
    ]);

    return redirect()->route("data-skill")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!"));
  }


  public function destroy($id) {
    return back()->with("message", ToastrMessage::message("info", "Info", "Fitur Nonaktif!"));

    $skill = Skill::findOrFail($id);
    if (!$skill->logo == null || !$skill->logo == "") {
      Storage::disk("public")->delete("images/logo/" . $skill->logo);
    }
    $skill->delete();
    return redirect()->route("data-skill")->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!"));
  }
}