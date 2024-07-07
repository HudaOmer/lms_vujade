@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Report Details</div>

                <div class="card-body">
                    <p><strong>ID:</strong> {{ $report->id }}</p>
                    <p><strong>User:</strong> {{ $report->user->name }}</p>
                    <p><strong>Book:</strong> {{ $report->book->name }}</p>
                    <p><strong>Reserve Date:</strong> {{ $report->reserve_date }}</p>
                    <p><strong>Due Date:</strong> {{ $report->due_date }}</p>
                    <p><strong>Return Date:</strong> {{ $report->return_date }}</p>
                    <p><strong>Borrow Days:</strong> {{ $report->borrow_days }}</p>
                    <p><strong>Exceeded Days:</strong> {{ $report->exceeded_days }}</p>
                    <p><strong>Cost:</strong> {{ $report->cost }}</p>
                    <p><strong>Fine Amount:</strong> {{ $report->fine_amount }}</p>
                    <p><strong>Total Amount:</strong> {{ $report->fine_amount + $report->cost}}</p>
                    
                    <a href="{{ route('reports.index') }}" class="btn btn-secondary">Back to Reports</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection