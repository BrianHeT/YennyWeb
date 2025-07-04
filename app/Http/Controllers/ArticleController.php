<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::latest()->paginate(10);

        return view('articles.index', [
            'articles' => $articles
        ]);
    }

    public function view(int $id)
    {
        return view('articles.view', [
            'article' => Article::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        //title', 'content', 'author','published_date'
        $request->validate([
            'title'         => 'required|min:2',
            'content'       => 'required|min:50',
            'author'        => 'required',
        ], [
            'title.required'    => 'El título del artículo es obligatorio.',
            'title.min'         => 'El título debe tener al menos :min caracteres.',
            'title.max'         => 'El título no debe exceder los :max caracteres.',
            'content.required'  => 'El contenido del artículo es obligatorio.',
            'content.min'       => 'El contenido debe tener al menos :min caracteres.',
            'author.required'   => 'El nombre del autor es obligatorio.',
        ]);

        $input = $request->all();

        article::create($input);



        return redirect()
            ->route('articles.index')
            ->with('feedback.message', 'La noticia ' . e($input['title']) . ' se guardo exitosamente');
    }

    public function delete(int $id)
    {
        return view('articles.delete', [
            'article' => article::findOrFail($id)
        ]);
    }

    public function destroy(int $id)
    {
        $article = article::findOrFail($id);
        $article->delete($id);

        return redirect()
            ->route('articles.index')
            ->with('feedback.message', 'La noticia <b> ' . e($article->title) . ' </b> se elimino exitosamente');
    }

    public function edit(int $id)
    {
        return view('articles.edit', [
            'article' => article::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id)
    {

        $request->validate([
            'title'         => 'required|min:2',
            'content'       => 'required|min:50',
            'author'        => 'required',
        ], [
            'title.required'    => 'El título del artículo es obligatorio.',
            'title.min'         => 'El título debe tener al menos :min caracteres.',
            'title.max'         => 'El título no debe exceder los :max caracteres.',
            'content.required'  => 'El contenido del artículo es obligatorio.',
            'content.min'       => 'El contenido debe tener al menos :min caracteres.',
            'author.required'   => 'El nombre del autor es obligatorio.',
        ]);

        $article = article::findOrFail($id);

        $article->update($request->all());

        return redirect()
            ->route('articles.index')
            ->with('feedback.message', 'La noticia ' . e($article->title) . ' se guardo exitosamente');
    }
}
