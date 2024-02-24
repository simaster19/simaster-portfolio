<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>My Portofolio - Miftakhul Kirom</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Portfolio Web" name="keywords">
    <meta content="Portofolio Web" name="description">

    <!-- Favicon -->
    <link href="{{ url('Frontend/img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('Frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('Frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('Frontend/css/style.css') }}" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="51">
    <!-- Navbar Start -->
    <nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
        <a href="{{ route('my-profile') }}" class="navbar-brand ml-lg-3">
            <h1 class="m-0 display-5"><span class="text-primary">Miftakhul </span>.K</h1>
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse px-lg-3" id="navbarCollapse">
            <div class="navbar-nav m-auto py-0">
                <a href="#home" class="nav-item nav-link active">Home</a>
                <a href="#about" class="nav-item nav-link">About</a>
                <a href="#qualification" class="nav-item nav-link">Quality</a>
                <a href="#skill" class="nav-item nav-link">Skill</a>
                <a href="#service" class="nav-item nav-link">Service</a>
                <a href="#portfolio" class="nav-item nav-link">Portfolio</a>
                <a href="#testimonial" class="nav-item nav-link">Review</a>
                {{-- <a href="#blog" class="nav-item nav-link">Blog</a> --}}
                <a href="#contact" class="nav-item nav-link">Contact</a>
                <a href="{{ route('login') }}" class="nav-item nav-link">Login/Register</a>
            </div>
            <a href="#contact" class="btn btn-outline-primary d-none d-lg-block">Hire Me</a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- Video Modal Start -->
    {{-- <div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <!-- 16:9 aspect ratio -->
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Video Modal End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary d-flex align-items-center mb-5 py-5" id="home"
        style="min-height: 100vh;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 px-5 pl-lg-0 pb-5 pb-lg-0">
                    <img class="img-fluid w-100 rounded-circle shadow-sm"
                        src="{{ Storage::url('images/foto/' . $datas['user']->foto) }}" alt="">
                </div>
                <div class="col-lg-7 text-center text-lg-left">
                    <h3 class="text-white font-weight-normal mb-3">I'm</h3>
                    <h1 class="display-3 text-uppercase text-primary mb-2" style="-webkit-text-stroke: 2px #ffffff;">
                        {{ $datas['user']->nama }}</h1>
                    <h1 class="typed-text-output d-inline font-weight-lighter text-white"></h1>
                    <div class="typed-text d-none">
                        Web Developer, Back End Developer, Full Stack Developer
                    </div>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="{{ Storage::url('files/cv/' . $datas['cv']->file_cv) }}"
                            class="btn btn-outline-light mr-5" download>Download
                            CV</a>
                        {{-- <button type="button" class="btn-play" data-toggle="modal"
                            data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="font-weight-normal text-white m-0 ml-4 d-none d-sm-block">Play Video</h5> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5" id="about">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">About</h1>
                <h1 class="position-absolute text-uppercase text-primary">About Me</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-5 pb-4 pb-lg-0">
                    <img class="img-fluid rounded w-100" width="600" height="600"
                        src="{{ Storage::url('images/foto/' . $datas['user']->foto) }}" alt="">
                </div>
                <div class="col-lg-7">
                    <h3 class="mb-4">Full Stack Developer & Web Developer</h3>
                    <p>
                        I am an intermediate Web Developer more than 2 Year of Freelance Experience. Experienced in
                        various development for Dynamic Web Projects and Strong analytical Skill.
                    </p>
                    <div class="row mb-3">
                        <div class="col-sm-6 py-2">
                            <h6>Name: <span class="text-secondary">{{ $datas['user']->nama }}</span></h6>
                        </div>
                        <div class="col-sm-6 py-2">
                            <h6>Experience: <span class="text-secondary">2 Years</span></h6>
                        </div>
                        <div class="col-sm-6 py-2">
                            <h6>Phone: <span class="text-secondary">+62 {{ $datas['user']->no_hp }}</span></h6>
                        </div>
                        <div class="col-sm-6 py-2">
                            <h6>Email: <span class="text-secondary">{{ $datas['user']->email }}</span></h6>
                        </div>
                        <div class="col-sm-6 py-2">
                            <h6>Address: <span class="text-secondary">Kaliwungu , Kendal, Jawa Tengah</span></h6>
                        </div>
                        <div class="col-sm-6 py-2">
                            <h6>Freelance: <span class="text-secondary">Available</span></h6>
                        </div>
                    </div>
                    <a href="#contact" class="btn btn-outline-primary mr-4">Hire Me</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Qualification Start -->
    <div class="container-fluid py-5" id="qualification">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Quality</h1>
                <h1 class="position-absolute text-uppercase text-primary">Education & Expericence</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <h3 class="mb-4">My Education</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute"
                                style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Frontend and Backend Developer</h5>
                            <p class="mb-2">
                                <strong>Universitas Selamat Sri</strong> | <small>2017 - 2022</small>
                            </p>
                            <p>
                                Sejak 2017 sampai dengan lulus pada tahun 2022 menghasilkan Nilai IPK 3.20
                            </p>

                            <p class="mb-2">
                                <strong>Sistem Pemetaan Tempat Kos Berbasis Web Di Kabupaten Kendal</strong> |
                                <small>SKRIPSI</small>
                            </p>
                            <p>
                                Merancang dan Membangun Sistem Pemetaan Tempat kos di Wilayah Kabupaten Kendal guna
                                untuk mengetahui persebaran tempat Kos di sekitar kabupaten Kendal.
                            </p>
                        </div>


                    </div>

                </div>
                <div class="col-lg-6">
                    <h3 class="mb-4">My Expericence</h3>
                    <div class="border-left border-primary pt-2 pl-4 ml-2">
                        <div class="position-relative mb-4">
                            <i class="far fa-dot-circle text-primary position-absolute"
                                style="top: 2px; left: -32px;"></i>
                            <h5 class="font-weight-bold mb-1">Web Developer</h5>
                            @foreach ($datas['projects'] as $project)
                                <p class="mb-2">
                                    <strong>{{ $project->judul }}</strong> |
                                    <small>{{ $project->status }}</small> |
                                    <small>{{ $project->tahun_project }}</small>
                                </p>
                                <p>
                                    {{ $project->keterangan }}
                                </p>
                            @endforeach



                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Qualification End -->


    <!-- Skill Start -->
    <div class="container-fluid py-5" id="skill">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Skills</h1>
                <h1 class="position-absolute text-uppercase text-primary">My Skills</h1>
            </div>
            <div class="row align-items-center">
                <div class="col-md-4">
                    @foreach ($datas['skills'] as $skill)
                        @if ($skill->type == 'BAHASA')
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">{{ $skill->nama_skill }}</h6>
                                    <h6 class="font-weight-bold">{!! $skill->level == 'BEGINNER'
                                        ? "<span class='badge badge-danger'>BEGINNER</span>"
                                        : ($skill->level == 'INTERMEDIATE'
                                            ? "<span class='badge badge-warning'>INTERMEDIATE</span>"
                                            : ($skill->level == 'PRO'
                                                ? "<span class='badge badge-success'>PRO</span>"
                                                : '')) !!}</h6>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    @foreach ($datas['skills'] as $skill)
                        @if ($skill->type == 'FRAMEWORK')
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">{{ $skill->nama_skill }}</h6>
                                    <h6 class="font-weight-bold">{!! $skill->level == 'BEGINNER'
                                        ? "<span class='badge badge-danger'>BEGINNER</span>"
                                        : ($skill->level == 'INTERMEDIATE'
                                            ? "<span class='badge badge-warning'>INTERMEDIATE</span>"
                                            : ($skill->level == 'PRO'
                                                ? "<span class='badge badge-success'>PRO</span>"
                                                : '')) !!}</h6>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-md-4">
                    @foreach ($datas['skills'] as $skill)
                        @if ($skill->type == 'LAINNYA')
                            <div class="skill mb-4">
                                <div class="d-flex justify-content-between">
                                    <h6 class="font-weight-bold">{{ $skill->nama_skill }}</h6>
                                    <h6 class="font-weight-bold">{!! $skill->level == 'BEGINNER'
                                        ? "<span class='badge badge-danger'>BEGINNER</span>"
                                        : ($skill->level == 'INTERMEDIATE'
                                            ? "<span class='badge badge-warning'>INTERMEDIATE</span>"
                                            : ($skill->level == 'PRO'
                                                ? "<span class='badge badge-success'>PRO</span>"
                                                : '')) !!}</h6>
                                </div>

                            </div>
                        @endif
                    @endforeach
                </div>


            </div>
        </div>
    </div>
    <!-- Skill End -->


    <!-- Services Start -->
    <div class="container-fluid pt-5" id="service">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Service
                </h1>
                <h1 class="position-absolute text-uppercase text-primary">My Services</h1>
            </div>
            <div class="row pb-3">
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fa fa-2x fa-laptop service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">Web Development</h4>
                    </div>
                    <p>
                        We provide web development services that include creating responsive websites, custom web
                        applications, and system integrations tailored to meet your business's unique needs.

                    </p>
                    {{-- <a class="border-bottom border-primary text-decoration-none" href="">Read More</a> --}}
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fa fa-2x fa-laptop-code service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">Backend Development</h4>
                    </div>
                    <p>
                        Our backend development services focus on building robust and scalable server-side solutions
                        tailored to meet your business requirements. From database design to API development, we ensure
                        seamless integration and efficient functionality.

                    </p>
                    {{-- <a class="border-bottom border-primary text-decoration-none" href="">Read More</a> --}}
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fas fa-2x fa-cogs service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">Bug Servise</h4>
                    </div>
                    <p>
                        Our Bug Service is designed to help your business stay on track by identifying and fixing
                        disruptive bugs. With a structured approach and advanced testing methodologies, we ensure your
                        applications perform flawlessly.
                    </p>
                    {{-- <a class="border-bottom border-primary text-decoration-none" href="">Read More</a> --}}
                </div>
                <div class="col-lg-4 col-md-6 text-center mb-5">
                    <div class="d-flex align-items-center justify-content-center mb-4">
                        <i class="fas fa-2x fa-code service-icon bg-primary text-white mr-3"></i>
                        <h4 class="font-weight-bold m-0">Documentation OpenAPI</h4>
                    </div>
                    <p>Our Open API documentation services offer comprehensive solutions for documenting your APIs,
                        ensuring clarity and accessibility for developers. From API reference guides to interactive
                        documentation, we help streamline the integration process for your users

                    </p>
                    {{-- <a class="border-bottom border-primary text-decoration-none" href="">Read More</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->


    <!-- Portfolio Start -->
    <div class="container-fluid pt-5 pb-3" id="portfolio">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Gallery
                </h1>
                <h1 class="position-absolute text-uppercase text-primary">My Portfolio</h1>
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">
                        <li class="btn btn-sm btn-outline-primary m-1 active" data-filter="*">All</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".first">Web</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".second">Desktop</li>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".third">App</li>
                    </ul>
                </div>
            </div>
            <div class="row portfolio-container">
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item first">
                    @foreach ($datas['projects'] as $project)
                        @if ($project->jenis_project == 'WEB')
                            <div class="position-relative overflow-hidden mb-2">
                                <img class="img-fluid rounded w-100"
                                    src="{{ Storage::url('images/cover/' . $project->cover) }}" alt="">
                                <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                                    <a href="{{ Storage::url('images/cover/' . $project->cover) }}"
                                        data-lightbox="portfolio" style="text-decoration:none;">
                                        <p class="text-white" style="font-size: 40px; ">
                                            {{ $project->status }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item second">
                    @foreach ($datas['projects'] as $project)
                        @if ($project->jenis_project == 'DESKTOP')
                            <div class="position-relative overflow-hidden mb-2">
                                <img class="img-fluid rounded w-100"
                                    src="{{ Storage::url('images/cover/' . $project->cover) }}" alt="">
                                <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                                    <a href="{{ Storage::url('images/cover/' . $project->cover) }}"
                                        data-lightbox="portfolio" style="text-decoration:none;">

                                        <p class="text-white" style="font-size: 40px; ">
                                            {{ $project->status }}
                                        </p>


                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item third">
                    @foreach ($datas['projects'] as $project)
                        @if ($project->jenis_project == 'ANDROID')
                            <div class="position-relative overflow-hidden mb-2">
                                <img class="img-fluid rounded w-100"
                                    src="{{ Storage::url('images/cover/' . $project->cover) }}" alt="">
                                <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-center">
                                    <a href="{{ Storage::url('images/cover/' . $project->cover) }}"
                                        data-lightbox="portfolio" style="text-decoration:none;">
                                        <p class="text-white" style="font-size: 40px; ">
                                            {{ $project->status }}
                                        </p>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>

            </div>
        </div>
    </div>
    <!-- Portfolio End -->


    <!-- Testimonial Start -->
    <div class="container-fluid py-5" id="testimonial">
        <div class="container">
            <div class="position-relative d-flex align-items-center justify-content-center">
                <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Review
                </h1>
                <h1 class="position-absolute text-uppercase text-primary">Clients Say</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($datas['testimonials'] as $testimonial)
                            <div class="text-center">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <h4 class="font-weight-light mb-4">{{ $testimonial->keterangan }}</h4>
                                <img class="img-fluid rounded-circle mx-auto mb-3"
                                    src="{{ Storage::url('images/testimonial/' . $testimonial->foto) }}"
                                    style="width: 80px; height: 80px;">
                                <h5 class="font-weight-bold m-0">{{ $testimonial->nama_client }}</h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->


        <!-- Blog Start -->
        {{-- <div class="container-fluid pt-5" id="blog">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Blog
                    </h1>
                    <h1 class="position-absolute text-uppercase text-primary">Latest Blog</h1>
                </div>
                <div class="row">
                    <div class="col-lg-4 mb-5">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded w-100" src="img/blog-1.jpg" alt="">
                            <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">01</h4>
                                <small class="text-white text-uppercase">Jan</small>
                            </div>
                        </div>
                        <h5 class="font-weight-medium mb-4">Rebum lorem no eos ut ipsum diam tempor sed rebum elitr
                            ipsum
                        </h5>
                        <a class="btn btn-sm btn-outline-primary py-2" href="">Read More</a>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded w-100" src="img/blog-2.jpg" alt="">
                            <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">01</h4>
                                <small class="text-white text-uppercase">Jan</small>
                            </div>
                        </div>
                        <h5 class="font-weight-medium mb-4">Rebum lorem no eos ut ipsum diam tempor sed rebum elitr
                            ipsum
                        </h5>
                        <a class="btn btn-sm btn-outline-primary py-2" href="">Read More</a>
                    </div>
                    <div class="col-lg-4 mb-5">
                        <div class="position-relative mb-4">
                            <img class="img-fluid rounded w-100" src="img/blog-3.jpg" alt="">
                            <div class="blog-date">
                                <h4 class="font-weight-bold mb-n1">01</h4>
                                <small class="text-white text-uppercase">Jan</small>
                            </div>
                        </div>
                        <h5 class="font-weight-medium mb-4">Rebum lorem no eos ut ipsum diam tempor sed rebum elitr
                            ipsum
                        </h5>
                        <a class="btn btn-sm btn-outline-primary py-2" href="">Read More</a>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Blog End -->


        <!-- Contact Start -->
        <div class="container-fluid py-5" id="contact">
            <div class="container">
                <div class="position-relative d-flex align-items-center justify-content-center">
                    <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Contact
                    </h1>
                    <h1 class="position-absolute text-uppercase text-primary">Contact Me</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="contact-form text-center">
                            <div id="success"></div>
                            <form name="sentMessage" id="contactForm" novalidate="novalidate" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="control-group col-sm-6">
                                        <input type="text" class="form-control p-4" id="name" name="name"
                                            placeholder="Your Name" required="required"
                                            data-validation-required-message="Please enter your name" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                    <div class="control-group col-sm-6">
                                        <input type="email" class="form-control p-4" id="email" name="email"
                                            placeholder="Your Email" required="required"
                                            data-validation-required-message="Please enter your email" />
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <input type="text" class="form-control p-4" id="subject" name="subject"
                                        placeholder="Subject" required="required"
                                        data-validation-required-message="Please enter a subject" />
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div class="control-group">
                                    <textarea class="form-control py-3 px-4" rows="5" id="message" name="message" placeholder="Message"
                                        required="required" data-validation-required-message="Please enter your message"></textarea>
                                    <p class="help-block text-danger"></p>
                                </div>
                                <div>
                                    <button class="btn btn-outline-primary" type="submit"
                                        id="sendMessageButton">Send
                                        Message</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


        <!-- Footer Start -->
        <div class="container-fluid bg-primary text-white mt-5 py-5 px-sm-3 px-md-5">
            <div class="container text-center py-5">
                <div class="d-flex justify-content-center mb-4">

                    <a class="btn btn-light btn-social mr-2" href="https://github.com/simaster19"><i
                            class="fab fa-github"></i></a>
                    <a class="btn btn-light btn-social mr-2" href="https://www.linkedin.com/in/miftakhulkirom/"><i
                            class="fab fa-linkedin-in"></i></a>
                </div>
                {{-- <div class="d-flex justify-content-center mb-3">
                    <a class="text-white" href="#">Privacy</a>
                    <span class="px-3">|</span>
                    <a class="text-white" href="#">Terms</a>
                    <span class="px-3">|</span>
                    <a class="text-white" href="#">FAQs</a>
                    <span class="px-3">|</span>
                    <a class="text-white" href="#">Help</a>
                </div> --}}
                <p class="m-0">
                    &copy; <a class="text-white font-weight-bold" href="/">simaster19</a>. All Rights Reserved.

                </p>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Scroll to Bottom -->
        {{-- <i class="fa fa-2x fa-angle-down text-white scroll-to-bottom"></i> --}}

        <!-- Back to Top -->
        <a href="#" class="btn btn-outline-dark px-0 back-to-top"><i class="fa fa-angle-double-up"></i></a>


        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="{{ url('Frontend/lib/typed/typed.min.js') }}"></script>
        <script src="{{ url('Frontend/lib/easing/easing.min.js') }}"></script>
        <script src="{{ url('Frontend/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ url('Frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
        <script src="{{ url('Frontend/lib/isotope/isotope.pkgd.min.js') }}"></script>
        <script src="{{ url('Frontend/lib/lightbox/js/lightbox.min.js') }}"></script>

        <!-- Contact Javascript File -->
        <script src="{{ url('Frontend/mail/jqBootstrapValidation.min.js') }}"></script>
        <script src="{{ url('Frontend/mail/contact.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ url('Frontend/js/main.js') }}"></script>
</body>

</html>
