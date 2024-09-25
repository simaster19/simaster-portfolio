@extends('App.Admin.index')
@section('header-title', 'Ubah Project')
@push('css-style')
<link rel="stylesheet" href="{{ url('Backend/node_modules/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ url('Backend/node_modules/summernote/dist/summernote-bs4.css') }}">

@endpush
@section('content')
<form action="{{ route('update-project', $data->id_project) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('put')
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
          <label for="cover">Cover</label>
          <input type="file" class="" id="cover" name="cover">
        </div>
        <div class="form-group col-md-12">
          <label for="image">Image</label>
          <input type="file" class="" id="image" name="image[]" multiple>
        </div>

        <div class="form-group col-md-4">
          <label for="judul">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul"
          value="{{ $data->judul }}">
        </div>
        <div class="form-group col-md-4">
          <label for="jenis_project">Jenis Project</label>
          <select name="jenis_project" id="jenis_project" class="form-control">
            <option value="">--Pilih--</option>
            @foreach ($jenisProject as $jenis_project)
            <option value="{{ $jenis_project }}"
              {{ $data->jenis_project == $jenis_project ? 'selected' : '' }}>
              {{ $jenis_project }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="project_url">Project URL</label>
          <input type="text" class="form-control" id="project_url" name="project_url"
          value="{{ $data->project_url }}">
        </div>

        @php
        $dibuat_dengans = json_decode($data->dibuat_dengan);
        //dd(in_array('PHP', $dibuat_dengans));
        @endphp
        <div class="form-group col-md-4">
          <label for="dibuat_dengan">Dibuat Dengan</label>
          <select name="dibuat_dengan[]" class="form-control select2" multiple="">
            <option value="">--Pilih--</option>
            @foreach ($listBahasa as $dibuat_dengan)
            <option value="{{ $dibuat_dengan }}"
              {{ in_array($dibuat_dengan, $dibuat_dengans) ? 'selected' : '' }}>
              {{ $dibuat_dengan }}
            </option>
            @endforeach

          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="status">Status Project</label>
          <select name="status" id="status" class="form-control">            <option value="">--Pilih--</option>
            @foreach ($statusProject as $status_project)
            <option value="{{ $status_project }}"
              {{ $data->status == $status_project ? 'selected' : '' }}>
              {{ $status_project }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="tahun_project">Tahun Project</label>
          <select name="tahun_project" id="tahun_project" class="form-control">
            <option value="">--Pilih--

            </option>
            @php
            for ($i = date('Y'); $i >= date('Y') - 20; $i--) {
            $selected = ($i==$data->tahun_project) ? 'selected' : '';
            echo "<option value='{$i}' {$selected}>{$i}</option>";
            }
            @endphp

          </select>
        </div>
      </div>
      <div class="form-row">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="summernote">{{ $data->keterangan }}</textarea>
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