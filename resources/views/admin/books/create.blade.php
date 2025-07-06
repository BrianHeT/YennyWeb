<x-layout>

    <x-slot:title>Publicar un Libro</x-slot:title>

    <h1 class="mb-3"> Publicar un Libro</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            La informacion ingresada contiene errores.
            Por favor, revisa los campos y prueba de nuevo
        </div>
    @endif

    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input
                type="text"
                id="title"
                name="title"
                class="form-control @error('title') is-invalid @enderror"
                @error('title') aria-invalid="true" aria-errormessage="error-title" @enderror
                value="{{ old('title') }}"
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
                value="{{ old('price') }}"
            >
            @error('price')
                <div id="error-price" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="release_date" class="form-label">Fecha de Estreno</label>
            <input
                type="date"
                id="release_date"
                name="release_date"
                class="form-control"
                value="{{ old('release_date') }}"
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
            <textarea name="synopsis" id="synopsis" class="form-control">{{ old('synopsis') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Portada del Libro</label>
            <input
                type="file"
                name="image"
                id="image"
                class="form-control @error('image') is-invalid @enderror" 
                @error('image') aria-invalid="true" aria-errormessage="error-image" @enderror 
                accept="image/*" 
            >
            @error('image') 
                <div id="error-image" class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <fieldset class="mb3">
            <legend>Géneros</legend>
            @foreach($genres as $genre)
            <label class="me-3">
                <input type="checkbox" name="genre_id[]" value="{{ $genre->genre_id }}" @checked(in_array($genre->genre_id,old('genre_id',[])))>
                {{ $genre->name }}
            </label>
            @endforeach
        </fieldset>

        <button type="submit" class="btn btn-primary">Publicar</button>

    </form>


</x-layout>
