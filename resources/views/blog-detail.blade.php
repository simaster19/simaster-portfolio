<!doctype html>
<html lang="en">
<head>
  @include('Layouts.Pengguna.header')
  @section("meta")
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @endsection
  <style>
    .article-image {
    max-width: 100%;
    height: auto;
    object-fit: cover;
    }
    .article-content {
    margin-top: 20px;
    }
    .article-meta {
    margin-top: 20px;
    }
  </style>
</head>

<body>
  <div class="container-fluid bg-white p-0">
    <!-- Navbar & Hero Start -->
    <nav class="navbar fixed-top position-fixed bg-light navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
      <a href="" class="navbar-brand p-0">
        <h1 class="m-0">
          <img src="{{ url('Frontend/img/logo.png') }}" alt="Logo" />
        <span class="fs-2">Miftakhul</span>
        <span class="fs-5">Kirom</span>
      </h1>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto py-0">
        <a href="{{ route('my-profile') }}" class="nav-item nav-link active">Home</a>
        <div class="nav-item dropdown">
          <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
          <div class="dropdown-menu m-0">
            <a href="{{route('data-blog')}}" class="dropdown-item">Blog</a>
            <a href="" class="dropdown-item">Source Code</a>
            <a href="{{ route('data-ebook') }}" target="_blank" class="dropdown-item">E-book</a>
          </div>
        </div>
        <hr />
      <a href="{{ route('login') }}" class="nav-item nav-link">{{!auth()->check() ? 'Login/Register' : auth()->user()->nama.' | '. \Carbon\Carbon::parse(auth()->user()->last_login)->isoFormat('LL')." | Dashboard" }}</a>
    </div>
  </div>
</nav>




<!-- Project Detail Start -->
<div class="container-fluid pt-5">
  <div class="container-fluid px-lg-5">
    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
      <h2 class="mt-5">{{$data->judul}}</h2>
      <h5 class="mt-2">{{$data->category->nama_category}}</h5>
    </div>

    <div class="container-fluid mt-5">
      <div class="row">
        <!-- Article Image -->
        <div class="col-md-8 mx-auto align-items-center">
          <img src="{{Storage::url('images/post/cover/'.$data->gambar)}}" alt="Article Image" class="article-image">
        </div>
      </div>

      <div class="row mt-4">
        <!-- Article Title -->
        <div class="col-md-12 mx-auto">
          <h1 class="display-4">{{$data->judul}}</h1>
        </div>
      </div>

      <div class="row mt-4">
        <!-- Article Content -->
        <div class="col-md-12 mx-auto">
          <div class="article-content">
            {!!$data->content!!}
            <!-- Add more content as needed -->
          </div>
        </div>
      </div>

      <div class="row mt-4">
        <!-- Article Meta -->
        <div class="col-md-12 mx-auto article-meta">
          <span class="badge bg-primary">{{$data->category->nama_category}}</span>
          <span class="text-muted">Published on: {{ $data->created_at->format('d M Y, H:i') }}</span>
        </div>
      </div>

      <!-- Back to List Button -->
      <div class="row mt-4">
        <div class="col-md-12 mx-auto">
          <a href="{{route('data-blog')}}" class="btn btn-primary">Back to List</a>
        </div>
      </div>
    </div>

  </div>



</div>
<!-- Project Detail End -->




<!-- Footer Start -->
<div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5 px-lg-5">
    <div class="row g-5">
      <div class="col-md-6 col-lg-6">
        <h5 class="text-white mb-4">Contact Me</h5>
        <p>
          <i class="fa fa-map-marker-alt me-3"></i>Kaliwungu,
          Kendal, Jawa Tengah
        </p>
        <p>
          <i class="fa fa-phone-alt me-3"></i>+62
          8963-5032-061
        </p>
        <p>
          <i class="fa fa-envelope me-3"></i>miftakhulkirom@gmail.com
        </p>
        <div class="d-flex pt-2">
          <a class="btn btn-outline-light btn-social" href="https://github.com/simaster19"><i
            class="fab fa-github"></i></a>
          <a class="btn btn-outline-light btn-social"
            href="https://youtube.com/playlist?list=PLrv8ONZDrRJSWd8q5J4bLWa6pB1Tju9RY"><i
              class="fab fa-youtube"></i></a>
          <a class="btn btn-outline-light btn-social" href="https://instagram.com/simaster19"><i
            class="fab fa-instagram"></i></a>
          <a class="btn btn-outline-light btn-social" href=""><i
            class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-6">
        <h5 class="text-white mb-4">Subscribe Me</h5>
        <p>
          If you subscribe, you can get notification from my Article.
        </p>
        <div class="position-relative w-100 mt-3">
          <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
          placeholder="Your Email" style="height: 48px" />
        <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2">
          <i class="fa fa-paper-plane text-primary fs-4"></i>
        </button>
      </div>
    </div>
  </div>
</div>
<div class="container px-lg-5">
  <div class="copyright">
    <div class="row">
      <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
        &copy;
        <a class="border-bottom" href="#">simaster19</a>,
        All Right Reserved.
      </div>
      <div class="col-md-6 text-center text-md-end">
        <div class="footer-menu">
          <a href="">Home</a>
          <a href="">Ebook</a>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2">
<i class="bi bi-arrow-up" style="margin-left: -2px"></i></a>
</div>

@include('Layouts.Pengguna.footer')

</body>

</html>