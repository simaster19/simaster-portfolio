<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; User</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
  integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ url('Backend/node_modules/selectric/public/selectric.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ url('Backend/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ url('Backend/assets/css/components.css') }}">
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
          <div
            class="col-12 col-sm-12  col-md-12  col-lg-12  col-xl-12">

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
                <div class="d-block">
                  <p>
                    <strong>Note :</strong> Akun ini hanya bisa untuk membuat Postingan Blog saja, dan harus sudah terverifikasi! <a href="#" class="text-underline">Kunjungi Blog</a>
                  </p>
                </div>
              </div>


              <div class="card-body">
                <div class="form-divider">
                  Data Diri
                </div>
                <form method="POST" action="{{ route('proccessRegister') }}">
                  @csrf
                  <div class="row">
                    <div class="form-group col-lg-4 col-md-12">
                      <label for="nama">Nama</label>
                      <input id="nama" type="text" class="form-control" name="nama"
                      autofocus required>
                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <label for="tanggal_lahir">Tanggal lahir</label>
                      <input id="tanggal_lahir" type="date" class="form-control"
                      name="tanggal_lahir" required>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <label for="no_hp">No Handphone</label>
                      <input id="no_hp" type="text" class="form-control" name="no_hp" required>
                    </div>
                  </div>


                  <div class="row">
                    <div class="form-group col-lg-6 col-md-12">
                      <label for="email">Email</label>
                      <input id="email" type="email" class="form-control" name="email" placeholder="Email Aktif" required>

                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label for="username" class="d-block">Username</label>
                      <input id="username" type="username" class="form-control"
                      name="username" required>

                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label for="password" class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength"
                      data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12">
                      <label for="password2" class="d-block">Password Confirmation</label>
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
                      <label>Alamat</label>
                      <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" required></textarea>
                    </div>

                    <div class="form-group col-lg-4 col-md-12">
                      <label>Kota</label>
                      <input id="kota" type="text" class="form-control" name="kota">

                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <label>Kecamatan</label>
                      <input id="kecamatan" type="text" class="form-control"
                      name="kecamatan">
                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <label>Desa</label>
                      <input id="desa" type="text" class="form-control"
                      name="desa">
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                      <label>RT</label>
                      <input id="rt" type="text" class="form-control"
                      name="rt">
                    </div>
                    <div class="form-group col-lg-4 col-md-6">
                      <label>RW</label>
                      <input id="rw" type="text" class="form-control"
                      name="rw">
                    </div>
                    <div class="form-group col-lg-4 col-md-12">
                      <label>Kode POS</label>
                      <input type="text" class="form-control">
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
                    <button type="submit" class="btn btn-primary btn-lg btn-block btn-register" disabled="disabled">
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

  <!-- Page Specific JS File -->
  <script src="{{ url('Backend/assets/js/page/auth-register.js') }}"></script>
</body>

</html>