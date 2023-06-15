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
    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Service Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $service->name) }}">
        </div>
        <div class="mb-3">
            <label for="icon_url" class="form-label">Icon</label>
            <input type="text" class="form-control" id="icon_url" name="icon_url" value="{{ old('icon_url', $service->icon_url) }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection