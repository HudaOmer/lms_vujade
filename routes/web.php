<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


// Controllers For Books
$path = '/admin';
Route::get($path.'/books', [BookController::class, 'index'])->name('books.index'); // Show all books
Route::get($path.'/books/create', [BookController::class, 'create'])->name('books.create');
Route::get($path.'/books/{id}', [BookController::class, 'show'])->name('books.show'); // Show a specific book
Route::post($path.'/books', [BookController::class, 'store'])->name('books.store');
Route::delete($path.'/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
Route::get($path.'books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
Route::put($path.'books/{id}', [BookController::class, 'update'])->name('books.update');


// Controllers For Auth
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/home'); // Change the redirect path as needed
})->name('logout');


// Controllers For Borrow and return Processes
$userpath = '/user';
Route::middleware(['auth:sanctum'])->group(function () use ($userpath) {
Route::get($userpath.'/books', [BorrowController::class, 'list'])->name('books.list');
Route::get($userpath.'/books/borrowed', [BorrowController::class, 'borrowed'])->name('books.borrowed');
Route::get($userpath.'/books/{id}', [BorrowController::class, 'details'])->name('books.details');
Route::post($userpath.'/books/{id}/borrow', [BorrowController::class, 'borrow'])->name('books.borrow'); // Borrow a book
Route::post($userpath.'/books/{id}/return', [BorrowController::class, 'return'])->name('books.return');
});


// Define routes for ReportController
Route::middleware(['auth:sanctum'])->group(function () use ($userpath) {
Route::get($userpath.'/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get($userpath.'/reports/{id}', [ReportController::class, 'show'])->name('reports.show');
// Route::post($userpath.'/reports', [ReportController::class, 'store'])->name('reports.store');
});