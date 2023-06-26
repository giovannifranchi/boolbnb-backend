@extends('layouts.auth')

@section('content')

<main>
	<div class="container px-3">
		<div class="row justify-content-center mt-5">
			<div class="col-12  rounded p-0 my-container">
				<div class="row">
					<div class="col-12 col-md-6 d-flex flex-column my-image-container">
						<img src="{{ $galleries[0] }}" alt="" id="thumbnail" class="my-height img-fluid rounded {{count($apartment->images) > 0 ? 'flex-grow-1' : 'h-100'}}">
						<div class="preview p-3 d-flex gap-2">
							@foreach ( $galleries as $gallery )
							<div class="box w-100 my-box-image" >
								<img src="{{ asset($gallery) }}"  alt="path" class="w-100 h-100 rounded thumbnail"  onclick="selectImage(this)">
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-12 col-md-6 d-flex flex-column gap-3 my-detail-container">
						<h1 class="text-center fs-2">{{$apartment->name}}</h1>
						<h4> {{ $apartment->address }}, {{ $apartment->city }}, {{ $apartment->state }}</h4>
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
						<h3>Services:</h3>
						<ul class="list-unstyled d-flex flex-wrap gap-3">
							@foreach ($apartment->services as $service)
							<li class="projcard-tag text-decoration-none">
								{{$service->name}}	
							</li>
							@endforeach
						</ul>
						<h3>Description:</h3>
						<p>{{$apartment->description}}</p>
						<h3 class="d-flex justify-content-end my-price-container">Price: {{$apartment->price}} €</h3>
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

	<!-- <section>
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
 -->

	<div id="generic_price_table">
		<section>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<!--PRICE HEADING START-->
						<div class="price-heading clearfix">
							<h1>Choose your Plan</h1>
						</div>
						<!--//PRICE HEADING END-->
					</div>
				</div>
			</div>
			<div class="container">
				<!--BLOCK ROW START-->
				<div class="row">
					@foreach ($plans as $key=>$plan)
					<div class="col-md-4 {{$key === 1 ? 'pricing__item--featured' : ''}}">

						<!--PRICE CONTENT START-->
						<div class="generic_content clearfix">

							<!--HEAD PRICE DETAIL START-->
							<div class="generic_head_price clearfix">

								<!--HEAD CONTENT START-->
								<div class="generic_head_content clearfix">

									<!--HEAD START-->
									<div class="head_bg"></div>
									<div class="head">
										<span>{{ $plan->name }}</span>
									</div>
									<!--//HEAD END-->

								</div>
								<!--//HEAD CONTENT END-->

								<!--PRICE START-->
								<div class="generic_price_tag clearfix">
									<span class="price">
										<span class="sign">€</span>
										<span class="currency">{{ $plan->price }}</span>
										<span class="month">/MON</span>
									</span>
								</div>
								<!--//PRICE END-->

							</div>
							<!--//HEAD PRICE DETAIL END-->

							<!--FEATURE LIST START-->
							<div class="generic_feature_list">
								<ul>
									<li><span>{{ $plan->duration }} hours</span> Sponsorship</li>
									<li><span>24/7</span> Support</li>
								</ul>
							</div>
							<!--//FEATURE LIST END-->

							<!--BUTTON START-->
							<div class="generic_price_btn clearfix">
								<a class="" href="{{route('admin.braintree.token', ['plan' => $plan, 'apartment' => $apartment->id])}}">Sign up</a>
							</div>
							<!--//BUTTON END-->

						</div>
						<!--//PRICE CONTENT END-->

					</div>
					<!--//BLOCK ROW END-->
					@endforeach

				</div>
		</section>
	</div>
	
</main>
<script>
 function selectImage(element) {
    let images = document.getElementsByClassName('thumbnail');
    let thumbnail = document.getElementById('thumbnail');

    for (let i = 0; i < images.length; i++) {
        images[i].classList.remove('selected-thumbnail');
        if (images[i].classList.contains('selected')) {
            images[i].classList.remove('selected');
        }
    }

    element.classList.add('selected');
    element.classList.add('selected-thumbnail');

    let selectedImagePath = element.getAttribute('src');
    thumbnail.setAttribute('src', selectedImagePath);
}
	
</script>

