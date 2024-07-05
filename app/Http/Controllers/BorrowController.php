<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class BorrowController extends Controller
{
   
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
        try {
            $user->books()->attach($book->id, [
                'created_at' => now(),
                'reserve_date' => $request->reserve_date,
                'due_date' => $request->due_date
            ], $user->id);
            $book->decrement('quantity');
            return Redirect::route('books.list')->with('mssg', 'Book borrowed successfully.');}
        catch (QueryException $error) {
            return Redirect::route('books.list')->with('mssg', ' Book already borrowed.');
        }catch (\Exception $error) {
            return Redirect::route('books.list')->with('mssg', ' Book already borrowed.');
        }catch (\Throwable $error) {
            return Redirect::route('books.list')->with('mssg', ' Book already borrowed.');
        }
    }

    public function return(Request $request, $id)
    {
        // Logic to return a book by a user
    }

    /**
     * Show all books available to borrow
     * 
     * @return all books available
     */
    public function list()
    {
        $books = Book::all();
        return view('books.borrow.list', compact('books'));
    }
    
    /**
     * List the books that the user has borroed
     * 
     * @return all borrowed books
     */
    public function borrowed()
    {
        $user = auth()->user(); // Get the authenticated user
        // $bookUser = $user->books()->wherePivot('user_id', $user->id)->get();
        $borrowedBooks = $user->books()->withPivot('created_at', 'reserve_date', 'due_date')->get();
        // $user->books()->wherePivot('user_id', $user->id)->first()->pivot;
        
        return view('books.borrow.borrowed', compact('user', 'borrowedBooks'));
    }

    /**
     * Show the details of a book with a given id
     * 
     * @param int $id 
     * @return the details of the book
     */
    public function details($id)
    {
        $book = Book::findOrFail($id);
        return view('books.borrow.details', compact('book'));
    }
}