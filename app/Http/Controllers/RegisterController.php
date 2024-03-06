<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Helpers\ToastrMessage;

class RegisterController extends Controller
{
  public function register() {
    return response()->view("App.register");
  }

  public function proccessRegister(Request $request) {
    $data = Validator::make($request->all(), [
      "nama" => ["required", "min:5"],
      "tanggal_lahir" => ["required"],
      "no_hp" => ["required", "numeric", "max:12"],
      "email" => ["required", "unique:users", "email"],
      "username" => ["required", "min:5", "unique:users"],
      "alamat" => ["required"],
      "rt" => ["numeric","min:3","max:3"],
      "rw" => ["numeric","min:3", "max:3"],
      "kode_pos" => ["numeric", "min:5","max:6"],

    ], [
      "nama.required" => "Nama tidak boleh kosong!",
      "nama.min" => "Panjang Karakter kurang!",
      "tanggal_lahir.required" => "Tanggal lahir tidak boleh kosong!",
      "no_hp.required" => "No HP tidak boleh kosong!",
      "no_hp.numeric" => "Hanya boleh diisi number!",
      "email.required" => "Alamat email tidak boleh kosong!",
      "email.unique" => "Email ini sudah dipakai!",
      "username.required" => "Username tidak boleh kosong!",
      "username.min" => "Panjang karakter kurang!",
      "username.unique" => "Username ini sudah dipakai!",
      "alamat.required" => "Alamat tidak boleh kosong!"
      "rt.numeric" => "RT Hanya boleh memasukkan angka!",
      "rw.numeric" => "RW Hanya boleh memasukkan angka!",
    ]);


    //Valdasi
    if ($data->fails()) {
      return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages(), "topRight"));
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


    return redirect('/login')->with('message', "Akun anda berhasil verifikasi!");
  }

  // Metode untuk mengirim ulang email verifikasi
  public function resendVerificationEmail() {
    $user = User::find(auth()->user()->id_user);

    $user->sendEmailVerificationNotification();

    return back()->with('message', ToastrMessage::message("success", "Success", "Email verifikasi berhasil dikirim ulang!", "topRight"));
  }
}