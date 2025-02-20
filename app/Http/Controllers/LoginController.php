<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\RateLimiter;
use App\Models\User;

class LoginController extends Controller
{
  public function index() {
    if (Auth::viaRemember() || Auth::check()) {
      return redirect()->route("dashboard-admin");
    }
    return response()->view("App.index");
  }

  public function proccessLogin(Request $request) {
        //Throttle 3x
    $key = "login_attempts_".Str::lower($request->username)."|".$request->ip();
    if (RateLimiter::tooManyAttempts($key, 3)) {
      $seconds = RateLimiter::availableIn($key);
      return back()->with("message", "Terlalu banyak percobaan login, silahkan coba lagi dalam ".gmdate("H:i:s", $seconds));

    }
    
    $data = Validator::make($request->all(), [
      "username" => ["required", "min:5"],
      "password" => ["required"]
    ]);

    if ($data->fails()) {
      RateLimiter::hit($key,7200); //second
      return back()->withErrors($data, "messageError")->withInput();
    }



    $remember_me = $request->filled("remember_me");
    $credentials = $request->only("username", "password");
    $rememberDuration = 60; //Minute

    if (Auth::attempt($credentials, $remember_me) || Auth::attempt(["email" => $credentials["username"], "password" => $credentials["password"]], $remember_me)) {
RateLimiter::clear($key);
      $user = Auth::user();

      if ($user->role == 1) {
        $lastLogin = User::find($user->id_user);
        $lastLogin->update([
          "last_login" => now()
        ]);

        $sessionDuration = $remember_me ? $rememberDuration : config('session.lifetime');
        config(["session.lifetime" => $sessionDuration]);

        if ($user->status !== 0) {
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

      } elseif ($user->role == 2) {
        $lastLogin = User::find($user->id_user);
        $lastLogin->update([
          "last_login" => now()
        ]);

        $sessionDuration = $remember_me ? $rememberDuration : config('session.lifetime');
        config(["session.lifetime" => $sessionDuration]);

        if ($user->status !== 0) {
          if ($remember_me) {
            $rememberToken = $user->createRememberToken();
            $cookie = Cookie::make(
              Auth::getRecallerName(),
              $rememberToken,
              $rememberDuration
            );

            return redirect()->route("my-profile")->withCookie($cookie);
          }
          return redirect()->route("my-profile");
        }
      }

    } else {
      return back()->with("message", "Username atau Password salah!, Silahkan coba lagi.");
    }
  }
}