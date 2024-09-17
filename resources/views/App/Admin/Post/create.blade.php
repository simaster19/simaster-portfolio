@extends('App.Admin.index')
@section('header-title', 'Tambah Post')
@push('css-style')
<link rel="stylesheet" href="{{ url('Backend/node_modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ url('Backend/node_modules/summernote/dist/summernote-bs4.css') }}">
@endpush
@section('content')
<form action="{{ route('store-post') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card">
    @if (session()->has('message'))
    
      <script>
        {!! session('message') !!}
      </script>
    
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
        <div class="form-group col-md-6">
          <label for="judul">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul">
        </div>

        <div class="form-group col-md-6">
          <label for="nama_category">Category</label>
          <select name="nama_category" class="form-control select2">
            <option value="" disabled>--Pilih--</option>
            @foreach ($categories as $category)
            <option value="{{ $category->id_category }}">{{ $category->nama_category }}</option>
            @endforeach

          </select>
        </div>
      </div>
      <div class="form-row">
        <div class="form-group col-md-12">




          <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="summernote"></textarea>
          </div>
        </div>




      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection
@push('script-js')

<script src="{{ url('Backend/node_modules/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ url('Backend/node_modules/summernote/dist/summernote-bs4.js') }}"></script>
@endpush