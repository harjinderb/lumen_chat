@extends('UI')

@section('title')
{{$page_title}}
@stop

@section('metainfo')
<meta content="" name="description" />
<meta content="" name="keywords" />
@stop

@section('content')
<div class="content-wrap">
	<section class="hero-content bg-img" style="background-image:url( {{asset('images/hero-bg.jpg') }} )">
		<div class="container">
			<div class="hero-content-in text-center">
				<h1>Messaging SDK and Chat API for Mobile Apps and Websites</h1>
				<p>Enable in-app messaging for your mobile apps and websites using SendBird messaging SDK and chat API.</p>
				<p><a href="{{ URL::to('/pricing')}}" class="btn btn-outline-light mr-10 text-uppercase">View Pricing</a>
					<a href="{{ URL::to('/features')}}" class="btn btn-outline-light text-uppercase">Features</a>
				</p>
			</div>
			<div class="hero-img text-center">
				<img src="{{asset('images/chat-screens.png') }}" alt="Messages" class="img-fluid">
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50">
		<div class="container text-center">
			<div class="row">
				<div class="col-md-10 offset-md-1">
					<h2 class="mb-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit</h2>
					<p class="font-16 text-grey">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.</p>
					<ul class="chat-platform">
						<li><a href="#" data-toggle="tooltip" title="iOS"><span class="sprite ios-platform"> </span></a></li>
						<li><a href="#" data-toggle="tooltip" title="Androd"><span class="sprite android-platform"> </span></a></li>
						<li><a href="#" data-toggle="tooltip" title="JavaScript"><span class="sprite js-platform"> </span></a></li>
						<li><a href="#" data-toggle="tooltip" title=".NET"><span class="sprite net-platform"> </span></a></li>
						<li><a href="#" data-toggle="tooltip" title="Unity"><span class="sprite unity-platform"> </span></a></li>
						<li><a href="#" data-toggle="tooltip" title="Platform API"><span class="sprite api-platform"> </span></a></li>
					</ul>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 bg-light-grey feature1">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="half-sec-img text-center img-w-400">
						<img src="{{asset('images/works.png') }}" alt="Chat Screens" class="img-fluid">
					</div>
				</div>
				<div class="col-md-6">
					<div class="half-sec-content">
						<h2>Don't Reinvent the Wheel</h2>
						<p class="font-16 text-grey mb-30">The whole package from the front-end UI to the back-end, we offer the simplest messaging solution for your app</p>
						<div class="feature-box">
							<div class="feature-left-box">
								<i class="fas fa-comments"></i>
							</div>
							<div class="feature-content">
								<h3>1-on-1 Messaging</h3>
								<p class="text-grey">Enable direct messaging between two users.</p>
							</div>
						</div>
						<div class="feature-box">
							<div class="feature-left-box">
								<i class="fas fa-users"></i>
							</div>
							<div class="feature-content">
								<h3>Group Chat</h3>
								<p class="text-grey">Invite friends and affiliates for private group messaging.</p>
							</div>
						</div>
						<div class="feature-box">
							<div class="feature-left-box">
								<i class="fab fa-connectdevelop"></i>
							</div>
							<div class="feature-content">
								<h3>Open Channel</h3>
								<p class="text-grey">Have thousands of users in a single channel. Ideal for interest based communities and live-events.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 feature2">
		<div class="container">
			<h2 class="text-center">Advanced Chat Features at Your Disposal</h2>
			<div class="row mt-50">
				<div class="col-md-8">
					<div class="feature-box-wrap">
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="feature-single text-center">
									<div class="feature-icon color-theme">
										<i class="fas fa-check-circle"></i>
									</div>
									<h4>Scalability for Massive Audience</h4>
									<p class="text-grey">Host over 100,000 concurrent viewers per live video stream for maximum engagement</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="feature-single text-center">
									<div class="feature-icon color-theme">
										<i class="fas fa-check-circle"></i>
									</div>
									<h4>Spam Flood Protection</h4>
									<p class="text-grey">Prevent spam flooding of chat rooms, automatically</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="feature-single text-center">
									<div class="feature-icon color-theme">
										<i class="fas fa-check-circle"></i>
									</div>
									<h4>Auto Translation</h4>
									<p class="text-grey">Enhance global messaging with more than 20 different languages supported</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="feature-single text-center">
									<div class="feature-icon color-theme">
										<i class="fas fa-check-circle"></i>
									</div>
									<h4>Structured Messages</h4>
									<p class="text-grey">Display customized rich content such as product information and coupons</p>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-sm-6">
								<div class="feature-single text-center">
									<div class="feature-icon color-theme">
										<i class="fas fa-check-circle"></i>
									</div>
									<h4>Read Receipts</h4>
									<p class="text-grey">Track the read status of the messages sent to other users</p>
								</div>
							</div>
							<div class="col-md-6 col-sm-6">
								<div class="feature-single text-center">
									<div class="feature-icon color-theme">
										<i class="fas fa-check-circle"></i>
									</div>
									<h4>Smart Throttling</h4>
									<p class="text-grey">Help the audience follow the conversations by throttling the speed of messages displayed on the screens</p>
								</div>
							</div>
						</div>
						<p class="text-center text-uppercase font-18"> <a href="{{ URL::to('/features')}}"> Explore all Features</a> </p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="img-one-third text-center">
						<img src="{{asset('images/app-msg.png') }}" alt="Chat" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 bg-light-grey feature3">
		<div class="container">
			<div class="col-md-10 offset-md-1">
				<h2 class="text-center">Powering Live Videos and Events</h2>
				<p class="font-16 text-grey text-center">Host live chat channels for your content that can scale up to over hundred thousand concurrent participants</p>
				<div class="video-wrap mt-50">
					<video width="100%" controls>
						<source src="{{asset('images/app-video.mp4') }}" type="video/mp4">
						<source src="{{asset('images/app-video.ogg') }}" type="video/ogg">
					</video>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 feature4">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="half-sec-img text-center">
						<img src="{{asset('images/chat-app-screens.png') }}" alt="Chat Screens" class="img-fluid">
					</div>
				</div>
				<div class="col-md-6">
					<div class="half-sec-content">
						<h2>In-App Messaging in Just 5 <br>Minutes!</h2>
						<p class="font-16 text-grey mb-30">Get the whole package from the front-end UI to the backend. <br>SendBird is the simplest messaging API for your app</p>
						<p><a href="{{ URL::to('/pricing')}}" class="btn btn-primary text-uppercase">View Pricing</a></p>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection


@section('moreJS')

@stop
