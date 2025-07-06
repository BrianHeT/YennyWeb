<x-layout>
    <x-slot:title>Novedades/Noticias</x-slot:title>

    <h1 class="mb-4">Novedades de esta semana</h1>

    @auth
        <p class="mb-3">
            <a href="{{ route('admin.articles.create') }}" class="btn btn-success">Publicar una Noticia</a>
        </p>
    @endauth

    @if(session('feedback.message'))
        <div class="alert alert-success">
            {{ session('feedback.message') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Fecha de Publicación</th>
                    <th>Autor</th> <th>Contenido</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article) <tr>
                        <td>{{ $article->article_id }}</td> <td>{{ $article->title }}</td>
                        <td>{{ $article->created_at->format('d/m/Y H:i') }}</td> <td>{{ $article->author }}</td>
                        <td>{{ Str::limit($article->content, 100) }}</td> <td class="align-top">
                            <div class="d-flex gap-2">
                                <a href="{{ route('articles.view', ['id' => $article->article_id]) }}" class="btn btn-primary"
                                >Ver</a>
                                @auth
                                    <a  href="{{ route('articles.edit', ['id' => $article->article_id ]) }}" class="btn btn-secondary"
                                    >Editar</a>
                                    <form action="{{ route('articles.destroy', ['id' => $article->article_id ]) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta noticia?')">
                                            Eliminar
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay noticias publicadas aún.</td> </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $articles->links() }} </x-layout>
    