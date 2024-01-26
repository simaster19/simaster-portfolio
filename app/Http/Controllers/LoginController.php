<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class LoginController extends Controller
{
  public function index() {
    return response()->view("App.index");
  }

  public function proccessLogin(Request $request) {
    $data = Validator::make($request->all(), [
      "username" => ["required", "min:5"],
      "password" => ["required"]
    ]);

    if ($data->fails()) {
      return back()->withErrors($data, "messageError");
    }

    $remember_me = $request->filled("remember_me");
    $credentials = $request->only("username", "password");
    $rememberDuration = 120; //Minute

    if (Auth::attempt($credentials, $remember_me)) {
      $user = Auth::user();
      $lastLogin = User::find($user->id_user);
      $lastLogin->update([
        "last_login" => date("Y-m-d H:i:s", time())
      ]);

      $sessionDuration = $remember_me ? $rememberDuration : config('session.lifetime');
      config(["session.lifetime" => $sessionDuration]);

      if ($user->role !== 0) {
        if ($remember_me) {
          $rememberToken = $user->createRememberToken();
          $cookie = Cookie::make(
            Auth::getRecallerName(),
            $rememberToken,
            $rememberDuration
          );

          return redirect()->route("dashboard-admin")->withCookie($cookie);
        }
        return redirect()->route("dashboard-admin");
      }
    } else {
      return back()->with("message", "Username atau Password salah!, Silahkan coba lagi.");
    }
  }
}