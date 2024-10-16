<!-- General JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
    integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
    integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="{{ url('Backend/assets/js/stisla.js') }}"></script>

<!-- JS Libraies -->
<script src="{{ url('Backend/node_modules/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ url('Backend/node_modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>

<script src="{{ url('Backend/node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
<script>
    $(".modal-backdrop").remove();
</script>

<!-- Template JS File -->
<script src="{{ url('Backend/assets/js/scripts.js') }}"></script>
<script src="{{ url('Backend/assets/js/custom.js') }}"></script>
@stack('script-js')
<script src="{{ url('Backend/assets/js/page/modules-toastr.js') }}"></script>

<!-- Page Specific JS File -->
{{-- <script src="{{ url('Backend/assets/js/page/index-0.js') }}"></script> --}}
<script type="module" src="{{ url('Backend/assets/js/indexMyJs.js') }}"></script>
