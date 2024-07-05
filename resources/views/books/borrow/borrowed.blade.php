@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            index page
        </div>
        <p class="mssg">{{ session('mssg') }}</p>
        <h3>Books thar are currently borrowed by you:</h3>
        <br>
        @foreach($borrowedBooks as $book)
        <ul><a href="{{ route('books.details', $book->id) }}">{{ $book->name }}</a> - {{ $book->language }} - {{ $book->edition }} - {{ $book->author }} - {{ $book->shelf_number }} - {{ $book->category }}</ul>
        <p>Borrowed: {{ $book->pivot->reserve_date }}</p>
        <p>Due: {{ $book->pivot->due_date }}</p>
      
        
        @endforeach
 
        <br>
        <!-- <a href="{{ route('books.create') }}">Create a new book</a>
        <br> -->
        <a href="{{ route('books.list') }}" class="back"> <- back to listed books</a>
    </div>
    
</div>
@endsection