<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{

    /**
     * index - an action that renders a view
     * Return: view of index that shows all books
     *         present in the database
     */
    public function index() {
        return view('books.index');
    }

    /**
     * show - an action that renders a view
     * @$id: variable taken fron the url '/books/{id}'
     * Return: view of index that shows a specific book
     *         present in the database
     */
    public function show($id) {
        return view('books.show', [
            'id' => $id
        ]);
    }

    /**
     * create - an action that renders a view
     * Return: view of index that creates a book
     *         and store into the database
     */
    public function create() {
        return view('books.create');
    }

}
