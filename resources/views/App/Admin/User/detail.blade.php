@extends('App.Admin.index')
@section('header-title', 'Detail User')
@section('content')

    <section class="section">
        <div class="section-body">
            <h2 class="section-title">Hi, {{ $data->nama }}!</h2>
            <p class="section-lead">
                Information about yourself on this page.
            </p>

            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-5">
                    <div class="card profile-widget">
                        <div class="profile-widget-header">
                            <img alt="image"
                                src="{{ $data->foto == '' ? public_path('Backend/assets/img/avatar/avatar-1.png') : public_path('storage/app/images/foto/', $data->foto) }} "
                                class="rounded-circle profile-widget-picture">
                            <div class="profile-widget-items">
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Posts</div>
                                    <div class="profile-widget-item-value">187</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Followers</div>
                                    <div class="profile-widget-item-value">6,8K</div>
                                </div>
                                <div class="profile-widget-item">
                                    <div class="profile-widget-item-label">Following</div>
                                    <div class="profile-widget-item-value">2,1K</div>
                                </div>
                            </div>
                        </div>
                        <div class="profile-widget-description">
                            <div class="profile-widget-name">{{ $data->nama }} <div
                                    class="text-muted d-inline font-weight-normal">
                                    <div class="slash"></div> Web Developer
                                </div>
                            </div>
                            Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a
                            fictional character but an original hero in my family, a hero for his children and for his
                            wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with
                            <b>'John Doe'</b>.
                        </div>

                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">

                        <div class="card-header">
                            <h4>Detail Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="form-group col-md-4 col-12">
                                    <label>Nama</label>
                                    <input type="text" value="{{ $data->nama }}" class="form-control" required=""
                                        readonly>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Tanggal Lahir</label>
                                    <input type="text" value="{{ $data->tanggal_lahir }}" class="form-control"
                                        required="" readonly>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>No. Handphone</label>
                                    <input type="text" value="{{ $data->no_hp }}" class="form-control" required=""
                                        readonly>
                                </div>
                                <div class="form-group col-md-12 col-12">
                                    <label>Email</label>
                                    <input type="text" value="{{ $data->email }}" class="form-control" required=""
                                        readonly>
                                </div>
                            </div>

                            <div class="row">
                                <div class="form-group col-md-12 col-12">
                                    <label>Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10" readonly>{{ $data->alamat }}</textarea>

                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Kota</label>
                                    <input type="text" value="{{ $data->kota }}" class="form-control" required=""
                                        readonly>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Kecamatan</label>
                                    <input type="text" value="{{ $data->kecamatan }}" class="form-control" required=""
                                        readonly>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Desa</label>
                                    <input type="text" value="{{ $data->desa }}" class="form-control" required=""
                                        readonly>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>RT</label>
                                    <input type="text" value="{{ $data->rt }}" class="form-control" required=""
                                        readonly>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>RW</label>
                                    <input type="text" value="{{ $data->rw }}" class="form-control" required=""
                                        readonly>
                                </div>
                                <div class="form-group col-md-4 col-12">
                                    <label>Kode POS</label>
                                    <input type="text" value="{{ $data->kode_pos }}" class="form-control" required=""
                                        readonly>
                                </div>
                            </div>


                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
