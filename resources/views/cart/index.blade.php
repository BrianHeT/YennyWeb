<x-layout>
<x-slot:title>Carrito</x-slot:title>

<div class="container py-4">
    <h2>Mi Carrito</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @if($cartItems->isEmpty())
        <div class="text-center py-5">
            <p class="text-muted">No tenés libros en el carrito.</p>
            <a href="{{ route('books.index') }}" class="btn btn-primary">Ver Libros</a>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Cantidad</th>
                        <th>Precio Unitario</th>
                        <th>Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $item)
                        <tr>
                            <td>
                                @if($item->book->image)
                                    <img src="{{ asset('storage/' . $item->book->image) }}" 
                                         alt="{{ $item->book->title }}" 
                                         class="img-thumbnail" 
                                         style="width: 50px; height: 70px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('storage/default-book.png') }}" 
                                         alt="{{ $item->book->title }}" 
                                         class="img-thumbnail" 
                                         style="width: 50px; height: 70px; object-fit: cover;">
                                @endif
                            </td>
                            <td>
                                <strong>{{ $item->book->title }}</strong><br>
                                <small class="text-muted">{{ $item->book->author }}</small>
                            </td>
                            <td>
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('PATCH')
                                    <div class="input-group" style="width: 120px;">
                                        <input type="number" 
                                               name="cantidad" 
                                               value="{{ $item->cantidad }}" 
                                               min="1" 
                                               max="{{ $item->book->quantity }}" 
                                               class="form-control form-control-sm text-center">
                                        <button type="submit" class="btn btn-outline-secondary btn-sm">
                                            <i class="fas fa-sync"></i>
                                        </button>
                                    </div>
                                </form>
                                <small class="text-muted">Disponibles: {{ $item->book->quantity }}</small>
                            </td>
                            <td>${{ number_format($item->book->price, 2) }}</td>
                            <td><strong>${{ number_format($item->cantidad * $item->book->price, 2) }}</strong></td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" 
                                            onclick="return confirm('¿Estás seguro de eliminar este libro del carrito?')">
                                        <i class="fas fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="table-info">
                        <th colspan="4" class="text-end">Total del Carrito:</th>
                        <th><strong>${{ number_format($total, 2) }}</strong></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="text-end mt-3">
            <a href="{{ route('books.index') }}" class="btn btn-secondary me-2">Seguir Comprando</a>
            <button class="btn btn-success" onclick="alert('Funcionalidad de compra próximamente')">
                <i class="fas fa-credit-card"></i> Proceder al Pago
            </button>
        </div>
    @endif
</div>

<style>
    .table-responsive {
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }
    
    .table th {
        background-color: #f8f9fa;
        border-bottom: 2px solid #dee2e6;
    }
    
    .img-thumbnail {
        border-radius: 5px;
    }
    
    .input-group {
        margin-bottom: 5px;
    }
</style>
</x-layout>