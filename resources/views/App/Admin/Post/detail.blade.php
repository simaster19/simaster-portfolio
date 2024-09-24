@extends('App.Admin.index')
@section('header-title', 'Detail Post {{$data->judul}}')
@section('content')
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <img src="{{ Storage::url('images/blog/cover/' . $data->cover) }}" width="300" height="300"
        class="img img-cover mx-auto d-block" alt="Cover">

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
                @foreach ($dibuat as $key => $dibuat_dengan)
                {{ $dibuat_dengan }}{{$key < count($dibuat) - 1 ? ' -':''}}
                  @endforeach
                </td>
              </tr>
              <tr>
                <td>Images</td>
                <td>:</td>
                <td>
                  @php
                  $images = json_decode($data->image);
                  @endphp

                  @foreach($images as $key => $image)
                  <img class="d-inline mr-1 mb-1 mt-0 img" src="{{Storage::url('images/image/'.$image->gambar)}}" width="200px" height="200px">
                  @endforeach

                </td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endsection