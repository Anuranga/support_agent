@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">View Tickets</div>
                    <div class="card-body">
                    <table id="dtBasicExample" class="table table-striped table-bordered table-sm">
                    <thead>
                    <tr>
                        <th>Customer Name</th>
                        <th>Description</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>View</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                    
                    <tr class="$class">
                        <td>{{ $ticket->customer_name }}</td>
                        <td>{{ $ticket->problem_description }}</td>
                        <td>{{ $ticket->email }}</td>
                        <td>{{ $ticket->phone_number }}</td>
                        <td><a class="btn btn-sm btn-primary" href="/support/{{ $ticket->id }}/edit">View</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                        <a class="btn btn-primary float-right" href="{{ URL::previous() }}" ><i class="fas fa-arrow-circle-up"></i> Home</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-3"> 
            {{ $tickets->links() }}
        </div>
    </div>
@endsection
