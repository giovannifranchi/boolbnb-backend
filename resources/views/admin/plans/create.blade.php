@extends('layouts.auth')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')
    <div class="container mt-3">
        <form action="{{ route('admin.plans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Plan Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="duration" class="form-label">Duration Plan</label>
                <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration') }}">
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price Plan</label>
                <input type="text" class="form-control" id="price" name="price" value="{{ old('price') }}">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
