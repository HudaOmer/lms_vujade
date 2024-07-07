@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Reports</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>User</th>
                                <th>Book</th>
                                <th>Reserve Date</th>
                                <th>Due Date</th>
                                <th>Return Date</th>
                                <th>Borrow Days</th>
                                <th>Exceeded Days</th>
                                <th>Cost</th>
                                <th>Fine Amount</th>
                                <th>Total Amount</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reports as $report)
                                <tr>
                                    <td>{{ $report->id }}</td>
                                    <td>{{ $report->user->name }}</td>
                                    <td>{{ $report->book->name }}</td>
                                    <td>{{ $report->reserve_date }}</td>
                                    <td>{{ $report->due_date }}</td>
                                    <td>{{ $report->return_date }}</td>
                                    <td>{{ $report->borrow_days }}</td>
                                    <td>{{ $report->exceeded_days }}</td>
                                    <td>{{ $report->cost }}</td>
                                    <td>{{ $report->fine_amount }}</td>
                                    <td>{{ $report->fine_amount + $report->cost}}</td>
                                    <td>
                                        <a href="{{ route('reports.show', $report->id) }}" class="btn btn-primary">View</a>
                                        <!-- Add more actions as needed -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection