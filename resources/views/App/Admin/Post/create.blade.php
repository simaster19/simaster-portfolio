@extends('App.Admin.index')
@section('header-title', 'Tambah Post')
@push('css-style')
    <link rel="stylesheet" href="{{ url('Backend/node_modules/select2/dist/css/select2.min.css') }}">
@endpush
@section('content')
<form action="{{ route('store-post') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card">
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-4">
          <label for="judul">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul">
        </div>
        <div class="form-group col-md-12">
          <label for="gambar">Gambar</label>
          <input type="file" class="form-control" id="gambar" name="gambar">
        </div>
        <div class="form-group col-md-4">
          <label for="category">Category</label>
          <select name="category" id="category" class="form-control">

          </select>
        </div>
      </div>
      <div class="form-row">
        <label for="content">Content</label>
        <textarea name="content" id="content" class="form-control" cols="30" rows="10"></textarea>
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
@endpush