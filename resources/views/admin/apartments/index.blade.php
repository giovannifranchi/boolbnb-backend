@extends('layouts.auth')

@section('content')
<main class="py-3">



    <div class="projcard-container py-3">
        <button class="btn btn-success mb-3 radius-50 fs-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">+</button>
        @foreach ($apartments as $apartment )
        <div class="projcard projcard-blue">
            <div class="projcard-innerbox">
                <img class="projcard-img" src="{{ asset($apartment->thumb) }}" />
                <div class="projcard-textbox">
                    <div class="projcard-title">{{$apartment->name}}</div>
                    <div class="projcard-subtitle sponsor {{$apartment->is_sponsored ? 'present' : 'absent'}}">SPONSORED</div>
                    <div class="projcard-bar"></div>
                    <div class="projcard-description d-flex justify-content-center flex-column">
                        <h4><strong>LOCATION:</strong> {{$apartment->address}}, {{$apartment->city}}, {{$apartment->state}}</h4>
                        <h6><strong>PRICE:</strong> {{$apartment->price}} €</h6>
                        <div class="d-flex gap-3">
                            <div>
                                <h6 class="d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                    </svg>
                                    <span>{{count($apartment->views)}}</span>
                                </h6>
                            </div>
                            <div>
                                <h6 class="d-flex gap-2 align-items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z" />
                                    </svg>
                                    <span>{{count($apartment->messages)}}</span>
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="projcard-tagbox d-flex">
                        <a href="{{ route('admin.apartments.show', $apartment)}}" class="projcard-tag text-decoration-none"><strong>DETAILS</strong></a>
                        <a href="{{ route('admin.apartments.edit', $apartment->id)}}" class="projcard-tag text-decoration-none"><strong>EDIT</strong></a>
                        <a href="#" class="projcard-tag text-decoration-none"><strong>MESSAGES</strong></a>
                        <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="POST" id="form">
                            @csrf
                            @method('DELETE')
                            <button class="projcard-tag border-0"><strong>DELETE</strong></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Offcanvas -->

    <!-- TODO: FIX offcanvas with media queries to match w-100 when mobile -->
    <div class="offcanvas offcanvas-end w-25 {{$errors->any() ? 'show' : ''}} ms-offcanva" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasScrollingLabel">Create New Apartment</h5>
            <button type="button" class="btn-close text-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
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
                    <input type="text" class="form-control" id="name" value="{{ old('name')}}" name="name">
                </div>
                {{-- inserimento indirizzo --}}
                <div class="mb-3">
                    <label for="address-input" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address-input" value="{{ old('address')}}">
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
                    <input type="number" class="form-control" id="square_meters" value="{{old('square_meters')}}" name="square_meters" path="^(?!-)[0-9]+$">
                </div>
                {{-- inserimento numero bagni --}}
                <div class="mb-3">
                    <label for="bathrooms" class="form-label">Bathrooms Number</label>
                    <input type="number" step="0.01" class="form-control" id="bathrooms" value="{{old('bathrooms')}}" name="bathrooms" path="^(?!-)[0-9]+$">
                </div>
                {{-- inserimento numero stanze --}}
                <div class="mb-3">
                    <label for="rooms" class="form-label">Rooms Number</label>
                    <input type="number" class="form-control" id="rooms" value="{{old('rooms')}}" name="rooms" path="^(?!-)[0-9]+$">
                </div>
                {{-- inserimento numero letti --}}
                <div class="mb-3">
                    <label for="beds" class="form-label">Beds Number</label>
                    <input type="number" class="form-control" id="beds" value="{{old('beds')}}" name="beds" path="^(?!-)[0-9]+$">
                </div>
                {{-- inserimento prezzo appartamento  --}}
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control" id="price" value="{{old('price')}}" name="price" path="^(?!-)[0-9]+$">
                </div>
                {{-- inserimento valore percentuale dello sconto --}}
                <div class="mb-3">
                    <label for="discount" class="form-label">Discount Value</label>
                    <input type="number" class="form-control" id="discount" value="{{old('discount')}}" name="discount" path="^(?!-)[0-9]+$">
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
                    <textarea class="form-control" id="description" rows="3" name="description">{{old('description')}}</textarea>
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
                        <img id="file-image-preview" class="img-fluid" style="width: 200px;">
                    </div>
                </div>
                {{-- inserimento immagini aggiuntive --}}
                <div class="mb-3">
                    <label for="additional_images" class="form-label">Additional Images</label>
                    <input class="form-control" type="file" id="additional_images" name="additional_images[]" onchange="previewMultipleImages(event, 'additional-images-preview')" multiple>
                    <div class="preview" id="additional-images-preview" style="display: flex; width: 200px;"></div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
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
                img.className = "img-fluid";
                previewContainer.appendChild(img);
            };
            reader.readAsDataURL(files[i]);
        }
    }
</script>

