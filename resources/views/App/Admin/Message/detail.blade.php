@extends('App.Admin.index')
@section('header-title', 'Detail Message')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">

      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-responsive">
            <tr>
              <th>Nama</th>
              <th>:</th>
              <td>{{ $data->nama }}</td>
            </tr>
            <tr>
              <th>Email</th>
              <th>:</th>
              <td>{{ $data->email }}</td>
            </tr>
            <tr>
              <th>Message</th>
              <th>:</th>
              <td>{{ $data->message }}</td>
            </tr>
            <tr>
              <th>Status</th>
              <th>:</th>
              <td>{!! $data->status == 1 ? '<span class="badge badge-success">Dibaca</span>' : '<span class="badge badge-warning">Belum dibaca</span>'!!}</td>

            </tr>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection