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
    <form action="{{  }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Tag Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $tag->name) }}">
        </div>
        <div class="mb-3">
            <label for="icon_path" class="form-label">Icon</label>
            <input type="text" class="form-control" id="icon_path" name="icon_path" value="{{ old('icon_path', $tag->icon_path) }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection