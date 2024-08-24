@extends('App.Admin.index')
@section('header-title', 'Tambah Skill')
@section('content')
<form action="{{ route('store-skill') }}" method="POST" enctype="multipart/form-data">
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
          <label for="logo">Logo</label>
          <input type="file" class="form-control" id="logo" name="logo">
        </div>
        <div class="form-group col-md-4">
          <label for="nama_skill">Skill</label>
          <input type="text" class="form-control" id="nama_skill" name="nama_skill" value="{{old('nama_skill')}}">
        </div>
        <div class="form-group col-md-4">
          <label for="level">Level</label>
          <select name="level" id="level" class="form-control">
            <option value="">--Pilih--</option>
            @foreach ($levelSkill as $level_skill)
            <option value="{{ $level_skill }}">{{ $level_skill }}</option>
            @endforeach

          </select>
        </div>
        <div class="form-group col-md-4">
          <label for="type">Type</label>
          <select name="type" id="type" class="form-control" required>
            <option value="">--Pilih--</option>
            @foreach ($typeSkill as $type_skill)
            <option value="{{ $type_skill }}">{{ $type_skill }}</option>
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