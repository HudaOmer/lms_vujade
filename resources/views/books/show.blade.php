@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Show page {{ $book->name }}
        </div>
        <form action="/books/{{ $book->id }}" method="POST">
            @csrf
            @method('DELETE')
            <button>Remove This book</button>
        </form>
    </div>
</div>
@endsection