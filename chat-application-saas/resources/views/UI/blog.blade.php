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
	background-image: url("images/blogbanner.jpg");
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
<section class="headersection">
	<div class="innersection"> 
		<div class="content">
				<div class="headline">
				<h1 class="inline-block gap-top-col gap-top-none-at-medium ">{{$page->title}}</h1>
				<span class="bullet"></span>
				</div>
		</div>
	</div>
</section>
<section>
<div class="container">
	<div class="row grid">
		<div class="col-md-12 p-t-50">	
			<div class="inner_content col-md-8 m-t-20">
			
				<div class="blog-post">

				<div class="blog-post-thumb">

				<img src="{{url('media/Blogs/woman-buying-coffee-in-coffee-shop710x320.jpg')}}"> 		

				</div><!-- end .blog-post-thumb -->

				<div class="blog-post-info">
				27<br>
				<small>Aug, 2015</small>

				</div><!-- end .blog-post-info -->

				<div class="blog-post-title border-bottom p-b-10">
				<h3>EPS Wins Silver Award in 2014 Stevie Awards for Sales & Customer Service  </h3>


				</div><!-- end .blog-post-title -->

				<p class="sort-content">The Stevie Awards for Sales & Customer Service are the world’s top sales awards, contact center awards, and customer service awards.  The Stevie Awards organizes several of the world’s leading business awards shows including the prestigious American Business AwardsSM  and International Business AwardsSM.   “It’s truly an honor to be recognized and win this prestigious award from such an influential and respected organization like the Stevie Awards...</p>

				<p class="text-right">
				<a href="#" class="btn btn-green">Read more</a>
				</p>

				</div>
    
			<div class="m-t-50"></div>
		 </div>
			@include('UI.innersidebar')
			</div>
		
	  
	</div>
		
</div> <!--end container -->
</section>

</div>
</div>
<!----------- End content  ------------>
@endsection


@section('moreJS')

@stop
