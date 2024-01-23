@extends('App.Admin.index')
@push('css-style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('header-title', 'Data Project')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('create-project') }}" class="btn btn-outline-success btn-round btn-sm"><i
                            class="fas fa-plus"></i></a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Cover</th>
                                    <th>Judul</th>
                                    <th>Jenis Project</th>
                                    <th>Project URL</th>
                                    <th>Nama Client</th>
                                    <th>Dibuat Dengan</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $data->cover }}</td>
                                        <td>{{ $data->judul }}</td>
                                        <td>{{ $data->jenis_project }}</td>

                                        <td>{{ $data->project_url }}
                                        </td>
                                        <td>{{ $data->nama_client }}</td>
                                        <td>{{ $data->dibuat_dengan }}</td>
                                        <td>
                                            {{ $data->status }}
                                        </td>
                                        <td>
                                            <div class="buttons">
                                                <a href="{{ route('edit-project', $data->id_project) }}"
                                                    class="btn btn-primary btn-sm btn-round"><i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('detail-project', $data->id_project) }}"
                                                    class="btn btn-warning btn-sm btn-round"><i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('delete-project', $data->id_project) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm btn-round"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>

                                            </div>
                                        </td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script-js')
    <!-- JS Libraies -->
    <script src="{{ url('Backend/node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('Backend/node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ url('Backend/node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>


    <!-- Page Specific JS File -->
    <script src="{{ url('Backend/assets/js/page/modules-datatables.js') }}"></script>
@endpush
