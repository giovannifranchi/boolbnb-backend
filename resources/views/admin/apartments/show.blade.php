@extends('layouts.auth')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card mb-3">
                        <img src="{{$apartments->cover_image}}" alt="">
                        <div class="p-3">
                            <h3 class="card-title">Apartment Name: {{$apartments->name}}</h3>
                            <div>Address: {{$apartmnets->address}}</div>
                            <div>City: {{$apartments->city}}</div>
                            <div>State: {{$apartments->state}}</div>
                            <div>Bathrooms: {{$apartments->bathrooms}}</div>
                            <div>Rooms: {{$apartments->rooms}}</div>
                            <div>Price: {{$apartments->price}}</div>
                            <div>Discount Value: {{$apartments->discount}}</div>
                            <div>Latitude: {{$apartments->latitude}}</div>
                            <div>Longitude: {{$apartments->longitude}}</div>
                            <div>Description: {{$partments->description}}</div>
                            <button><a href="#">Images Gallery</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection