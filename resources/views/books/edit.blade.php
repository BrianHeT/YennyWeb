<?php
    $genreIds = $book->genres->pluck('genre_id')->all();
?>
<x-layout>

    <x-slot:title>Editar el libro {{ $book->title }}</x-slot:title>

    <h1 class="mb-3"> Editar {{ $book->title }}</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            La informacion ingresada contiene errores.
            Por favor, revisa los campos y prueba de nuevo
        </div>
    @endif

    <form action="{{ route('books.update', ['id' => $book->book_id]) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-control @error('title') is-invalid @enderror"
                @error('title') aria-invalid="true" aria-errormessage="error-title" @enderror
                value="{{ old('title', $book->title) }}"
            >
            @error('title')
                <div id="error-title" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input
                type="text"
                id="price"
                name="price"
                class="form-control @error('price') is-invalid @enderror"
                @error('price') aria-invalid="true" aria-errormessage="error-price" @enderror
                value="{{ old('price', $book->price) }}"
            >
            @error('price')
                <div id="error-price" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="quantity" class="form-label">Cantidad en Stock</label>
            <input
                type="number"
                id="quantity"
                name="quantity"
                class="form-control @error('quantity') is-invalid @enderror"
                @error('quantity') aria-invalid="true" aria-errormessage="error-quantity" @enderror
                value="{{ old('quantity', 0) }}"
                min="0"
            >
            @error('quantity')
                <div id="error-quantity" class="text-danger">{{ $message }}</div>
            @enderror
            <div class="form-text">Ingresa la cantidad de libros disponibles en el inventario</div>
        </div>
        
        <div class="mb-3">
            <label for="release_date" class="form-label">Fecha de Estreno</label>
            <input
                type="date"
                id="release_date"
                name="release_date"
                class="form-control"
                value="{{ old('release_date', $book->release_date) }}"
            >
        </div>

        <div class="mb-3">
            <label for="format" class="form-label">Tipo de Formato</label>
            <input
                type="text"
                id="format"
                name="format"
                class="form-control @error('format') is-invalid @enderror"
                @error('format') aria-invalid="true" aria-errormessage="error-format" @enderror
                value="{{ old('format') }}"
            >
            @error('format')
                <div id="error-format" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="editorial" class="form-label">Editorial</label>
            <input
                type="text"
                id="editorial"
                name="editorial"
                class="form-control @error('editorial') is-invalid @enderror"
                @error('editorial') aria-invalid="true" aria-errormessage="error-editorial" @enderror
                value="{{ old('editorial') }}"
            >
            @error('editorial')
                <div id="error-editorial" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="author" class="form-label">Autor</label>
            <input
                type="text"
                id="author"
                name="author"
                class="form-control @error('author') is-invalid @enderror"
                @error('author') aria-invalid="true" aria-errormessage="error-author" @enderror
                value="{{ old('author') }}"
            >
            @error('author')
                <div id="error-author" class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="synopsis" class="form-label">Sinopsis</label>
            <textarea name="synopsis" id="synopsis" class="form-control">{{ old('synopsis', $book->synopsis) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Portada del Libro</label>
            <input
                type="file"
                name="image"
                id="image"
                class="form-control @error('image') is-invalid @enderror" {{-- ¡AGREGADO! --}}
                @error('image') aria-invalid="true" aria-errormessage="error-image" @enderror {{-- ¡AGREGADO! --}}
                accept="image/*" {{-- ¡RECOMENDADO! --}}
            >
            @error('image') {{-- ¡AGREGADO! --}}
                <div id="error-image" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cover_description" class="form-label">
                Descripcion de la Portada <span class="small" >(Opcional)</span>
            </label>
            <input type="text" name="cover_description" id="cover_description" class="form-control">
        </div>

        <fieldset class="mb3">
            <legend>Géneros</legend>
            @foreach($genres as $genre)
            <label class="me-3">
                <input type="checkbox" name="genre_id[]" value="{{ $genre->genre_id }}" 
                @checked(in_array($genre->genre_id, old('genre_id',[])))>
                {{ $genre->name }}
            </label>
            @endforeach
        </fieldset>

        <button type="submit" class="btn btn-primary">Aplicar Cambios</button>

    </form>


</x-layout>
