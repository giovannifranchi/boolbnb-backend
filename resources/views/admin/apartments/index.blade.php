@extends('layouts.auth')

@section('content')

    <main class="py-3">
        <div class="container mb-5">
            <h1>Appartment List </h1>
        </div>


        <div class="container position-relative">
            <button class="ms-button add-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling"
                aria-controls="offcanvasScrolling">
                <div class="add-icon"></div>
                <div class="btn-txt">Add</div>
            </button>
            @foreach ($apartments as $apartment)
                <div class="detail-container w-100 mb-5 info">
                    <div class="row">
                        <div class="col-12 col-lg-7 p-5">
                            <h3 class="mb-2">{{ $apartment->name }}</h3>
                            <div class="bar mb-3"></div>
                            @if ($apartment->lastPlan() && $apartment->lastPlan()->pivot->expire_date > now())
                                <h5 class="sponsor active mb-3">SPONSOR
                                    expires:{{ $apartment->lastPlan()->pivot->expire_date }}
                                </h5>
                            @else
                                <h5 class="sponsor not-active mb-3">No active plans</h3>
                            @endif
                            {{-- <div class="bar mb-3"></div> --}}
                            <h3>{{ $apartment->address }}, {{ $apartment->city }}, {{ $apartment->state }}</h3>
                            <h6>PRICE: <strong>{{ $apartment->price }} €</strong></h6>
                            <div class="icons d-flex gap-3 mb-4">

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
                            <div class="d-flex flex-wrap gap-3">
                                <div class="box  details">
                                    <a class="ms-link" href="{{ route('admin.apartments.show', $apartment) }}"><i
                                            class="fa-solid fa-list"></i>DETAILS</a>
                                </div>
                                <div class="box edit">
                                    <a class="ms-link" href="{{ route('admin.apartments.edit', $apartment) }}"><i
                                            class="fa-solid fa-pen"></i> EDIT</a>
                                </div>
                                <div class="box messages">
                                    <a class="ms-link" href="{{ route('admin.messages.index', $apartment) }}"> <i
                                            class="fa-regular fa-message"></i> MESSAGES</a>
                                </div>
                                <div class="box delete">

                                    <form class="ms-link" action="{{ route('admin.apartments.destroy', $apartment->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <i class="fa-solid fa-trash"></i>
                                        <input type="submit" class="border-0 ms-delete" value="DELETE">
                                    </form>
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
                            name="name" minlength="3" required>
                    </div>
                    {{-- inserimento indirizzo --}}
                    <div class="mb-3">
                        <label for="address-input" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address-input" value="{{ old('address') }}"
                            required>
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
                            value="{{ old('square_meters') }}" name="square_meters" step="1" min="30"
                            pattern="^(?!-)[0-9]+$" required>
                    </div>
                    {{-- inserimento numero bagni --}}
                    <div class="mb-3">
                        <label for="bathrooms" class="form-label">Bathrooms Number</label>
                        <input type="number" step="0.01" class="form-control" id="bathrooms"
                            value="{{ old('bathrooms') }}" name="bathrooms" step="1" min="1"
                            pattern="^(?!-)[0-9]+$" required>
                    </div>
                    {{-- inserimento numero stanze --}}
                    <div class="mb-3">
                        <label for="rooms" class="form-label">Rooms Number</label>
                        <input type="number" class="form-control" id="rooms" value="{{ old('rooms') }}"
                            name="rooms" step="1" min="1" pattern="^(?!-)[0-9]+$" required>
                    </div>
                    {{-- inserimento numero letti --}}
                    <div class="mb-3">
                        <label for="beds" class="form-label">Beds Number</label>
                        <input type="number" class="form-control" id="beds" value="{{ old('beds') }}"
                            name="beds" step="1" min="1" pattern="^(?!-)[0-9]+$" required>
                    </div>
                    {{-- inserimento prezzo appartamento  --}}
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input type="number" class="form-control" id="price" value="{{ old('price') }}"
                            name="price"min="1" step="0.5" pattern="^(?!-)[0-9]+$" required>
                    </div>
                    {{-- inserimento valore percentuale dello sconto --}}
                    <div class="mb-3">
                        <label for="discount" class="form-label">Discount Value</label>
                        <input type="number" class="form-control" id="discount" value="{{ old('discount') }}"
                            name="discount" step="1" min="0" max="100" pattern="^(?!-)[0-9]+$"
                            required>
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
                        <textarea class="form-control" id="description" rows="3" name="description" required maxlength="500">{{ old('description') }}</textarea>
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
                            <img id="file-image-preview" style="width: 100px; height: 100px; margin-top:10px">
                        </div>
                    </div>
                    {{-- inserimento immagini aggiuntive --}}
                    <div class="mb-3">
                        <label for="additional_images" class="form-label">Additional Images</label>
                        <input class="form-control" type="file" id="additional_images" name="additional_images[]"
                            onchange="previewMultipleImages(event, 'additional-images-preview')" multiple>
                        <div class="preview" id="additional-images-preview"
                            style="display: flex; width: 100px; height: 100px; margin-top: 10px"></div>
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

        .active::before {
            content: "";
            display: inline-block;
            width: 12px;
            height: 12px;
            margin-right: 5px;
            border-radius: 50%;
            background-color: var(--custom-green);
        }

        .not-active::before {
            content: "";
            display: inline-block;
            width: 12px;
            height: 12px;
            margin-right: 5px;
            border-radius: 50%;
            background-color: grey;
        }

        h1,
        h3,
        h4,
        h5,
        h6,
        span {
            color: #252A34;
        }

        .ms-img-container {
            height: 300px;
        }


        .detail-container {
            height: auto;
            background-color: white;
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
            border-radius: 15px;
            transition: all .2s ease-in-out
        }

        .detail-container .sponsor {
            color: var(--custom-black);
            font-weight: 300;
        }

        .box {
            padding: 3px 10px;
            transition: all .2s ease-in-out;
        }

        .box:hover {
            scale: 1.1;

        }

        .details {
            border: 2px solid var(--custom-green);
        }

        .edit {
            border: 2px solid rgb(230, 230, 42);
        }

        .messages {
            border: 2px solid rgb(103, 103, 255);
        }

        .delete {
            border: 2px solid rgb(177, 33, 33);
        }

        .ms-link i {
            padding-right: 5px;
        }

        a {
            text-decoration: none;
            color: #252A34;
        }

        i {
            color: black;
        }

        a:hover {
            color: #3b4251
        }

        .ms-delete {
            background-color: inherit;
            font-family: inherit;
            color: #252A34;
            margin-left: -10px;
        }



        .ms-button {
            position: fixed;
            right: 5px;
            top: 10px;
            z-index: 999;
            background-color: #2ecc71;
            width: 50px;
            height: 50px;
            border: 1px solid #cdcdcd;
            border-radius: 25px;
            overflow: hidden;
            transition: width 0.2s ease-in-out;
        }

        .add-btn:hover {
            width: 120px;
        }

        .add-btn::before,
        .add-btn::after {
            transition: width 0.2s ease-in-out, border-radius 0.2s ease-in-out;
            content: "";
            position: absolute;
            height: 4px;
            width: 10px;
            top: calc(50% - 2px);
            background: white;
        }

        .add-btn::after {
            right: 14px;
            overflow: hidden;
            border-top-right-radius: 2px;
            border-bottom-right-radius: 2px;
        }

        .add-btn::before {
            left: 14px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        .ms-button:focus {
            outline: none;
        }

        .btn-txt {
            opacity: 0;
            font-size: 16px transition opacity 0.2s;
            color: white;
            font-weight: bold;
        }

        .add-btn:hover::before,
        .add-btn:hover::after {
            width: 4px;
            border-radius: 2px;
        }

        .add-btn:hover .btn-txt {
            opacity: 1;
        }

        .add-icon::after,
        .add-icon::before {
            transition: all 0.2s ease-in-out;
            content: "";
            position: absolute;
            height: 20px;
            width: 2px;
            top: calc(50% - 10px);
            background: white;
            overflow: hidden;
        }

        .add-icon::before {
            left: 22px;
            border-top-left-radius: 2px;
            border-bottom-left-radius: 2px;
        }

        .add-icon::after {
            right: 22px;
            border-top-right-radius: 2px;
            border-bottom-right-radius: 2px;
        }

        .add-btn:hover .add-icon::before {
            left: 15px;
            height: 4px;
            top: calc(50% - 2px);
        }

        .add-btn:hover .add-icon::after {
            right: 15px;
            height: 4px;
            top: calc(50% - 2px);
        }

        @media (min-width: 992px) {

            .w-50-desktop {
                width: 27% !important;
            }

            .ms-img-container {
                height: 350px;
            }

            .detail-container {
                height: 350px;
            }
            

        }
        @media (max-width: 992px) {
            .ms-button {
                top: 85px;
                right:10px;
            }
        }
    </style>


@endsection
