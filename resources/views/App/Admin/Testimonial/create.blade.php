@extends('App.Admin.index')
@section('header-title', 'Tambah Testimonial')
@section('content')
<form action="{{ route('store-testimonial') }}" method="POST" enctype="multipart/form-data">
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

        <div class="form-group col-md-4">
          <label for="foto">Foto</label>
          <input type="file" class="form-control" id="foto" name="foto">
        </div>
        <div class="form-group col-md-4">
          <label for="nama_client">Nama</label>
          <input type="text" class="form-control" id="nama_client" name="nama_client" value="{{old('nama_client')}}" required="">
        </div>
        <div class="form-group col-md-4">
          <label for="id_project">Project</label>
          <select name="id_project" id="id_project" class="form-control" required>
            <option value="">--Pilih--</option>
            @foreach ($projects as $project)
            <option value="{{ $project->id_project }}">{{ $project->judul }}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-12">
          <label for="keterangan">Keterangan</label>
          <textarea cols="30" rows="50" class="form-control" id="keterangan" name="keterangan" required="">{{old('judul')}}</textarea>
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection