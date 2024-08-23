<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
<title>SI Master - Portofolio</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="Portofolio Web" name="keywords" />
<meta content="Portofolio Web" name="description" />

<!-- Favicon -->
<link href="{{ url('Frontend/img/favicon.ico')}}" rel="icon" />

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link
href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap"
rel="stylesheet"
/>

<!-- Icon Font Stylesheet -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css"
rel="stylesheet"
/>
<link
href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
rel="stylesheet"
/>

<!-- Libraries Stylesheet -->
<link href="{{ ('Frontend/lib/animate/animate.min.css') }}" rel="stylesheet" />
<link
href="{{ ('Frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}"
rel="stylesheet"
/>
<link href="{{ ('Frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />
<!-- Customized Bootstrap Stylesheet -->
<link href="{{ ('Frontend/css/bootstrap.min.css') }}" rel="stylesheet" />

<!-- Template Stylesheet -->
<link href="{{ ('Frontend/css/style.css') }}" rel="stylesheet" />


</head>
<body>
<div class="container-fluid bg-white p-0">
<!-- Navbar & Hero Start -->
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
<a href="" class="dropdown-item">E-book</a>
</div>
</div>
<a href="#contact" class="nav-item nav-link">Contact</a>
<hr />
<a href="{{route('login')}}" class="nav-item nav-link">Login/Register</a>
</div>
</div>
</nav>
<div class="container-fluid position-relative p-0">
<!-- Navbar & Hero End -->
<div
id="home"
class="container-fluid py-5 bg-primary hero-header mb-5"
>
<div class="container my-5 py-5 px-lg-5">
<div class="row g-5 py-5">
<div class="col-lg-6 text-center text-lg-start">
<h1 class="text-white mb-4 animated zoomIn">
<i class="fas fa-quote-left"></i> You might not
think that programmers are artists, but
programming is an extremely creative profession.
It’s logic-based creativity.
<i class="fas fa-quote-right"></i>
</h1>
<p class="text-white pb-3 animated zoomIn">
<i
class="fas fa-circle text-success blinking"
></i>
<span class="fw-bold text-light">
Available for new opportunities
</span>
<i
class="fas fa-circle text-success blinking"
></i>
</p>
<a
href="#contact"
class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight"
>Contact Me</a
>
</div>
</div>
</div>
</div>
</div>
<!-- Navbar & Hero End -->

<!-- About Start -->
<div id="about" class="container-fluid py-5">
<div class="container px-lg-5">
<div class="row g-5">
<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
<div class="section-title position-relative mb-4 pb-2">
<h6 class="position-relative text-primary ps-4">
About Me
</h6>
<h2 class="mt-2">
Web Developer with more than 2 years of
experience
</h2>
</div>
<p class="mb-4">
Hi folks, I'm {{$datas['user']->nama}}. Web Developer based
on Kabupaten Kendal, Indonesia. I'am more than 2
Year of Freelance Experience. Experienced in various
development for dynamic web and strong analitycal
skill.
</p>

<div class="d-flex align-items-center mt-4">
<a
class="btn btn-outline-primary btn-square me-3"
href="https://github.com/simaster19"
><i class="fab fa-github"></i
></a>
<a
class="btn btn-outline-primary btn-square me-3"
href="https://instagram.com/simaster19"
><i class="fab fa-instagram"></i
></a>
<a
class="btn btn-outline-primary btn-square"
href="#"
><i class="fab fa-linkedin-in"></i
></a>
</div>
</div>
</div>
</div>
</div>
<!-- About End -->

