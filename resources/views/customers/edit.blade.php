@extends('layouts.app')

@section('content')
    <h1>Edit Customer</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $customer->name }}">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="form-group">
            <label for="surname">Surname:</label>
            <input type="text" name="surname" id="surname" class="form-control @error('surname') is-invalid @enderror" value="{{ $customer->surname }}" >
            @error('surname')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        </div>

        <div class="form-group">
            <label for="tel">Tel:</label>
            <input type="text" name="tel" id="tel" class="form-control @error('tel') is-invalid @enderror" value="{{ $customer->tel }}" >
            @error('tel')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        </div>

        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ $customer->address }}" >
            @error('address')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        </div>

        <div class="form-group">
            <label for="birthdate">Birthdate:</label>
            <input type="date" name="birthdate" id="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ $customer->birthdate }}"" >
            @error('birthdate')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
        