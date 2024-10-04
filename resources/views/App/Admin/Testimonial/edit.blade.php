@extends('App.Admin.index')
@section('header-title', 'Ubah Testimonial')
@section('content')
    <form action="{{ route('update-testimonial', $data->id_testimonial) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="card">
            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" id="foto" name="foto">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nama_client">Nama</label>
                        <input type="text" class="form-control" id="nama_client" name="nama_client"
                            value="{{ $data->nama_client }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="id_project">Project</label>
                        <select name="id_project" id="id_project" class="form-control">
                        <option value="">--Pilih--</option>
                            @foreach ($projects as $project)
                                <option value="{{ $project->id_project }}" {{ empty($data->project) ? '' : ($data->project->id_project == $project->id_project ? 'selected' : '')}}>{{ $project->judul }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="keterangan">Keterangan</label>
                        <textarea cols="30" rows="50" class="form-control" id="keterangan" name="keterangan">{{ $data->keterangan }}</textarea>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
