<!doctype html>
<html lang="en">

<head>
  @include('Layouts.Pengguna.header')

  <meta name="csrf-token" content="{{ csrf_token() }}">


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
            <a href="" class="dropdown-item">Blog</a>
            <a href="" class="dropdown-item">Source Code</a>
            <a href="{{ route('data-ebook') }}" target="_blank" class="dropdown-item">E-book</a>
          </div>
        </div>
        <hr />
      <a href="{{ route('login') }}" class="nav-item nav-link">Login/Register</a>
    </div>
  </div>
</nav>




<!-- Project Detail Start -->
<div class="container-fluid pt-5">
  <div class="container-fluid px-lg-5">
    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
      <h2 class="mt-5">Articles</h2>
    </div>

    <div class="container-fluid mt-5">
      <div class="row">
        <!-- Sidebar untuk kategori -->
        <div class="col-md-3">
          <div class="sidebar">
            <h5>Kategori</h5>
            <ul class="list-group category-list">
              <li class="list-group-item active" data-category="all">All</li>
              @foreach ($cats as $key => $category)
              <li class="list-group-item" data-category="{{ $category->nama_category }}">
                {{ $category->nama_category }}</li>
              @endforeach

            </ul>
          </div>
        </div>

        <!-- Area konten artikel -->
        <div class="col-md-9">
          <div class="d-flex justify-content-between mb-4">
            <h2>Blog Articles</h2>
            <div>
              <i id="listViewBtn" class="bi bi-list view-toggle btn btn-outline-primary"></i>
              <i id="gridViewBtn"
                class="bi bi-grid-3x3-gap view-toggle btn btn-outline-secondary"></i>
            </div>
          </div>
          <div id="articleContainer" class="d-flex flex-wrap list-view">
            <!-- Menampilkan artikel yang sudah diambil -->
            @foreach ($blogs as $article)
            <div class="article">
              <img src="{{ Storage::url('images/post/cover/' . $article->gambar) }}"
              class="img img-thumbnail">
              <div class="article-body">
                <a href="{{ route('detail-blog', $article->slug) }}">
                  <h5 class="article-title">{{ $article->judul }}</h5>
                </a>
                <div class="article-rating">
                  <span class="rating">{{ $article->rating }}</span>
                </div>
                <div class="article-content">
                  {!! \Str::limit($article->content, 20, '...') !!}
                </div>
                <div class="article-meta">
                  <span
                    class="badge bg-primary article-category">{{ $article->category->nama_category }}</span>
                  <span class="text-muted">Published on:
                    {{ $article->created_at->format('d M Y, H:i') }}</span>
                </div>
              </div>
            </div>
            @endforeach
          </div>
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
        <form method="POST" action="{{route('subscribe_me')}}">
          @csrf
          <div class="position-relative w-100 mt-3">
            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text"
            placeholder="Your Email" style="height: 48px" />
          <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2">
            <i class="fa fa-paper-plane text-primary fs-4"></i>
          </button>
        </div>
      </form>
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
<script>
function loadArticles(category) {
$.ajax({
url: '{{ url('/get-article') }}', // URL untuk API yang mengembalikan artikel berdasarkan kategori
method: 'POST',
data: {
category: category,
data: '{{ csrf_token() }}'
},

dataType: 'json',
error: function(response) {
console.log(response)
},
success: function(response) {
$('#articleContainer').empty(); // Kosongkan kontainer artikel sebelum memuat baru
let baseUrl = window.location.origin;

response.articles.forEach(function(article) {
let articleHtml = `
<div class="article">
<img src="${article.gambar_url}" class="img img-thumbnail">
<div class="article-body">
<a href="${baseUrl}/project/${article.slug}">
<h5 class="article-title">${article.judul}</h5>
</a>
<div class="article-rating">
<span class="rating">
</div>
<div class="article-content">${article.short_content}</div>
<div class="article-meta">
<span class="badge bg-primary article-category">${article.category.nama_category}</span>
<span class="text-muted">Published on: ${article.formatted_date}</span>
</div>
</div>
</div>
`;
$('#articleContainer').append(articleHtml);
});
}
});
}
// Ketika halaman dimuat, tampilkan semua artikel
$(document).ready(function() {
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

// Klik kategori
$('.category-list .list-group-item').on('click', function() {

let category = $(this).data('category');
$('.category-list .list-group-item').removeClass('active');
$(this).addClass('active');
loadArticles(category); // Muat artikel berdasarkan kategori yang dipilih
});

// Toggle tampilan antara list dan grid view
$('#listViewBtn').on('click', function() {

$('#articleContainer').removeClass('grid-view').addClass('list-view');
$(this).addClass('btn-outline-primary').removeClass('btn-outline-secondary');
$('#gridViewBtn').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
});

$('#gridViewBtn').on('click', function() {

$('#articleContainer').removeClass('list-view').addClass('grid-view');
$(this).addClass('btn-outline-primary').removeClass('btn-outline-secondary');
$('#listViewBtn').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
});
});
</script>

</body>

</html>