<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
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
        $user = User::where("id_user", $id)->get()->first();
        return response()->view("App.Admin.User.edit", [
            "data" => $user
        ]);
    }

    public function update(Request $request, $id)
    {


        $data = Validator::make($request->all(), [
            "nama" => ["required"],
            "email" => ["required"],
            "username" => ["required"],
            "tanggal_lahir" => ["required"],
            "no_hp" => ["required"],
            "alamat" => ["required"]
        ]);

        if ($data->fails()) {
            return back()->withErrors($data, "messageError");
        }

        $user = User::findOrFail($id);
        if ($request->input("password") == "") {
            $newPassword = $user->password;
        } else {
            $newPassword = Hash::make($request->input("password"));
        }


        $user->update([
            "nama" => $request->input("nama"),
            "tanggal_lahir" => $request->input("tanggal_lahir"),
            "no_hp" => $request->input("no_hp"),
            "username" => $request->input("username"),
            "password" => $newPassword,
            "alamat" => $request->input("alamat"),
            "kota" => $request->input("kota"),
            "kecamatan" => $request->input("kecamatan"),
            "desa" => $request->input("desa"),
            "rt" => $request->input("rt"),
            "rw" => $request->input("rw"),
            "kode_pos" => $request->input("kode_pos")
        ]);

        return redirect()->route("data-user")->with("message", "Data berhasil diubah!");
    }

    public function show($id)
    {
        $user = User::findOrFail($id);

        return response()->view("App.Admin.User.detail", [
            "data" => $user
        ]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return back()->with("message", "Data berhasil dihapus!");
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        $cookie = Cookie::forget(Auth::getRecallerName());

        return redirect()->route("login")->withCookie($cookie);
    }
}
