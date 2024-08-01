<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Register &mdash; User</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <meta content="Portfolio Web" name="keywords">
  <meta content="Portofolio Web" name="description">

  <!-- Favicon -->
  <link href="{{ url('Frontend/img/favicon.ico') }}" rel="icon">

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ url('Backend/node_modules/selectric/public/selectric.css') }}">
  <link rel="stylesheet" href="{{ url('Backend/node_modules/izitoast/dist/css/iziToast.min.css') }}">

  {{-- Toastr --}}
  <script src="{{ url('Backend/node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>


  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ url('Backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('Backend/assets/css/components.css') }}">
  <style>
    .required-label:after {
    content: " *";
    color: red;
    }
  </style>
</head>

<body>
  <div id="app">
    @if (session()->has('message'))
    <div>
      <script>
        {!! session('message') !!}
      </script>
    </div>
    @endif
    @if (session()->has('messageError'))
    <script>
      {!! session('messageError') !!}
    </script>
    @endif
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-12  col-md-12  col-lg-12  col-xl-12">
            <div class="login-brand">
              <img src="{{ url('Backend/assets/img/unsplash/simaster.jpg') }}" alt="logo"
              width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header d-block">
                <h4>Register</h4>

                <span>
                  <strong>Note :</strong> Yang bertanda <span class="text-danger">
                    *
                  </span>
                  Wajib diisi! <a href="{{route('login')}}" class="text-underline">Login</a>
                </span>

              </div>

              <div class="card-body">
                <div class="form-divider">
                  Data Diri
                </div>
                <form method="POST" action="{{ route('proccessRegister') }}">
                  @csrf
                  <div class="row">
                    <div class="form-group col-lg-4 col-md-12">
                      <label for="nama" class="required-label">Nama</label>
                      <input id="nama" type="text" class="form-control" name="nama"
                      value="{{ old('nama') }}" autofocus required>
                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <label for="tanggal_lahir" class="required-label">Tanggal lahir</label>
                      <input id="tanggal_lahir" type="date" class="form-control"
                      name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <label for="no_hp" class="required-label">No Handphone</label>
                      <input id="no_hp" type="text" class="form-control" name="no_hp"
                      placeholder="896xxxxxxxxx" value="{{ old('no_hp') }}" required>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-lg-6 col-md-12">
                      <label for="email" class="required-label">Email</label>
                      <input id="email" type="email" class="form-control" name="email"
                      placeholder="Email Aktif" value="{{ old('email') }}" required>

                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label for="username" class="d-block required-label">Username</label>
                      <input id="username" type="username" class="form-control" name="username"
                      value="{{ old('username') }}" required>

                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label for="password" class="d-block required-label">Password</label>
                      <p class="text-danger text-small">
                        Password harus berupa Huruf Besar Kecil, Simbol, dan Angka (Cont#oh123)
                      </p>
                      <input id="password" type="password" class="form-control pwstrength"
                      data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label for="password2" class="d-block required-label">Password Confirmation</label>
                      <input id="password2" type="password" class="form-control"
                      name="password-confirm" required>
                      <p class="password2"></p>

                    </div>
                  </div>

                  <div class="form-divider">
                    Alamat Tinggal
                  </div>
                  <div class="row">
                    <div class="form-group col-12">
                      <label for="alamat" class="required-label">Alamat</label>
                      <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="50" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <label for="kota">Kota</label>
                      <input id="kota" type="text" class="form-control" name="kota"
                      value="{{ old('kota') }}">

                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <label for="kecamatan">Kecamatan</label>
                      <input id="kecamatan" type="text" class="form-control"
                      name="kecamatan" value="{{ old('kecamatan') }}">
                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <label for="desa">Desa</label>
                      <input id="desa" type="text" class="form-control" name="desa"
                      value="{{ old('desa') }}">
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                      <label for="rt">RT</label>
                      <input id="rt" type="number" class="form-control" name="rt"
                      placeholder="001" value="{{ old('rt') }}">
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                      <label for="rw">RW</label>
                      <input id="rw" type="number" class="form-control" name="rw"
                      placeholder="009" value="{{ old('rw') }}">
                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <label for="kode_pos">Kode POS</label>
                      <input type="number" name="kode_pos" id="kode_pos"
                      class="form-control" placeholder="54365"
                      value="{{ old('kode_pos') }}">
                    </div>
                  </div>


                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input"
                      id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms
                        and conditions</label>
                    </div>

                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block btn-register"
                      disabled="disabled">
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; Simaster19 2024
            </div>
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
  <script src="{{ url('Backend/node_modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ url('Backend/node_modules/selectric/public/jquery.selectric.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ url('Backend/assets/js/scripts.js') }}"></script>
  <script src="{{ url('Backend/assets/js/custom.js') }}"></script>
  <script src="{{ url('Backend/assets/js/page/modules-toastr.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ url('Backend/assets/js/page/auth-register.js') }}"></script>
</body>

</html>