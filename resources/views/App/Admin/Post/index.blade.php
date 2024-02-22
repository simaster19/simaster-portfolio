@extends('App.Admin.index')
@push('css-style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ url('Backend/node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endpush
@section('header-title', 'Data Post')
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
        <a href="{{ route('create-post') }}" class="btn btn-outline-success btn-round btn-sm"><i
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
                <th>Judul</th>
                <th>Gambar</th>
                <th>Content</th>
                <th>Tanggal Posting</th>
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
                  src="{{ Storage::url('images/foto/' . $data->user->foto) }}" width="50px"
                  height="50px"></td>
                <td>{{ $data->user->nama }}</td>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->gambar }}</td>
                <td>{{ $data->content }}</td>
                <td>{{ \Carbon\Carbon::parse($data->created_at)->isoFormat('LLL') }}
                </td>

                <td>
                  <div class="buttons">
                    <a href="{{ route('edit-post', $data->id_post) }}"
                      class="btn btn-primary btn-sm btn-round"><i class="fas fa-edit"></i>
                    </a>
                    <a href="{{ route('detail-post', $data->id_post) }}"
                      class="btn btn-warning btn-sm btn-round"><i class="fas fa-eye"></i>
                    </a>
                    <form action="{{ route('delete-post', $data->id_post) }}"
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