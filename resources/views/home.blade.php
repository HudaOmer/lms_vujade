@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
            <br><br>
            <div class="alert alert-success" role="alert">
                <a class="dropdown-item" href="{{ route('books.list') }}">View avalible books</a>
                <br>
                <a class="dropdown-item" href="{{ route('books.borrowed') }}">View currently borrowed books</a>
                <br>
                <a class="dropdown-item" href="{{ route('reports.index') }}">View reports</a>
            </div>

        </div>
    </div>
</div>
@endsection
