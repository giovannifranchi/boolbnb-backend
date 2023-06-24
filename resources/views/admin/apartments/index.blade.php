@extends('layouts.auth')

@section('content')
<main>
    {{-- <div class="container py-3">
        <a href="{{ route('admin.apartments.create')}}" class="btn btn-success mb-3">Create</a>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Picture</th>
                <th scope="col">Nome</th>
                <th scope="col">City</th>
                <th scope="col">Address</th>
                <th scope="col">Square Meters</th>
                <th scope="col">Price</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($apartments as $apartment)
            <tr>
                <th><img src="{{ asset($apartment->thumb) }}" alt="" style="width: 100px; height: 100px;object-fit: cover;"></th>
                <td>{{$apartment->name}}</td>
                <td>{{$apartment->city}}</td>
                <td>{{$apartment->address}}</td>
                <td>{{$apartment->square_meters}}mq</td>
                <td>{{$apartment->price}}$</td>
                <td>
                    <ul class="list-unstyled d-flex gap-1">
                        <li><a href="{{ route('admin.apartments.show', $apartment)}}" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M288 80c-65.2 0-118.8 29.6-159.9 67.7C89.6 183.5 63 226 49.4 256c13.6 30 40.2 72.5 78.6 108.3C169.2 402.4 222.8 432 288 432s118.8-29.6 159.9-67.7C486.4 328.5 513 286 526.6 256c-13.6-30-40.2-72.5-78.6-108.3C406.8 109.6 353.2 80 288 80zM95.4 112.6C142.5 68.8 207.2 32 288 32s145.5 36.8 192.6 80.6c46.8 43.5 78.1 95.4 93 131.1c3.3 7.9 3.3 16.7 0 24.6c-14.9 35.7-46.2 87.7-93 131.1C433.5 443.2 368.8 480 288 480s-145.5-36.8-192.6-80.6C48.6 356 17.3 304 2.5 268.3c-3.3-7.9-3.3-16.7 0-24.6C17.3 208 48.6 156 95.4 112.6zM288 336c44.2 0 80-35.8 80-80s-35.8-80-80-80c-.7 0-1.3 0-2 0c1.3 5.1 2 10.5 2 16c0 35.3-28.7 64-64 64c-5.5 0-10.9-.7-16-2c0 .7 0 1.3 0 2c0 44.2 35.8 80 80 80zm0-208a128 128 0 1 1 0 256 128 128 0 1 1 0-256z" />
                                </svg></a></li>
                        <li><a href="{{ route('admin.apartments.edit', $apartment->id)}}" class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z" />
                                </svg></a></li>
                        <li><a href="#" class="btn btn-info"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M160 368c26.5 0 48 21.5 48 48v16l72.5-54.4c8.3-6.2 18.4-9.6 28.8-9.6H448c8.8 0 16-7.2 16-16V64c0-8.8-7.2-16-16-16H64c-8.8 0-16 7.2-16 16V352c0 8.8 7.2 16 16 16h96zm48 124l-.2 .2-5.1 3.8-17.1 12.8c-4.8 3.6-11.3 4.2-16.8 1.5s-8.8-8.2-8.8-14.3V474.7v-6.4V468v-4V416H112 64c-35.3 0-64-28.7-64-64V64C0 28.7 28.7 0 64 0H448c35.3 0 64 28.7 64 64V352c0 35.3-28.7 64-64 64H309.3L208 492z" />
                                </svg></a></li>
                        <li><a href="{{route('admin.stats.index')}}" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                    <path d="M64 64c0-17.7-14.3-32-32-32S0 46.3 0 64V400c0 44.2 35.8 80 80 80H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H80c-8.8 0-16-7.2-16-16V64zm406.6 86.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L320 210.7l-57.4-57.4c-12.5-12.5-32.8-12.5-45.3 0l-112 112c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L240 221.3l57.4 57.4c12.5 12.5 32.8 12.5 45.3 0l128-128z" />
                                </svg></a></li>
                        <li>
                            <form action="{{ route('admin.apartments.destroy', $apartment) }}" method="POST" id="form">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                                        <path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z" />
                                    </svg>
                                    </svg>
                                </button>

                            </form>
                        </li>
                    </ul>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div> --}}

    <div class="projcard-container py-3">
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










</main>

<style>
    /* show style */

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
        background-image: linear-gradient(-70deg, #424242, transparent 50%);
        opacity: 0.07;
    }

    .projcard:nth-child(2n)::before {
        background-image: linear-gradient(-250deg, #424242, transparent 50%);
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
        background-color: #0088ff; /* TODO:fix reactivity on colours */
    }

    .sponsor.present::before{
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