<style>
    /* show style */
    .ms-offcanva{
        background-color: #252A34;
        color: #EAEAEA;
    }

    /* Actual Code: */
    .projcard-container,
    .projcard-container * {
        box-sizing: border-box;
    }

    .projcard-container {
        margin-left: auto;
        margin-right: auto;
        width: 1000px;
    }

    .projcard {
        position: relative;
        width: 100%;
        height: 300px;
        margin-bottom: 40px;
        border-radius: 10px;
        background-color: #fff;
        border: 2px solid #ddd;
        font-size: 18px;
        overflow: hidden;
        cursor: default;
        box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
        transition: box-shadow 0.2s ease, transform 0.2s ease;
    }

    .projcard:hover {
        box-shadow: 0 34px 32px -33px rgba(0, 0, 0, 0.18);
        transform: translate(0px, -3px);
    }

    .projcard::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-image: linear-gradient(-70deg, #252A34, transparent 50%);
        opacity: 0.07;
    }

    .projcard:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #252A34, transparent 50%);
    }

    .projcard-innerbox {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
    }

    .projcard-img {
        position: absolute;
        height: 300px;
        width: 400px;
        top: 0;
        left: 0;
        transition: transform 0.2s ease;
    }

    .projcard:nth-child(2n) .projcard-img {
        left: initial;
        right: 0;
    }

    .projcard:hover .projcard-img {
        transform: scale(1.05) rotate(1deg);
    }

    .projcard:hover .projcard-bar {
        width: 70px;
    }

    .projcard-textbox {
        position: absolute;
        top: 7%;
        bottom: 7%;
        left: 430px;
        width: calc(100% - 470px);
        font-size: 17px;
    }

    .projcard:nth-child(2n) .projcard-textbox {
        left: initial;
        right: 430px;
    }

    .projcard-textbox::before,
    .projcard-textbox::after {
        content: "";
        position: absolute;
        display: block;
        background: #ff0000bb;
        background: #fff;
        top: -20%;
        left: -55px;
        height: 140%;
        width: 60px;
        transform: rotate(8deg);
    }

    .projcard:nth-child(2n) .projcard-textbox::before {
        display: none;
    }

    .projcard-textbox::after {
        display: none;
        left: initial;
        right: -55px;
    }

    .projcard:nth-child(2n) .projcard-textbox::after {
        display: block;
    }

    .projcard-textbox * {
        position: relative;
    }

    .projcard-title {
        font-family: "Voces", "Open Sans", arial, sans-serif;
        font-size: 24px;
    }

    .projcard-subtitle {
        font-family: "Voces", "Open Sans", arial, sans-serif;
        color: #888;
        display: flex;
        gap: 10px;
        align-items: center;
    }

    .sponsor::before {
        content: "";
        display: block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #0088ff;
        /* TODO:fix reactivity on colours */
    }

    .sponsor.present::before {
        background-color: #40bd00;
    }

    .sponsor.absent::before {
        background-color: #d62f1f;
    }

    .projcard-bar {
        left: -2px;
        width: 50px;
        height: 5px;
        margin: 10px 0;
        border-radius: 5px;
        background-color: #424242;
        transition: width 0.2s ease;
    }

    .projcard-blue .projcard-bar {
        background-color: #0088ff;
    }

    .projcard-blue::before {
        background-image: linear-gradient(-70deg, #0088ff, transparent 50%);
    }

    .projcard-blue:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #0088ff, transparent 50%);
    }

    .projcard-red .projcard-bar {
        background-color: #d62f1f;
    }

    .projcard-red::before {
        background-image: linear-gradient(-70deg, #d62f1f, transparent 50%);
    }

    .projcard-red:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #d62f1f, transparent 50%);
    }

    .projcard-green .projcard-bar {
        background-color: #40bd00;
    }

    .projcard-green::before {
        background-image: linear-gradient(-70deg, #40bd00, transparent 50%);
    }

    .projcard-green:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #40bd00, transparent 50%);
    }

    .projcard-yellow .projcard-bar {
        background-color: #f5af41;
    }

    .projcard-yellow::before {
        background-image: linear-gradient(-70deg, #f5af41, transparent 50%);
    }

    .projcard-yellow:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #f5af41, transparent 50%);
    }

    .projcard-orange .projcard-bar {
        background-color: #ff5722;
    }

    .projcard-orange::before {
        background-image: linear-gradient(-70deg, #ff5722, transparent 50%);
    }

    .projcard-orange:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #ff5722, transparent 50%);
    }

    .projcard-brown .projcard-bar {
        background-color: #c49863;
    }

    .projcard-brown::before {
        background-image: linear-gradient(-70deg, #c49863, transparent 50%);
    }

    .projcard-brown:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #c49863, transparent 50%);
    }

    .projcard-grey .projcard-bar {
        background-color: #424242;
    }

    .projcard-grey::before {
        background-image: linear-gradient(-70deg, #424242, transparent 50%);
    }

    .projcard-grey:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #424242, transparent 50%);
    }

    .projcard-customcolor .projcard-bar {
        background-color: var(--projcard-color);
    }

    .projcard-customcolor::before {
        background-image: linear-gradient(-70deg,
                var(--projcard-color),
                transparent 50%);
    }

    .projcard-customcolor:nth-child(2n)::before {
        background-image: linear-gradient(-250deg,
                var(--projcard-color),
                transparent 50%);
    }

    .projcard-description {
        z-index: 10;
        font-size: 15px;
        color: #424242;
        height: 125px;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .projcard-tagbox {
        position: absolute;
        bottom: 3%;
        font-size: 14px;
        cursor: default;
        user-select: none;

    }

    .projcard-tag:hover {
        background-color: rgba(224, 224, 224, .5);
        scale: 1.2;
    }

    .projcard-tag {
        display: inline-block;
        background-color: rgba(224, 224, 224, 1);
        color: #777;
        border-radius: 3px 0 0 3px;
        line-height: 26px;
        padding: 0 10px 0 23px;
        position: relative;
        margin-right: 20px;
        cursor: pointer;
        user-select: none;
        transition: all 0.2s;
    }

    .projcard-tag::before {
        content: "";
        position: absolute;
        background: #fff;
        border-radius: 10px;
        box-shadow: inset 0 1px rgba(0, 0, 0, 0.25);
        height: 6px;
        left: 10px;
        width: 6px;
        top: 10px;
    }

    .projcard-tag::after {
        content: "";
        position: absolute;
        border-bottom: 13px solid transparent;
        border-left: 10px solid #e0e0e0;
        border-top: 13px solid transparent;
        right: -10px;
        top: 0;
    }
</style>
@endsection