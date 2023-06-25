@extends('layouts.auth')

@section('content')

<main>
	<div class="container px-3">
		<div class="row justify-content-center mt-5">
			<div class="col-12  rounded p-0" style="border: 1px solid #000;">
				<div class="row">
					<div class="col-12 col-md-6 d-flex flex-column">
						<img src="{{ asset($apartment->thumb) }}" alt="" class="img-fluid rounded {{count($apartment->images) > 0 ? 'flex-grow-1' : 'h-100'}}">
						<div class="preview p-3 d-flex gap-2">
							@foreach ( $images as $image )
							<div class="box w-100" style="height: 100px;">
								<img src="{{ asset($image->path) }}" alt="path" class="w-100 h-100 rounded">
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-12 col-md-6 d-flex flex-column gap-3">
						<h1 class="text-center fs-2">{{$apartment->name}}</h1>
						<h3> {{ $apartment->address }}, {{ $apartment->city }}, {{ $apartment->state }}</h3>
						<div class="row">
							<div class="col-3">
								m²:
								<strong>{{$apartment->square_meters}}</strong>
							</div>
							<div class="col-3">
								BATHS:
								<strong>{{$apartment->bathrooms}}</strong>
							</div>
							<div class="col-3">
								ROOMS:
								<strong>{{$apartment->rooms}}</strong>
							</div>
							<div class="col-3">
								BEDS:
								<strong>{{$apartment->beds}}</strong>
							</div>
						</div>
						<h3>Serives:</h3>
						<ul class="list-unstyled d-flex flex-wrap gap-3">
							@foreach ($apartment->services as $service)
							<li>
								<strong>
									{{$service->name}}
								</strong>
							</li>
							@endforeach
						</ul>
						<h3>Despription:</h3>
						<p>{{$apartment->description}}</p>
						<h3>Price: {{$apartment->price}}</h3>
					</div>
				</div>

			</div>
		</div>
	</div>








	<!-- <div class="container py-3">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card mb-3">
                    <img src="{{ asset($apartment->thumb) }}" alt="">
                    <div class="p-3">
                        <h3 class="card-title">Apartment Name: {{$apartment->name}}</h3>
                        <h4><strong>Address:</strong> {{$apartment->address}}</h4>
                        <h4><strong>City:</strong> {{$apartment->city}}</h4>
                        <h4><strong>State:</strong> {{$apartment->state}}</h4>
                        <div class="row">
                            <div class="col-6 col-lg-4">
                                <h5 class="text-center">Bathrooms: {{$apartment->bathrooms}}</h5>
                            </div>
                            <div class="col-6 col-lg-4">
                                <h5 class="text-center">Rooms: {{$apartment->rooms}}</h5>
                            </div>
                            <div class="col-6 col-lg-4">
                                <h5 class="text-center">Beds: {{$apartment->beds}}</h5>
                            </div>

                        </div>


                        <div>Price: {{$apartment->price}}</div>

                        <div>Latitude: {{$apartment->latitude}}</div>
                        <div>Longitude: {{$apartment->longitude}}</div>
                        <div>Description: {{$apartment->description}}</div>
                        <a href="{{ route('admin.gallery.index', ['apartment' => $apartment])}}" class="btn btn-primary">Images Gallery</a>
                    </div>
                </div>
            </div>
        </div> -->
	{{-- put the condition if services are not set --}}

	<section>
		<div class='pricing pricing-palden'>
			@foreach ($plans as $key=>$plan)
			<div class='pricing-item {{$key === 1 ? 'pricing__item--featured' : ''}}'>
				<div class='pricing-deco'>
					<svg class='pricing-deco-img' enable-background='new 0 0 300 100' height='100px' id='Layer_1' preserveAspectRatio='none' version='1.1' viewBox='0 0 300 100' width='300px' x='0px' xml:space='preserve' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns='http://www.w3.org/2000/svg' y='0px'>
						<path class='deco-layer deco-layer--1' d='M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z' fill='#FFFFFF' opacity='0.6'></path>
						<path class='deco-layer deco-layer--2' d='M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z' fill='#FFFFFF' opacity='0.6'></path>
						<path class='deco-layer deco-layer--3' d='M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z' fill='#FFFFFF' opacity='0.7'></path>
						<path class='deco-layer deco-layer--4' d='M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z' fill='#FFFFFF'></path>
					</svg>
					<div class='pricing-price'><span class='pricing-currency'></span>{{ $plan->price }} €
						<span class='pricing-period'>/ mo</span>
					</div>
					<h3 class='pricing-title'>{{ $plan->name }}</h3>
				</div>
				<ul class='pricing-feature-list'>

					<li class='pricing-feature'>{{ $plan->duration }} hours</li>
				</ul>
				<a href="{{route('admin.braintree.token', ['plan' => $plan, 'apartment' => $apartment->id])}}" class='pricing-action'>Choose plan</a>
			</div>
			@endforeach
		</div>
	</section>

	</div>
</main>


<style>
	/* details style */




	/* plans style */
	section {
		color: #7a90ff;
		padding: 2em 0 8em;
		position: relative;
		-webkit-font-smoothing: antialiased;
	}

	.pricing {
		display: -webkit-flex;
		display: flex;
		-webkit-flex-wrap: wrap;
		flex-wrap: wrap;
		-webkit-justify-content: center;
		justify-content: center;
		width: 100%;
		margin: 0 auto 3em;
	}

	.pricing-item {
		position: relative;
		display: -webkit-flex;
		display: flex;
		-webkit-flex-direction: column;
		flex-direction: column;
		-webkit-align-items: stretch;
		align-items: stretch;
		text-align: center;
		-webkit-flex: 0 1 330px;
		flex: 0 1 330px;
	}

	.pricing-action {
		color: inherit;
		border: none;
		background: none;
	}

	.pricing-action:focus {
		outline: none;
	}

	.pricing-feature-list {
		text-align: left;
	}

	.pricing-palden .pricing-item {
		font-family: "Open Sans", sans-serif;
		cursor: default;
		color: #84697c;
		background: #fff;
		box-shadow: 0 0 10px rgba(46, 59, 125, 0.23);
		border-radius: 20px 20px 10px 10px;
		margin: 1em;
	}

	@media screen and (min-width: 66.25em) {
		.pricing-palden .pricing-item {
			margin: 1em -0.5em;
		}

		.pricing-palden .pricing__item--featured {
			margin: 0;
			z-index: 10;
			box-shadow: 0 0 20px rgba(46, 59, 125, 0.23);
		}
	}

	.pricing-palden .pricing-deco {
		border-radius: 10px 10px 0 0;
		background: rgba(76, 70, 101, 0.99);
		padding: 4em 0 9em;
		position: relative;
	}

	.pricing-palden .pricing-deco-img {
		position: absolute;
		bottom: 0;
		left: 0;
		width: 100%;
		height: 160px;
	}

	.pricing-palden .pricing-title {
		font-size: 0.75em;
		margin: 0;
		text-transform: uppercase;
		letter-spacing: 5px;
		color: #fff;
	}

	.pricing-palden .deco-layer {
		-webkit-transition: -webkit-transform 0.5s;
		transition: transform 0.5s;
	}

	.pricing-palden .pricing-item:hover .deco-layer--1 {
		-webkit-transform: translate3d(15px, 0, 0);
		transform: translate3d(15px, 0, 0);
	}

	.pricing-palden .pricing-item:hover .deco-layer--2 {
		-webkit-transform: translate3d(-15px, 0, 0);
		transform: translate3d(-15px, 0, 0);
	}

	.pricing-palden .icon {
		font-size: 2.5em;
	}

	.pricing-palden .pricing-price {
		font-size: 3em;
		font-weight: bold;
		padding: 0;
		color: #fff;
		margin: 0 0 0.25em 0;
		line-height: 0.75;
	}

	.pricing-palden .pricing-currency {
		font-size: 0.15em;
		vertical-align: top;
	}

	.pricing-palden .pricing-period {
		font-size: 0.15em;
		padding: 0 0 0 0.5em;
		font-style: italic;
	}

	.pricing-palden .pricing__sentence {
		font-weight: bold;
		margin: 0 0 1em 0;
		padding: 0 0 0.5em;
	}

	.pricing-palden .pricing-feature-list {
		margin: 0;
		padding: 0.25em 0 2.5em;
		list-style: none;
		text-align: center;
	}

	.pricing-palden .pricing-feature {
		padding: 1em 0;
	}

	.pricing-palden .pricing-action {
		font-weight: bold;
		margin: auto 3em 2em 3em;
		padding: 1em 2em;
		color: #fff;
		border-radius: 30px;
		background: #4d4766;
		-webkit-transition: background-color 0.3s;
		transition: background-color 0.3s;
	}

	.pricing-palden .pricing-action:hover,
	.pricing-palden .pricing-action:focus {
		background-color: #100A13;
	}

	.pricing-palden .pricing-item--featured .pricing-deco {
		padding: 5em 0 8.885em 0;
	}
</style>
@endsection