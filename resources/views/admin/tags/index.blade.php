@extends('layouts.auth')

@section('content')
    <div class="container">
        <h1 class="my-3">Tags List</h1>

        <a href="" class="btn btn-success mb-3">
            <h5 class="mb-0">Add a new tag</h5>
        </a>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Icon</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tags as $tag)
                    <tr>
                        <td>{{ $tag->id }}</td>
                        <td>{{ $tag->name }}</td>
                        <td>{{ $tag->icon_path }}</td>
                        <td class="d-flex gap-3">
                            <a href="" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $tag->id }}">Delete</button>
                        </td>
                    </tr>
                    {{-- modal --}}
                    <div class="modal" tabindex="-1" id="modal{{ $tag->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">You are deleting tag #{{ $tag->id }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this tag?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.tags.destroy', $tag) }}" method="POST">
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
