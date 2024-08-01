<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ToastrMessage;
use App\Http\Requests\StoreSkillRequest;
use App\Helpers\ListBahasaPemograman;

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
        "nama_skill" => ["required", "string"],
        "level" => ["required", "string"],
        "type" => ["required", "string"]
      ]
    );

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    $skill = Skill::create([
      "nama_skill" => strtoupper($request->input("nama_skill")),
      "level" => strtoupper($request->input("level")),
      "type" => strtoupper($request->input('type'))
    ]);
    return redirect()->route("create-skill")->with("message", ToastrMessage::message("success", "Success", "Data berhasil ditambahkan!", "topRight"));
  }

  public function edit($id) {
    $skill = Skill::where("id_skill", $id)->get()->first();
    $listSkill = ListBahasaPemograman::class;
    return response()->view("App.Admin.Skill.edit", [
      "data" => $skill,
            "levelSkill" => $listSkill::levelSkill(),
      "typeSkill" => $listSkill::typeSkill()
    ]);
  }

  public function update(Request $request, $id) {
    $data = Validator::make($request->all(), [
      "nama_skill" => ["required"],
      "level" => ["required"],
      "type" => ["required"]
    ]);

    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"));
    }

    $skill = Skill::findOrFail($id);
    $skill->update([
      "nama_skill" => strtoupper($request->input("nama_skill")),
      "level" => strtoupper($request->input("level")),
      "type" => strtoupper($request->input("type"))
    ]);

    return redirect()->route("data-skill")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!"));
  }


  public function destroy($id) {
    $skill = Skill::findOrFail($id);
    $skill->delete();
    return redirect()->route("data-skill")->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!"));
  }
}