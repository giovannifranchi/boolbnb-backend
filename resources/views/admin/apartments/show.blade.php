@extends('layouts.auth')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card mb-3">
                         <img src="{{ asset($apartment->thumb) }}" alt="">
                        <div class="p-3">
                            <h3 class="card-title">Apartment Name: {{$apartment->name}}</h3>
                            <div>Address: {{$apartment->address}}</div>
                            <div>City: {{$apartment->city}}</div>
                            <div>State: {{$apartment->state}}</div>
                            <div>Bathrooms: {{$apartment->bathrooms}}</div>
                            <div>Rooms: {{$apartment->rooms}}</div>
                            <div>Price: {{$apartment->price}}</div>
                            <div>Discount Value: {{$apartment->discount}}</div>
                            <div>Latitude: {{$apartment->latitude}}</div>
                            <div>Longitude: {{$apartment->longitude}}</div>
                            <div>Description: {{$apartment->description}}</div>
                            <a href="{{ route('admin.gallery.index', ['apartment' => $apartment])}}" class="btn btn-primary">Images Gallery</a>
                        </div>
                    </div>
                </div>
            </div>
            {{-- put the condition if services are not set --}}
            @if (true) 
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
                                <a href="{{route('admin.braintree.token', ['plan' => $plan, 'apartment' => $apartment->id])}}" class="card-link btn btn-primary">Paga!!</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </main>
@endsection