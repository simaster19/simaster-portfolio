<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use App\Models\Image as Images;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        return response()->view("App.Admin.Project.index", [
            "datas" => $project
        ]);
    }
    public function create()
    {
        return response()->view("App.Admin.Project.create");
    }

    public function store(StoreProjectRequest $request)
    {


        $data = Validator::make($request->all(), $request->rules());

        if ($data->fails()) {
            return back()->withErrors($data, "messageError");
        }


        if ($request->hasFile("cover")) {
            $cover = $request->file("cover");
            $coverName = time() . rand(10, 99999) . "." . $cover->getClientOriginalExtension();
            $tmp = "images/cover/" . $coverName;

            if (!File::exists("public/images/cover/")) {
                File::makeDirectory("public/images/cover/", 0777, true, true);
            }

            $resizeImage = Image::make($cover)->fit(600, 600);

            Storage::disk("public")->put($tmp, $resizeImage->stream());
            $coverImage = $coverName;
        }

        if ($request->hasFile("image")) {
            $finalImage = [];
            $images = $request->file("image");


            if (!File::exists("public/images/image/")) {
                File::makeDirectory("public/images/image/", 0777, true, true);
            }

            foreach ($images as $image) {

                $imageName = time() . rand(10, 99999) .  "." . $image->getClientOriginalExtension();
                $tmp = "images/image/" . $imageName;

                $resizeImage = Image::make($image)->fit(600, 600);
                Storage::disk("public")->put($tmp, $resizeImage->stream());
                $imageImage[] = $imageName;
            }

            $finalImage[] = $imageImage;
        }

        $tech = [];
        foreach ($request->input("dibuat_dengan") as $dibuat_dengan) {
            $tech[] = $dibuat_dengan;
        }


        $project = Project::create([
            "cover" => $coverImage,
            "jenis_project" => $request->input("jenis_project"),
            "judul" => $request->input("judul"),
            "slug" => Str::slug($request->input("judul")),
            "project_url" => $request->input("project_url"),
            "nama_client" => $request->input("nama_client"),
            "keterangan" => $request->input("keterangan"),
            "dibuat_dengan" => json_encode($tech),
            "tahun_project" => $request->input("tahun_project"),
            "status" => $request->input("status")
        ]);

        $images = Images::create([
            "id_project" => $project->id_project,
            "gambar" => json_encode($finalImage[0])

        ]);

        return back()->with("message", "Data berhasil ditambahkan!");
    }

    public function edit($id)
    {
        $project = Project::with(["image"])->where("id_project", $id)->get()->first();
        return response()->view("App.Admin.Project.edit", [
            "data" => $project
        ]);
    }
    public function update(UpdateProjectRequest $request, $id)
    {
        $data = Validator::make($request->all(), $request->rules());

        if ($data->fails()) {
            return back()->withErrors($data, "messageError");
        }

        $project = Project::with(["image"])->where("id_project", $id)->get()->first();

        if ($request->hasFile("cover")) {
            $cover = $request->file("cover");
            $coverName = time() . rand(10, 99999) .  "." . $cover->getClientOriginalExtension();
            $tmp = "images/cover/" . $coverName;

            Storage::disk("public")->delete("images/cover/" . $project->cover);

            if (!File::exists("public/images/cover/")) {
                File::makeDirectory("public/images/cover/", 0777, true, true);
            }

            $resizeImage = Image::make($cover)->fit(600, 600);

            Storage::disk("public")->put($tmp, $resizeImage->stream());
            $coverImage = $coverName;
        } else {
            $coverImage = $project->cover;
        }

        if ($request->hasFile("image")) {
            $finalImage = [];
            $images = $request->file("image");


            if (!File::exists("public/images/image/")) {
                File::makeDirectory("public/images/image/", 0777, true, true);
            }

            $projectImage = json_decode($project->image[0]->gambar);
            foreach ($projectImage as $oldImage) {

                Storage::disk("public")->delete("images/image/" . $oldImage);
            }

            foreach ($images as $image) {

                $imageName = time() . rand(10, 99999) .  "." . $image->getClientOriginalExtension();
                $tmp = "images/image/" . $imageName;

                $resizeImage = Image::make($image)->fit(600, 600);
                Storage::disk("public")->put($tmp, $resizeImage->stream());
                $imageImage[] = $imageName;
            }

            $finalImage[] = $imageImage;
        } else {
            $finalImage = $project->image[0]->gambar;
        }




        $project->update([
            "cover" => $coverImage,
            "jenis_project" => $request->input("jenis_project"),
            "judul" => $request->input("judul"),
            "slug" => Str::slug($request->input("judul")),
            "project_url" => $request->input("project_url"),
            "nama_client" => $request->input("nama_client"),
            "keterangan" => $request->input("keterangan"),
            "dibuat_dengan" => $request->input("dibuat_dengan"),
            "tahun_project" => $request->input("tahun_project"),
            "status" => $request->input("status")
        ]);

        $image = Images::where("id_project", $project->image[0]->id_project);
        $image->update([
            "id_project" => $project->image[0]->id_project,
            "gambar" => !$request->file('image') ? $finalImage :  json_encode($finalImage[0])
        ]);

        return redirect()->route("data-project")->with("message", "Data berhasil diubah!");
    }

    public function show($id)
    {
        $project = Project::with(['image'])->where("id_project", $id)->get()->first();
        return response()->view("App.Admin.Project.detail", [
            "data" => $project
        ]);
    }
    public function destroy($id)
    {
        $project = Project::with(["image"])->where("id_project", $id)->get()->first();

        Storage::disk("public")->delete("images/cover/" . $project->cover);
        foreach (json_decode($project->image[0]->gambar) as $gambar) {
            Storage::disk("public")->delete("images/image/" . $gambar);
        }

        Images::where("id_project", $id)->delete();
        Project::where("id_project", $id)->delete();

        return back()->with("message", "Data berhasil dihapus!");
    }
}
