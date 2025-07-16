<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [\App\Http\Controllers\HomeController::class, 'home'])
    ->name('home');

Route::get('/quienes-somos', [\App\Http\Controllers\HomeController::class, 'about'])
    ->name('about');

Route::get('libros/listado', [\App\Http\Controllers\BookController::class, 'index'])
    ->name('books.index');



Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('auth.login');

Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'authenticate'])
    ->name('auth.authenticate');

Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');

Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create'])
    ->name('register');

Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'register'])
    ->name('register.store');

    Route::get('novedades/lista', [\App\Http\Controllers\ArticleController::class, 'index'])
    ->name('articles.index');

Route::get('novedades/{id}', [\App\Http\Controllers\ArticleController::class, 'view'])
    ->name('articles.view')
    ->whereNumber('id');



Route::get('libros/{id}', [\App\Http\Controllers\BookController::class, 'view'])
    ->name('books.view')
    ->whereNumber('id');

Route::get('libros/publicar', [\App\Http\Controllers\BookController::class, 'create'])
    ->name('books.create')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);


Route::post('libros/publicar', [\App\Http\Controllers\BookController::class, 'store'])
    ->name('books.store')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::get('libros/{id}/eliminar', [\App\Http\Controllers\BookController::class, 'delete'])
    ->name('books.delete')
    ->whereNumber('id')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::delete('libros/{id}/eliminar', [\App\Http\Controllers\BookController::class, 'destroy'])
    ->name('books.destroy')
    ->whereNumber('id')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::get('libros/editar/{id}', [\App\Http\Controllers\BookController::class, 'edit'])
    ->name('books.edit')
    ->whereNumber('id')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::put('libros/editar/{id}', [\App\Http\Controllers\BookController::class, 'update'])
    ->name('books.update')
    ->whereNumber('id')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::get('novedades/publicar', [\App\Http\Controllers\ArticleController::class, 'create'])
    ->name('articles.create')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::post('novedades/publicar', [\App\Http\Controllers\ArticleController::class, 'store'])
    ->name('articles.store')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::get('novedades/{id}/eliminar', [\App\Http\Controllers\ArticleController::class, 'delete'])
    ->name('articles.delete')
    ->whereNumber('id')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::delete('novedades/{id}/eliminar', [\App\Http\Controllers\ArticleController::class, 'destroy'])
    ->name('articles.destroy')
    ->whereNumber('id')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::get('novedades/editar/{id}', [\App\Http\Controllers\ArticleController::class, 'edit'])
    ->name('articles.edit')
    ->whereNumber('id')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::put('novedades/editar/{id}', [\App\Http\Controllers\ArticleController::class, 'update'])
    ->name('articles.update')
    ->whereNumber('id')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);

Route::get('dashboard', [\App\Http\Controllers\AdminController::class, 'index'])
    ->name('dashboard')
    ->middleware(['auth', \App\Http\Middleware\IsAdmin::class]);



    Route::get('users', [\App\Http\Controllers\UserController::class, 'index'])
    ->name('users.index');

    Route::get('users/{id}/edit-role', [\App\Http\Controllers\UserController::class, 'editRole'])
    ->name('users.editRole')
    ->middleware('auth');


    Route::put('users/{id}/update-role', [\App\Http\Controllers\UserController::class, 'updateRole'])
    ->name('users.updateRole')
    ->middleware('auth');

    Route::get('/carrito', [\App\Http\Controllers\CartController::class, 'index'])->name('cart.index');
    Route::post('/carrito/agregar/{bookId}', [\App\Http\Controllers\CartController::class, 'add'])->name('cart.add');
    Route::delete('/carrito/eliminar/{id}', [\App\Http\Controllers\CartController::class, 'remove'])->name('cart.remove');
    Route::patch('/carrito/actualizar/{id}', [\App\Http\Controllers\CartController::class, 'updateQuantity'])->name('cart.update');

Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');

