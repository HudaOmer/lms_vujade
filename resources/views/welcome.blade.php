@extends('layouts.app')

@section('content')
<div class="flex-center position-ref full-height">
    <div class="content">
        
        <div class="title m-b-md">
            Library Management System
        </div>
        <h1>Welcome, Admin</h1>
        <p>Manage your books from here, you can add, delete and edit available books</p>
        <a href="{{ route('books.create') }}">Create a new book     </a>
        <br>
        <a href="{{ route('books.index') }}">View avalible books</a>
        <br>
        <p class="mssg">{{ session('mssg') }}</p>
    </div>
</div>
@endsection