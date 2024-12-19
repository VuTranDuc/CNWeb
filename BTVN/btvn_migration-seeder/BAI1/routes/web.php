<?php

use App\Http\Controllers\booksController;
use Illuminate\Support\Facades\Route;

Route::get("/", [booksController::class, "index"])->name("books.index");
Route::get('/books/create', [booksController::class, 'create'])->name('books.create');
Route::post('/books', [booksController::class, 'store'])->name('books.store');
Route::get('/books/{id}', [booksController::class, 'show'])->name('books.show');
Route::get('/books/{id}/edit', [booksController::class, 'edit'])->name('books.edit');
Route::put('/books/{id}', [booksController::class, 'update'])->name('books.update');
Route::delete('/books/{id}', [booksController::class, 'destroy'])->name('books.destroy');
