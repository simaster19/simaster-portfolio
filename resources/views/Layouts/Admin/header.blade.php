<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Dashboard &mdash; SI-{{ auth()->user()->nama }}</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Libraries -->
@stack('css-style')
<link rel="stylesheet" href="{{ url('Backend/node_modules/izitoast/dist/css/iziToast.min.css') }}">
<link rel="stylesheet" href="{{ url('Backend/node_modules/jqvmap/dist/jqvmap.min.css') }}">



<!-- Toastr -->
<script src="{{ url('Backend/node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>

<!-- Template CSS -->
<link rel="stylesheet" href="{{ url('Backend/assets/css/style.css') }}">
<link rel="stylesheet" href="{{ url('Backend/assets/css/components.css') }}">
