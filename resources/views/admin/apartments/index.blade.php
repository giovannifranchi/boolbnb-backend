@extends('layouts.auth')

@section('content')
    <main>
        <div class="container">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">City</th>
                        <th scope="col">Square Meters</th>
                        <th scope="col">Price</th>
                        <th scope="col">Discount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr>
                            <th>.</th>
                            <td>{{$apartment->city}}</td>
                            <td>{{$apartment->square_meters}}mq</td>
                            <td>{{$apartment->price}}$</td>
                            <td>{{$apartment->discount}}%</td>
                            <td>
                                <ul class="list-unstyled d-flex gap-1">
                                    <li><a href="{{ route('admin.apartments.show', $apartment)}}" class="btn btn-primary">Details</a></li>
                                    <li><a href="#" class="btn btn-success">Edit</a></li>
                                    <li><a href="#" class="btn btn-danger" id="{{$apartment->id}}">Delete</a></li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>


    </main>
@endsection