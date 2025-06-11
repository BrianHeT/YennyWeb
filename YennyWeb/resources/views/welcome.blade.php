<x-layout>
    <x-slot:title>Bienvenido</x-slot:title>

    <!-- Estilos -->


    <!-- Hero Section -->
   <section class="hero-section position-relative">
    <div class="overlay position-absolute top-0 start-0 w-100 h-100"></div>
    <div class="content position-relative text-center container">
        <h1 class="display-4 text-white animate-slideIn">Bienvenido a tu rincón literario</h1>
        <p class="lead text-white animate-fadeIn delay-1">Explora las páginas de increíbles historias y déjate inspirar por cada palabra.</p>
        
        <!-- Sección "Regalo de Libros" -->
        <div class="book-gift animate-popIn delay-2  mx-auto">
            <p class="fs-5">¡Disfruta nuestras iconicas aventuras!</p>
            <div class="book-slider d-flex justify-content-center mt-4">
                <img src="{{ asset('storage/la_vegetariana.jpg') }}" alt="Libro 1" class="mx-1">
<img src="{{ asset('storage/mi_nombre_es_emilia_del_valle.jpg') }}" alt="Libro 2" class="mx-1">
<img src="{{ asset('storage/amanecer_en_la_cosecha.jpg') }}" alt="Libro 3" class="mx-1">

            </div>
        </div>
        <x-nav-link route="books.index">
                            <span class="btn btn-discover btn-lg mt-3 animate-popIn delay-3">Comienza tu viaje </span>
        </x-nav-link>
    </div>
</section>
 <!-- Bloque de Texto Inspirador -->
   <section class="inspirational-text py-5 text-white text-center">
    <div class="container custom-inspiration">
        <h2 class="mb-4 animate-slideIn">Descubre el poder de las palabras</h2>
        <p class="lead animate-fadeIn delay-1">
            Cada página es una invitación a soñar despierto, a adentrarte en mundos inesperados y a transformar la realidad con la magia de la lectura. Permítete sentir, explorar y volar con cada historia.
        </p>
    </div>
</section>

    <!-- Carrusel de Imágenes -->
  <!-- Carrusel de Imágenes -->
<div id="carouselExample" class="carousel slide my-5" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('storage/amanecer_en_la_cosecha.jpg') }}" 
                 class="d-block mx-auto" 
                 alt="Imagen: Amanecer en la Cosecha">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/el_buen_mal.jpg') }}" 
                 class="d-block mx-auto" 
                 alt="Imagen: El Buen Mal">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('storage/este_dolor_no_es_mio.jpg') }}" 
                 class="d-block mx-auto" 
                 alt="Imagen: Este dolor no es mío">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
</div>


    <!-- Sección de Recomendaciones (Libros Destacados) -->
    <section class="featured-books trans-bg py-5 ">
        <div class="container ">
            <h2 class="text-center mb-5 animate-fadeIn">Recomendaciones destacadas</h2>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 animate-popIn delay-1">
                    <div class="book-card p-3 bg-white shadow-sm rounded">
                        <img src="{{ asset('storage/este_dolor_no_es_mio.jpg') }}" class="img-fluid rounded mb-3" alt="Libro: Una historia que te atrapará">
                        <h3 class="h5">Una historia que te atrapará</h3>
                        <p>Descubre un relato envolvente y vive cada emoción.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 animate-popIn delay-2">
                    <div class="book-card p-3 bg-white shadow-sm rounded">
                        <img src="{{ asset('storage/la_casa_neville_3.jpg') }}" class="img-fluid rounded mb-3" alt="Libro: Lectura para cada momento">
                        <h3 class="h5">Lectura para cada momento</h3>
                        <p>Elige el libro perfecto para acompañarte.</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 animate-popIn delay-2">
                    <div class="book-card p-3 bg-white shadow-sm rounded">
                        <img src="{{ asset('storage/1003w-jdoF4S6t0P4.webp') }}" class="img-fluid rounded mb-3" alt="Libro: Lectura para cada momento">
                        <h3 class="h5">Amores de verano</h3>
                        <p>Adentrate en la historia inmersiva del amor.</p>
                    </div>
                </div>
                <!-- Puedes agregar más cards según lo requieras -->
            </div>
        </div>
    </section>

    <!-- Sección adicional: Libros, Experiencias y Cuentos -->
    <section class="info-section py-5 text-white">
        <div class="container">
            <h2 class="text-center mb-4 animate-slideIn">Descubre más sobre nuestras historias</h2>
            <div class="row">
                <div class="col-md-4 animate-fadeIn delay-1">
                    <h3 class="h5">Libros Inspiradores</h3>
                    <p>Sumérgete en un universo de libros que te llevarán a descubrir mundos llenos de imaginación, conocimiento y emociones únicas.</p>
                </div>
                <div class="col-md-4 animate-fadeIn delay-2">
                    <h3 class="h5">Experiencias Literarias</h3>
                    <p>Vive momentos inolvidables a través de relatos y crónicas que transforman la lectura en un viaje de sentimientos profundos y enriquecedores.</p>
                </div>
                <div class="col-md-4 animate-fadeIn delay-3">
                    <h3 class="h5">Cuentos para Soñar</h3>
                    <p>Déjate llevar por cuentos que invitan a soñar, a reflexionar y a revivir la magia que solo las palabras pueden transmitir.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Scripts -->
    <!-- Bootstrap Bundle con Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Nuestro script avanzado (crea o ajusta public/js/script.js para más interactividad) -->
    <script src="{{ asset('js/script.js') }}"></script>
</x-layout>
