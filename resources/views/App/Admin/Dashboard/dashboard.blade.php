@extends('App.Admin.index')
@section('header-title', 'Dashboard')
@section('content')
<div>
  <div class="row">
    @if (session()->has('message'))
    <div>
      <script>
        {!! session('message') !!}
      </script>
    </div>
    @endif

    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total User</h4>
          </div>
          <div class="card-body">
            {{ $data['userCount']}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Postingan</h4>
          </div>
          <div class="card-body">
            {{ $data['postCount'] }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <i class="far fa-file"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Project</h4>
          </div>
          <div class="card-body">
            {{ $data['projectCount'] }}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <i class="fas fa-circle"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Message</h4>
          </div>
          <div class="card-body">
            {{ $data['messageCount'] }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-4 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Recent Activities</h4>
        </div>
        <div class="card-body">
          <ul class="list-unstyled list-unstyled-border">
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-1.png"
              alt="avatar">
              <div class="media-body">
                <div class="float-right text-primary">
                  Now
                </div>
                <div class="media-title">
                  Farhan A Mujib
                </div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in
                  gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-2.png"
              alt="avatar">
              <div class="media-body">
                <div class="float-right">
                  12m
                </div>
                <div class="media-title">
                  Ujang Maman
                </div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in
                  gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-3.png"
              alt="avatar">
              <div class="media-body">
                <div class="float-right">
                  17m
                </div>
                <div class="media-title">
                  Rizal Fakhri
                </div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in
                  gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
            <li class="media">
              <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-4.png"
              alt="avatar">
              <div class="media-body">
                <div class="float-right">
                  21m
                </div>
                <div class="media-title">
                  Alfa Zulkarnain
                </div>
                <span class="text-small text-muted">Cras sit amet nibh libero, in
                  gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
              </div>
            </li>
          </ul>
          <div class="text-center pt-1 pb-1">
            <a href="#" class="btn btn-primary btn-lg btn-round">
              View All
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-body pt-2 pb-2">
          <div id="myWeather">
            Please wait
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Authors</h4>
        </div>
        <div class="card-body">
          <div class="row pb-2">
            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
              @foreach($data["blog"] as $author)
              <div class="avatar-item mb-0">
                <img alt="{{$author->user->nama}}" src="{{Storage::url('images/foto/'.$author->user->foto)}}" class="img-fluid"
                data-toggle="tooltip" title="{{$author->user->nama}}">
                <div class="avatar-badge" title="" data-toggle="tooltip">
                  <i class="fas fa-wrench"></i>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-7 col-md-12 col-12 col-sm-12">
      <div class="card">
        <div class="card-header">
          <h4>Latest Posts</h4>
          <div class="card-header-action">
            <a href="{{route('data-post')}}" class="btn btn-primary">View All</a>
          </div>
        </div>
        <div class="card-body p-0">
          <div class="table-responsive">
            <table class="table table-striped mb-0">
              <thead>
                <tr>
                  <th>Judul</th>
                  <th>Author</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data["blog"] as $blog)
                <tr>
                  <td>
                    {{ $blog->judul}}
                    <div class="table-links">
                      in <a href="#">{{ $blog->category->nama_category}}</a>
                      <div class="bullet"></div>
                      <a href="#">View</a>
                    </div>
                  </td>
                  <td>
                    <a href="#" class="font-weight-600"><img
                      src="{{Storage::url('images/foto/'. $blog->user->foto)}}" alt="avatar" width="30"
                      class="rounded-circle mr-1"> {{$blog->user->nama}}</a>
                  </td>
                  <td>
                    <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                      title="Edit"><i class="fas fa-pencil-alt"></i></a>
                    <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                      data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                      data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
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
</div>

@endsection