@extends('layouts.homePage')

@section('metainfo')
<title>{{$page->title}} | {{$page->meta_title}}</title>
<meta name="description" content="{{$page->meta_description}}">
<meta name="keywords" content="{{$page->keywords}}">
@stop
@section('extrastyle')
<style>
@media (min-width: 1292px) {
.home-page .hero .image, .home-page .banner .image {
	@if($page->headerimage !='')
    background-image: url("{!! URL::to('media/headerImage')!!}/<?php echo $page->headerimage.'1680x600.'.$page->headerext;?>");
    @else
     background-image: url("assets/front/img/banner.jpg");
	@endif
    height: 500px;
    background-size: 100% 100%;
}
}

.hero .content h1, .hero .content p {
	color: {{$page->headingTextColor}} !important;
    text-align: {{$page->headingPosition}} !important;
    max-width:100%;
}
.hero .content a {
    float: {{$page->headingPosition}} !important;
}
</style>
@stop
@section('content')
<section class="announcement accent-section" id="announcement">

<div class="content pad-vert-gutter align-center blue-theme">
<h2 class="no-margin">We would love to <span class="text-success semi-bold">hear from you</span></h2>
</div>
</section>

<div class="section">
	<div class="container">
	<div class="p-b-60 p-t-60">
		<div class="row">
		<div class="col-md-12">		
		
		<p class="">Why not drop us a line or pick up the phone and give us a shout. Our team would love to talk to you and find ways of Making Business Easy.</p>
		</div>
		</div>
		<div class="row p-t-30">
			<div class="col-md-6 col-sm-6">
						
				{!! Form::open(array('url' => 'statementAnalysis','id'=>'contact','class'=>'form-no-horizontal-spacing')) !!}
				<div class="row form-row">
					<div class="col-md-6">
						<div class="input-with-icon  right">
						<i class=""></i>
						{!! Form::text('name', '' , ['class'=>'form-control', 'id'=>'name','placeholder'=>'Your Name']) !!}
						</div>

					</div>
					<div class="col-md-6">
					<div class="input-with-icon  right">
					<i class=""></i>
					{!! Form::text('business', '' , ['class'=>'form-control', 'id'=>'business','placeholder'=>'Business Name']) !!}
					</div>
				</div>
				</div>
				<div class="row form-row">
				<div class="col-md-12">
					<div class="input-with-icon  right">
					<i class=""></i>
					{!! Form::text('email', '' , ['class'=>'form-control', 'id'=>'email','placeholder'=>'Your Email']) !!}
					</div>
				</div>
				</div>
				<div class="row form-row">
				<div class="col-md-6">
					<div class="input-with-icon  right">
					<i class=""></i>
					{!! Form::text('phone', '' , ['class'=>'form-control', 'id'=>'phone','placeholder'=>'Your Phone']) !!}
					</div>
				</div>
				<div class="col-md-6">
					<div class="input-with-icon  right"><i class=""></i>
					{!! Form::text('current_rate', '' , ['class'=>'form-control', 'id'=>'current_rate','placeholder'=>'Current Rate']) !!}
					</div>
				</div>
				</div>
				
				<div class="row form-row">
				<div class="col-md-6 selectC">
					<div class="input-with-icon  right"><i class=""></i>
					<select class="form-control select2" name="state" id="status"><option selected="selected" value="">Select state..</option><option value="AL">Alabama</option><option value="AK">Alaska</option><option value="AS">American Samoa</option><option value="AZ">Arizona</option><option value="AR">Arkansas</option><option value="CA">California</option><option value="CO">Colorado</option><option value="CT">Connecticut</option><option value="DE">Delaware</option><option value="DC">District of Columbia</option><option value="FL">Florida</option><option value="GA">Georgia</option><option value="GU">Guam</option><option value="HI">Hawaii</option><option value="ID">Idaho</option><option value="IL">Illinois</option><option value="IN">Indiana</option><option value="IA">Iowa</option><option value="KS">Kansas</option><option value="KY">Kentucky</option><option value="LA">Louisiana</option><option value="ME">Maine</option><option value="MH">Marshall Islands</option><option value="MD">Maryland</option><option value="MA">Massachusetts</option><option value="MI">Michigan</option><option value="MN">Minnesota</option><option value="MS">Mississippi</option><option value="MO">Missouri</option><option value="MT">Montana</option><option value="NE">Nebraska</option><option value="NV">Nevada</option><option value="NH">New Hampshire</option><option value="NJ">New Jersey</option><option value="NM">New Mexico</option><option value="NY">New York</option><option value="NC">North Carolina</option><option value="ND">North Dakota</option><option value="MP">Northern Marianas Islands</option><option value="OH">Ohio</option><option value="OK">Oklahoma</option><option value="OR">Oregon</option><option value="PW">Palau</option><option value="PA">Pennsylvania</option><option value="PR">Puerto Rico</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option><option value="SD">South Dakota</option><option value="TN">Tennessee</option><option value="TX">Texas</option><option value="UT">Utah</option><option value="VT">Vermont</option><option value="VI">Virgin Islands</option><option value="VA">Virginia</option><option value="WA">Washington</option><option value="WV">West Virginia</option><option value="WI">Wisconsin</option><option value="WY">Wyoming</option></select>

					</div>
				</div>
				<div class="col-md-6">
					<div class="input-with-icon  right"><i class=""></i>
					{!! Form::text('city', '' , ['class'=>'form-control', 'id'=>'city','placeholder'=>'City']) !!}
					</div>
				</div>
				</div>
				<div class="row form-row m-t-10">
				<div class="col-md-12">
				<label class="form-label">How did you hear about EPS</label>
				<div class="radio">
					<div class="row col-md-12">
					  <input type="radio" checked="checked" value="newspaper" name="hear_about" id="newspaper">
					  <label for="newspaper">Newspaper/Magazine Ad </label>
					  </div>
					  <div class="row col-md-12">
					  <input type="radio" value="web" name="about" id="web">
					  <label for="web">Web</label>
					  </div>
					  <div class="row col-md-12">
					  <input type="radio" value="radio" name="about" id="radio">
					  <label for="radio">Radio Ad</label>
					  </div>
					  <div class="row col-md-12">
					  <input type="radio" value="wom" name="about" id="wom">
					  <label for="wom">Word of Mouth</label>
					  </div>
					  <div class="row col-md-12">
					  <input type="radio" value="other" name="about" id="other">
					  <label for="other">Other</label>
					  </div>
					</div>

				</div>
				</div>

				<div class="row form-row m-t-10">
				<div class="col-md-12">
					<label class="form-label">If "Other, please add here (optional) </label>
					<div class="input-with-icon  right"><i class=""></i>
					{!! Form::text('hear_about_other', '' , ['class'=>'form-control', 'id'=>'others','placeholder'=>'']) !!}
					</div>
				</div>
				</div>

				<div class="row form-row m-t-10">
				<div class="col-md-12">
					<label class="form-label">To make sure you are human, what is 3 + 4?</label>
					<div class="input-with-icon  right"><i class=""></i>
					{!! Form::hidden('confirmcapcha', '7' , ['id'=>'confirmcapcha']) !!}
					{!! Form::text('capcha', '' , ['class'=>'form-control', 'id'=>'capcha','placeholder'=>'']) !!}
					</div>
				</div>
				</div>
				<div class="row form-row">
				<div class="col-md-10">
				<button type="submit" class="btn btn-success btn-cons">Send</button>
				</div>
				</div>
				{!! Form::close()!!}
			
			</div>
			<?php $query = DB :: table('business')->get();
			foreach ($query as $value) {
			$query = $value;
			}
			?>

			<div class="col-md-6 feature-list">
				<h4 class="title custom-font text-black no-margin p-b-10">TELEPHONE</h4>
				<p class="no-margin"><i class="fa fa-phone fa-lg p-r-10 "></i> Main Phone</p>
				<h3 class="custom-font text-black no-margin p-l-20">{{$query->mobile_main}}</h3>
				
				<p class="no-margin"><i class="fa fa-phone fa-lg  p-r-10"></i> Client Services</p>
				<h3 class="custom-font text-black no-margin p-l-20 ">{{$query->mobile_client_services}}</h3>
				
				<p class="no-margin"><i class="fa fa-phone fa-lg  p-r-10"></i> National Sales</p>
				<h3 class="custom-font text-black no-margin p-l-20 ">{{$query->mobile_national_sales}}</h3>
				<section class="p-t-20 p-b-20">
					<h4 class="title custom-font text-black">ADDRESS</h4>
					<address>
					  <p>{{$query->address}}</p>
					</address>
					<p><span class="semi-bold">Client Support:</span> <a href="mailto:{{$query->client_support}}">{{$query->client_support}}</a></p>
					<p><span class="semi-bold">National Sales:</span> <a href="mailto:{{$query->national_sales}}">{{$query->national_sales}}</a></p>
				</section>
				
			</div>
		</div>
	</div>
	</div>	
	
</div>
<h2 class="text-center p-b-20">Get in <span class="semi-bold">touch</span> with us...</h2>

<div class="section white" style="height:400px" id="map">

</div>

@endsection
@section('moreJS')
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
{!! HTML::script('assets/plugins/jquery-gmap/gmaps.js') !!}
{!! HTML::script('assets/js/google_maps.js') !!}
@stop
