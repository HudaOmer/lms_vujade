@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            index page
        </div>
        <p class="mssg">{{ session('mssg') }}</p>
        @foreach($books as $book)
        <ul><a href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a> - {{ $book->language }} - {{ $book->edition }} - {{ $book->author }} - {{ $book->shelf_number }} - {{ $book->category }}</ul>
        @endforeach
        <br>
        <a href="{{ route('welcome') }}" class="back"> <- back to home</a>
        <a href="{{ route('books.create') }}">Create a new book</a>
        
    </div>
    
</div>
@endsection