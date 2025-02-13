<!DOCTYPE html>
<html lang="en">

<head>
  @include('Layouts.Admin.header')
</head>

<body>
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i
              class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
              class="fas fa-search"></i></a></li>
          </ul>
          <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search"
            data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            <div class="search-result">
              <div class="search-header">
                Histories
              </div>
              <div class="search-item">
                <a href="#">How to hack NASA using CSS</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">Kodinger.com</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-item">
                <a href="#">#Stisla</a>
                <a href="#" class="search-close"><i class="fas fa-times"></i></a>
              </div>
              <div class="search-header">
                Result
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30"
                  src="../assets/img/products/product-3-50.png" alt="product">
                  oPhone S9 Limited Edition
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30"
                  src="../assets/img/products/product-2-50.png" alt="product">
                  Drone X2 New Gen-7
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <img class="mr-3 rounded" width="30"
                  src="../assets/img/products/product-1-50.png" alt="product">
                  Headphone Blitz
                </a>
              </div>
              <div class="search-header">
                Projects
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-danger text-white mr-3">
                    <i class="fas fa-code"></i>
                  </div>
                  Stisla Admin Template
                </a>
              </div>
              <div class="search-item">
                <a href="#">
                  <div class="search-icon bg-primary text-white mr-3">
                    <i class="fas fa-laptop"></i>
                  </div>
                  Create a new Homepage Design
                </a>
              </div>
            </div>
          </div>
        </form>
        <ul class="navbar-nav navbar-right">
          @if(auth()->user()->role !== 1)
          @else
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
            class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="{{route('read-all-message')}}" class="readAll">Mark All As Read</a>
                </div>
              </div>

              <div class="dropdown-list-content dropdown-list-message">
                <div class="data-message-all">
                  @foreach($dataMessage as $item)
                  <a href="{{route('detail-message',$item->id_message)}}" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-avatar">
                      <img alt="image" src="" class="rounded-circle">
                    </div>
                    <div class="dropdown-item-desc">
                      <b>{{$item->nama}}</b>
                      <p>
                        {{$item->message}}
                      </p>
                      <div class="time">
                        {{$item->created_at}}
                      </div>
                    </div>
                  </a>

                  @endforeach

                </div>

              </div>
              <div class="dropdown-footer text-center">
                <a href="{{route('data-message')}}">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          @endif
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
            class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-list-content dropdown-list-icons">
                <a href="#" class="dropdown-item dropdown-item-unread">
                  <div class="dropdown-item-icon bg-primary text-white">
                    <i class="fas fa-code"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Template update is available now!
                    <div class="time text-primary">
                      2 Min Ago
                    </div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="far fa-user"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                    <div class="time">
                      10 Hours Ago
                    </div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-success text-white">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                    <div class="time">
                      12 Hours Ago
                    </div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-danger text-white">
                    <i class="fas fa-exclamation-triangle"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Low disk space. Let's clean it!
                    <div class="time">
                      17 Hours Ago
                    </div>
                  </div>
                </a>
                <a href="#" class="dropdown-item">
                  <div class="dropdown-item-icon bg-info text-white">
                    <i class="fas fa-bell"></i>
                  </div>
                  <div class="dropdown-item-desc">
                    Welcome to Stisla template!
                    <div class="time">
                      Yesterday
                    </div>
                  </div>
                </a>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown"
            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image"
            src="{{ auth()->user()->foto !== null ? Storage::url('images/foto/' . auth()->user()->foto) : 'Frontend/assets/img/avatar/avatar-1.png' }}"
            class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">
              Hi, {{ auth()->user()->nama }}
            </div>
          </a>
            <div class="dropdown-menu dropdown-menu-right">
              <div class="dropdown-title">
                Logged in 5 min ago
              </div>
              <a href="{{ route('detail-user', auth()->user()->id_user) }}"
                class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">

        @include('Layouts.Admin.sidebar')
      </div>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>@yield('header-title')</h1>
          </div>
          @if (auth()->user()->email_verified_at == null)
          <div class="col-lg-12 col-md-12 col-sm-12 col-12">

            <div class="alert alert-warning alert-dismissible show fade">
              <div class="alert-body">
                <button class="close" data-dismiss="alert">
                  <span>&times;</span>
                </button>
                <form method="POST" action="{{ route('verification.send') }}">
                  @csrf
                  Akun anda belum di verifikasi, silahkan lakukan verifikasi terlebih dahulu atau
                  anda bisa
                  <button class="btn btn-outline-info btn-round">Minta ulang</button> verifikasi
                </form>
              </div>
            </div>
          </div>
          @endif
          @yield('content')
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2024 <div class="bullet"></div>
          <a href="https://simaster19.my.id">Simaster19</a>
        </div>
        <div class="footer-right">
          Version 1.0.0
        </div>
      </footer>
    </div>
  </div>

  @include('Layouts.Admin.footer')
</body>

</html>