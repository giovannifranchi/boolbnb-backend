@extends('layouts.auth')

@section('content')

<main>
	<div class="container px-3">                                
		<button class=" btn-back"> <a href="{{ route('admin.apartments.index') }}"
		class="nav-link">{{ __('Go back to your apartment list') }} </a></button>
		
		
		<div class="row justify-content-center mt-5">
			<div class="col-12  rounded p-0 my-container" onmouseover="aggiungiClassi()" onmouseout="rimuoviClassi()">
				<div class="row">
					<div class="col-12 col-md-6 d-flex flex-column my-image-container">
						<img src="{{ $galleries[0] }}" alt="" id="thumbnail" class="my-height img-fluid rounded {{count($apartment->images) > 0 ? 'flex-grow-1' : 'h-100'}}">
						<div class="preview p-3 row gap-2">
							@foreach ( $galleries as $key =>$gallery )
							<div class="box my-box-image {{count($galleries) > 1 ? 'col' : 'col-3'}}" >
								<img src="{{ asset($gallery) }}"  alt="path" class="w-100 h-100 rounded thumbnail {{$key === 0 ? 'selected-thumbnail' : ''}}"  onclick="selectImage(this)" onmouseover="enlargeImage(this)" onmouseout="resetImageSize(this)">
							</div>
							@endforeach
						</div>
					</div>
					<div class="col-12 col-md-6 d-flex flex-column gap-3 my-detail-container">
						<h1 class="fs-2 change-color">{{$apartment->name}}</h1>
						<h4 class="change-color"> {{ $apartment->address }}, {{ $apartment->city }}, {{ $apartment->state }}</h4>
						<div class="row">
							<div class="col-3 change-color">
								m²:
								<strong>{{$apartment->square_meters}}</strong>
							</div>
							<div class="col-3 change-color">
								BATHS:
								<strong>{{$apartment->bathrooms}}</strong>
							</div>
							<div class="col-3 change-color">
								ROOMS:
								<strong>{{$apartment->rooms}}</strong>
							</div>
							<div class="col-3 change-color">
								BEDS:
								<strong>{{$apartment->beds}}</strong>
							</div>
						</div>
						<h3 class="change-color">Services:</h3>
						<ul class="list-unstyled d-flex flex-wrap gap-3">
							@foreach ($apartment->services as $service)
							<li class="projcard-tag text-decoration-none">
								{{$service->name}}
							</li>
							@endforeach
						</ul>
						<h3>Description:</h3>
						<p>{{$apartment->description}}</p>
						<div class="d-flex justify-content-end ">
							<h3 class="" id="my-price-id">{{$apartment->price}} €/<small>night</small></h3>
						</div>

					</div>
				</div>

			</div>
		</div>
	</div>



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
								<a class="" href="{{route('admin.braintree.token', ['plan' => $plan, 'apartment' => $apartment])}}">Sign up</a>
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

	function enlargeImage(element) {
		element.style.transform = "scale(1.1)";
	}

	function resetImageSize(element) {
		element.style.transform = "scale(1)";
	}


	

</script>

<style>
	.btn-back{
		margin-top: 20px;
		border: 1px solid var(--custom-green);
		padding:10px 20px;
		color:var(--custom-green);
		border-radius: 25px;
		font-weight: 600;


	}
	.btn-back:hover{
		/* scale: 1.05; */
		transition: transform 0.2s ease-in-out;
		background-color: var(--custom-green);
		color:white;
		
	}
	/* img change  */
	.selected-thumbnail {
		border: 3px solid var(--custom-green);
	}

	.thumbnail {
		width: 100px;
		height: 100px;
		transition: transform 0.2s ease-in-out;
		/* Colore e dimensione del bordo per l'immagine selezionata */
	}

	/* details style */
	.my-container{
		color: black;
		/* background: linear-gradient(to left, white, #2ecc71); */
		background-color: white;
		transition: 0.3s ease-in-out;
	}

	
	

	.my-image-container {
		padding: 10px 0 0 22px;

	}

	.my-box-image {
		height: 100px;
		cursor: pointer;
	}

	#my-price-id {
		padding: 3px 10px 3px 10px;
		margin-right: 15px;
		border-radius: 5px;
		transition: transform 0.3s ease;
		background-color: rgba(46, 204, 113, 1);
		color: white;
	}

	

	.my-detail-container {
		padding-left: 50px;
		padding-top: 20px
	}

	.my-height {
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