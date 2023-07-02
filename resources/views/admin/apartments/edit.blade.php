@extends('layouts.auth')

@section('content')
<main class="container px-3">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <button class=" btn-back"> <a href="{{ route('admin.apartments.index') }}" class="nav-link">{{ __('Dashboard') }} </a></button>
    <form class="row" action="{{ route('admin.apartments.update', $apartment)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-12 col-lg-8 mt-5">

            {{-- inserimento nome appartamento --}}
            <div class="mb-3">
                <label for="name" class="form-label">Apartment Name </label>
                <input type="text" class="form-control" id="name" value="{{ old('name',$apartment->name)}}" name="name" minlength="3" required>
            </div>
            {{-- inserimento metri quadri appartamento  --}}
            <div class="mb-3">
                <label for="square_meters" class="form-label">Square Meters</label>
                <input type="number" class="form-control" id="square_meters" value="{{old('square_meters',$apartment->square_meters)}}" name="square_meters" step="1" min="30" pattern="^(?!-)[0-9]+$" required>
            </div>
            {{-- inserimento numero bagni --}}
            <div class="mb-3">
                <label for="bathrooms" class="form-label">Bathrooms Number</label>
                <input type="number" step="0.01" class="form-control" id="bathrooms" value="{{old('bathrooms',$apartment->bathrooms)}}" name="bathrooms" step="1" min="1" pattern="^(?!-)[0-9]+$" required>
            </div>
            {{-- inserimento numero stanze --}}
            <div class="mb-3">
                <label for="rooms" class="form-label">Rooms Number</label>
                <input type="number" class="form-control" id="rooms" value="{{old('rooms',$apartment->rooms)}}" name="rooms" step="1" min="1" pattern="^(?!-)[0-9]+$" required>
            </div>
            {{-- inserimento numero letti --}}
            <div class="mb-3">
                <label for="beds" class="form-label">Beds Number</label>
                <input type="number" class="form-control" id="beds" value="{{old('beds',$apartment->beds)}}" name="beds" path="^(?!-)[0-9]+$">
            </div>
            {{-- inserimento prezzo appartamento  --}}
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" value="{{old('price',$apartment->price)}}" name="price" min="1" step="0.5" pattern="^(?!-)[0-9]+$" required>
            </div>
            {{-- inserimento valore percentuale dello sconto --}}
            <div class="mb-3">
                <label for="discount" class="form-label">Discount Value</label>
                <input type="number" class="form-control" id="discount" value="{{old('discount',$apartment->discount)}}" name="discount" step="1" min="0" max="100" pattern="^(?!-)[0-9]+$" required>
            </div>

            {{-- inserimento descrizione appartamento  --}}
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" rows="3" name="description" required>{{old('description',$apartment->description)}}</textarea>
            </div>

        </div>
        <div class="col-12 col-lg-4">

            {{-- inserimento immagine che si vuole avere come copertina  --}}
            <div class="mb-3">
                <label for="cover_image" class="form-label">Cover Image</label>
                <input class="form-control" type="file" id="cover_image" name="thumb" onchange="previewImage(event, 'file-image-preview')" multiple value="{{ old('thumb', $apartment->thumb) }}">
                <div class="preview mt-3">
                    <img id="file-image-preview" class="img-fluid" style="width: 100px; height:100px;" @if ($apartment->thumb) src="{{ $apartment->thumb }} @endif" class="img-fluid">
                </div>
            </div>
            {{-- inserimento immagini aggiuntive --}}
            <div class="mb-3">
                <label for="additional_images" class="form-label">Additional Images</label>
                <input class="form-control" type="file" id="additional_images" name="additional_images[]" onchange="previewMultipleImages(event, 'additional-images-preview')" multiple value="{{ old('additional_images', $apartment->additional_images) }}">

                <div class="preview mt-3" id="additional-images-preview" style="display: flex; gap: 15px;">
                    @if (count($apartment->images)> 0)
                    @foreach ($apartment->images as $image)
                    <img src="{{asset($image->path)}}" alt="" style="width: 100px; height:100px;">
                    @endforeach
                    @endif
                </div>
            </div>
            {{-- services --}}
            @if ($errors->any())
            <div class="mb-3">
                <div>Services</div>
                <div class="row">
                    @foreach ($services as $service)
                    <div class="col-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="services[]" id="services{{ $service->id }}" value="{{ $service->id }}" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="services{{ $service->id }}">{{ $service->name }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @else
            <div class="mb-3">
                <div>Services</div>
                <div class="row">
                    @foreach ($services as $service)
                    <div class="col-6">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="services[]" id="services{{ $service->id }}" value="{{ $service->id }}" {{ $apartment->services->contains($service->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="services{{ $service->id }}">{{ $service->name }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

        </div>
        <div class="form-check form-switch mb-3 ms-3">
            <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="is_visible" value="1" @if($apartment->is_visible) checked @endif>
            {{-- @dd($apartment->is_visible) --}}
            <label class="form-check-label" for="flexSwitchCheckDefault">Is Visible?</label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</main>

<style>
    label {
        color: #000;
    }

    .btn-back {
        margin-top: 35px;
        border: 1px solid var(--custom-green);
        padding: 10px 20px;
        color: var(--custom-green);
        border-radius: 25px;
        font-weight: 600;


    }

    .btn-back:hover {
        /* scale: 1.05; */
        transition: transform 0.2s ease-in-out;
        background-color: var(--custom-green);
        color: white;

    }

    .ms-text-primary {
        color: var(--custom-black);
    }

    .ms-text-light {
        color: var(--custom-black);
    }
</style>

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