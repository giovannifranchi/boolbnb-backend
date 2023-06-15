@extends('layouts.auth')

@section('content')
    <div class="container">
        <h1 class="my-3">Services List</h1>

        <a href="" class="btn btn-success mb-3">
            <h5 class="mb-0">Add a new service</h5>
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
                @foreach ($services as $service)
                    <tr>
                        <td>{{ $service->id }}</td>
                        <td>{{ $service->name }}</td>
                        <td>{{ $service->icon_url }}</td>
                        <td class="d-flex gap-3">
                            <a href="" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $service->id }}">Delete</button>
                        </td>
                    </tr>
                    {{-- modal --}}
                    <div class="modal" tabindex="-1" id="modal{{ $service->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">You are deleting service #{{ $service->id }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this service?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST">
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
