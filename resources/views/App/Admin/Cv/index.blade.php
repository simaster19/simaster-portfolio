@extends('App.Admin.index')
@push('css-style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('Backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush
@section('header-title', 'Data Cv')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">

                @if (session()->has('message'))
                    <div>
                        <script>
                            {!! session('message') !!}
                        </script>
                    </div>
                @endif
                @if (session()->has('messageError'))
                    <script>
                        {!! session('messageError') !!}
                    </script>
                @endif
                <div class="card-header">
                    <a href="{{ route('create-cv') }}" class="btn btn-outline-success btn-round btn-sm"><i
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
                                    <th>Nama</th>
                                    <th>File</th>
                                    <th>Default</th>
                                    <th>Dibuat Tanggal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datas as $data)
                                    <tr>
                                        <td>
                                            {{ $loop->iteration }}
                                        </td>
                                        <td>{{ $data->user->nama }}</td>
                                        <td>
                                            @php
                                                $file = explode('.', $data->file_cv);
                                                $extension = end($file);
                                            @endphp
                                            @if ($extension == 'pdf')
                                                <span class="badge badge-danger">PDF</span>
                                            @else
                                                <span class="badge badge-primary">WORD</span>
                                            @endif
                                        </td>

                                        <td>
                                            <label class="custom-switch">
                                                <input type="radio" name="default" id="default"
                                                    value="{{ $data->id_cv }}" class="custom-switch-input default"
                                                    {{ $data->status == 1 ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>

                                            </label>
                                        </td>

                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('LLLL') }}
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('edit-cv', $data->id_cv) }}"
                                                    class="btn btn-primary btn-sm btn-round"><i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ Storage::url('files/cv/' . $data->file_cv) }}"
                                                    class="btn btn-warning btn-sm btn-round" download><i
                                                        class="fas fa-download"></i>
                                                </a>
                                                <form action="{{ route('delete-cv', $data->id_cv) }}" method="POST">
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
    <script src="{{ url('Backend/node_modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            $(".default").change(function(e) {
                e.preventDefault();
                let row = $(this).closest('tr');
                let id = row.find("input[name='default']").val();

                $.ajax({
                    type: "GET",
                    url: "cv/" + id + "/default",
                    success: function(response) {
                        console.log(response.data);
                        iziToast.success({
                            title: 'Success',
                            message: 'Berhasil menjadikan default!',
                            position: 'topRight'
                        })


                    }
                });
            });
        });
    </script>

    <!-- Page Specific JS File -->
    <script src="{{ url('Backend/assets/js/page/modules-datatables.js') }}"></script>
@endpush
