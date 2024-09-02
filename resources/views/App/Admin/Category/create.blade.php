@extends('App.Admin.index')
@section('header-title', 'Tambah Category')
@section('content')
    <form action="{{ route('store-category') }}" method="POST">
        @csrf
        <div class="card">
            @if (session()->has('message'))
                <script>
                    {!! session('message') !!}
                </script>
            @endif
            @if (session()->has('messageError'))
                <script>
                    {!! session('messageError') !!}
                </script>
            @endif

            <div class="card-body">
                <div class="form-row">

                    <div class="form-group col-md-4">
                        <label for="nama_category">Nama Category</label>
                        <input type="text" class="form-control" id="nama_category" name="nama_category"
                            value="{{ old('nama_category') }}" required>
                    </div>

                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </form>
@endsection