<!-- Newsletter Start -->
<div
class="container-fluid bg-primary newsletter my-5 wow fadeInUp"
data-wow-delay="0.1s"
>
<div class="container px-lg-5">
<div class="row align-items-center" style="height: 250px">
<div class="col-12 col-md-6">
<h3 class="text-white">Subscribe Me</h3>
<small class="text-white"
>If you subscribe, you can get notification from my
Article.</small
>
<div class="position-relative w-100 mt-3">
<input
class="form-control border-0 rounded-pill w-100 ps-4 pe-5"
type="text"
placeholder="Enter Your Email"
style="height: 48px"
/>
<button
type="button"
class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"
>
<i
class="fa fa-paper-plane text-primary fs-4"
></i>
</button>
</div>
</div>
<div class="col-md-6 text-center mb-n5 d-none d-md-block">
<img
class="img-fluid mt-5"
style="height: 250px"
src="{{ ('Frontend/img/newsletter.png')}}"
/>
</div>
</div>
</div>
</div>
<!-- Newsletter End -->

<!-- Blog Start -->
<div id="blog" class="container-fluid py-5">
<div class="container px-lg-5">
<div
class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
data-wow-delay="0.1s"
>
<h6 class="position-relative d-inline text-primary ps-4">
My Article
</h6>
<h2 class="mt-2">You can read my article for free.</h2>
</div>
<div class="row g-4">
<div
class="col-lg-4 col-md-6 wow zoomIn"
data-wow-delay="0.1s"
>
<div
class="service-item d-flex flex-column justify-content-center text-center rounded"
>
<div class="service-icon flex-shrink-0">
<img
class="img img-thumbnail"
src="{{ ('Frontend/img/logo.png')}}"
alt=""
/>
</div>
<h5 class="mb-3">Judul Artikel</h5>
<p>
Erat ipsum justo amet duo et elitr dolor, est
duo duo eos lorem sed diam stet diam sed stet
lorem.
</p>
<a class="btn px-3 mt-auto mx-auto" href=""
>Read More</a
>
</div>
</div>
<div
class="col-lg-4 col-md-6 wow zoomIn"
data-wow-delay="0.3s"
>
<div
class="service-item d-flex flex-column justify-content-center text-center rounded"
>
<div class="service-icon flex-shrink-0">
<i class="fa fa-home fa-2x"></i>
</div>
<h5 class="mb-3">Web Design</h5>
<p>
Erat ipsum justo amet duo et elitr dolor, est
duo duo eos lorem sed diam stet diam sed stet
lorem.
</p>
<a class="btn px-3 mt-auto mx-auto" href=""
>Read More</a
>
</div>
</div>
</div>
</div>
<div class="d-flex justify-content-center text-center rounded mt-5">
<a
class="btn btn-primary px-3 mt-auto mx-auto wow fadeInUp"
data-wow-delay="0.2s"
href=""
>Load More</a
>
</div>
</div>
<!-- Blog End -->

<!-- Portfolio Start -->
<div id="project" class="container-fluid py-5">
<div class="container px-lg-5">
<div
class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
data-wow-delay="0.1s"
>
<h6 class="position-relative d-inline text-primary ps-4">
My Projects
</h6>
<h2 class="mt-2">Things i've built</h2>
</div>
<div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
<div class="col-12 text-center">
<ul class="list-inline mb-5" id="portfolio-flters">
<li class="btn px-3 pe-4 active" data-filter="*">
All
</li>
<li class="btn px-3 pe-4" data-filter=".first">
Freelance
</li>
<li class="btn px-3 pe-4" data-filter=".second">
Personal
</li>
<li class="btn px-3 pe-4" data-filter=".third">
Online Course
</li>
</ul>
</div>
</div>
<div class="row g-4 portfolio-container">

@foreach($datas['projects'] as $project)

