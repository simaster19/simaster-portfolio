@extends('App.Admin.index')
@push('css-style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('header-title', 'Data Testimonial')
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
                    <a href="{{ route('create-testimonial') }}" class="btn btn-outline-success btn-round btn-sm"><i
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
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Keterangan</th>
                                    <th>Nama Project</th>
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
                                        <td><img class="img rounded-circle mx-auto d-block"
                                                src="{{ $data->foto != null ? Storage::url('images/testimonial/' . $data->foto) : url('Backend/assets/img/avatar/avatar-1.png') }}" width="50px"
                                                height="50px"></td>
                                        <td>{{ $data->nama_client }}</td>
                                        <td>{{ $data->keterangan }}</td>
                                        <td>{{ empty($data->project) ? '' : $data->project->judul }}</td>


                                        <td>{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('LLLL') }}
                                        </td>

                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('edit-testimonial', $data->id_testimonial) }}"
                                                    class="btn btn-primary btn-sm btn-round"><i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('detail-testimonial', $data->id_testimonial) }}"
                                                    class="btn btn-warning btn-sm btn-round"><i class="fas fa-eye"></i>
                                                </a>
                                                <form action="{{ route('delete-testimonial', $data->id_testimonial) }}"
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
