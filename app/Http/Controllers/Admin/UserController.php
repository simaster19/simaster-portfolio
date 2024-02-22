<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\ToastrMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

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
            "foto" => ["image", "mimes:jpg,png,webp"],
            "nama" => ["required"],
            "email" => ["required"],
            "username" => ["required", "unique:users,username,$id,id_user"],
            "tanggal_lahir" => ["required"],
            "no_hp" => ["required", "numeric"],
            "alamat" => ["required"]
        ], [
            "foto.image" => "File harus berupa gambar!",
            "nama.required" => "Nama tidak boleh kosong!",
            "email.required" => "Email tidak boleh kosong!",
            "username.required" => "Username tidak boleh kosong!",
            "username.unique" => "Username sudah digunakan!",
            "no_hp.required" => "No hp tidak boleh kosong!",
            "no_hp.numeric" => "Anda tidak memasukkan angka!",
            "alamat.required" => "Alamat tidak boleh kosong!"
        ]);

        if ($data->fails()) {
            return back()->with("messageError", ToastrMessage::message("error", "Error", $data->errors()->messages()));
        }

        $user = User::findOrFail($id);
        if ($request->input("password") == "") {
            $newPassword = $user->password;
        } else {
            $newPassword = Hash::make($request->input("password"));
        }

        if ($request->hasFile("foto")) {
            $foto = $request->file("foto");
            $fotoName = time() . "." . $foto->getClientOriginalExtension();
            $tmp = "images/foto/" . $fotoName;

            if (!File::exists("public/images/foto/")) {
                File::makeDirectory("public/images/foto/", 0777, true, true);
            }
            if (!$user->foto == null || !$user->foto == "") {
                Storage::disk("public")->delete("images/foto/" . $user->foto);
            }

            $resizeImage = Image::make($foto)->fit(600, 600);

            Storage::disk("public")->put($tmp, $resizeImage->stream());
            $fotoImage = $fotoName;
        } else {
            $fotoImage = $user->foto;
        }



        $user->update([
            "foto" => $fotoImage,
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

        return redirect()->route("data-user")->with("message", ToastrMessage::message("success", "Success", "Data berhasil diubah!"));
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

        $message = Message::where("id_user",$id)->delete();
        $post = Post::where("id_user",$id)->delete();

        $user->delete();

        return back()->with("message", ToastrMessage::message("success", "Success", "Data berhasil dihapus!"));
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        $cookie = Cookie::forget(Auth::getRecallerName());

        return redirect()->route("login")->withCookie($cookie);
    }
}
