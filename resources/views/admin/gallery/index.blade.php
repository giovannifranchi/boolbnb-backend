@extends('layouts.auth')

@section('content')
<main>
    <div class="container">

        <div class="row">
            @foreach ($images as $image)
            <div class="col-6">
                <img src="{{asset($image->path)}}" alt="ciao ciao" class="img-fluid">
            </div>

            @endforeach
        </div>
    </div>
</main>
@endsection