@extends('layouts.app')

@section('content')
    <h1>Welcome </h1>

    <div class="mb-3">
        <form action="{{ route('customers.search') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit">Search</button>
                </div>
            </div>
        </form>
    </div>

    <div class="mb-3">
        <a href="{{ route('customers.create') }}" class="btn btn-success">Add Customer</a>
    </div>

   
@endsection
