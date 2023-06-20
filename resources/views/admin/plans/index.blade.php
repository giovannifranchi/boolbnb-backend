@extends('layouts.auth')

@section('content')
<div class="container text-center">
    <h1 class="my-3">Plans List</h1>

    <div class="row justify-content-center">
        @foreach ($plans as $plan)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $plan->name }}</h6>
                    <h5 class="card-title">{{ $plan->duration }} hours</h5>
                    <p class="card-text">{{ $plan->price }} €</p>
                    <a href="#" class="card-link btn btn-primary">Paga!!</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection