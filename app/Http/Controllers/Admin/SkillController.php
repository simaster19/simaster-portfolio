<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ToastrMessage;
use App\Http\Requests\StoreSkillRequest;

class SkillController extends Controller
{
  public function index() {
    $skill = Skill::all();
    return response()->view("App.Admin.Skill.index", [
      "datas" => $skill
    ]);
  }

  public function create() {
    return response()->view("App.Admin.Skill.create");
  }

  public function store(Request $request) {


    $data = Validator::make(
      $request->all(),
      [
        "nama_skill" => ["required"],
        "level" => ["required"],
        "type" => ["required"]
      ],
      [
        "nama_skill.required" => "Nama skill tidak boleh kosong!",
        "level.required" => "Level tidak boleh kosong!",
        "type.required" => "Type tidak boleh kosong!"
      ]

    );




    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"));
    }



    $skill = Skill::create([
      "nama_skill" => $request->input("nama_skill"),
      "level" => $request->input("level"),
      "type" => $request->input('type')
    ]);
    return redirect()->route("create-skill")->with("message", ToastrMessage::message("success", "Success", "Data berhasil ditambahkan!", "topRight"));
  }

  public function edit($id) {
    $skill = Skill::where("id_skill", $id)->get()->first();
    return response()->view("App.Admin.Skill.edit", [
      "data" => $skill
    ]);
  }

  public function update(Request $request, $id) {
    $data = Validator::make($request->all(), [
      "nama_skill" => ["required"],
      "level" => ["required"],
      "type" => ["required"]
    ],      [
        "nama_skill.required" => "Nama skill tidak boleh kosong!",
        "level.required" => "Level tidak boleh kosong!",
        "type.required" => "Type tidak boleh kosong!"
      ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"));
    }

    $skill = Skill::findOrFail($id);
    $skill->update([
      "nama_skill" => $request->input("nama_skill"),
      "level" => $request->input("level"),
      "type" => $request->input("type")
    ]);

    return redirect()->route("data-skill")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!", "topRight"));
  }

  public function show($id) {
    $skill = Skill::find($id);
    return response()->view("App.Admin.Skill.detail");
  }

  public function destroy($id) {
    $skill = Skill::findOrFail($id);

    $skill->delete();

    return redirect()->route("data-skill")->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!", "topRight"));
  }
}