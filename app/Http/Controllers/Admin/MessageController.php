<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
use App\Helpers\ToastrMessage;


class MessageController extends Controller
{
  public function index() {
    $message = Message::with(["user"])->get();
    //dd($message);

    return response()->view("App.Admin.Message.index", [
      "datas" => $message
    ]);
  }

  public function show($id) {
    $message = Message::where("id_message", $id)->get()->first();
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