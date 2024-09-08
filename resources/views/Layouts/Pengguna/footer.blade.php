<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ url('Frontend/lib/wow/wow.min.js') }}"></script>
<script src="{{ url('Frontend/lib/easing/easing.min.js') }}"></script>
<script src="{{ url('Frontend/lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ url('Frontend/lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('Frontend/lib/isotope/isotope.pkgd.min.js') }}"></script>
{{-- <script src="{{ url('Frontend/lib/lightbox/js/lightbox.min.js') }}"></script>
--}}
<script src="{{ url('Backend/assets/js/page/modules-toastr.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"></script>


<!-- Template Javascript -->
<script src="{{ url('Frontend/js/main.js') }}"></script>
@section('js-custom')
    <script>
        function loadArticles(category) {
            $.ajax({
                url: '{{ url('/get-article') }}', // URL untuk API yang mengembalikan artikel berdasarkan kategori
                method: 'GET',
                data: {
                    category: category
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: 'json',
                success: function(response) {
                    $('#articleContainer').empty(); // Kosongkan kontainer artikel sebelum memuat baru

                    response.articles.forEach(function(article) {
                        let articleHtml = `
  <div class="article">
  <img src="${article.gambar_url}" alt="Article Image" class="img img-thumbnail" width="100px" height="100px">
  <div class="article-body">
  <h5 class="article-title">${article.judul}</h5>
  <div class="article-rating">
  <span class="rating">
  </div>
  <div class="article-content">${article.short_content}</div>
  <div class="article-meta">
  <span class="badge bg-primary article-category">${article.category.nama_category}</span>
  <span class="text-muted">Published on: ${article.formatted_date}</span>
  </div>
  </div>
  </div>
  `;
                        $('#articleContainer').append(articleHtml);
                    });
                }
            });
        }
        // Ketika halaman dimuat, tampilkan semua artikel
        $(document).ready(function() {


            // Klik kategori
            $('.category-list .list-group-item').on('click', function() {

                let category = $(this).data('category');
                $('.category-list .list-group-item').removeClass('active');
                $(this).addClass('active');
                loadArticles(category); // Muat artikel berdasarkan kategori yang dipilih
            });

            // Toggle tampilan antara list dan grid view
            $('#listViewBtn').on('click', function() {

                $('#articleContainer').removeClass('grid-view').addClass('list-view');
                $(this).addClass('btn-outline-primary').removeClass('btn-outline-secondary');
                $('#gridViewBtn').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
            });

            $('#gridViewBtn').on('click', function() {

                $('#articleContainer').removeClass('list-view').addClass('grid-view');
                $(this).addClass('btn-outline-primary').removeClass('btn-outline-secondary');
                $('#listViewBtn').removeClass('btn-outline-primary').addClass('btn-outline-secondary');
            });
        });
    </script>
@endsection
