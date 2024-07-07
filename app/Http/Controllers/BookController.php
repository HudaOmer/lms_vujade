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
     * 
     * @return: view of index that shows all books
     *         present in the database
     */
    public function index() {

        $books = Book::all(); // Retrieve all books
        $user = auth()->user(); // Get the authenticated user (or null if not authenticated)
        
        return view('books.index', compact('books', 'user'));

    }

    /**
     * show - an action that renders a view
     * 
     * @param $id: variable taken fron the url '/books/{id}'
     * @return: view of index that shows a specific book
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
     * 
     * @return: view of index that creates a book
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
            'quantity' => 'required|int'
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
        $book->quantity = $validatedData['quantity'];

        // Set timestamps
        $book->created_at = now();
        $book->updated_at = now();

        // Save the book to the database
        $book->save();

        // Redirect with a success message
        return Redirect::route('welcome')->with('mssg', 'Book was added successfully.');
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
     * Display a form to edit the details of a specific book.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        // Find the book by its ID; throw 404 error if not found
        $book = Book::findOrFail($id);

        // Return the view for editing with the book data
        return view('books.edit', compact('book'));
    }

    /**
     * Update the details of a specific book.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        // Find the book by its ID; throw 404 error if not found
        $book = Book::findOrFail($id);
        
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'publisher' => 'required|string|max:255',
            'language' => 'required|string|max:255',
            'edition' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'shelf_number' => 'required|string|max:255',
            'quantity' => 'required|integer',
            // Add validation rules for other fields as needed
        ]);

        // Update the book model with the validated data
        $book->name = $request->name;
        $book->author = $request->author;
        $book->publisher = $request->publisher;
        $book->language = $request->language;
        $book->edition = $request->edition;
        $book->category = $request->category;
        $book->shelf_number = $request->shelf_number;
        $book->quantity = $request->quantity;
        // Update other fields as needed
        
        // Save the updated book details to the database
        $book->save();

        // Redirect back to the book details page with a success message
        return redirect()->route('books.show', ['id' => $book->id])->with('mssg', 'Book updated successfully.');
    }

}
