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

Route::get('libros/{id}', [\App\Http\Controllers\BookController::class, 'view'])
    ->name('books.view')
    ->whereNumber('id');

Route::get('libros/publicar', [\App\Http\Controllers\BookController::class, 'create'])
    ->name('books.create')
    ->middleware('auth');

Route::post('libros/publicar', [\App\Http\Controllers\BookController::class, 'store'])
    ->name('books.store')
    ->middleware('auth');

Route::get('libros/{id}/eliminar', [\App\Http\Controllers\BookController::class, 'delete'])
    ->name('books.delete')
    ->whereNumber('id')
    ->middleware('auth');

Route::delete('libros/{id}/eliminar', [\App\Http\Controllers\BookController::class, 'destroy'])
    ->name('books.destroy')
    ->whereNumber('id')
    ->middleware('auth');

Route::get('libros/editar/{id}', [\App\Http\Controllers\BookController::class, 'edit'])
    ->name('books.edit')
    ->whereNumber('id')
    ->middleware('auth');

Route::put('libros/editar/{id}', [\App\Http\Controllers\BookController::class, 'update'])
    ->name('books.update')
    ->whereNumber('id')
    ->middleware('auth');

Route::get('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'login'])
    ->name('auth.login');

Route::post('iniciar-sesion', [\App\Http\Controllers\AuthController::class, 'authenticate'])
    ->name('auth.authenticate');

Route::post('/cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'logout'])
    ->name('auth.logout');