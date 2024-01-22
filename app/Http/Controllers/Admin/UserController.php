<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
  public function index() {
    if (auth()->user()->role == 1) {
      $user = User::where("role", "!=", 0)->orderBy("role", "ASC")->get();
    } else {
      $user = User::where("username", auth()->user()->username)->where("role", 2)->get()->first();
    }
    return response()->view("App.Admin.User.index", [
      "datas" => $user
    ]);
  }
  
  public function edit($id)
  {
    $user = User::where("id_user",$id)->get()->first();
    return response()->view("App.Admin.User.edit",[
      "data" => $user
      ]);
  }
  
  public function update(Request $request){
    
  }

  public function logout() {}
}