@extends('layouts.auth')

@section('content')
    <div class="container">
        <h1 class="my-3">Plans List</h1>

        <a href="" class="btn btn-success mb-3">
            <h5 class="mb-0">Add a new plan</h5>
        </a>


        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $plan->id }}</td>
                        <td>{{ $plan->name }}</td>
                        <td>{{ $plan->duration }} hours</td>
                        <td>{{ $plan->price }} €</td>
                        <td class="d-flex gap-3">
                            <a href="{{ route('admin.plans.edit', $plan)}}" class="btn btn-warning">Edit</a>
                            <button class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $plan->id }}">Delete</button>
                        </td>
                    </tr>
                    {{-- modal --}}
                    <div class="modal" tabindex="-1" id="modal{{ $plan->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">You are deleting plan #{{ $plan->id }}</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Are you sure you want to delete this plan?</p>
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('admin.plans.destroy', $plan) }}" method="POST">
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
