<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Book[] $books */
?>

<x-layout>
    <x-slot:title>Lista de Libros</x-slot:title>

    <h1 class="mb-4">Listado de Libros</h1>
    @auth

        <p class="mb-3"> <a href="{{ route('books.create') }}">Publicar un Libro</a></p>

    @endauth

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Precio</th>
                <th>Fecha de Publicacion</th>
                <th>Formato de Libro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->book_id }}</td>
            <td>{{ $book->title }}</td>
            <td>{{ $book->price }}</td>
            <td>{{ $book->release_date }}</td>
            <td>{{ $book->format }}</td>

            <td class="align-top">
                <div class="d-flex gap-2">
                    <a href="{{ route('books.view', ['id' => $book->book_id]) }}"
                        class="btn btn-primary"
                    >Ver</a>

                    @auth
                        <a  href={{ route('books.edit', ['id' => $book->book_id ]) }}
                            class="btn btn-secondary"
                        >Editar </a>

                        <a  href={{ route('books.delete', ['id' => $book->book_id ]) }}
                            class="btn btn-danger"
                        >Eliminar </a>
                    @endauth

                </div>
            </td>
        </tr>
        @endforeach
    </table>

</x-layout>
