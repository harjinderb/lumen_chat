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
	<section class="hero-content  bg-img" style="background-image:url(images/hero-bg.jpg)">
		<div class="container">
			<div class="hero-content-in text-center">
				<h1>Rich and powerful In-app messaging SDK and chat API features</h1>
				<p>Discover fully customizable features of in-app messaging within SendBird messaging SDK and chat API.</p>
			</div>
			<div class="hero-img text-center">
				<img src="images/chat-screens-mobile.png" alt="Messages" class="img-fluid">
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 feature1">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="half-sec-img text-center">
						<img src="images/chat3.png" alt="Chat Screens" class="img-fluid">
					</div>
				</div>
				<div class="col-md-6">
					<div class="half-sec-content">
						<h2>From 1-on-1 Messaging and Group Chat to Massive-scale Channels</h2>
						<div class="feature-box">
							<div class="feature-left-box">
								<i class="fas fa-comments"></i>
							</div>
							<div class="feature-content">
								<h3>Auto Partitioning</h3>
								<p class="text-grey">Automatically split or merge chat rooms based on the audience volume to maintain steady level of engagement</p>
							</div>
						</div>
						<div class="feature-box">
							<div class="feature-left-box">
								<i class="fas fa-users"></i>
							</div>
							<div class="feature-content">
								<h3>Smart Throttling</h3>
								<p class="text-grey">Help the audience follow the conversations by throttling the speed of messages displayed on the screens</p>
							</div>
						</div>
						<div class="feature-box">
							<div class="feature-left-box">
								<i class="fab fa-connectdevelop"></i>
							</div>
							<div class="feature-content">
								<h3>Scalability for Massive Audience</h3>
								<p class="text-grey">Host over 100,000 concurrent chat participants per channel for live-videos and events</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 bg-light-grey featuren2">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="half-sec-content">
						<h2>Profanity Filtering & Spam Flood Protection</h2>
						<p class="font-16 text-grey mb-30">Conversation heating up? No problem. Use custom dictionaries to automatically filter profanity and prevent message flooding</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="half-sec-img text-center">
						<img src="images/chat-feat.png" alt="Chat Screens" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 featuren3">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<div class="half-sec-img text-center">
								<img src="images/push-noti.png" alt="Chat Screens" class="img-fluid">
							</div>
						</div>
						<div class="col-md-6">
							<div class="half-sec-content">
								<h2>Push Notifications</h2>
								<p class="text-grey">Send real-time updates to users who are away from the app</p>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="row">
						<div class="col-md-6">
							<div class="half-sec-img text-center">
								<img src="images/admin-msg.png" alt="Chat Screens" class="img-fluid">
							</div>
						</div>
						<div class="col-md-6">
							<div class="half-sec-content">
								<h2>Admin Messages</h2>
								<p class="text-grey">Display notices and users activities to other users in chat channels</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 bg-light-grey featuren4">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="half-sec-img text-center">
						<img src="images/chat-app-screens.png" alt="Chat Screens" class="img-fluid">
					</div>
				</div>
				<div class="col-md-6">
					<div class="half-sec-content">
						<div class="feature-box">
							<div class="feature-left-box">
								<i class="fas fa-comments"></i>
							</div>
							<div class="feature-content">
								<h3>Send Files and Custom Data</h3>
								<p class="text-grey">Send photos and videos along with the chat messages using file transfers</p>
							</div>
						</div>
						<div class="feature-box">
							<div class="feature-left-box">
								<i class="fas fa-users"></i>
							</div>
							<div class="feature-content">
								<h3>Read Receipts</h3>
								<p class="text-grey">Track the read status of the messages sent to other users</p>
							</div>
						</div>
						<div class="feature-box">
							<div class="feature-left-box">
								<i class="fab fa-connectdevelop"></i>
							</div>
							<div class="feature-content">
								<h3>Typing Indicators</h3>
								<p class="text-grey">Keep the conversation going by displaying real-time typing indicators</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 featuren5">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="half-sec-content">
						<h2>Bot Interface</h2>
						<p class="font-16 text-grey mb-30">Integrate your bot into in-app messaging experience for your customers</p>
					</div>
				</div>
				<div class="col-md-6">
					<div class="half-sec-img text-center img-w-400">
						<img src="images/app-works.png" alt="Chat Screens" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</section>
	<section class="pt-50 pb-50 bg-light-grey featuren6">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="half-sec-img text-center img-w-400">
						<img src="images/app-msg1.png" alt="Chat Screens" class="img-fluid">
					</div>
				</div>
				<div class="col-md-6">
					<div class="half-sec-content">
						<h2>Moderation Tools</h2>
						<p class="font-16 text-grey mb-30">Proactively monitor and moderate the chat rooms using moderation tools</p>
						<p class="font-16 text-grey mb-30">Manage abusive users for clean and exciting conversations</p>
						<ul class="plan-feature">
							<li><span class="plan-feature-ico color-theme"><i class="far fa-check-square"></i></span>Freeze channels</li>
							<li><span class="plan-feature-ico color-theme"><i class="far fa-check-square"></i></span>Mute users</li>
							<li><span class="plan-feature-ico color-theme"><i class="far fa-check-square"></i></span>Ban users from chat rooms</li>
							<li><span class="plan-feature-ico color-theme"><i class="far fa-check-square"></i></span>Deactivate users entirely</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
@endsection


@section('moreJS')
@stop
