@extends('layouts.auth')

@section('content')
    <main>
        <form action="{{}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        </form>
    </main>

@endsection