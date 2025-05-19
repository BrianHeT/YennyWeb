<?php
/** @var \App\Models\book $book */
?>
<x-layout>
    <x-slot:title> Detalle de la Película {{ $book->title }} </x-slot:title>

    <h1 class="mb-3" >Confirmacion para eliminar {{ $book->title }}</h1>

    <p class="mb-1">Estas a unto de <b>eliminar</b>  la pelicula <b>{{ $book->title }}</b> </p>

    <p>¿Quieres proceder con la eliminacion?</p>

    <form
        action="{{ route('books.destroy', ['id' => $book->book_id]) }}"
        class="mb-3"
        method="post"
    >
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger" > Sì, eliminar {{ $book->title }}</button>

    </form>

    {{-- TODO: agregar la imagen de la portada --}}
    <dl>
        <dt>Precio:</dt>
        <dd>${{ $book->price }}</dd>
        <dt>Fecha de Estreno</dt>
        <dd>{{ $book->release_date }}</dd>
    </dl>

    <hr class="mb-3">

    <h2 class="mb-3">Sinopsis</h2>
    <div>{{ $book->synopsis }}</div>
</x-layout>