<div
class="col-lg-4 col-md-6 portfolio-item {{$project->status== 'FREELANCE' ? 'first' : ($project->status == 'PERSONAL' ? 'second' : 'third')}} wow zoomIn"
data-wow-delay="0.1s"
>
<div class="position-relative rounded overflow-hidden">
@if($project->status == "FREELANCE")
<img
class="img-fluid w-100"
src="{{ Storage::url('images/cover/'.$project->cover)}}"
alt=""
/>
<div class="portfolio-overlay">
<a
class="btn btn-light"
href="{{ Storage::url('images/cover/'.$project->cover)}}"
data-lightbox="portfolio"
><i
class="fa fa-plus fa-2x text-primary"
></i
></a>
<div class="mt-auto">
<small class="text-white"
><i class="fa fa-folder me-2"></i>{{$project->status}}</small
>
<a
class="h5 d-block text-white mt-1 mb-0"
href=""
>Project Name</a
>
</div>
</div>
@endif
</div>

<div class="position-relative rounded overflow-hidden">
@if($project->status == "PERSONAL")
<img
class="img-fluid w-100"
src="{{ Storage::url('images/cover/'.$project->cover)}}"
alt=""
/>
<div class="portfolio-overlay">
<a
class="btn btn-light"
href="{{ Storage::url('images/cover/'.$project->cover)}}"
data-lightbox="portfolio"
><i
class="fa fa-plus fa-2x text-primary"
></i
></a>
<div class="mt-auto">
<small class="text-white"
><i class="fa fa-folder me-2"></i>{{$project->status}}</small
>
<a
class="h5 d-block text-white mt-1 mb-0"
href=""
>Project Name</a
>
</div>
</div>
@endif
</div>

<div class="position-relative rounded overflow-hidden">
@if($project->status == "ONLINE COURSE")
<img
class="img-fluid w-100"
src="{{ Storage::url('images/cover/'.$project->cover)}}"
alt=""
/>
<div class="portfolio-overlay">
<a
class="btn btn-light"
href="{{ Storage::url('images/cover/'.$project->cover)}}"
data-lightbox="portfolio"
><i
class="fa fa-plus fa-2x text-primary"
></i
></a>
<div class="mt-auto">
<small class="text-white"
><i class="fa fa-folder me-2"></i>{{$project->status}}</small
>
<a
class="h5 d-block text-white mt-1 mb-0"
href=""
>Project Name</a
>
</div>
</div>
@endif
</div>
</div>
@endforeach
</div>
</div>
</div>
<!-- Portfolio End -->

<!-- Skill Start -->
<div
id="skill"
class="container-fluid py-5 certificate wow fadeInUp"
data-wow-delay="0.2s"
>
<div class="container px-lg-5">
<div
class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
data-wow-delay="0.1s"
>
<h6 class="position-relative d-inline text-primary ps-4">
My Skills
</h6>
<h2 class="mt-2">Abilities that I have ever tried.</h2>
</div>
<div class="table table-responsive">
<table
border="0"
class="table table-responsive text-center"
>
<thead>
<tr>
<th>Nama Skill</th>
<th>Level</th>
</tr>
<tr>
<td>Laravel</td>
<td>Intermediate</td>
</tr>
</thead>
</table>
</div>
</div>
</div>
<!-- Skill End -->

<!-- Testimonial Start -->
<div
class="container-fluid bg-primary testimonial py-5 my-5 wow fadeInUp"
data-wow-delay="0.1s"
>
<div class="container py-5 px-lg-5">
<div class="owl-carousel testimonial-carousel">
@foreach($datas['testimonials'] as $testimonial)
<div
class="testimonial-item bg-transparent border rounded text-white p-4"
>
<i class="fa fa-quote-left fa-2x mb-3"></i>
<p>
{{$testimonial->keterangan}}
</p>
<div class="d-flex align-items-center">
<img
class="img-fluid flex-shrink-0 rounded-circle"
src="{{ is_null($testimonial->foto) ? url('Backend/assets/img/avatar/avatar-' . rand(2, 5) . '.png') : Storage::url('images/testimonial/' . $testimonial->foto) }}"
style="width: 50px; height: 50px"
/>
<div class="ps-3">
<h6 class="text-white mb-1">{{$testimonial->nama_client}}</h6>
<small>{{$testimonial->project->judul}}</small>
</div>
</div>
</div>
@endforeach
</div>
</div>
</div>
<!-- Testimonial End -->

