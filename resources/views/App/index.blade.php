<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login &mdash; Admin</title>
  <!-- Favicon -->
  <link href="{{ url('Frontend/img/favicon.ico') }}" rel="icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ url('Backend/node_modules/bootstrap-social/bootstrap-social.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ url('Backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('Backend/assets/css/components.css') }}">
</head>

<body>
  <div id="app">
    <section class="section">

      <div class="login-brand col-lg-12 d-block text-center d-flex justify-content-center mt-5">
        <img src="{{ url('Backend/assets/img/unsplash/simaster.jpg') }}" alt="logo"
        width="150" class="shadow-dark rounded-circle">
      </div>
      <div class="col-lg-12 col-md-12 col-12 order-lg-1 min-vh-100 order-2 bg-white d-flex justify-content-center">
        <div class="p-4 m-3">
          <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Login
            Admin</span>
          </h4>
          @if (session('message'))
          <div class="alert alert-info alert-dismissible show fade">
            <div class="alert-body">
              <button class="close" data-dismiss="alert">
                <span>&times;</span>
              </button>
              {{ session('message') }}
            </div>
          </div>
          @endif
          <p class="text-muted">
            Before you get started, you must login or register if you don't already
            have an account.
          </p>
          <form method="POST" action="{{ route('proccess-login') }}" class="needs-validation"
            novalidate="">
            @csrf
            <div class="form-group">
              <label for="username">Username/Email</label>
              <input id="username" type="text" class="form-control" name="username" value="{{old('username')}}" tabindex="1"
              required autofocus>
              <div class="invalid-feedback">
                Please fill in your Username or Email
              </div>
            </div>

            <div class="form-group">
              <div class="d-block">
                <label for="password" class="control-label">Password</label>
              </div>
              <input id="password" type="password" class="form-control" name="password"
              tabindex="2" required>
              <div class="invalid-feedback">
                please fill in your password
              </div>
            </div>

            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input type="checkbox" name="remember_me" class="custom-control-input"
                tabindex="3" id="remember-me">
                <label class="custom-control-label" for="remember-me">Remember Me</label>
              </div>
            </div>

            <div class="form-group text-right">
              {{-- <a href="#" class="float-left mt-3">
                Forgot Password?
              </a> --}}
              <a href="{{route('my-profile')}}" class="btn btn-secondary btn-lg">
                Cancel
              </a>
              <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right"
                tabindex="4">
                Login
              </button>
            </div>

            <div class="mt-5 text-center">
              Don't have an account? <a href="{{ route('register') }}">Create new one</a>
            </div>
          </form>

          <div class="text-center mt-5 text-small">
            Copyright &copy; Simaster19 2024.

          </div>
        </div>
      </div>

    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
  </script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="{{ url('Backend/assets/js/stisla.js') }}"></script>

  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="{{ url('Backend/assets/js/scripts.js') }}"></script>
  <script src="{{ url('Backend/assets/js/custom.js') }}"></script>

  <!-- Page Specific JS File -->
</body>

</html>