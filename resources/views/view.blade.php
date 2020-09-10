@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">View Ticket</div>
                    <div class="card-body">
                        <form action="/support/{{ $tickets->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" readonly class="form-control" value="{{ $tickets->customer_name }}" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" readonly class="form-control" id="email" value="{{ $tickets->email }}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="name">Phone Number</label>
                                <input type="phone" readonly class="form-control" id="phone" value="{{ $tickets->phone_number }}" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea readonly class="form-control" id="description" name="description" rows="5">
                                {{ $tickets->problem_description }}
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="description">Reply</label>
                                <textarea class="form-control" id="reply" name="reply" rows="5">
                                </textarea>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Reply">
                        </form>
                        <a class="btn btn-primary float-right" href="/"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection