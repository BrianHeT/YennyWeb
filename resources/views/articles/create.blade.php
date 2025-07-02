<x-layout>
    <x-slot:title>Publicar una Noticia</x-slot:title>

    <h1 class="mb-3">Publicar una Noticia</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            La información ingresada contiene errores.
            Por favor, revisa los campos y prueba de nuevo.
        </div>
    @endif

    <form action="{{ route('articles.store') }}" method="post">
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
            <label for="content" class="form-label">Contenido</label>
            <textarea
                id="content"
                name="content"
                class="form-control @error('content') is-invalid @enderror"
                @error('content') aria-invalid="true" aria-errormessage="error-content" @enderror
                rows="5"
            >{{ old('content') }}</textarea>
            @error('content')
                <div id="error-content" class="text-danger">{{ $message }}</div>
            @enderror
        </div>



        <div class="mb-3">
            <label for="published_date" class="form-label">Fecha de Publicación</label>
            <input
                type="date"
                id="published_date"
                name="published_date"
                class="form-control"
                value="{{ old('published_date') }}"
            >
        </div>


        <button type="submit" class="btn btn-primary">Publicar</button>

    </form>


</x-layout>