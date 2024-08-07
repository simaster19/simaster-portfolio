@extends('App.Admin.index')
@section('header-title', 'Ubah Certificate')
@section('content')
    <form action="{{ route('update-certificate', $data->id_certificate) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul"
                            value="{{ $data->judul }}">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="nama_online_course">Nama Online Course</label>
                        <input type="text" class="form-control" id="nama_online_course" name="nama_online_course"
                            value="{{ $data->nama_online_course }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="link_certificate">Link Certificate</label>
                        <input type="text" class="form-control" id="link_certificate" name="link_certificate"
                            value="{{ $data->link_certificate }}">
                    </div>

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
