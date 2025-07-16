<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CartItem;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with('book')
            ->where('user_id', Auth::id())
            ->get();

        // Calcular total
        $total = $cartItems->sum(function($item) {
            return $item->cantidad * $item->book->price;
        });

        return view('cart.index', compact('cartItems', 'total'));
    }

    public function add(Request $request, $bookId)
    {
        // Validar la cantidad
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $book = Book::where('book_id', $bookId)->firstOrFail();
        $cantidadSolicitada = $request->cantidad;

        // Verificar si ya existe el item en el carrito
        $existingItem = CartItem::where('user_id', Auth::id())
                               ->where('book_id', $bookId)
                               ->first();

        $cantidadEnCarrito = $existingItem ? $existingItem->cantidad : 0;
        $cantidadTotal = $cantidadEnCarrito + $cantidadSolicitada;

        // Verificar stock disponible
        if ($cantidadTotal > $book->quantity) {
            $disponible = $book->quantity - $cantidadEnCarrito;
            if ($disponible <= 0) {
                return redirect()->back()->with('error', 'No hay más stock disponible para este libro.');
            }
            return redirect()->back()->with('error', "Solo puedes agregar {$disponible} unidades más de este libro.");
        }

        // Agregar o actualizar el item en el carrito
        if ($existingItem) {
            $existingItem->increment('cantidad', $cantidadSolicitada);
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'book_id' => $bookId,
                'cantidad' => $cantidadSolicitada,
            ]);
        }

        return redirect()->back()->with('success', "{$cantidadSolicitada} unidad(es) de '{$book->title}' agregadas al carrito.");
    }

    public function remove($id)
    {
        $item = CartItem::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        $bookTitle = $item->book->title;
        $item->delete();

        return redirect()->route('cart.index')->with('success', "'{$bookTitle}' eliminado del carrito.");
    }

    public function updateQuantity(Request $request, $id)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1'
        ]);

        $item = CartItem::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        $book = $item->book;
        $nuevaCantidad = $request->cantidad;

        // Verificar stock disponible
        if ($nuevaCantidad > $book->quantity) {
            return redirect()->back()->with('error', "Solo hay {$book->quantity} unidades disponibles de '{$book->title}'.");
        }

        $item->update(['cantidad' => $nuevaCantidad]);

        return redirect()->back()->with('success', 'Cantidad actualizada correctamente.');
    }
}