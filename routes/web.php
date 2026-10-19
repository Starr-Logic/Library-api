<?php

use App\Models\Author;
use App\Models\Book;
use App\Models\BookAuthor;
use App\Models\BookType;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $books = Book::with(['bookType', 'authors'])->orderBy('BookID')->get();
    return view('books', compact('books'));
})->name('books');

Route::get('/authors', function () {
    $authors = Author::with('books')->orderBy('AuthorID')->get();
    return view('authors', compact('authors'));
})->name('authors');

Route::get('/book-types', function () {
    $types = BookType::withCount('books')->orderBy('BookTypeID')->get();
    return view('book-types', compact('types'));
})->name('book-types');

Route::get('/book-authors', function () {
    $rows = BookAuthor::with(['book', 'author'])->orderBy('BookID')->get();
    return view('book-authors', compact('rows'));
})->name('book-authors');
