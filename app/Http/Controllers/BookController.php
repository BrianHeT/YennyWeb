<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage; 
use App\Models\Genre;

class BookController extends Controller
{
    public function index()
    {
        $allBooks = Book::with(['genres'])->get();

        return view('Books.index', [
            'books' => $allBooks
        ]);
    }

    public function view(Book $book)
    {
        return view('books.view', [
            'book' => $book
        ]);
    }

    public function create()
    {
        return view('books.create',[
            'genres' => Genre::orderBy('name')->get(),
        ]);
    }

    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|min:2',
        'price' => 'required|numeric',
        'quantity' => 'required|integer|min:0',
        'release_date' => 'required',
        'format' => 'required',
        'editorial' => 'required',
        'author' => 'required',
        'synopsis' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'title.required' => 'el título debe tener un valor',
        'title.min' => 'El titulo debe tener al menos :min caracteres',
        'price.required' => 'el precio debe tener un valor',
        'price.numeric' => 'el precio debe ser un valor numerico',
        'quantity.required' => 'la cantidad debe tener un valor',
        'quantity.integer' => 'la cantidad debe ser un número entero',
        'quantity.min' => 'la cantidad no puede ser negativa',
        'format.required' => 'el formato debe tener un valor',
        'editorial.required' => 'la editorial debe tener un valor',
        'author.required' => 'el autor debe tener un valor',
        'image.image' => 'El archivo debe ser una imagen.',
        'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif.',
        'image.max' => 'La imagen no debe exceder los 2MB.',
    ]);

    // Obtén todos los datos del request, excluyendo el archivo de imagen por ahora
    $input = $request->except('image');

    // Inicializa el campo 'image' a null por si no se sube ninguna imagen
    $input['image'] = null;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $filename = uniqid() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('public', $filename);
        $input['image'] = $filename;
    }

    // Crear el libro
    $book = Book::create($input);
    
    // Asociar géneros si existen
    if ($request->has('genre_id')) {
        $book->genres()->attach($request->input('genre_id'));
    }

    return redirect()
        ->route('books.index')
        ->with('feedback.message', 'El libro ' . e($input['title']) . ' se guardó exitosamente');
}

    public function delete(int $id)
    {
        return view('books.delete', [
            'book' => Book::findOrFail($id)
        ]);
    }

    public function destroy(int $id)
    {
        $book = Book::findOrFail($id);
        
        $book->genres()->detach();
        $book->delete($id);

        if ($book->image) {
            Storage::delete('public/' . $book->image);
        }
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('feedback.message', 'El libro <b> ' . e($book->title) . ' </b> se eliminó exitosamente');
    }

    public function edit(int $id)
    {
        return view('books.edit', [
            'book' => Book::findOrFail($id),
            'genres' => Genre::orderBy('name')->get(),

        ]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
        'title' => 'required|min:2',
        'price' => 'required|numeric',
        'quantity' => 'required|integer|min:0',
        'release_date' => 'required',
        'format' => 'required',
        'editorial' => 'required',
        'author' => 'required',
        'synopsis' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ], [
        'title.required' => 'el título debe tener un valor',
        'title.min' => 'El titulo debe tener al menos :min caracteres',
        'price.required' => 'el precio debe tener un valor',
        'price.numeric' => 'el precio debe ser un valor numerico',
        'quantity.required' => 'la cantidad debe tener un valor',
        'quantity.integer' => 'la cantidad debe ser un número entero',
        'quantity.min' => 'la cantidad no puede ser negativa',
        'format.required' => 'el formato debe tener un valor',
        'editorial.required' => 'la editorial debe tener un valor',
        'author.required' => 'el autor debe tener un valor',
        'image.image' => 'El archivo debe ser una imagen.',
        'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif.',
        'image.max' => 'La imagen no debe exceder los 2MB.',
    ]);

        $book = Book::findOrFail($id);
        $input = $request->except('image'); 

        $input['image'] = $book->image; 


        if ($request->hasFile('image')) {
            // Elimina la imagen anterior si existe
            if ($book->image) {
                Storage::delete('public/' . $book->image);
            }
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public', $filename);
            $input['image'] = $filename; // Asigna el nombre de la nueva imagen
        } else if ($request->input('clear_image')) { // Opcional: si tienes un checkbox para eliminar la imagen
            if ($book->image) {
                Storage::delete('public/' . $book->image);
            }
            $input['image'] = null;
        }

        $book->update($request->all());
        $book->genres()->sync($request->input('genre_id'));

        $book->update($input); 

        return redirect()
            ->route('books.index')
            ->with('feedback.message', 'El libro ' . e($book->title) . ' se actualizó exitosamente');
    }
}
