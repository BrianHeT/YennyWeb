<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('Books.index',[
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
            'title'         => 'required|min:2',
            'price'         => 'required|numeric',
            'release_date'  => 'required',
            'format'        =>  'required',
            'editorial'     =>  'required',
            'author'         =>  'required',
            'synopsis'      => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'title.required'    => 'el título debe tener un valor',
            'title.min'         => 'El titulo debe tener al menos :min caracteres',
            'price.required'    => 'el precio debe tener un valor',
            'price.numeric'     => 'el precio debe ser un valor numerico',
            'format.required'   =>  'el formato debe tener un valor',
            'edutiruak.required' => 'la editorial debe tener un valor',
            'author.required'    => 'el autor debe tener un valor',
            'image' => 'La imagen debe ser un archivo de tipo imagen y no debe exceder los 2MB',
        ]);

        $input = $request->all();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public', $filename); 
            $input['image'] = $filename;
        }


        Book::create($input);

        

        return redirect()
            ->route('books.index')
            ->with('feedback.message', 'El libro '. e($input['title']) .' se guardo exitosamente');

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
        $book->delete($id);

        return redirect()
            ->route('books.index')
            ->with('feedback.message', 'El libro <b> '. e($book->title) .' </b> se elimino exitosamente');


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
            'title'         => 'required|min:2',
            'price'         => 'required|numeric',
            'release_date'  => 'required',
            'format'        =>  'required',
            'editorial'     =>  'required',
            'author'         =>  'required',
            'synopsis'      => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ], [
            'title.required'    => 'el título debe tener un valor',
            'title.min'         => 'El titulo debe tener al menos :min caracteres',
            'price.required'    => 'el precio debe tener un valor',
            'price.numeric'     => 'el precio debe ser un valor numerico',
            'format.required'   =>  'el formato debe tener un valor',
            'edutiruak.required' => 'la editorial debe tener un valor',
            'author.required'    => 'el autor debe tener un valor',
            'image' => 'La imagen debe ser un archivo de tipo imagen y no debe exceder los 2MB',
        ]);

        $book = Book::findOrFail($id);

        $book->update($request->all());

        if ($request->hasFile('image')) {
            
            if ($book->image) {
                Storage::delete('public/' . $book->image); 
            }
            $image = $request->file('image');
            $filename = uniqid() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public', $filename); 
            $input['image'] = $filename; 
        }

        return redirect()
            ->route('books.index')
            ->with('feedback.message', 'El libro '. e($book->title) .' se guardo exitosamente');

    }
}
