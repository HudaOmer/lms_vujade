<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Controllers For Books
$path = '/admin';
Route::get($path.'/books', [BookController::class, 'index'])->name('books.index'); // Show all books
Route::get($path.'/books/create', [BookController::class, 'create'])->name('books.create');
Route::get($path.'/books/{id}', [BookController::class, 'show'])->name('books.show'); // Show a specific book
Route::post($path.'/books/{id}/borrow', [BookController::class, 'borrow'])->name('books.borrow'); // Borrow a book
Route::post($path.'/books', [BookController::class, 'store'])->name('books.store');
Route::delete($path.'/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
