<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ToastrMessage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
  public function register() {
    return response()->view("App.register");
  }

  public function proccessRegister(Request $request) {
    $data = Validator::make($request->all(), [
      "nama" => ["required", "min:5"],
      "tanggal_lahir" => ["required", "date"],
      "no_hp" => ["required", "numeric", "digits_between:0,12"],
      "email" => ["required", "unique:users,email", "email"],
      "username" => ["required", "min:5", "unique:users,username"],
      "password" => "required|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/",
      "password-confirm" => "same:password",
      "alamat" => ["required", "min:7"],
      "rt" => ["numeric", "digits:3", "nullable"],
      "rw" => ["numeric", "digits:3", "nullable"],
      "kode_pos" => ["numeric", "digits:6", "nullable"],

    ]);


    //Valdasi
    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"))->withInput();
    }

    //Create User
    $user = User::create([
      "role" => 2,
      "nama" => $request->input("nama"),
      "tanggal_lahir" => $request->input("tanggal_lahir"),
      "no_hp" => $request->input("no_hp"),
      "email" => $request->input("email"),
      "username" => $request->input("username"),
      "password" => Hash::make($request->input("password")),
      "alamat" => $request->input("alamat")
    ]);

    //Role Peemission
    $user->assignRole("pengguna");
    $user->syncPermissions([
      "create posts", "read posts", "update posts", "delete posts", "view statistic", "upload media", "create category", "read category", "update category", "delete category", "create labels", "read labels", "update labels", "delete labels"
    ]);

    // Kirim email verifikasi
    event(new Registered($user));
    return redirect()->route("login")->with("message", "Email verifikasi berhasil dikirim!, Check inbox/spam di Email anda.");
  }


  // public function showEmailVerificationNotice()
  // {
  //     return view('App.Auth.verify');
  // }

  // Metode untuk melakukan verifikasi email
  public function verifyEmail($id, $hash) {
    $user = User::find($id);

    if ($user && $user->hasVerifiedEmail()) {
      return redirect()->route("login")->with("message", "Akun ini sudah terverifikasi!, silahkan login!");
    }

    if ($user && !$user->hasVerifiedEmail()) {
      if ($user->markEmailAsVerified()) {
        event(new \Illuminate\Auth\Events\Verified($user));
      }
    }


    return redirect('/login')->with('message', "Akun anda berhasil di verifikasi!");
  }

  // Metode untuk mengirim ulang email verifikasi
  public function resendVerificationEmail() {
    $user = User::find(auth()->user()->id_user);

    $user->sendEmailVerificationNotification();

    return back()->with('message', ToastrMessage::message("success", "Success", "Email verifikasi berhasil dikirim ulang!", "topRight"));
  }
}