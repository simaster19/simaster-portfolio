<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cv;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class CvController extends Controller
{
    public function index()
    {
        $cv = Cv::with(["user"])->get();
        return response()->view("App.Admin.Cv.index", [
            "datas" => $cv
        ]);
    }

    public function create()
    {
        return response()->view("App.Admin.Cv.create");
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(), [
            "file_cv" => ["required", "mimes:pdf,word"]
        ]);

        if ($data->fails()) {
            return back()->withErrors($data, "messageError");
        }

        $fileCv = $request->file("file_cv");
        $fileName = time() . "." . $fileCv->getClientOriginalExtension();
        $tmp = "files/cv/" . $fileName;

        if (!File::exists("public/files/cv/")) {
            File::makeDirectory("public/files/cv/", 0777, true, true);
        }
        // if (!$user->foto == null || !$user->foto == "") {
        //     Storage::disk("public")->delete("images/foto/" . $user->foto);
        // }

        Storage::disk("public")->put($tmp, file_get_contents($fileCv));
        $file = $fileName;


        Cv::create([
            "id_user" => Auth::user()->id_user,
            "file_cv" => $file
        ]);

        return redirect()->route("data-cv")->with("message", "Data berhasil ditambahkan!");
    }


    public function edit($id)
    {
        $cv = Cv::where("id_cv", $id)->with(["user"])->get()->first();

        return response()->view("App.Admin.Cv.edit", [
            "data" => $cv
        ]);
    }
    public function update(Request $request, $id)
    {

        $cv = Cv::find($id);

        if ($request->hasFile("file_cv")) {
            $fileCv = $request->file("cv");
            $fileName = time() . "." . $fileCv->getClientOriginalExtension();
            $tmp = "files/cv/" . $fileName;

            if (!File::exists("public/files/cv/")) {
                File::makeDirectory("public/files/cv/", 0777, true, true);
            }
            if (!$cv->file_cv == null || !$cv->file_cv == "") {
                Storage::disk("public")->delete("files/cv/" . $cv->file_cv);
            }

            Storage::disk("public")->put($tmp, file_get_contents($fileCv));
            $file = $fileName;
        } else {
            $file = $cv->file_cv;
        }

        $cv->update([
            "file_cv" => $file
        ]);

        return redirect()->route("data-cv")->with("message", "Data berhasil diubah!");
    }
    public function destroy($id)
    {
        $cv = Cv::find($id);

        Storage::disk("public")->delete("files/cv/" . $cv->file_cv);

        $cv->delete();

        return redirect()->route("data-cv")->with("message", "Data berhasil dihapus!");
    }
}
