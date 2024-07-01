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
        </form>
        <br>
        <a href="{{ route('books.index') }}" class="back"> <- back to all books</a>
    </div>
</div>
@endsection