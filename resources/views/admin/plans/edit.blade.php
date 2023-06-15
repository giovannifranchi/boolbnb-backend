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
    <form action="{{ route('admin.plans.update', $plan) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Plan Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $plan->name) }}">
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Plan Duration</label>
            <input type="text" class="form-control" id="duration" name="duration" value="{{ old('duration', $plan->duration) }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Plan Price</label>
            <input type="text" class="form-control" id="price" name="price" value="{{ old('price', $plan->price) }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection