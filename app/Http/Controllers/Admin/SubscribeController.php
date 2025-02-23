<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubscribeMe;
use App\Helpers\ToastrMessage;

class SubscribeController extends Controller
{
  public function index() {
    $subscribeMe = SubscribeMe::all();
    return response()->view("App.Admin.Subscriber.index", [
      "datas" => $subscribeMe
    ]);
  }

  public function show($id) {
    $data = SubscribeMe::where("id", $id)->get()->first();

    if ($data->status == 1) {
      $data->update([
        "status" => 0
      ]);
    }

    return back()->with("message", ToastrMessage::message("success", "Success", "Status berubah Dibaca", "topRight"));


  }

  public function destroy($id) {
    $data = SubscribeMe::where("id", $id)->get();
    $data->delete();

    return back()->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!", "topRight"));
  }
}