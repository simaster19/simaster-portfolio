@extends('App.Admin.index')
@section('header-title', 'Ubah Skill')
@section('content')
<form action="{{ route('update-skill', $data->id_skill) }}" method="POST">
  @csrf
  @method('put')
  <div class="card">
    <div class="card-body">
      <div class="form-row">

        <div class="form-group col-md-6">
          <label for="nama_skill">Skill</label>
          <input type="text" class="form-control" id="nama_skill" name="nama_skill"
          value="{{ $data->nama_skill }}">
        </div>
        <div class="form-group col-md-4">
          <label for="level">Level</label>
          <select name="level" id="level" class="form-control">
            <option value="">--Pilih--</option>
            @foreach ($levelSkill as $level_skill)
            <option value="{{ $level_skill }}"
              {{ in_array($level_skill, $levelSkill) ? 'selected' : '' }}>
              {{ $level_skill }}
            </option>
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="type">Type</label>
          <select name="type" id="type" class="form-control">
            <option value="">--Pilih--</option>
            @foreach ($typeSkill as $type_skill)
            <option value="{{ $type_skill }}"
              {{ in_array($type_skill, $typeSkill) ? 'selected' : '' }}>
              {{ $type_skill }}
            </option>
            @endforeach
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