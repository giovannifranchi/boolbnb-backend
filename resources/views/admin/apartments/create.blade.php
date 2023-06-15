@extends('layouts.auth')

@section('content')
    <main>
        <form action="{{}}" method="POST" enctype="multipart/form-data">
        @csrf
        
            {{-- inserimento nome appartamento --}}
            <div class="mb-3">
                <label for="name" class="form-label">Apartment Name </label>
                <input type="text" class="form-control" id="name" value="{{ old('name')}}" name="name">
            </div>
            {{-- inserimento indirizzo --}}
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" value="{{ old('address')}}" name="address">
            </div>
            {{-- inserimento città --}}
            <div class="mb-3">
                <label for="city" class="form-label">City</label>
                <input type="text" class="form-control" id="city" value="{{old('city')}}" name="city">
            </div>
            {{-- inserimento nazione  --}}
            <div class="mb-3">
                <label for="state" class="form-label">State</label>
                <input type="text" class="form-control" id="state" value="{{old('state')}}" name="state">
            </div>
            {{-- inserimento metri quadri appartamento  --}}
            <div class="mb-3">
                <label for="square_meters" class="form-label">Square Meters</label>
                <input type="number" class="form-control" id="square_meters" value="{{old('square_meters')}}" name="square_meters">
            </div>
            {{-- inserimento numero bagni --}}
            <div class="mb-3">
                <label for="bathrooms" class="form-label">Bathrooms Number</label>
                <input type="number" class="form-control" id="bathrooms" value="{{old('bathrooms')}}" name="bathrooms">
            </div>
            {{-- inserimento numero stanze --}}
            <div class="mb-3">
                <label for="rooms" class="form-label">Rooms Number</label>
                <input type="number" class="form-control" id="rooms" value="{{old('rooms')}}" name="rooms">
            </div>
            {{-- inserimento prezzo appartamento  --}}
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" value="{{old('price')}}" name="price">
            </div>
            {{-- inserimento valore percentuale dello sconto --}}
            <div class="mb-3">
                <label for="discount" class="form-label">Discount Value</label>
                <input type="number" class="form-control" id="discount" value="{{old('discount')}}" name="discount">
            </div>
            {{-- inserimento latitudine per geolocalizzazione  --}}
            <div class="mb-3">
                <label for="latitude" class="form-label">Latitude</label>
                <input type="number" class="form-control" id="latitude" value="{{old('latitude')}}" name="latitude">
            </div>
            {{-- inserimento longitudine per geolocalizzazione --}}
            <div>
                <label for="longitude" class="form-label">Longitude</label>
                <input type="number" class="form-control" id="longitude" value="{{old('longitude')}}" name="longitude">
            </div>
            {{-- inserimento descrizione appartamento  --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description">{{old('description')}}</textarea>
            </div>
            {{-- inserimento immagine che si vuole avere come copertina  --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                    <input class="form-control" type="file" id="cover_image" name="cover_image" value="{{ old('cover_image') }}" name="cover_image">
                <div class="mb-3 @if (!$apartments->cover_image) d-none @endif" id="image2-input-container">
                    <div class="preview">
                        <img id="file-image2-preview" @if ($apartments->cover_image) src="{{ asset('storage/' . $apartments->cover_image) }} @endif" class="img-fluid">
                    </div>
                </div>
            </div>
            <div class="m-3">
                 <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </form>
    </main>

@endsection