@extends('App.Admin.index')
@push('css-style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('header-title', 'Data User')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="table-1">
                            <thead>
                                <tr>
                                    <th class="text-center">
                                        #
                                    </th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>No. Handphone</th>
                                    <th>Register Date</th>
                                    <th>Last Login Date</th>
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
                                        <td>{{ $data->nama }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->no_hp }}</td>

                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('LLLL') }}
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($data->last_login)->isoFormat('LLLL') }}</td>
                                        <td>
                                            @if ($data->status == 1)
                                                <div class="badge badge-success">
                                                    Active

                                                </div>
                                            @else
                                                <div class="badge badge-danger">
                                                    Non Active
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="buttons">
                                                <a href="{{ route('edit-user', $data->id_user) }}"
                                                    class="btn btn-primary btn-sm btn-round"><i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('detail-user', $data->id_user) }}"
                                                    class="btn btn-warning btn-sm btn-round"><i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('delete-user', $data->id_user) }}" method="POST">
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
