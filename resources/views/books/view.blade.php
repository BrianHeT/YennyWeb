<?php
/** @var \App\Models\book $book */
?>
<x-layout>
    <x-slot:title> Detalle del libro {{ $book->title }} </x-slot:title>

    <h1 class="mb-3" >{{ $book->title }}</h1>
    @if ($book->image)
    <img src="{{ asset('storage/' . $book->image) }}" alt="{{ $book->title }}" style="max-width: 300px; height: auto;" class="mb-3">
@else
    <p class="mb-3">No hay portada disponible.</p>
@endif
    <dl>
        <dt>Precio:</dt>
        <dd>${{ $book->price }}</dd>
        <dt>Fecha de Publicacion</dt>
        <dd>{{ $book->release_date }}</dd>
        <dt>Formato del libro</dt>
        <dd>{{$book->format}}</dd>
        <dt>Editorial</dt>
        <dd>{{$book->editorial}}</dd>
        <dt>Autor</dt>
        <dd>{{$book->author}}</dd>
    </dl>

    <hr class="mb-3">

    <h2 class="mb-3">Sinopsis</h2>
    <div>{{ $book->synopsis }}</div>
</x-layout>
