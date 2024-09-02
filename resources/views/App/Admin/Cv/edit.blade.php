@extends('App.Admin.index')
@section('header-title', 'Ubah CV')
@section('content')
    <form action="{{ route('update-cv', $data->id_cv) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="file_cv">File</label>
                        <input type="file" class="form-control" id="file_cv" name="file_cv">
                    </div>

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
