<?php
/** @var \App\Models\article $book */
?>

<x-layout>
    <x-slot:title>Detalle de la Noticia: {{ $article->title }}</x-slot:title>

    <h1 class="mb-3">{{ $article->title }}</h1>
    {{-- TODO: agregar la imagen destacada --}}
    <dl>
        <dt>Contenido:</dt>
        <dd>{{ $article->content }}</dd>
        <dt>Fecha de Publicación:</dt>
        <dd>{{ $article->created_at->format('d/m/Y H:i') }}</dd>
        <dt>Autor:</dt>
        <dd>{{ $article->author }}</dd>
    </dl>

    <hr class="mb-3">

</x-layout>