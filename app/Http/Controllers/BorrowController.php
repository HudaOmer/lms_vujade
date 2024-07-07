<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;

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
            // Decrement the quantity of the book after borrow
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

     /**
     * Handle returning a borrowed book.
     *
     * @param  int  $id The ID of the book to return
     * @return \Illuminate\Http\RedirectResponse
     */
    public function return($id)
    {
        // Retrieve the authenticated user
        $user = auth()->user();

        // Find the book by its ID
        $book = Book::findOrFail($id);

        // Check if the user has borrowed the book
        $hasBorrowed = $user->books()->where('book_id', $book->id)->exists();

        // Find the pivot record for the user and book
        $book = $user->books()->withPivot('created_at', 'reserve_date', 'due_date')->where('book_id', $book->id)->first();
        if (!$hasBorrowed) {
            // Redirect back with an error message if user hasn't borrowed the book
            return Redirect::route('books.list')->with('mssg', 'You have not borrowed this book');
        }  // Get the current date as the return date

        $return_date = now();
    
        // Logic to return the book (update pivot table with return_date)
        $user->books()->updateExistingPivot($book->id, ['return_date' => $return_date]);
//
        

        // Calculate borrow days
        $reserveDate = Carbon::parse($book->pivot->reserve_date);
        $returnDate = Carbon::parse($return_date);
        $borrowDays = $returnDate->diffInDays($reserveDate);

        // Calculate exceeded days and fine amount if due date is passed
        $dueDate = Carbon::parse($book->pivot->due_date);
        $exceededDays = $returnDate->greaterThan($dueDate) ? $returnDate->diffInDays($dueDate) : 0;
        $cost = $borrowDays * 0.1;
        $fineAmount = $exceededDays * 1;

        // Save data to reports table
        Report::create([
            'user_id' => $user->id,
            'book_id' => $book->id,
            'reserve_date' => $book->pivot->reserve_date,
            'return_date' => $returnDate,
            'due_date' => $book->pivot->due_date,
            'borrowDays' => $borrowDays,
            'exceeded_days' => $exceededDays,
            'cost' => $cost,
            'fine_amount' => $fineAmount,
        ]);
//

        // Logic to return the book (detach the book from the user)
        $user->books()->detach($book->id);
        // Add to the database
        // Increment the quantity of the book after return
        $book->increment('quantity');

        // Redirect back with success message indicating book returned successfully
        return Redirect::route('books.list')->with('mssg', 'Book returned successfully');
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
        // Get the authenticated user
        $user = auth()->user(); 
        // $bookUser = $user->books()->wherePivot('user_id', $user->id)->get();
        $borrowedBooks = $user->books()->withPivot('created_at', 'reserve_date', 'due_date')->get();
        // $user->books()->wherePivot('user_id', $user->id)->first()->pivot;
        
        return view('books.borrow.borrowed', compact('user', 'borrowedBooks'));
    }

     /**
     * Show the details of a book with a given id.
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function details($id)
    {
        // Retrieve the book by its ID
        $book = Book::findOrFail($id);
        // Get the authenticated user
        $user = auth()->user();

        // Check if the authenticated user has borrowed the book
        $hasBorrowed = $user->books()->where('book_id', $book->id)->exists();

        return view('books.borrow.details', compact('book', 'hasBorrowed'));
    }

}