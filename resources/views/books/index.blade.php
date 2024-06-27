@extends('layouts.layout')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            index page
        </div>
        <p class="mssg">{{ session('mssg') }}</p>
        @foreach($books as $book)
        <ul>{{ $book->name }} - {{ $book->language }} - {{ $book->edition }} - {{ $book->author }} - {{ $book->shelf_number }} - {{ $book->category }}</ul>
        @endforeach
    </div>
    
    
</div>
@endsection