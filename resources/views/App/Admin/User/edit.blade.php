@extends('App.Admin.index')
@section('header-title', 'Ubah User')
@section('content')
    <form action="{{ route('update-user', $data->id_user) }}" method="POST">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama"
                            value="{{ $data->nama }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="tanggal_lahir">Tanggal lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ $data->tanggal_lahir }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="no_hp">No. Handphone</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="No. Handphone"
                            value="{{ $data->no_hp }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="email"
                            value="{{ $data->email }}" readonly>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username"
                            value="{{ $data->username }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea name="alamat" id="alamat" class="form-control" cols="30" rows="10">{{ $data->alamat }}</textarea>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="kota">Kota</label>
                        <input type="text" class="form-control" id="kota" name="kota"
                            value="{{ $data->kota }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="kecamatan">Kecamatan</label>
                        <input type="text" class="form-control" id="kecamatan" name="kecamatan"
                            value="{{ $data->kecamatan }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="desa">Desa</label>
                        <input type="text" class="form-control" id="desa" name="desa"
                            value="{{ $data->desa }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rt">RT</label>
                        <input type="text" class="form-control" id="rt" name="rt"
                            value="{{ $data->rt }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="rw">RW</label>
                        <input type="text" class="form-control" id="rw" name="rw"
                            value="{{ $data->rw }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="kode_pos">Kode POS</label>
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos"
                            value="{{ $data->kode_pos }}">
                    </div>

                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
