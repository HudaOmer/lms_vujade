<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{

    /**
     * index - an action that renders a view
     * Return: view of index that shows all books
     *         present in the database
     */
    public function index() {

        $books = Book::all(); // Retrieve all books
        $user = auth()->user(); // Get the authenticated user (or null if not authenticated)
        
        return view('books.index', compact('books', 'user'));

    }

    /**
     * show - an action that renders a view
     * @$id: variable taken fron the url '/books/{id}'
     * Return: view of index that shows a specific book
     *         present in the database
     */
    public function show($id) {

        $book = Book::findOrFail($id);

        return view('books.show', [
            'book' => $book
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string',
            'author' => 'required|string',
            'publisher' => 'required|string',
            'language' => 'required|string',
            'edition' => 'nullable|string',
            'category' => 'required|string',
            'shelf_number' => 'required|string',
        ]);

        // Create a new Book instance
        $book = new Book();
        $book->name = $validatedData['name'];
        $book->author = $validatedData['author'];
        $book->publisher = $validatedData['publisher'];
        $book->language = $validatedData['language'];
        $book->edition = $validatedData['edition'];
        $book->category = $validatedData['category'];
        $book->shelf_number = $validatedData['shelf_number'];

        // Set timestamps
        $book->created_at = now();
        $book->updated_at = now();

        // Save the book to the database
        $book->save();

        // Redirect with a success message
        return Redirect::route('welcome')->with('mssg', 'Book added successfully.');
    }
    
    /**
     * Remove the specified book from storage.
     *
     * @param  int  $id  // The ID of the book to be deleted
     * @return \Illuminate\Http\RedirectResponse  // Redirects to the list of books
     */
    public function destroy($id)
    {
        // Find the book by its ID; if not found, throw an exception
        $book = Book::findOrFail($id);

        // Delete the book from the database
        $book->delete();

        // Redirect to the list of books after successful deletion
        return Redirect::route('books.index')->with('mssg', 'Book deleted successfully.');
    }

    /**
     * Borrow the specified book from storage.
     *
     * @param int $id
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse  // Redirects to the list of books
     */
    public function borrow($id, Request $request)
    {
        // Logic to handle borrowing a book
        $book = Book::findOrFail($id);
        $user = auth()->user(); // Assuming user is authenticated
        $user->books()->attach($book->id, ['reserve_date' => now()], $user->id);

        return Redirect::route('books.index')->with('mssg', 'Book borrowed successfully.');
    }
}
