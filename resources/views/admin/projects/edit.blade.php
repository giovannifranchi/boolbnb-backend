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
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Project Title</label>
                <input type="text" class="form-control" id="title" name="title"
                    value="{{ old('title', $project->title) }}">
            </div>
            <div class="mb-3">
                <label for="summary" class="form-label">Summary</label>
                <textarea class="form-control" id="summary" name="summary">{{ old('summary', $project->summary) }}</textarea>
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="handle-image"
                    @checked($project->image) value="1" name="set_image">
                <label class="form-check-label" for="handle-image">Handle Image</label>
            </div>
            <div id="image-wrapper">
                {{-- fill preview --}}
                <div class="mb-3  @if(!$project->image) d-none @endif" id="file-wrapper">
                    <img @if($project->image) src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" @endif id="image-field">
                </div>
                {{-- fill preview --}}

                <div class="mb-3">
                    <label for="formFile" class="form-label">Image</label>
                    <input class="form-control" type="file" id="image" value="image" name="image">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
