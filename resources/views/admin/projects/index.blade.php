@extends('layouts.auth')

@section('content')
    <div class="container">
        <h1 class="my-3">Projects List</h1>

        <a href="{{ route('admin.projects.create') }}" class="btn btn-success mb-3">
            <h5 class="mb-0">Add a new project</h5>
        </a>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->slug }}</td>
                        <td class="d-flex gap-3">
                            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-info">Details</a>
                            <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $project->id }}">Delete</button>
                        </td>
                    </tr>
                    {{-- modal --}}
                    <div class="modal" tabindex="-1" id="modal{{ $project->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">You are deleting project #{{ $project->id }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this project?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.projects.destroy', $project) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
