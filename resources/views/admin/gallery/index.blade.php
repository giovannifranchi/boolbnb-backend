@extends('layouts.auth')

@section('content')
<main>
    <div class="container">
        <div class="row gy-3">
            @foreach ($images as $image)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($image->path) }}" class="img-fluid" style="width: 100%; height: 400px;" alt="...">
                </div>
            </div>
            @endforeach
           <!--  <div class="col-md-4" style="height: 100vh;">
                <div class="card">
                    <input type="file" name="fileInput" id="fileInput" style="display: none;">
                    <label for="fileInput" class="site-btn d-flex align-items-center justify-content-center" style="width: 100%; height: 400px;">
                        <h1>+</h1>
                    </label>
                </div>
            </div> -->

        </div>
    </div>
</main>
@endsection