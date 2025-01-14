<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Post;
use App\Models\User;
use App\Models\Skill;
use App\Models\Message;
use App\Models\SubscribeMe;
use App\Models\Project;
use App\Models\Category;
use App\Mail\ContactEmail;
use App\Models\Testimonial;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ToastrMessage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Notifications\EmailNotification;
use App\Notifications\EmailAdminNotification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class DashboardUserController extends Controller
{
  public function index() {
    // $userLogin = User::where("id_user", Auth::user()->id_user)->where("role", 2)->get()->first();
    $user = User::where("nama", "Miftakhul Kirom")->where("role", 1)->get(
      ["nama", "email", "alamat", "foto", "no_hp"]
    )->first();
    $project = Project::with(["image"])
    ->orderByRaw("FIELD(jenis_project, 'WEB', 'DESKTOP', 'ANDROID')")
    ->get();
    //dd($project);
    
    /*$posts = Post::with(["category", "user" => function ($query) {
      return $query->select("id_user", "nama", "foto", "username");
    }])->orderBy("id_post", "desc")->take(6)->get();*/
    //dd($posts);
    $skill = Skill::all();
    $cv = Cv::where("status", 1)->get()->first();

    $testimonial = Testimonial::with(["project"])->get();

    //dd($testimonial);
    $allData = collect(["user" => $user, "projects" => $project, "skills" => $skill, "posts" => [], "testimonials" => $testimonial, "cv" => $cv]);
    //dd($allData);
    return response()->view("index", [
      "datas" => $allData
    ]);
  }


  public function sendMessage(Request $request) {
    $admin = User::all(["email"])[0];

    $message = Message::create([
      "id_user" => null,
      "nama" => $request->input("name"),
      "email" => $request->input("email"),
      "subject" => $request->input("subject"),
      "message" => $request->input("message"),
      "status" => 0
    ]);

    // $mail = Mail::to("miftakhulkirom@simaster19.my.id")->send(new ContactEmail($message));
    $notification = $message->notify(new EmailNotification($message));

    //Kirim Email Ke Admin
    $email = $admin->notify(new EmailAdminNotification($admin, $message));


    //return response()->json([], 200);
    return back()->with("message", ToastrMessage::message("success", "Success", "Pesan berhasil terkirim!"));

    //return redirect()->route('my-profile')->with("message", "Pesan berhasil terkirim!");
  }

  public function subscribeMe(Request $request) {
    $data = Validator::make($request->all(), [
      "email" => "required|unique:subscribe_me,email",
    ]);

    if ($data->fails()) {
      return back()->with("message", ToastrMessage::message("warning", "Warning", "Masukkan email yang benar!"));
    }

    $subscribeMe = SubscribeMe::create([
      "email" => $request->input("email"),
      "status" => 1
    ]);
    return redirect()->route("my-profile")->with("message", "Anda berhasil berlangganan!");
  }


  //Project
  public function detailProject($slug) {
    $project = Project::where("slug", $slug)->with(["image"])->first();
    return response()->view("project-detail", [
      "data" => $project
    ]);
  }


  //Blog
  /*
  public function indexBlog(Request $request) {
    // Ambil kategori dari permintaan, jika ada, atau default ke 'all'
    $category = $request->input('category', 'all');

    // Filter artikel berdasarkan kategori, jika 'all' maka ambil semua artikel
    if ($category === 'all') {
      $cat = Category::all();
      $blogs = Post::with("category")->get();
    } else {
      // Sesuaikan dengan nama kolom kategori di tabel Anda
      $cat = Category::where("nama_category", $category)->get()->first();

      $blogs = Post::where('id_category', $cat->id_category)->with("category")->get();
    }

    // Tambahkan URL gambar ke setiap artikel
    $blogs->transform(function ($article) {
      $article->gambar_url = Storage::url('images/post/cover/' . $article->gambar);
      return $article;
    });

    // Format tanggal dan jam
    foreach ($blogs as $blog) {
      $blog->formatted_date = $blog->created_at->format('d M Y, H:i');
      $blog->short_content = Str::limit($blog->content, 20, '...');
    }

    // Jika permintaan adalah AJAX, kembalikan data JSON
    if ($request->ajax()) {
      return response()->json([
        'articles' => $blogs
      ]);
    }

    // Jika bukan AJAX, kembalikan view dengan semua data artikel
    return view('blog-loadmore', [
      'blogs' => $blogs,
      'cats' => $cat // kirim data artikel ke view
    ]);
  }

  public function detailBlog($slug) {
    $blog = Post::with(["category"])->where("slug", $slug)->get()->first();
    return response()->view("blog-detail", [
      "data" => $blog
    ]);
  }
  */
}