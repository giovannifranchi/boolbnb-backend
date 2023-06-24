@extends('layouts.auth')

@section('content')

<main>

    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <h4 class="text-center"><strong>STYLE 3</strong></h4>
                <hr>
                <div class="profile-card-4 text-center"><img src="{{asset($apartment->thumb)}}" class="img img-responsive">
                    <div class="profile-content">
                        <div class="profile-name">John Doe
                            <p>@johndoedesigner</p>
                        </div>
                        <div class="profile-description">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor.</div>
                        <div class="row">
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <p>TWEETS</p>
                                    <h4>1300</h4>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <p>FOLLOWERS</p>
                                    <h4>250</h4>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="profile-overview">
                                    <p>FOLLOWING</p>
                                    <h4>168</h4>
                                </div>
                            </div>

                        </div>
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

    header {
	position: relative;
	left: 0;
	top: 0;
	width: 100%;
	min-height: 120px;
	padding: 50px 0;
	color: #fff;
	background: #383838
		url(https://www.athenadesignstudio.com/plugins/switch/images/bg.jpg) no-repeat
		center center;
	margin-bottom: 30px;
}

/* Logo */
header .logo {
	clear: both;
	display: block;
	text-align: center;
	padding-bottom: 10px;
}

/* Title */
header h1 {
	font-weight: 300;
	font-size: 24px;
	color: #eee;
	letter-spacing: 2px;
	text-align: center;
	text-transform: uppercase;
	margin: 0 !important;
	padding-bottom: 25px;
}

@import url("https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900|Open Sans:400,600,800");
h1,
h2,
h3,
h4,
h5,
h6,
div,
input,
p,
a {
	font-family: "Open Sans";
	margin: 0px;
}

a,
a:hover,
a:focus {
	color: inherit;
}

body {
	background-color: #f1f2f3;
}

.container-fluid,
.container {
	max-width: 1200px;
}

.card-container {
	padding: 100px 0px;
	-webkit-perspective: 1000;
	perspective: 1000;
}

.profile-card-1 {
	background-color: #fff;
	border-radius: 10px;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	background-image: url(../img/profile-bg-1.jpg);
	background-position: center;
	padding-top: 100px;
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
	max-width: 300px;
}

.profile-card-1 .profile-content {
	position: relative;
	background-color: #fff;
	padding: 70px 20px 20px 20px;
	text-align: center;
}

.profile-card-1 .profile-img {
	position: absolute;
	height: 100px;
	left: 0px;
	right: 0px;
	z-index: 10;
	top: -50px;
	transition: all 0.25s linear;
	transform-style: preserve-3d;
}

.profile-card-1 .profile-img img {
	height: 100px;
	margin: auto;
	border-radius: 50%;
	border: 5px solid #fff;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

.profile-card-1 .profile-name {
	font-size: 18px;
	font-weight: bold;
	color: #021830;
}

.profile-card-1 .profile-address {
	color: #777;
	font-size: 12px;
	margin: 0px 0px 15px 0px;
}

.profile-card-1 .profile-description {
	font-size: 13px;
	padding: 5px 10px;
	color: #777;
}

.profile-card-1 .profile-icons .fa {
	margin: 5px;
	color: #777;
}

.profile-card-1:hover {
	box-shadow: 0px 0px 50px rgba(0, 0, 0, 0.1);
}

.profile-card-1:hover .profile-img {
	transform: rotateY(180deg);
}

.profile-card-2 {
	max-width: 300px;
	background-color: #fff;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	background-position: center;
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
	border-radius: 10px;
}

.profile-card-2 img {
	transition: all linear 0.25s;
}

.profile-card-2 .profile-name {
	position: absolute;
	left: 30px;
	bottom: 70px;
	font-size: 30px;
	color: #fff;
	text-shadow: 0px 0px 20px rgba(0, 0, 0, 0.5);
	font-weight: bold;
	transition: all linear 0.25s;
}

.profile-card-2 .profile-icons {
	position: absolute;
	bottom: 30px;
	right: 30px;
	color: #fff;
	transition: all linear 0.25s;
}

.profile-card-2 .profile-username {
	position: absolute;
	bottom: 50px;
	left: 30px;
	color: #fff;
	font-size: 13px;
	transition: all linear 0.25s;
}

.profile-card-2 .profile-icons .fa {
	margin: 5px;
}

.profile-card-2:hover img {
	filter: grayscale(100%);
}

.profile-card-2:hover .profile-name {
	bottom: 80px;
}

.profile-card-2:hover .profile-username {
	bottom: 60px;
}

.profile-card-2:hover .profile-icons {
	right: 40px;
}

.profile-card-3 {
	background-color: #fff;
	border-radius: 5px;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
	padding: 25px 15px;
}

.profile-card-3 .profile-name {
	font-weight: bold;
	color: #21304e;
}

.profile-card-3 .profile-location {
	color: #999;
	font-size: 13px;
	font-weight: 600;
}

.profile-card-3 img {
	height: 100px;
	width: 100px;
	object-fit: cover;
	margin: 10px auto;
	border-radius: 50%;
	transition: all linear 0.25s;
}

.profile-card-3 .profile-description {
	font-size: 13px;
	color: #777;
	padding: 10px;
}

.profile-card-3 .profile-icons {
	margin: 15px 0px;
}

.profile-card-3 .profile-icons .fa {
	color: #fe455a;
	margin: 0px 5px;
}

.profile-card-3:hover img {
	height: 110px;
	width: 110px;
	margin: 5px auto;
}

.profile-card-4 {
	max-width: 300px;
	background-color: #fff;
	border-radius: 5px;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
}

.profile-card-4 img {
	transition: all 0.25s linear;
}

.profile-card-4 .profile-content {
	position: relative;
	padding: 15px;
	background-color: #fff;
}

.profile-card-4 .profile-name {
	font-weight: bold;
	position: absolute;
	left: 0px;
	right: 0px;
	top: -70px;
	color: #fff;
	font-size: 17px;
}

.profile-card-4 .profile-name p {
	font-weight: 600;
	font-size: 13px;
	letter-spacing: 1.5px;
}

.profile-card-4 .profile-description {
	color: #777;
	font-size: 12px;
	padding: 10px;
}

.profile-card-4 .profile-overview {
	padding: 15px 0px;
}

.profile-card-4 .profile-overview p {
	font-size: 10px;
	font-weight: 600;
	color: #777;
}

.profile-card-4 .profile-overview h4 {
	color: #273751;
	font-weight: bold;
}

.profile-card-4 .profile-content::before {
	content: "";
	position: absolute;
	height: 20px;
	top: -10px;
	left: 0px;
	right: 0px;
	background-color: #fff;
	z-index: 0;
	transform: skewY(3deg);
}

.profile-card-4:hover img {
	transform: rotate(5deg) scale(1.1, 1.1);
	filter: brightness(110%);
}

.profile-card-5 {
	max-width: 300px;
	background-color: #fff;
	border-radius: 5px;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
	padding: 50px 15px 25px 15px;
}

.profile-card-5 img {
	height: 100px;
	width: 100px;
	object-fit: cover;
	margin: 10px auto;
	border-radius: 50%;
	transition: all linear 0.25s;
	position: relative;
}

.profile-card-5::before {
	content: "";
	position: absolute;
	top: -60px;
	right: 0px;
	left: 0px;
	height: 170px;
	background-color: #4fb96e;
	transform: skewY(-20deg);
}

.profile-card-5 .profile-name {
	padding-top: 15px;
	font-weight: bold;
	color: #333;
}

.profile-card-5 .profile-designation {
	font-size: 13px;
	color: #777;
}

.profile-card-3 .profile-location {
	color: #999;
	font-size: 13px;
	font-weight: 600;
}

.profile-card-5 .profile-description {
	font-size: 13px;
	color: #777;
	padding: 10px;
}

.profile-card-5 .profile-overview {
	padding: 15px 0px;
}

.profile-card-5 .profile-overview p {
	color: #777;
	font-size: 13px;
}

.profile-card-5 .profile-overview h2 {
	font-weight: bold;
	color: #1e2832;
}

.profile-card-5 .profile-icons .fa {
	margin: 7px;
	color: #4fb96e;
}

.profile-card-5:hover img {
	transform: rotate(-5deg);
}

.profile-card-6 {
	max-width: 300px;
	background-color: #fff;
	border-radius: 5px;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
}

.profile-card-6 img {
	transition: all 0.15s linear;
}

.profile-card-6 .profile-name {
	position: absolute;
	top: 10px;
	left: 10px;
	font-size: 25px;
	font-weight: bold;
	color: #fff;
	padding: 15px 20px;
	background: linear-gradient(
		140deg,
		rgba(0, 0, 0, 0.4) 50%,
		rgba(255, 255, 0, 0) 50%
	);
	transition: all 0.15s linear;
}

.profile-card-6 .profile-position {
	position: absolute;
	color: rgba(255, 255, 255, 0.4);
	left: 30px;
	top: 100px;
	transition: all 0.15s linear;
}

.profile-card-6 .profile-overview {
	position: absolute;
	bottom: 0px;
	left: 0px;
	right: 0px;
	background: linear-gradient(
		0deg,
		rgba(0, 0, 0, 0.4) 50%,
		rgba(255, 255, 0, 0)
	);
	color: #fff;
	padding: 50px 0px 20px 0px;
	transition: all 0.15s linear;
}

.profile-card-6 .profile-overview h3 {
	font-weight: bold;
}

.profile-card-6 .profile-overview p {
	color: rgba(255, 255, 255, 0.7);
}

.profile-card-6:hover img {
	filter: brightness(80%);
}

.profile-card-6:hover .profile-name {
	padding-left: 25px;
	padding-top: 20px;
}

.profile-card-6:hover .profile-position {
	left: 40px;
}

.profile-card-6:hover .profile-overview {
	padding-bottom: 25px;
}

.profile-card-7 {
	background-color: #fff;
	border-radius: 5px;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
}

.profile-card-7 .profile-content {
	padding: 60px 30px 30px 30px;
	background-color: #fff;
	position: relative;
}

.profile-card-7 .profile-content img {
	position: absolute;
	height: 80px;
	width: 80px;
	border-radius: 50%;
	top: -40px;
	border: 5px solid #fff;
}

.profile-card-7 .profile-content .profile-name {
	position: absolute;
	font-size: 17px;
	font-weight: bold;
	top: -35px;
	left: 125px;
	color: #fff;
}

.profile-card-7 .profile-overview {
	padding: 5px 0px;
}

.profile-card-7 .profile-overview p {
	color: #777;
	font-size: 11px;
	font-weight: 600;
}

.profile-card-7 .profile-overview h5 {
	color: #142437;
	font-weight: bold;
}

.profile-card-8 {
	background: linear-gradient(#09121c, #36445a);
	border-radius: 5px;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
	transition: all 0.25s linear;
}

.profile-card-8 .profile-name {
	position: absolute;
	left: 0px;
	right: 0px;
	top: 25px;
	color: #58d683;
	font-size: 17px;
	font-weight: bold;
}

.profile-card-8 .profile-designation {
	position: absolute;
	left: 0px;
	right: 0px;
	top: 50px;
	color: #fff;
	font-size: 13px;
	font-weight: 600;
	letter-spacing: 1px;
}

.profile-card-8 .profile-icons {
	position: absolute;
	left: 0px;
	right: 0px;
	top: 80px;
	color: rgba(255, 255, 255, 0.7);
}

.profile-card-8 .profile-icons .fa {
	margin: 5px;
}

.profile-card-8:hover {
	transform: scale(1.05, 1.05);
}

.profile-card-9 {
	border-radius: 10px;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
	padding: 30px 15px;
	background-color: #fff;
	transition: all 0.25s linear;
}

.profile-card-9 img {
	height: 120px;
	width: 120px;
	border-radius: 50%;
	margin: 10px auto;
}

.profile-card-9 .profile-name {
	font-size: 15px;
	color: #3249b9;
	font-weight: 600;
}

.profile-card-9 .profile-designation {
	font-size: 13px;
	color: #777;
}

.profile-card-9 .profile-description {
	padding: 10px;
	font-size: 13px;
	color: #777;
	margin: 15px 0px;
	background-color: #f1f2f3;
	border-radius: 5px;
}

.profile-card-9 a {
	padding: 10px 15px;
	background-color: #3249b9;
	color: #fff;
	font-size: 11px;
	border-radius: 25px;
}

.profile-card-9:hover {
	transform: scale(1.05, 1.05);
}

.profile-card-10 {
	border-radius: 5px;
	box-shadow: 0px 0px 25px rgba(0, 0, 0, 0.1);
	overflow: hidden;
	position: relative;
	margin: 10px auto;
	cursor: pointer;
	padding: 30px 15px;
	background-color: #1f2124;
	color: #eee;
}

.profile-card-10 img {
	margin: 10px auto;
	width: 100px;
	height: 100px;
	border-radius: 50%;
	border: 10px solid transparent;
	box-shadow: 0px 0px 0px 2px #64c17b;
	transition: all 0.25s linear;
}

.profile-card-10 .profile-name {
	color: #fff;
	font-weight: bold;
	font-size: 17px;
}

.profile-card-10 .profile-location {
	font-size: 13px;
	opacity: 0.7;
}

.profile-card-10 .profile-description {
	padding: 10px;
	font-size: 13px;
}

.profile-card-10 .profile-icons .fa {
	color: #ffc75e;
	margin: 10px;
}

.profile-card-10:hover img {
	transform: scale(1.1);
}


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