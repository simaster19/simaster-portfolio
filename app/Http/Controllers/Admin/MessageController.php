<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Helpers\ToastrMessage;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
  public function index() {
    $message = Message::with(["user" => function ($query) {
      $query->select("id_user", "nama", "username");
    }])->orderBy("id_message", "desc")->get();


    return response()->view("App.Admin.Message.index", [
      "datas" => $message
    ]);
  }

  public function show($id) {
    $message = Message::where("id_message", $id)->get()->first();
    //Update status
    if ($message->status == 0) {
      Message::update([
      "status" => 1,
    ])->find($id);
    }
    
    return response()->view("App.Admin.Message.detail", [
      "data" => $message
    ]);
  }

  public function destroy($id) {
    $message = Message::find($id);
    $message->delete();

    return redirect()->route("data-message")->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!", "topRight"));
  }
}