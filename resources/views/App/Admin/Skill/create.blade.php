@extends('App.Admin.index')
@section('header-title', 'Tambah Skill')
@section('content')
<form action="{{ route('store-skill') }}" method="POST">
  @csrf
  <div class="card">
    <div class="card-body">
      <div class="form-row">

        <div class="form-group col-md-6">
          <label for="nama_skill">Skill</label>
          <input type="text" class="form-control" id="nama_skill" name="nama_skill">
        </div>
        <div class="form-group col-md-6">
          <label for="level">Level</label>
          <select name="level" id="level" class="form-control">
            <option value="BEGINNER">BEGINNER</option>
            <option value="INTERMEDIATE">INTERMEDIATE</option>
            <option value="PRO">PRO</option>
          </select>

        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection