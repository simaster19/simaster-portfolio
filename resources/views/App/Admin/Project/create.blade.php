@extends('App.Admin.index')
@section('header-title', 'Tambah Project')
@section('content')
<form action="{{ route('store-project') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="card">
    <div class="card-body">
      <div class="form-row">
        <div class="form-group col-md-12">
          <label for="cover">Cover</label>
          <input type="file" class="form-control" id="cover" name="cover">
        </div>
        <div class="form-group col-md-12">
          <label for="image">Image</label>
          <input type="file" class="form-control" id="image" name="image[]" multiple>
        </div>

        <div class="form-group col-md-4">
          <label for="judul">Judul</label>
          <input type="text" class="form-control" id="judul" name="judul">
        </div>
        <div class="form-group col-md-4">
          <label for="jenis_project">Jenis Project</label>
          <select name="jenis_project" id="jenis_project" class="form-control">


            <option value="">--Pilih--</option>
            <option value="WEB">WEB</option>
            <option value="DESKTOP">DESKTOP</option>
            <option value="ANDROID">ANDROID</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="project_url">Project URL</label>
          <input type="text" class="form-control" id="project_url" name="project_url">
        </div>
        <div class="form-group col-md-4">
          <label for="nama_client">Nama Client</label>
          <input type="text" class="form-control" id="nama_client" name="nama_client">
        </div>
        <div class="form-group col-md-4">
          <label for="dibuat_dengan">Dibuat Dengan</label>
          <select name="dibuat_dengan[]" class="form-control select2" multiple="">
            <option>Option 1</option>
            <option>Option 2</option>
            <option>Option 3</option>
            <option>Option 4</option>
            <option>Option 5</option>
            <option>Option 6</option>
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="status">Status Project</label>
          <select name="status" id="status" class="form-control">
            <option value="PERSONAL">PERSONAL</option>
            <option value="FREELANCE">FREELANCE</option>
            <option value="ONLINE COURSE">ONLINE COURSE</option>
          </select>

        </div>
      </div>
      <div class="form-row">
        <label for="keterangan">Keterangan</label>
        <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10"></textarea>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection
@push()
  <script src="{{url('Backend/node_modules/select2/dist/js/select2.full.min.js')}}"></script>
@endpush