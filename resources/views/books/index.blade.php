@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            index page
        </div>
        <p class="mssg">{{ session('mssg') }}</p>
        <h3>Select a book to edit, delete or just  to view its details:</h3>
        <br>
        @foreach($books as $book)
        <ul><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a> - {{ $book->language }} - {{ $book->edition }} - {{ $book->author }} - {{ $book->shelf_number }} - {{ $book->category }}</ul>
        @endforeach
        <br>
        <a href="{{ route('books.create') }}">Create a new book</a>
        <br>
        <a href="{{ route('welcome') }}" class="back"> <- back to home</a>
    </div>
    
</div>
@endsection