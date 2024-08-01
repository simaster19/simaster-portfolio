@extends('App.Admin.index')
@section('header-title', 'Detail Certifcate')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <img src="{{ Storage::url('images/certificate/' . $data->gambar) }}" width="300" height="300"
        class="img img-cover mx-auto d-block" alt="Certificate">

        <div class="table-responsive">
          <table class="table table-responsive">
            <tr>
              <th>Judul</th>
              <th>:</th>
              <td>{{ $data->judul }}</td>
            </tr>
            <tr>
              <th>Nama Online Course</th>
              <th>:</th>
              <td>{{ $data->nama_online_course }}</td>
            </tr>
            <tr>
              <th>Link Certificate</th>
              <th>:</th>
              <td>{{ $data->link_certificate }}</td>
            </tr>

          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection