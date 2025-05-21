<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage; // Importa la clase Storage

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('Books.index', [
            'books' => $books
        ]);
    }

    public function view(int $id)
    {
        return view('books.view', [
            'book' => Book::findOrFail($id)
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:2',
            'price' => 'required|numeric',
            'release_date' => 'required',
            'format' => 'required',
            'editorial' => 'required',
            'author' => 'required',
            'synopsis' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // La imagen es opcional
        ], [
            'title.required' => 'el título debe tener un valor',
            'title.min' => 'El titulo debe tener al menos :min caracteres',
            'price.required' => 'el precio debe tener un valor',
            'price.numeric' => 'el precio debe ser un valor numerico',
            'format.required' => 'el formato debe tener un valor',
            'editorial.required' => 'la editorial debe tener un valor',
            'author.required' => 'el autor debe tener un valor',
            'image.image' => 'El archivo debe ser una imagen.', // Mensaje específico para el tipo de archivo
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
            $path = $image->storeAs('public', $filename); // Guarda la imagen en storage/app/public
            $input['image'] = $filename; // Asigna el nombre del archivo al array input
        }

        Book::create($input); // Crea el libro con los datos, incluyendo el nombre de la imagen (o null)

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
        // Elimina la imagen asociada antes de eliminar el registro del libro
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
            'book' => Book::findOrFail($id)
        ]);
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'title' => 'required|min:2',
            'price' => 'required|numeric',
            'release_date' => 'required',
            'format' => 'required',
            'editorial' => 'required',
            'author' => 'required',
            'synopsis' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // La imagen es opcional
        ], [
            'title.required' => 'el título debe tener un valor',
            'title.min' => 'El titulo debe tener al menos :min caracteres',
            'price.required' => 'el precio debe tener un valor',
            'price.numeric' => 'el precio debe ser un valor numerico',
            'format.required' => 'el formato debe tener un valor',
            'editorial.required' => 'la editorial debe tener un valor',
            'author.required' => 'el autor debe tener un valor',
            'image.image' => 'El archivo debe ser una imagen.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg, gif.',
            'image.max' => 'La imagen no debe exceder los 2MB.',
        ]);

        $book = Book::findOrFail($id);
        $input = $request->except('image'); // Obtén todos los datos excepto el archivo de imagen

        // Mantén la imagen existente por defecto, o establece a null si no hay una nueva y no había antes
        $input['image'] = $book->image; // Asume la imagen actual

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

        $book->update($input); // Actualiza el libro con los datos, incluyendo el nombre de la imagen (o null)

        return redirect()
            ->route('books.index')
            ->with('feedback.message', 'El libro ' . e($book->title) . ' se actualizó exitosamente');
    }
}