<style>
	/* img change  */
	.selected-thumbnail {
        border: 2px solid red; /* Colore e dimensione del bordo per l'immagine selezionata */
    }
	/* details style */
	.my-container{
		
		background-color: white;
	}
	.my-image-container{
		padding: 10px 0 0 22px;
		 
	}
	.my-box-image{
		height: 100px;
		cursor: pointer;
	}
	.my-price-container{
		margin-right: 15px;
	}
	.my-detail-container{
		padding-left: 50px;
		padding-top: 20px
	}

	.my-height{
		max-height: 485px;
	}

	/* plans style */

	#generic_price_table {
		background-color: #EAEAEA;
	}

	/*PRICE COLOR CODE START*/
	#generic_price_table .generic_content {
		background-color: #fff;
	}

	#generic_price_table .generic_content .generic_head_price {
		background-color: #f6f6f6;
	}

	#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg {
		border-color: #e4e4e4 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #e4e4e4;
	}

	#generic_price_table .generic_content .generic_head_price .generic_head_content .head span {
		color: #525252;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign {
		color: #414141;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency {
		color: #414141;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent {
		color: #414141;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag .month {
		color: #414141;
	}

	#generic_price_table .generic_content .generic_feature_list ul li {
		color: #a7a7a7;
	}

	#generic_price_table .generic_content .generic_feature_list ul li span {
		color: #414141;
	}

	#generic_price_table .generic_content .generic_feature_list ul li:hover {
		background-color: #e4e4e4;
		border-left: 5px solid #2ecc71;
	}

	#generic_price_table .generic_content .generic_price_btn a {
		border: 1px solid #2ecc71;
		color: #2ecc71;
	}

	#generic_price_table .generic_content.active .generic_head_price .generic_head_content .head_bg,
	#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg {
		border-color: #2ecc71 rgba(0, 0, 0, 0) rgba(0, 0, 0, 0) #2ecc71;
		color: #fff;
	}

	#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head span,
	#generic_price_table .generic_content.active .generic_head_price .generic_head_content .head span {
		color: #fff;
	}

	#generic_price_table .generic_content:hover .generic_price_btn a,
	#generic_price_table .generic_content.active .generic_price_btn a {
		background-color: #2ecc71;
		color: #fff;
	}

	#generic_price_table {
		margin: 50px 0 50px 0;
		font-family: "Raleway", sans-serif;
	}

	.row .table {
		padding: 28px 0;
	}

	/*PRICE BODY CODE START*/

	#generic_price_table .generic_content {
		overflow: hidden;
		position: relative;
		text-align: center;
	}

	#generic_price_table .generic_content .generic_head_price {
		margin: 0 0 20px 0;
	}

	#generic_price_table .generic_content .generic_head_price .generic_head_content {
		margin: 0 0 50px 0;
	}

	#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg {
		border-style: solid;
		border-width: 90px 1411px 23px 399px;
		position: absolute;
	}

	#generic_price_table .generic_content .generic_head_price .generic_head_content .head {
		padding-top: 40px;
		position: relative;
		z-index: 1;
	}

	#generic_price_table .generic_content .generic_head_price .generic_head_content .head span {
		font-family: "Raleway", sans-serif;
		font-size: 28px;
		font-weight: 400;
		letter-spacing: 2px;
		margin: 0;
		padding: 0;
		text-transform: uppercase;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag {
		padding: 0 0 20px;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag .price {
		display: block;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .sign {
		display: inline-block;
		font-family: "Lato", sans-serif;
		font-size: 28px;
		font-weight: 400;
		vertical-align: middle;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .currency {
		font-family: "Lato", sans-serif;
		font-size: 60px;
		font-weight: 300;
		letter-spacing: -2px;
		line-height: 60px;
		padding: 0;
		vertical-align: middle;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag .price .cent {
		display: inline-block;
		font-family: "Lato", sans-serif;
		font-size: 24px;
		font-weight: 400;
		vertical-align: bottom;
	}

	#generic_price_table .generic_content .generic_head_price .generic_price_tag .month {
		font-family: "Lato", sans-serif;
		font-size: 18px;
		font-weight: 400;
		letter-spacing: 3px;
		vertical-align: bottom;
	}

	#generic_price_table .generic_content .generic_feature_list ul {
		list-style: none;
		padding: 0;
		margin: 0;
	}

	#generic_price_table .generic_content .generic_feature_list ul li {
		font-family: "Lato", sans-serif;
		font-size: 18px;
		padding: 15px 0;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table .generic_content .generic_feature_list ul li:hover {
		transition: all 0.3s ease-in-out 0s;
		-moz-transition: all 0.3s ease-in-out 0s;
		-ms-transition: all 0.3s ease-in-out 0s;
		-o-transition: all 0.3s ease-in-out 0s;
		-webkit-transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table .generic_content .generic_feature_list ul li .fa {
		padding: 0 10px;
	}

	#generic_price_table .generic_content .generic_price_btn {
		margin: 20px 0 32px;
	}

	#generic_price_table .generic_content .generic_price_btn a {
		border-radius: 50px;
		-moz-border-radius: 50px;
		-ms-border-radius: 50px;
		-o-border-radius: 50px;
		-webkit-border-radius: 50px;
		display: inline-block;
		font-family: "Lato", sans-serif;
		font-size: 18px;
		outline: medium none;
		padding: 12px 30px;
		text-decoration: none;
		text-transform: uppercase;
	}

	#generic_price_table .generic_content,
	#generic_price_table .generic_content:hover,
	#generic_price_table .generic_content .generic_head_price .generic_head_content .head_bg,
	#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head_bg,
	#generic_price_table .generic_content .generic_head_price .generic_head_content .head h2,
	#generic_price_table .generic_content:hover .generic_head_price .generic_head_content .head h2,
	#generic_price_table .generic_content .price,
	#generic_price_table .generic_content:hover .price,
	#generic_price_table .generic_content .generic_price_btn a,
	#generic_price_table .generic_content:hover .generic_price_btn a {
		transition: all 0.3s ease-in-out 0s;
		-moz-transition: all 0.3s ease-in-out 0s;
		-ms-transition: all 0.3s ease-in-out 0s;
		-o-transition: all 0.3s ease-in-out 0s;
		-webkit-transition: all 0.3s ease-in-out 0s;
	}

	@media (max-width: 320px) {}

	@media (max-width: 767px) {
		#generic_price_table .generic_content {
			margin-bottom: 75px;
		}
	}

	@media (min-width: 768px) and (max-width: 991px) {
		#generic_price_table .col-md-3 {
			float: left;
			width: 50%;
		}

		#generic_price_table .col-md-4 {
			float: left;
			width: 50%;
		}

		#generic_price_table .generic_content {
			margin-bottom: 75px;
		}
	}

	@media (min-width: 992px) and (max-width: 1199px) {}

	@media (min-width: 1200px) {}

	#generic_price_table_home {
		font-family: "Raleway", sans-serif;
	}

	.text-center h1,
	.text-center h1 a {
		color: #7885cb;
		font-size: 30px;
		font-weight: 300;
		text-decoration: none;
	}

	.demo-pic {
		margin: 0 auto;
	}

	.demo-pic:hover {
		opacity: 0.7;
	}

	#generic_price_table_home ul {
		margin: 0 auto;
		padding: 0;
		list-style: none;
		display: table;
	}

	#generic_price_table_home li {
		float: left;
	}

	#generic_price_table_home li+li {
		margin-left: 10px;
		padding-bottom: 10px;
	}

	#generic_price_table_home li a {
		display: block;
		width: 50px;
		height: 50px;
		font-size: 0px;
	}

	#generic_price_table_home .blue {
		background: #3498db;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table_home .emerald {
		background: #2ecc71;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table_home .grey {
		background: #7f8c8d;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table_home .midnight {
		background: #34495e;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table_home .orange {
		background: #e67e22;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table_home .purple {
		background: #9b59b6;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table_home .red {
		background: #e74c3c;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table_home .turquoise {
		background: #1abc9c;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table_home .blue:hover,
	#generic_price_table_home .emerald:hover,
	#generic_price_table_home .grey:hover,
	#generic_price_table_home .midnight:hover,
	#generic_price_table_home .orange:hover,
	#generic_price_table_home .purple:hover,
	#generic_price_table_home .red:hover,
	#generic_price_table_home .turquoise:hover {
		border-bottom-left-radius: 50px;
		border-bottom-right-radius: 50px;
		border-top-left-radius: 50px;
		border-top-right-radius: 50px;
		transition: all 0.3s ease-in-out 0s;
	}

	#generic_price_table_home .divider {
		border-bottom: 1px solid #ddd;
		margin-bottom: 20px;
		padding: 20px;
	}

	#generic_price_table_home .divider span {
		width: 100%;
		display: table;
		height: 2px;
		background: #ddd;
		margin: 50px auto;
		line-height: 2px;
	}

	#generic_price_table_home .itemname {
		text-align: center;
		font-size: 50px;
		padding: 50px 0 20px;
		border-bottom: 1px solid #ddd;
		margin-bottom: 40px;
		text-decoration: none;
		font-weight: 300;
	}

	#generic_price_table_home .itemnametext {
		text-align: center;
		font-size: 20px;
		padding-top: 5px;
		text-transform: uppercase;
		display: inline-block;
	}

	#generic_price_table_home .footer {
		padding: 40px 0;
	}

	.price-heading {
		text-align: center;
	}

	.price-heading h1 {
		color: #666;
		margin: 0;
		padding: 0 0 50px 0;
	}

	.demo-button {
		background-color: #333333;
		color: #ffffff;
		display: table;
		font-size: 20px;
		margin-left: auto;
		margin-right: auto;
		margin-top: 20px;
		margin-bottom: 50px;
		outline-color: -moz-use-text-color;
		outline-style: none;
		outline-width: medium;
		padding: 10px;
		text-align: center;
		text-transform: uppercase;
	}

	.bottom_btn {
		background-color: #333333;
		color: #ffffff;
		display: table;
		font-size: 28px;
		margin: 60px auto 20px;
		padding: 10px 25px;
		text-align: center;
		text-transform: uppercase;
	}

	.demo-button:hover {
		background-color: #666;
		color: #fff;
		text-decoration: none;
	}

	.bottom_btn:hover {
		background-color: #666;
		color: #fff;
		text-decoration: none;
	}

	/* tag style  */
  
    .projcard-tag {
        display: inline-block;
        background-color: rgba(224, 224, 224, 1);
        color: #777;
        border-radius: 3px 3px 3px 3px;
        line-height: 26px;
        padding: 0 10px 0 23px;
        position: relative;
        margin-right: 20px;
        user-select: none;
        
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

</style>
@endsection