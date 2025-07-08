<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Article;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function index()
{
    $books = Book::all();
    $articles = Article::all();
    $users = User::all();

    



    return view('admin.index', compact('books', 'articles', 'users'));
}

}

