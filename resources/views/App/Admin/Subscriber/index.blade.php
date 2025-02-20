@extends('App.Admin.index')
@push('css-style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('header-title', 'Subscriber')
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
        <a href="{{ route('create-category') }}" class="btn btn-outline-success btn-round btn-sm"><i
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
                <th>Email</th>
                <th>Dibuat Tanggal</th>
                <th>Diubah Tanggal</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($datas as $data)
              <tr>
                <td>
                  {{ $loop->iteration }}
                </td>
                <td>{{ $data->email }}</td>

                <td>{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('LLLL') }}</td>
                <td>{{ \Carbon\Carbon::parse($data->updated_at)->isoFormat('LLLL') }}</td>

                <td>
                  <div class="d-flex align-items-center gap-2">
                    <a href="{{ route('edit-category', $data->id_category) }}"
                      class="btn btn-primary btn-sm btn-round"><i class="fas fa-edit"></i>
                    </a>
                    <form action="{{ route('delete-category', $data->id_category) }}"
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