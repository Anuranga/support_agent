@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Create New Ticket</div>
                    <div class="card-body"> 
                        <form action="/support/1" method="get">
                            @csrf
                            <div class="form-group">
                                <label for="name">Search</label>
                                <input type="text" class="form-control" value="{{ old('search') }}" id="search" name="search">
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Search">
                        </form>
                        </br>
                        <form action="/support" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" value="{{old('name')}}" id="name" name="name">
                            </div>
                            <div class="form-group">
                                <label for="name">Email</label>
                                <input type="email" class="form-control" id="email" value="{{old('email')}}" name="email">
                            </div>
                            <div class="form-group">
                                <label for="name">Phone Number</label>
                                <input type="phone" class="form-control" id="phone" value="{{old('phone')}}" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description"  name="description" rows="5">
                                {{old('description')}}
                                </textarea>
                            </div>
                            <input class="btn btn-primary mt-4" type="submit" value="Create">
                        </form>
                        <a class="btn btn-primary float-right" href="/hobby"><i class="fas fa-arrow-circle-up"></i> Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection