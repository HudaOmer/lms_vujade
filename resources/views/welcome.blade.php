@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Library Management System
        </div>
        <a href="{{ route('books.create') }}">Create a new book     </a>
        <a href="{{ route('books.index') }}">View avalible books</a>
        <p class="mssg">{{ session('mssg') }}</p>
    </div>
</div>
@endsection