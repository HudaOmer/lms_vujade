@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Show page {{ $book->name }}
        </div>
        <form action="{{ route('books.destroy', $book->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Remove This book</button>
        </form><br>
        @auth
        <form method="POST" action="{{ route('books.borrow', $book->id) }}">
            @csrf
            <button type="submit">Borrow Book</button>
        </form>
        @endauth
        <br><br>
        <a href="{{ route('books.index') }}" class="back"> <- back to all books</a>
    </div>
</div>
@endsection