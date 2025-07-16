<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Book[] $books */
use Illuminate\Support\Str;
?>

<x-layout>
    <x-slot:title>Lista de Libros</x-slot:title>

    <div class="container py-5">
        <!-- Encabezado -->
        <div class="text-center mb-5">
            <h1>Listado de Libros</h1>
            @auth
            @if(auth()->user()->is_admin)
                <p>
                    <a href="{{ route('books.create') }}" class="btn btn-success">Publicar un Libro</a>
                </p>
                @endif
            @endauth

            <!-- Input de búsqueda para filtrar tarjetas -->
            <div class="mb-4">
                <input type="text" id="search-input" class="form-control w-50 mx-auto" placeholder="Buscar libro...">
            </div>
        </div>

        <!-- Grid de Cards tipo Tienda -->
        <div class="row" id="book-cards">
            @foreach ($books as $book)
                <div class="col-md-4 mb-5 book-card" data-title="{{ strtolower($book->title) }}">
                    <div class="card h-100 shadow-sm advanced-card">
                        @if ($book->image)
                            <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->title }}">
                        @else
                            <img src="{{ asset('storage/default-book.png') }}" class="card-img-top" alt="{{ $book->title }}">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $book->title }}</h5>
                            <p class="card-text">
                                <strong>Precio:</strong> ${{ $book->price }}<br>
                                <strong>Publicado:</strong> {{ $book->release_date }}<br>
                                <strong>Formato:</strong> {{ $book->format }}<br>
                                <strong>Disponibles:</strong> 
                                <span class="badge {{ $book->quantity > 0 ? 'bg-success' : 'bg-danger' }}">
                                    {{ $book->quantity }} unidades
                                </span>
                            </p>
                            <p class="card-text">
                                <strong>Géneros:</strong>
                                @foreach ($book->genres as $genre)
                                    <span class="badge bg-secondary">{{ $genre->name }}</span>
                                @endforeach
                            </p>
                            <p class="card-text">
                                <strong>Sinopsis:</strong> {{ Str::limit($book->synopsis, 100) }}
                            </p>
                        </div>
                        <div class="card-footer bg-white border-top-0 text-center">
                            <!-- Botón "Ver" centrado y estilizado -->
                            <button class="btn btn-primary btn-view mb-2" 
                                data-bs-toggle="modal" 
                                data-bs-target="#bookModal" 
                                data-book='@json($book)'>Ver</button>
                            
                            @auth
                            @if(!auth()->user()->is_admin)
                                <!-- Formulario para agregar al carrito -->
                                @if($book->quantity > 0)
                                    <form action="{{ route('cart.add', $book->book_id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <div class="input-group input-group-sm mb-2" style="max-width: 150px; margin: 0 auto;">
                                            <input type="number" name="cantidad" value="1" min="1" max="{{ $book->quantity }}" class="form-control text-center">
                                            <button type="submit" class="btn btn-success btn-sm">
                                                <i class="fas fa-cart-plus"></i> Agregar
                                            </button>
                                        </div>
                                    </form>
                                @else
                                    <p class="text-danger small">Sin Stock</p>
                                @endif
                            @endif
                            @endauth

                            @auth
                            @if(auth()->user()->is_admin)
                                <div class="btn-group">
                                    <a href="{{ route('books.edit', ['id' => $book->book_id]) }}" class="btn btn-secondary btn-sm">Editar</a>
                                    <a href="{{ route('books.delete', ['id' => $book->book_id]) }}" class="btn btn-danger btn-sm">Eliminar</a>
                                </div>
                                @endif
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div><!-- /.row -->
    </div><!-- /.container -->

    <!-- Modal para mostrar detalles del libro -->
    <div class="modal fade" id="bookModal" tabindex="-1" aria-labelledby="bookModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="bookModalLabel">Detalle del Libro</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
              </div>
              <div class="modal-body">
                  <img id="modal-book-img" src="" alt="" class="img-fluid mb-3">
                  <h5 id="modal-book-title"></h5>
                  <p id="modal-book-details"></p>
                  <p id="modal-book-synopsis" class="mt-3 mb-0"></p>
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
        // Filtrado dinámico de cards
        document.getElementById('search-input').addEventListener('keyup', function() {
            let filter = this.value.toLowerCase();
            let cards = document.querySelectorAll('.book-card');
            cards.forEach(function(card) {
                let title = card.getAttribute('data-title');
                card.style.display = title.includes(filter) ? '' : 'none';
            });
        });

        // Modal: Rellenar datos del libro al abrir
        var bookModal = document.getElementById('bookModal');
        bookModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var bookData = button.getAttribute('data-book');
            if(bookData) {
                var book = JSON.parse(bookData);
                // Configuración de la imagen
                var modalImg = book.image 
                    ? "{{ asset('storage') }}/" + book.image 
                    : "{{ asset('storage/default-book.png') }}";
                document.getElementById('modal-book-img').src = modalImg;
                // Título
                document.getElementById('modal-book-title').textContent = book.title;
                // Detalles
                var details = "Precio: $" + book.price + "\nPublicado: " + book.release_date + "\nFormato: " + book.format + "\nDisponibles: " + book.quantity + " unidades";
                document.getElementById('modal-book-details').textContent = details;
                // Sinopsis completa
                document.getElementById('modal-book-synopsis').textContent = "Sinopsis: " + book.synopsis;
            }
        });
    </script>
    
    <style>
        /* Advanced CSS para diseño tipo tienda */
        .advanced-card {
            transition: transform 0.3s, box-shadow 0.3s;
            border-radius: 15px;
            overflow: hidden;
        }
        .advanced-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }
        /* Separación extra entre cards */
        .book-card {
            padding: 0 15px;
        }
        /* Botón "Ver" centrado y estilizado */
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