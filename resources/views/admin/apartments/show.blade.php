@extends('layouts.auth')

@section('content')
    <main>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="card mb-3">
                        {{-- <img src="{{asset($apartments->thumb}}" alt=""> --}}
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
                            <button><a href="#">Images Gallery</a></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection