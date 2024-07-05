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
        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Remove This book</button>
        </form><br>
        <br><br>
        <a href="{{ route('books.index') }}" class="back"> <- back to all books</a>
    </div>
</div>
@endsection