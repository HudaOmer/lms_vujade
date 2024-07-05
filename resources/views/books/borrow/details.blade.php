@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Book Details
        </div>
        <h1>{{ $book->name }}</h1>
        <br>
        <h5>Author: {{ $book->author }}</h5>
        <h5>Language: {{ $book->language }}</h5>
        <h5>Publisher: {{ $book->publisher }}</h5>
        <h5>Edition:{{ $book->edition }}</h5>
        <h5>Shelf number: {{ $book->shelf_number }}</h5>
        <h5>Category: {{ $book->category }}</h5>
        <br>
        @if ($book->quantity > 0)
            @auth
            <form method="POST" action="{{ route('books.borrow', $book->id) }}">
                @csrf
                <div class="form-group">
                    <label for="reserve_date">Borrow Date:</label>
                    <input type="date" id="reserve_date" name="reserve_date" required>
                </div>
                <div class="form-group">
                    <label for="due_date">Return Date:</label>
                    <input type="date" id="due_date" name="due_date" required>
                </div>
                <button type="submit">Borrow Book</button>
            </form>
            @endauth
        @else
            <p>Currently out of stock</p>
            @endif
        <br><br>
        <a href="{{ route('books.borrowed') }}">View borrowed books</a>
        <br>
        <a href="{{ route('books.list') }}" class="back"> <- back to book list</a>
    </div>
</div>
    
           
           
@endsection