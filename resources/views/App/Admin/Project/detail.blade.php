@extends('App.Admin.index')
@section('header-title', 'Detail Project')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <img src="{{ Storage::url('images/cover/' . $data->cover) }}" width="300" height="300"
                        class="img mx-auto d-block" alt="Cover">

                    <div class="table-responsive">
                        <table class="table table-responsive">
                            <tr>
                                <td>Judul</td>
                                <td>:</td>
                                <td>{{ $data->judul }}</td>
                            </tr>
                            <tr>
                                <td>Jenis Project</td>
                                <td>:</td>
                                <td>{{ $data->jenis_project }}</td>
                            </tr>
                            <tr>
                                <td>Project URL</td>
                                <td>:</td>
                                <td>{{ $data->project_url }}</td>
                            </tr>
                            <tr>
                                <td>Nama Client</td>
                                <td>:</td>
                                <td>{{ $data->nama_client }}</td>
                            </tr>
                            <tr>
                                <td>Dibuat Dengan</td>
                                <td>:</td>
                                <td>
                                    @php
                                        $dibuat = json_decode($data->dibuat_dengan);

                                    @endphp


                                    @foreach ($dibuat as $dibuat_dengan)
                                        {{ $dibuat_dengan }}
                                    @endforeach
                                </td>
                            </tr>
                            <tr>
                                <td>Images</td>
                                <td>:</td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
