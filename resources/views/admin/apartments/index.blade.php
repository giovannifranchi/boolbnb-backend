@extends('layouts.auth')

@section('content')

    <main class="py-3">



        <div class="container p-3">
            <button class="btn btn-success mb-3 radius-50 fs-1" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">+</button>
            @foreach ($apartments as $apartment)
                <div class="detail-container w-100 mb-5 info">
                    <div class="row">
                        <div class="col-12 col-lg-7 p-5">
                            <h5 class="mb-2">{{ $apartment->name }}</h5>
                            <h5
                                class="mb-3 sponsor d-flex align-items-center gap-1 {{ $apartment->is_sponsored ? 'ms-active' : 'ms-inactive' }}">
                                SPONSORED</h5>
                            <div class="bar mb-3"></div>
                            <h3>{{ $apartment->address }}, {{ $apartment->city }}, {{ $apartment->state }}</h3>
                            <h6>PRICE: <strong>{{ $apartment->price }}</strong></h6>
                            <div class="icons d-flex gap-3 mb-3">
                                <div class="d-flex align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                    </svg>
                                    <span>{{ count($apartment->views) }}</span>
                                </div>
                                <div class="d-flex align-items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                        <!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path
                                            d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z" />
                                    </svg>
                                    <span>{{ count($apartment->messages) }}</span>
                                </div>
                            </div>
                            <div class="d-flex gap-3">
                                <div class="box">
                                    <a class="ms-link"
                                        href="{{ route('admin.apartments.show', $apartment->id) }}">DETAILS</a>
                                </div>
                                <div class="box">
                                    <a class="ms-link" href="{{ route('admin.apartments.edit', $apartment->id) }}">EDIT</a>
                                </div>
                                <div class="box">
                                    <a class="ms-link"
                                        href="{{ route('admin.messages.index', $apartment->id) }}">MESSAGES</a>
                                </div>
                                <div class="box">
                                    <form class="ms-link" action="{{route('admin.apartments.destroy', $apartment->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="border-0 ms-delete" value="DELETE">
                                    </form>
                                </div>

                                {{-- Toast --}}

                                <div class="toast-container position-fixed bottom-0 end-0 p-3 z-index-100">
                                    <div id="liveToast{{$apartment->id}}" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                                      <div class="toast-header">
                                        <img src="..." class="rounded me-2" alt="...">
                                        <strong class="me-auto">Bootstrap</strong>
                                        <small>11 mins ago</small>
                                        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                                      </div>
                                      <div class="toast-body">
                                        Hello, world! This is a toast message.
                                      </div>
                                    </div>
                                  </div>

                            
                            </div>

                        </div>
                        <div class="col-12 col-lg-5 ms-img-container">
                            <img src="{{ asset($apartment->thumb) }}" alt="{{ $apartment->name }}"
                                class="w-100 h-100 ms-img">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Offcanvas -->

        <!-- TODO: FIX offcanvas with media queries to match w-100 when mobile -->
        <div class="offcanvas offcanvas-end  {{ $errors->any() ? 'show' : '' }} ms-offcanva w-50-desktop"
            data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling"
            aria-labelledby="offcanvasScrollingLabel">
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
                <form action="{{ route('admin.apartments.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    {{-- inserimento nome appartamento --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Apartment Name</label>
                        <input type="text" class="form-control" id="name" value="{{ old('name') }}"
                            name="name">
                    </div>
                    {{-- inserimento indirizzo --}}
                    <div class="mb-3">
                        <label for="address-input" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address-input" value="{{ old('address') }}">
                    </div>
                    {{-- lista dinamica di autocompletamento --}}
                    <ul class="list-unstyled d-none" id="autocompleteContainer"></ul>
                    <input type="text" name="address" id="address" class="d-none">
                    {{-- inserimento città --}}
                    <div class="mb-3 d-none">
                        <label for="city" class="form-label">City</label>
                        <input type="text" class="form-control" id="city" value="{{ old('city') }}"
                            name="city">
                    </div>
                    {{-- inserimento nazione  --}}
                    <div class="mb-3 d-none">
                        <label for="state" class="form-label">State</label>
                        <input type="text" class="form-control" id="state" value="{{ old('state') }}"
                            name="state">
                    </div>
                    {{-- inserimento metri quadri appartamento  --}}
                    <div class="mb-3">
                        <label for="square_meters" class="form-label">Square Meters</label>
                        <input type="number" class="form-control" id="square_meters"
                            value="{{ old('square_meters') }}" name="square_meters" path="^(?!-)[0-9]+$">
                    </div>
                    {{-- inserimento numero bagni --}}
                    <div class="mb-3">
                        <label for="bathrooms" class="form-label">Bathrooms Number</label>
                        <input type="number" step="0.01" class="form-control" id="bathrooms"
                            value="{{ old('bathrooms') }}" name="bathrooms" path="^(?!-)[0-9]+$">
                    </div>
                    {{-- inserimento numero stanze --}}
                    <div class="mb-3">
                        <label for="rooms" class="form-label">Rooms Number</label>
                        <input type="number" class="form-control" id="rooms" value="{{ old('rooms') }}"
                            name="rooms" path="^(?!-)[0-9]+$">
                    </div>
                    {{-- inserimento numero letti --}}
                    <div class="mb-3">
                        <label for="beds" class="form-label">Beds Number</label>
                        <input type="number" class="form-control" id="beds" value="{{ old('beds') }}"
                            name="beds" path="^(?!-)[0-9]+$">
                    </div>
                    {{-- inserimento prezzo appartamento  --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" value="{{ old('price') }}"
                            name="price" path="^(?!-)[0-9]+$">
                    </div>
                    {{-- inserimento valore percentuale dello sconto --}}
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount Value</label>
                        <input type="number" class="form-control" id="discount" value="{{ old('discount') }}"
                            name="discount" path="^(?!-)[0-9]+$">
                    </div>

                    <div class="mb-3">
                        <div>Services</div>
                        @foreach ($services as $key => $service)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="services[]"
                                    id="services{{ $key }}" value="{{ $service->id }}"
                                    {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="services{{ $key }}">{{ $service->name }}</label>
                            </div>
                        @endforeach
                    </div>

                    {{-- inserimento descrizione appartamento  --}}
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" rows="3" name="description">{{ old('description') }}</textarea>
                    </div>

                    {{-- Longitude --}}
                    <input type="text" name="longitude" id="longitude" class="d-none">
                    {{-- Latitude --}}
                    <input type="text" name="latitude" id="latitude" class="d-none">

                    {{-- inserimento immagine che si vuole avere come copertina  --}}
                    <div class="mb-3">
                        <label for="cover_image" class="form-label">Cover Image</label>
                        <input class="form-control" type="file" id="cover_image" name="thumb"
                            onchange="previewImage(event, 'file-image-preview')" multiple>
                        <div class="preview">
                            <img id="file-image-preview" class="img-fluid" style="width: 200px;">
                        </div>
                    </div>
                    {{-- inserimento immagini aggiuntive --}}
                    <div class="mb-3">
                        <label for="additional_images" class="form-label">Additional Images</label>
                        <input class="form-control" type="file" id="additional_images" name="additional_images[]"
                            onchange="previewMultipleImages(event, 'additional-images-preview')" multiple>
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
        .ms-offcanva {
            background-color: #EAEAEA;
            color: #252A34;
        }

        @media (min-width: 992px) {
            .w-50-desktop {
                width: 27% !important;
            }
        }

        h3,
        h4,
        h5,
        h6,
        span {
            color: #252A34;
        }

        .ms-img-container {
            height: auto;
        }


        .detail-container {
            border-radius: 30px;
            height: auto;
            /* background: linear-gradient(#) */
            /* background-color: #ffffff */
            box-shadow: 0 4px 21px -12px rgba(0, 0, 0, 0.66);
            transition: box-shadow 0.2s ease, transform 0.2s ease;
        }

        .detail-container:hover {
            box-shadow: 0 34px 32px -33px rgba(0, 0, 0, 0.18);
            transform: translate(0px, -3px);
        }

        .detail-container:hover .bar {
            width: 70px;
        }

        .detail-container .bar {
            height: 7px;
            width: 50px;
            background-color: #2ecc71;
            border-radius: 30px;
            transition: all .2s ease-in-out
        }

        .detail-container .sponsor {
            color: #c1c1c1;
            font-weight: 300;
        }

        .sponsor::before {
            content: '';
            display: block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
        }

        .sponsor.ms-active::before {
            background-color: green;
        }

        .sponsor.ms-inactive::before {
            background-color: red;
        }

        .box {
            background-color: #c1c1c1;
            padding: 3px 10px;
            border-radius: 10px;
            transition: all .2s ease-in-out;
        }

        .box:hover {
            scale: 1.1;

        }

        a {
            text-decoration: none;
            color: #252A34;
        }

        .ms-link::before {
            content: '';
            display: inline-block;
            width: 5px;
            height: 5px;
            background-color: #fff;
            vertical-align: middle;
            margin-right: 5px;
            border-radius: 50%;
        }

        a:hover {
            color: #3b4251
        }

        .info {
            background: linear-gradient(to right, white, #2ecc71);
        }

        .ms-img {
            border-bottom-left-radius: 20px;
            border-bottom-right-radius: 20px;
        }

        .ms-delete {
            background-color: inherit;
            font-family: inherit;
            color: #252A34;
            margin-left: -10px;
        }
        

        @media (min-width: 992px) {
            .ms-img {
                border-top-right-radius: 20px;
                border-bottom-right-radius: 20px;
                border-bottom-left-radius: 0;
            }

            .ms-img-container {
                height: 350px;
            }

            .detail-container {
                height: 350px;
            }
        }
    </style>


@endsection
