@extends('App.Admin.index')
@section('header-title', 'Ubah Project')
@section('content')
    <form action="{{ route('update-project', $data->id_project) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
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
                        <input type="text" class="form-control" id="judul" name="judul"
                            value="{{ $data->judul }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="jenis_project">Jenis Project</label>
                        <select name="jenis_project" id="jenis_project" class="form-control">
                            <option value="{{ $data->jenis_project }}">--Jangan diubah--{{ $data->jenis_project }}</option>
                            <option value="WEB">WEB</option>
                            <option value="DESKTOP">DESKTOP</option>
                            <option value="ANDROID">ANDROID</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="project_url">Project URL</label>
                        <input type="text" class="form-control" id="project_url" name="project_url"
                            value="{{ $data->project_url }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nama_client">Nama Client</label>
                        <input type="text" class="form-control" id="nama_client" name="nama_client"
                            value="{{ $data->nama_client }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="dibuat_dengan">Dibuat Dengan</label>
                        <input type="dibuat_dengan" class="form-control" id="dibuat_dengan" name="dibuat_dengan"
                            value="{{ $data->dibuat_dengan }}">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="status">Status Project</label>
                        <select name="status" id="status" class="form-control">
                            <option value="{{ $data->status }}">--Jangan diubah--{{ $data->status }}</option>
                            <option value="PERSONAL">PERSONAL</option>
                            <option value="FREELANCE">FREELANCE</option>
                            <option value="ONLINE COURSE">ONLINE COURSE</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="tahun_project">Status Project</label>
                        <select name="tahun_project" id="tahun_project" class="form-control">
                            <option value="{{ $data->tahun_project }}">--Jangan diubah--{{ $data->tahun_project }}</option>
                            @php
                                for ($i = date('Y'); $i >= date('Y') - 20; $i--) {
                                    echo "<option value='{$i}'>{$i}</option>";
                                }
                            @endphp

                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <label for="keterangan">Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="10">{{ $data->keterangan }}</textarea>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
