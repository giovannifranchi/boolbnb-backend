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
    <form action="{{ route('admin.apartments.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- inserimento nome appartamento --}}
        <div class="mb-3">
            <label for="name" class="form-label">Apartment Name</label>
            <input type="text" class="form-control" id="name" value="{{ old('name')}}" name="name" minlength="3" required> {{-- TODO: fix non esce il messaggio di errore --}}
        </div>
        {{-- inserimento indirizzo --}}
        <div class="mb-3">
            <label for="address-input" class="form-label">Address</label>
            <input type="text" class="form-control" id="address-input" value="{{ old('address')}}" required>
        </div>
        {{-- lista dinamica di autocompletamento --}}
        <ul class="list-unstyled d-none" id="autocompleteContainer"></ul>
        <input type="text" name="address" id="address" class="d-none">
        {{-- inserimento città --}}
        <div class="mb-3 d-none">
            <label for="city" class="form-label">City</label>
            <input type="text" class="form-control" id="city" value="{{old('city')}}" name="city">
        </div>
        {{-- inserimento nazione  --}}
        <div class="mb-3 d-none">
            <label for="state" class="form-label">State</label>
            <input type="text" class="form-control" id="state" value="{{old('state')}}" name="state">
        </div>
        {{-- inserimento metri quadri appartamento  --}}
        <div class="mb-3">
            <label for="square_meters" class="form-label">Square Meters</label>
            <input type="number" class="form-control" id="square_meters" value="{{old('square_meters')}}" name="square_meters" step="1" min="30" pattern="^(?!-)[0-9]+$" required> {{-- TODO: fix perchè non esce il popup di errore --}}
        </div>
        {{-- inserimento numero bagni --}}
        <div class="mb-3">
            <label for="bathrooms" class="form-label">Bathrooms Number</label>
            <input type="number" class="form-control" id="bathrooms" value="{{old('bathrooms')}}" name="bathrooms" step="1" min="1" pattern="^(?!-)[0-9]+$" required>
        </div>
        {{-- inserimento numero stanze --}}
        <div class="mb-3">
            <label for="rooms" class="form-label">Rooms Number</label>
            <input type="number" class="form-control" id="rooms" value="{{old('rooms')}}" name="rooms" step="1" min="1" pattern="^(?!-)[0-9]+$" required>
        </div>
        {{-- inserimento numero letti --}}
        <div class="mb-3">
            <label for="beds" class="form-label">Beds Number</label>
            <input type="number" class="form-control" id="beds" value="{{old('beds')}}" name="beds" step="1" min="1" pattern="^(?!-)[0-9]+$" required>
        </div>
        {{-- inserimento prezzo appartamento  --}}
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" value="{{old('price')}}" name="price" min="1" step="0.5" pattern="^(?!-)[0-9]+$" required>
        </div>
        {{-- inserimento valore percentuale dello sconto --}}
        <div class="mb-3">
            <label for="discount" class="form-label">Discount Value</label>
            <input type="number" class="form-control" id="discount" value="{{old('discount')}}" name="discount" step="1" min="0" max="100" pattern="^(?!-)[0-9]+$" required>
        </div>
    
        <div class="mb-3">
            <div>Services</div>
            @foreach ($services as $service)
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="services[]" id="services" value="{{ $service->id }}" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="services">{{ $service->name }}</label>
            </div>
            @endforeach
        </div>

        {{-- inserimento descrizione appartamento  --}}
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" rows="3" name="description" required>{{old('description')}}</textarea>
        </div>

        {{-- Longitude --}}
        <input type="text" name="longitude" id="longitude" class="d-none">
        {{-- Latitude --}}
        <input type="text" name="latitude" id="latitude" class="d-none">
        
        {{-- inserimento immagine che si vuole avere come copertina  --}}
        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input class="form-control" type="file" id="cover_image" name="thumb" onchange="previewImage(event, 'file-image-preview')" multiple>
            <div class="preview">
                <img id="file-image-preview" class="img-fluid pt-3" style="width: 200px;">
            </div>
        </div>
        {{-- inserimento immagini aggiuntive --}}
        <div class="mb-3">
            <label for="additional_images" class="form-label">Additional Images</label>
            <input class="form-control" type="file" id="additional_images" name="additional_images[]" onchange="previewMultipleImages(event, 'additional-images-preview')" multiple>
            <div class="preview pt-3 pe-3" id="additional-images-preview" style="display: flex; width: 200px;"></div>
        </div>
        <div class="form-check form-switch">
            
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="is_visible" value="1" checked>
            <label class="form-check-label" for="flexSwitchCheckDefault">Is Visible?</label>
        </div>
        
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</main>

<script>
    function previewImage(event, previewId) {
        const reader = new FileReader();
        reader.onload = function() {
            const preview = document.getElementById(previewId);
            preview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }

    function previewMultipleImages(event, previewContainerId) {
        const files = event.target.files;
        const previewContainer = document.getElementById(previewContainerId);
        previewContainer.innerHTML = "";

        for (let i = 0; i < files.length; i++) {
            const reader = new FileReader();
            reader.onload = function() {
                const img = document.createElement("img");
                img.src = reader.result;
                img.className = "img-fluid pe-2";
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(files[i]);
        }
    }
</script>

@endsection
