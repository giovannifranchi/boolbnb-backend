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
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($apartments as $apartment)
                        <tr>
                            <th>{{$apartment->name}}</th>
                            <td>{{$apartment->city}}</td>
                            <td>{{$apartment->square_meters}}mq</td>
                            <td>{{$apartment->price}}$</td>
                            <td>{{$apartment->discount}}%</td>
                            <td>
                                <ul class="list-unstyled d-flex gap-1">
                                    <li><a href="{{ route('admin.apartments.show', $apartment)}}" class="btn btn-primary">Details</a></li>
                                    <li><a href="{{ route('admin.apartments.edit', $apartment)}}" class="btn btn-success">Edit</a></li>
                                    <li>
                                        <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="POST" id="form">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>



        </div>


    </main>
@endsection