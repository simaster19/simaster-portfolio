@extends('App.Admin.index')
@section('header-title', 'Tambah Certificate')
@section('content')
    <form action="{{ route('store-certificate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
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
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="gambar">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>

                    <div class="form-group col-md-4">
                        <label for="nama_online_course">Online Course</label>
                        <input type="text" class="form-control" id="nama_online_course" name="nama_online_course">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="link_certificate">Link Certificate</label>
                        <input type="text" class="form-control" id="link_certificate" name="link_certificate">
                    </div>

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
