@extends('layouts.auth')

@section('content')
<main class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{ route('admin.apartments.update', $apartment)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- inserimento nome appartamento --}}
        <div class="mb-3">
            <label for="name" class="form-label">Apartment Name </label>
            <input type="text" class="form-control" id="name" value="{{ old('name',$apartment->name)}}" name="name">
        </div>
        {{-- inserimento metri quadri appartamento  --}}
        <div class="mb-3">
            <label for="square_meters" class="form-label">Square Meters</label>
            <input type="number" class="form-control" id="square_meters" value="{{old('square_meters',$apartment->square_meters)}}" name="square_meters" path="^(?!-)[0-9]+$">
        </div>
        {{-- inserimento numero bagni --}}
        <div class="mb-3">
            <label for="bathrooms" class="form-label">Bathrooms Number</label>
            <input type="number" step="0.01" class="form-control" id="bathrooms" value="{{old('bathrooms',$apartment->bathrooms)}}" name="bathrooms" path="^(?!-)[0-9]+$">
        </div>
        {{-- inserimento numero stanze --}}
        <div class="mb-3">
            <label for="rooms" class="form-label">Rooms Number</label>
            <input type="number" class="form-control" id="rooms" value="{{old('rooms',$apartment->rooms)}}" name="rooms" path="^(?!-)[0-9]+$">
        </div>
        {{-- inserimento numero letti --}}
        <div class="mb-3">
            <label for="beds" class="form-label">Beds Number</label>
            <input type="number" class="form-control" id="beds" value="{{old('beds',$apartment->beds)}}" name="beds" path="^(?!-)[0-9]+$">
        </div>
        {{-- inserimento prezzo appartamento  --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" value="{{old('price',$apartment->price)}}" name="price" path="^(?!-)[0-9]+$">
        </div>
        {{-- inserimento valore percentuale dello sconto --}}
        <div class="mb-3">
            <label for="discount" class="form-label">Discount Value</label>
            <input type="number" class="form-control" id="discount" value="{{old('discount',$apartment->discount)}}" name="discount" path="^(?!-)[0-9]+$">
        </div>
        @if ($errors->any())
        <div class="mb-3">
            <div>Services</div>
            @foreach ($services as $service)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="services[]" id="services" value="{{ $service->id }}" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="services">{{ $service->name }}</label>
            </div>
            @endforeach
        </div>
        @else
        <div class="mb-3">
            <div>Services</div>
            @foreach ($services as $service)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="services[]" id="services" value="{{ $service->id }}" {{ $apartment->services->contains($service->id) ? 'checked' : '' }}>
                <label class="form-check-label" for="services">{{ $service->name }}</label>
            </div>
            @endforeach
        </div>
        @endif

        {{-- inserimento descrizione appartamento  --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description">{{old('description',$apartment->description)}}</textarea>
        </div>

        {{-- Longitude --}}
        <input type="text" name="longitude" id="longitude" class="d-none">
        {{-- Latitude --}}
        <input type="text" name="latitude" id="latitude" class="d-none">
        {{-- inserimento immagine che si vuole avere come copertina  --}}
        {{-- <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                    <input class="form-control" type="file" id="cover_image" name="cover_image" value="{{ old('cover_image', $apartment->cover_image) }}" name="cover_image">
        <div class="mb-3 @if (!$apartment->cover_image) d-none @endif" id="image2-input-container">
            <div class="preview">
                <img id="file-image2-preview" @if ($apartment->cover_image) src="{{ asset('storage/' . $apartment->cover_image) }} @endif" class="img-fluid">
            </div>
        </div>
        </div> --}}
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>

        </div>
    </form>
</main>

@endsection
