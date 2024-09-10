<meta charset="utf-8" />
<title>SI Master - Portofolio</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />
<meta content="Portofolio Web" name="keywords" />
<meta content="Portofolio Web" name="description" />
@stack("meta")

<!-- Favicon -->
<link href="{{ url('Frontend/img/favicon.ico') }}" rel="icon" />

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
<link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap"
rel="stylesheet" />

<!-- Icon Font Stylesheet -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />


<!-- Libraries Stylesheet -->
<link href="{{ url('Frontend/lib/animate/animate.min.css') }}" rel="stylesheet" />
<link href="{{ url('Frontend/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet" />
<link href="{{ url('Frontend/lib/lightbox/css/lightbox.min.css') }}" rel="stylesheet" />
<!-- Customized Bootstrap Stylesheet -->
<link href="{{ url('Frontend/css/bootstrap.min.css') }}" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/themes/prism.min.css" rel="stylesheet" />


<script src="{{ url('Backend/node_modules/izitoast/dist/js/iziToast.min.js') }}"></script>
<!-- Template Stylesheet -->
<link href="{{ url('Frontend/css/style.css') }}" rel="stylesheet" />
<style>
.article-body a h5:hover {
color: black;
-webkit-text-fill-color: black;
-webkit-text-stroke: 1px var(--primary);
transition: all 0.3s ease-in-out;
}
.article {
border: 1px solid #ddd;
border-radius: 8px;
background-color: #f9f9f9;
margin-bottom: 20px;
padding: 15px;
display: flex;
flex-direction: column;
transition: all 0.3s ease-in-out;
}

.list-view .article {
flex-direction: row;
}

.article img {
max-width: 100%;
border-radius: 8px;
width: 100%;
/* Membuat gambar penuh lebar card */
height: auto;
object-fit: cover;
/* Menjaga rasio gambar */
}

.list-view .article img {
width: 150px;
height: auto;
margin-right: 20px;
}

.article-body {
flex-grow: 1;
}

.article-title {
font-size: 1.25rem;
margin-bottom: 10px;
}

.article-rating {
margin-bottom: 10px;
}

.article-meta {
margin-top: 10px;
}

.grid-view .article {
width: 37%;
margin-right: 1%;
}

.list-view .article {
width: 100%;
}

.article-category {
margin-right: 10px;
}

.rating {
color: #FFD700;
}

.view-toggle {
cursor: pointer;
}

.sidebar {
background-color: #f8f9fa;
padding: 15px;
border-radius: 8px;
}

.category-list .list-group-item.active {
background-color: #007bff;
border-color: #007bff;
}
</style>