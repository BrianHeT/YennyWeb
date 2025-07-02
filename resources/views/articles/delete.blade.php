<?php
/** @var \App\Models\article $book */
?>
<x-layout>
    <x-slot:title> Detalle de la Noticia {{ $article->title }} </x-slot:title>

    <h1 class="mb-3" >Confirmacion para eliminar {{ $article->title }}</h1>

    <p class="mb-1">Estas a unto de <b>eliminar</b>  la noticia <b>{{ $article->title }}</b> </p>

    <p>¿Quieres proceder con la eliminacion?</p>

    <form
        action="{{ route('articles.destroy', ['id' => $article->article_id]) }}"
        class="mb-3"
        method="post"
    >
        @csrf
        @method('DELETE')

        <button type="submit" class="btn btn-danger" > Sì, eliminar {{ $article->title }}</button>

    </form>

    {{-- TODO: agregar la imagen de la portada --}}
    <dl>
        <dt>Contenido:</dt>
        <dd>${{ $article->content }}</dd>
        <dt>Fecha de publicacion</dt>
        <dd>{{ $article->created_at->format('d/m/Y H:i') }}</dd>
    </dl>

</x-layout>
