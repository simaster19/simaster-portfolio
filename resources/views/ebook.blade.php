<!DOCTYPE html>
<html lang="en">

<head>
  @include("Layouts.Pengguna.header")
</head>

<body>
  <div class="container-fluid bg-white p-0">
    <nav
      class="navbar fixed-top position-fixed bg-light navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0"
      >
      <a href="" class="navbar-brand p-0">
        <h1 class="m-0">
          <img src="{{url('Frontend/img/logo.png')}}" alt="Logo" />
        <span class="fs-2">Miftakhul</span>
        <span class="fs-5">Kirom</span>
      </h1>
    </a>
    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navbarCollapse"
      >
      <span class="fa fa-bars"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <div class="navbar-nav ms-auto py-0">
        <a href="#home" class="nav-item nav-link active">Home</a>
        <a href="#about" class="nav-item nav-link">About</a>
        <a href="#blog" class="nav-item nav-link">Blog</a>
        <a href="#project" class="nav-item nav-link">Project</a>
        <a href="#skill" class="nav-item nav-link">Skill</a>
        <div class="nav-item dropdown">
          <a
            href="#"
            class="nav-link dropdown-toggle"
            data-bs-toggle="dropdown"
            >Pages</a
          >
          <div class="dropdown-menu m-0">
            <a href="" class="dropdown-item">Blog</a>
            <a href="" class="dropdown-item">Source Code</a>
            <a href="{{route('data-ebook')}}" target="_blank" class="dropdown-item">E-book</a>
          </div>
        </div>
        <a href="#contact" class="nav-item nav-link">Contact</a>
        <hr />
      <a href="{{route('login')}}" class="nav-item nav-link">Login/Register</a>
    </div>
  </div>
</nav>



<!-- Ebook Start -->
<div class="container-fluid pt-5">
  <div class="container px-lg-5">
    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
      <h2 class="mt-5">Ebook</h2>
    </div>

    <div class="row">
      <div class="col-md-4 col-lg-4 col-sm-4">
        Menu
      </div>
      <div class="col-md-8 col-lg-8 col-sm-8">
        Card
        <div class="card" style="width:400px;">
          <img src="{{url('Frontend/img/team-1.jpg')}}" class="card-img-top">
          <div class="card-body">
            <div class="card-title">
              Judul Buku
            </div>
            <div class="card-footer">
              Footer Buku
            </div>

          </div>
        </div>
      </div>

    </div>

  </div>
</div>
<!-- Ebook End -->


<!-- Footer Start -->
<div class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
  <div class="container py-5 px-lg-5">
    <div class="row g-5">
      <div class="col-md-6 col-lg-3">
        <h5 class="text-white mb-4">Get In Touch</h5>
        <p>
          <i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA
        </p>
        <p>
          <i class="fa fa-phone-alt me-3"></i>+012 345 67890
        </p>
        <p>
          <i class="fa fa-envelope me-3"></i>info@example.com
        </p>
        <div class="d-flex pt-2">
          <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
          <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
          <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
          <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
          <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <h5 class="text-white mb-4">Popular Link</h5>
        <a class="btn btn-link" href="">About Us</a>
        <a class="btn btn-link" href="">Contact Us</a>
        <a class="btn btn-link" href="">Privacy Policy</a>
        <a class="btn btn-link" href="">Terms & Condition</a>
        <a class="btn btn-link" href="">Career</a>
      </div>
      <div class="col-md-6 col-lg-3">
        <h5 class="text-white mb-4">Project Gallery</h5>
        <div class="row g-2">
          <div class="col-4">
            <img class="img-fluid" src="img/portfolio-1.jpg" alt="Image">
          </div>
          <div class="col-4">
            <img class="img-fluid" src="img/portfolio-2.jpg" alt="Image">
          </div>
          <div class="col-4">
            <img class="img-fluid" src="img/portfolio-3.jpg" alt="Image">
          </div>
          <div class="col-4">
            <img class="img-fluid" src="img/portfolio-4.jpg" alt="Image">
          </div>
          <div class="col-4">
            <img class="img-fluid" src="img/portfolio-5.jpg" alt="Image">
          </div>
          <div class="col-4">
            <img class="img-fluid" src="img/portfolio-6.jpg" alt="Image">
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <h5 class="text-white mb-4">Newsletter</h5>
        <p>
          Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu
        </p>
        <div class="position-relative w-100 mt-3">
          <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
          <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
        </div>
      </div>
    </div>
  </div>
  <div class="container px-lg-5">
    <div class="copyright">
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
          &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved.

          <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
          Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
        </div>
        <div class="col-md-6 text-center text-md-end">
          <div class="footer-menu">
            <a href="">Home</a>
            <a href="">Cookies</a>
            <a href="">Help</a>
            <a href="">FQAs</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"><i class="bi bi-arrow-up"></i></a>
</div>

@include("Layouts.Pengguna.footer")
</body>

</html>