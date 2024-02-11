@extends('App.Admin.index')
@section('header-title', 'Dashboard')
@section('content')
    <div>
        <div class="row">
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
                            {{ count($data['user']) }}
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
                            {{ count($data['post']) }}
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
                            {{ count($data['project']) }}
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
                            {{ count($data['message']) }}
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
                                    <div class="float-right text-primary">Now</div>
                                    <div class="media-title">Farhan A Mujib</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in
                                        gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-2.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">12m</div>
                                    <div class="media-title">Ujang Maman</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in
                                        gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-3.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">17m</div>
                                    <div class="media-title">Rizal Fakhri</div>
                                    <span class="text-small text-muted">Cras sit amet nibh libero, in
                                        gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                                </div>
                            </li>
                            <li class="media">
                                <img class="mr-3 rounded-circle" width="50" src="../assets/img/avatar/avatar-4.png"
                                    alt="avatar">
                                <div class="media-body">
                                    <div class="float-right">21m</div>
                                    <div class="media-title">Alfa Zulkarnain</div>
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
                        <div id="myWeather">Please wait</div>
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
                                <div class="avatar-item mb-0">
                                    <img alt="image" src="../assets/img/avatar/avatar-5.png" class="img-fluid"
                                        data-toggle="tooltip" title="Alfa Zulkarnain">
                                    <div class="avatar-badge" title="Editor" data-toggle="tooltip"><i
                                            class="fas fa-wrench"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                                <div class="avatar-item mb-0">
                                    <img alt="image" src="../assets/img/avatar/avatar-4.png" class="img-fluid"
                                        data-toggle="tooltip" title="Egi Ferdian">
                                    <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i
                                            class="fas fa-cog"></i></div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                                <div class="avatar-item mb-0">
                                    <img alt="image" src="../assets/img/avatar/avatar-1.png" class="img-fluid"
                                        data-toggle="tooltip" title="Jaka Ramadhan">
                                    <div class="avatar-badge" title="Author" data-toggle="tooltip"><i
                                            class="fas fa-pencil-alt"></i></div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3 col-lg-3 mb-4 mb-md-0">
                                <div class="avatar-item mb-0">
                                    <img alt="image" src="../assets/img/avatar/avatar-2.png" class="img-fluid"
                                        data-toggle="tooltip" title="Ryan">
                                    <div class="avatar-badge" title="Admin" data-toggle="tooltip"><i
                                            class="fas fa-cog"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-5 col-md-12 col-12 col-sm-12">
                <form method="post" class="needs-validation" novalidate="">
                    <div class="card">
                        <div class="card-header">
                            <h4>Quick Draft</h4>
                        </div>
                        <div class="card-body pb-0">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" class="form-control" required>
                                <div class="invalid-feedback">
                                    Please fill in the title
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea class="summernote-simple"></textarea>
                            </div>
                        </div>
                        <div class="card-footer pt-0">
                            <button class="btn btn-primary">Save Draft</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-7 col-md-12 col-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Latest Posts</h4>
                        <div class="card-header-action">
                            <a href="#" class="btn btn-primary">View All</a>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-striped mb-0">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            Introduction Laravel 5
                                            <div class="table-links">
                                                in <a href="#">Web Development</a>
                                                <div class="bullet"></div>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="font-weight-600"><img
                                                    src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30"
                                                    class="rounded-circle mr-1"> Bagus Dwi
                                                Cahya</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Laravel 5 Tutorial - Installation
                                            <div class="table-links">
                                                in <a href="#">Web Development</a>
                                                <div class="bullet"></div>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="font-weight-600"><img
                                                    src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30"
                                                    class="rounded-circle mr-1"> Bagus Dwi
                                                Cahya</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Laravel 5 Tutorial - MVC
                                            <div class="table-links">
                                                in <a href="#">Web Development</a>
                                                <div class="bullet"></div>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="font-weight-600"><img
                                                    src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30"
                                                    class="rounded-circle mr-1"> Bagus Dwi
                                                Cahya</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Laravel 5 Tutorial - Migration
                                            <div class="table-links">
                                                in <a href="#">Web Development</a>
                                                <div class="bullet"></div>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="font-weight-600"><img
                                                    src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30"
                                                    class="rounded-circle mr-1"> Bagus Dwi
                                                Cahya</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Laravel 5 Tutorial - Deploy
                                            <div class="table-links">
                                                in <a href="#">Web Development</a>
                                                <div class="bullet"></div>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="font-weight-600"><img
                                                    src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30"
                                                    class="rounded-circle mr-1"> Bagus Dwi
                                                Cahya</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Laravel 5 Tutorial - Closing
                                            <div class="table-links">
                                                in <a href="#">Web Development</a>
                                                <div class="bullet"></div>
                                                <a href="#">View</a>
                                            </div>
                                        </td>
                                        <td>
                                            <a href="#" class="font-weight-600"><img
                                                    src="../assets/img/avatar/avatar-1.png" alt="avatar" width="30"
                                                    class="rounded-circle mr-1"> Bagus Dwi
                                                Cahya</a>
                                        </td>
                                        <td>
                                            <a class="btn btn-primary btn-action mr-1" data-toggle="tooltip"
                                                title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="Delete"
                                                data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?"
                                                data-confirm-yes="alert('Deleted')"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
