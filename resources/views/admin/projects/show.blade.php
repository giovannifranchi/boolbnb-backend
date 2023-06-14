@extends('layouts.auth')

@section('content')
    <div class="container py-4">
        <h1 class="mb-3">Project {{$project->title}} details</h1>
        <h3 class="mb-3">Title: {{$project->title}}</h3>
        <h3 class="mb-3">Slug: {{$project->slug}}</h3>
        <h3 class="mb-3">Summary:</h3>
        <p>{{$project->summary}}</p>
        <h3 class="mb-3">Status: </h3>
        <h3 class="mb-3">Start date: </h3>
        <h3 class="mb-3">Extimated deadline: </h3>
        @if (isset($project->image))
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{$project->title}}">
        @endif
    </div>
@endsection

{{-- Some sections are incompleted to keep flexibility with future migrations --}}