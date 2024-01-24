<?php

namespace App\Http\Controllers\Admin;

use App\Models\Certificate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCertificateRequest;
use App\Http\Requests\UpdateCertificateRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CertificateController extends Controller
{
    public function index()
    {
        $certificate = Certificate::all();

        return response()->view("App.Admin.Certificate.index", [
            "datas" => $certificate
        ]);
    }

    public function create()
    {
        return response()->view("App.Admin.Certificate.create");
    }
    public function store(StoreCertificateRequest $request)
    {
        $data = Validator::make($request->all(), $request->rules());

        if ($data->fails()) {
            return back()->withErrors($data, "messageError");
        }

        if ($request->hasFile("gambar")) {
            $gambar = $request->file("gambar");

            $gambarName = time() . "." . $gambar->getClientOriginalExtension();
            $tmp = "images/certificate/" . $gambarName;

            if (!File::exists("public/images/certificate/")) {
                File::makeDirectory("public/images/certificate/", 0777, true, true);
            }

            Storage::disk("public")->put($tmp, file_get_contents($gambar->getRealPath()));
            $gambarImage = $gambarName;
        }


        $certificate = Certificate::create([
            "gambar" => $gambarImage,
            "nama_online_course" => $request->input("nama_online_course"),
            "judul" => $request->input("judul"),
            "slug" => Str::slug($request->input("judul")),
            "link_certificate" => $request->input("link_certificate")
        ]);

        return back()->with("message", "Data berhasil ditambahkan!");
    }
    public function edit($id)
    {
        $certificate = Certificate::where("id_certificate", $id)->get()->first();

        return response()->view("App.Admin.Certificate.edit", [
            "data" => $certificate
        ]);
    }
    public function update(UpdateCertificateRequest $request, $id)
    {
        $data = Validator::make($request->all(), $request->rules());

        if ($data->fails()) {
            return back()->withErrors($data, "messageError");
        }

        $certificate = Certificate::find($id);

        if ($request->hasFile("gambar")) {
            $gambar = $request->file("gambar");

            $gambarName = time() . "." . $gambar->getClientOriginalExtension();
            $tmp = "images/certificate/" . $gambarName;

            Storage::disk("public")->delete("images/certificate/" . $certificate->gambar);

            if (!File::exists("public/images/certificate/")) {
                File::makeDirectory("public/images/certificate/", 0777, true, true);
            }

            Storage::disk("public")->put($tmp, file_get_contents($gambar->getRealPath()));

            $gambarImage = $gambarName;
        } else {

            $gambarImage = $certificate->gambar;
        }

        $certificate->update([
            "gambar" => $gambarImage,
            "nama_online_course" => $request->input("nama_online_course"),
            "judul" => $request->input("judul"),
            "slug" => Str::slug($request->input("judul")),
            "link_certificate" => $request->input("link_certificate")
        ]);

        return redirect()->route("data-certificate")->with("message", "Data berhasil diubah!");
    }
    public function show($id)
    {
        $certificate = Certificate::find($id);

        return response()->view("App.Admin.Certificate.detail", [
            "data" => $certificate
        ]);
    }
    public function destroy($id)
    {
        $certificate = Certificate::find($id);

        Storage::disk("public")->delete("images/certificate/" . $certificate->gambar);

        $certificate->delete();

        return redirect()->route("data-certificate")->with("message", "Data berhasil dihapus!");
    }
}
