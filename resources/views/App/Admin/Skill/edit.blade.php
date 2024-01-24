@extends('App.Admin.index')
@section('header-title', 'Ubah Skill')
@section('content')
<form action="{{ route('update-skill', $data->id_skill) }}" method="POST">
  @csrf
  @method("put")
  <div class="card">
    <div class="card-body">
      <div class="form-row">

        <div class="form-group col-md-6">
          <label for="nama_skill">Skill</label>
          <input type="text" class="form-control" id="nama_skill" name="nama_skill" value="{{$data->nama_skill}}">
        </div>
        <div class="form-group col-md-6">
          <label for="level">Level</label>
          <input type="text" class="form-control" id="level" name="level" value="{{$data->level}}">
        </div>
      </div>

    </div>
    <div class="card-footer">
      <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
  </div>
</form>
@endsection