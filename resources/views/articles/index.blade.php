<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Article[] $articles */
use Illuminate\Support\Str;
?>

<x-layout>
    <x-slot:title>Novedades/Noticias</x-slot:title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1>Novedades de esta semana</h1>
            @auth
                <p>
                    <a href="{{ route('articles.create') }}" class="btn btn-success">Publicar una Noticia</a>
                </p>
            @endauth

            <!-- Input de búsqueda para filtrar tarjetas -->
            <div class="mb-4">
                <input type="text" id="search-input" class="form-control w-50 mx-auto" placeholder="Buscar noticia...">
            </div>
        </div>

        <!-- Grid de Cards -->
        <div class="row" id="article-cards">
            @forelse ($articles as $article)
                @if ($article->image)
                    <!-- Card con imagen -->
                    <div class="col-md-4 mb-5 article-card" data-title="{{ strtolower($article->title) }}">
                        <div class="card h-100 shadow-sm advanced-card">
                            <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">
                                    <strong>Fecha:</strong> {{ $article->created_at->format('d/m/Y H:i') }}<br>
                                    <strong>Autor:</strong> {{ $article->author }}
                                </p>
                                <p class="card-text">
                                    <strong>Contenido:</strong> {{ Str::limit($article->content, 100) }}
                                </p>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-center">
                                <button class="btn btn-primary btn-view mb-2" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#articleModal" 
                                        data-article='@json($article)'>Ver</button>
                                @auth
                                    <div class="btn-group">
                                        <a href="{{ route('articles.edit', ['id' => $article->article_id]) }}" class="btn btn-secondary btn-sm">Editar</a>
                                        <form action="{{ route('articles.destroy', ['id' => $article->article_id]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar esta noticia?')">Eliminar</button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Card alternativa para artículo sin imagen -->
                    <div class="col-md-4 mb-5 article-card" data-title="{{ strtolower($article->title) }}">
                        <div class="card h-100 shadow-sm no-photo-card">
                            <div class="card-body text-center">
                                <div class="no-photo-icon mb-3">
                                    <!-- Ícono representativo para artículos sin foto -->
                                    <i class="fas fa-newspaper fa-3x" style="color: #067038;"></i>
                                </div>
                                <h5 class="card-title">{{ $article->title }}</h5>
                                <p class="card-text">
                                    <strong>Fecha:</strong> {{ $article->created_at->format('d/m/Y H:i') }}<br>
                                    <strong>Autor:</strong> {{ $article->author }}
                                </p>
                                <p class="card-text">
                                    <strong>Contenido:</strong> {{ Str::limit($article->content, 100) }}
                                </p>
                            </div>
                            <div class="card-footer bg-white border-top-0 text-center">
                                <button class="btn btn-primary btn-view mb-2" 
                                        data-bs-toggle="modal" 
                                        data-bs-target="#articleModal" 
                                        data-article='@json($article)'>Ver</button>
                                @auth
                                    <div class="btn-group">
                                        <a href="{{ route('articles.edit', ['id' => $article->article_id]) }}" class="btn btn-secondary btn-sm">Editar</a>
                                        <form action="{{ route('articles.destroy', ['id' => $article->article_id]) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('¿Estás seguro de que deseas eliminar esta noticia?')">Eliminar</button>
                                        </form>
                                    </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                @endif
            @empty
                <div class="col-12 text-center">No hay noticias publicadas aún.</div>
            @endforelse
        </div>
        {{ $articles->links() }}
    </div>

    <!-- Modal para mostrar detalle de la noticia -->
    <div class="modal fade" id="articleModal" tabindex="-1" aria-labelledby="articleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="articleModalLabel">Detalle de la Noticia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <img id="modal-article-img" src="" alt="" class="img-fluid mb-3">
                    <h5 id="modal-article-title"></h5>
                    <p id="modal-article-details"></p>
                    <p id="modal-article-content" class="mt-3"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle y Scripts Personalizados -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Filtrado dinámico de tarjetas de artículos
        document.getElementById('search-input').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let cards = document.querySelectorAll('.article-card');
            cards.forEach(function(card) {
                let title = card.getAttribute('data-title');
                card.style.display = title.includes(filter) ? '' : 'none';
            });
        });

        // Modal: rellenar datos al abrir
        var articleModal = document.getElementById('articleModal');
        articleModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var articleData = button.getAttribute('data-article');
            if(articleData) {
                var article = JSON.parse(articleData);
                // Imagen
                var modalImg = article.image 
                    ? "{{ asset('storage') }}/" + article.image 
                    : "{{ asset('storage/default-article.png') }}";
                document.getElementById('modal-article-img').src = modalImg;
                // Título
                document.getElementById('modal-article-title').textContent = article.title;
                // Detalles
                var details = "Fecha: " + new Date(article.created_at).toLocaleString() + "\nAutor: " + article.author;
                document.getElementById('modal-article-details').textContent = details;
                // Contenido completo
                document.getElementById('modal-article-content').textContent = article.content;
            }
        });
    </script>
    
    <style>
        /* Efectos y transiciones para el card con imagen */
        .advanced-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 15px;
            overflow: hidden;
        }
        .advanced-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        }
        /* Estilo para cards sin imagen */
        .no-photo-card {
            background-color: #f7f7f7;
            border-radius: 15px;
            padding: 20px;
        }
        .no-photo-icon i {
            /* Puedes ajustar el color y tamaño del ícono */
            font-size: 3rem;
        }
        /* Separación extra entre cards */
        .article-card {
            padding: 0 15px;
        }
        /* Botón "Ver" personalizado y centrado */
        .btn-view {
            font-weight: bold;
            border-radius: 25px;
            padding: 8px 25px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .btn-view:hover,
        .btn-view:focus {
            background-color: #067038;
            transform: translateY(-2px);
        }
    </style>
</x-layout>
