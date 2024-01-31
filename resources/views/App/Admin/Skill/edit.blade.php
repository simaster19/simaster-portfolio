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
                            <option value="{{ $data->level }}">--Jangan diubah--{{ $data->level }}</option>
                            <option value="BEGINNER">BEGINNER</option>
                            <option value="INTERMEDIATE">INTERMEDIATE</option>
                            <option value="PRO">PRO</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control">
                            <option value="{{ $data->type }}">--Jangan diubah--{{ $data->type }}</option>
                            <option value="BAHASA">BAHASA</option>
                            <option value="FRAMEWORK">FRAMEWORK</option>
                            <option value="LAINNYA">LAINNYA</option>
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
