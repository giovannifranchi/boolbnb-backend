@extends('layouts.auth')

@section('content')
<main>
    <div class="container">
        <div class="row gy-3">
            @foreach ($images as $image)
            <div class="col-md-4">
                <div class="card">
                    <img src="{{ asset($image->path) }}" class="img-fluid" style="width: 100%; height: 400px;" alt="...">
                    <form action="{{ route('admin.gallery.index', $image) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Rimuovi</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</main>
@endsection