<!-- Contact Start -->
<div
id="contact"
class="container-fluid py-5 certificate wow fadeInUp"
data-wow-delay="0.2s"
>
<div class="container px-lg-5">
<div
class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp"
data-wow-delay="0.1s"
>
<h6 class="position-relative d-inline text-primary ps-4">
Contact
</h6>
<h2 class="mt-2">Contact for any query.</h2>
</div>

<div class="wow fadeInUp" data-wow-delay="0.3s">
<form>
<div class="row g-3">
<div class="col-md-6">
<div class="form-floating">
<input
type="text"
class="form-control"
id="name"
placeholder="Your Name"
/>
<label for="name">Your Name</label>
</div>
</div>
<div class="col-md-6">
<div class="form-floating">
<input
type="email"
class="form-control"
id="email"
placeholder="Your Email"
/>
<label for="email">Your Email</label>
</div>
</div>
<div class="col-12">
<div class="form-floating">
<input
type="text"
class="form-control"
id="subject"
placeholder="Subject"
/>
<label for="subject">Subject</label>
</div>
</div>
<div class="col-12">
<div class="form-floating">
<textarea
class="form-control"
placeholder="Leave a message here"
id="message"
style="height: 150px"
></textarea>
<label for="message">Message</label>
</div>
</div>
<div class="col-12">
<button
class="btn btn-primary w-100 py-3"
type="submit"
>
Send Message
</button>
</div>
</div>
</form>
</div>
</div>
</div>
<!-- Contact End -->

<!-- Footer Start -->
<div
class="container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn"
data-wow-delay="0.1s"
>
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
<i class="fa fa-envelope me-3"></i
>miftakhulkirom@gmail.com
</p>
<div class="d-flex pt-2">
<a class="btn btn-outline-light btn-social" href=""
><i class="fab fa-twitter"></i
></a>
<a class="btn btn-outline-light btn-social" href=""
><i class="fab fa-facebook-f"></i
></a>
<a class="btn btn-outline-light btn-social" href=""
><i class="fab fa-youtube"></i
></a>
<a class="btn btn-outline-light btn-social" href=""
><i class="fab fa-instagram"></i
></a>
<a class="btn btn-outline-light btn-social" href=""
><i class="fab fa-linkedin-in"></i
></a>
</div>
</div>
<div class="col-md-6 col-lg-6">
<h5 class="text-white mb-4">Subscribe Me</h5>
<p>
Lorem ipsum dolor sit amet elit. Phasellus nec
pretium mi. Curabitur facilisis ornare velit non
vulpu
</p>
<div class="position-relative w-100 mt-3">
<input
class="form-control border-0 rounded-pill w-100 ps-4 pe-5"
type="text"
placeholder="Your Email"
style="height: 48px"
/>
<button
type="button"
class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"
>
<i
class="fa fa-paper-plane text-primary fs-4"
></i>
</button>
</div>
</div>
</div>
</div>
<div class="container px-lg-5">
<div class="copyright">
<div class="row">
<div
class="col-md-6 text-center text-md-start mb-3 mb-md-0"
>
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
<a
href="#"
class="btn btn-lg btn-primary btn-lg-square back-to-top pt-2"
>
<i class="bi bi-arrow-up" style="margin-left: -2px"></i
></a>
</div>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ ('Frontend/lib/wow/wow.min.js')}}"></script>
<script src="{{ ('Frontend/lib/easing/easing.min.js')}}"></script>
<script src="{{ ('Frontend/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{ ('Frontend/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{ ('Frontend/lib/isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{ ('Frontend/lib/lightbox/js/lightbox.min.js')}}"></script>

<!-- Template Javascript -->
<script src="{{ ('Frontend/js/main.js')}}"></script>
</body>

</html>