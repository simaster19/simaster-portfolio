@extends('App.Admin.index')
@section('header-title', 'Detail Testimonial')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <img src="{{ Storage::url('images/testimonial/' . $data->foto) }}" width="300" height="300"
        class="img img-cover mx-auto d-block img-round" alt="Foto">

        <div class="table-responsive">
          <table class="table table-responsive">
            <tr>
              <th>Nama</th>
              <th>:</th>
              <td>{{ $data->nama }}</td>
            </tr>
            <tr>
              <th>Project</th>
              <th>:</th>
              <td>
                {{empty($data->project) ? '' : $data->project->judul}}
              </td>
            </tr>
            <tr>
              <th>Keterangan</th>
              <th>:</th>
              <td>{{ $data->keterangan }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection