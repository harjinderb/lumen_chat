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
@if($page->featuredImage!='')
<section>
	<div class="container">
	<div class="row p-t-70">
		<div class="col-md-12 col-sm-12 featuredImage">
		<img width="100%" title="" alt="" src="{{URL:: to('/media/CMSPages')}}/{{$page->featuredImage}}1170x300.{{$page->ext}}" typeof="foaf:Image">
		</div>
	</div>
	</div>
</section>
@endif
<section>
<div class="container">
	<div class="row grid">
		<div class="col-md-12 col-sm-12">	
		<div class="heading_title">
			<div class="headline">

                    <h2 class="title-one">{{$page->heading}}</h2>
					@if($page->sub_heading!='')
                    <p>{{$page->sub_heading}}</p>
					@endif
                    <span class="bullet"></span>
					@if(Auth::check() && Auth::user()->Role =='SA')              
					<div class="tools">  <a class="config" href="{{URL:: to('admin/cms-pages/edit')}}/{{$page->id}}" title="Edit this page" target="_blank"></a>   </div>
					@endif
                </div>
   
            </div>	
			
			<div class="inner_content @if($page->sidebar==1) col-md-8 col-sm-8 @else col-md-12 col-sm-12 @endif">
			
			<p class="m-t-20 m-b-20">{!! $page->content !!}</p>
			
			<div class="m-t-50 p-t-20 border-top align-center">
					<div class="intro">
						<a href="#myModal" class="button gap-top-line-height">Get started Call to Action</a>
					</div>
				</div>
			
			<div class="m-t-50"></div>
	
		
		</div>
			@if($page->sidebar==1) 
			@include('UI.innersidebar')
			@endif
		</div>
		
	  
	</div>
		
</div> <!--end container -->
</section>
<section class="tools narrative" id="tools">
<div class="content pad-vert-medium border-top">
<div class="grid-1-3 grid-row-small-space grid-row-equal-heights align-center">

			
			<div class="start"><a class="hotspot no-padding p-b-30" data-link-action="Stand" data-link-label="Tools Section" href="#myModal" data-toggle="modal" data-target="#myModal">
			<div class="image"></div>
			<div class="product-text p-b-30"><h4 class="gap-bottom-col">Start Free</h4>
			<p class="product-desc">Get started and take payments anywhere with EPS.</p>
		
			</div>
			</a></div>
			
			<div class="run"><a class="hotspot no-padding p-b-30" data-link-action="Stand" data-link-label="Tools Section" href="#myModal">
			<div class="image"></div>
			<div class="product-text p-b-30"><h4 class="gap-bottom-col">Run Smoother</h4>
			<p class="product-desc">Manage all your day-to-day operations.</p>
			</div>
			</a></div>
			
			<div class="grow"><a class="hotspot no-padding p-b-30" data-link-action="Stand" data-link-label="Tools Section" href="#myModal">
			<div class="image"></div>
			<div class="product-text p-b-30"><h4 class="gap-bottom-col">Grow Faster</h4>
			<p class="product-desc">Expand with our marketing and financial services.</p>
			</div>
			</a></div>
		



</div>
</div>
</section>

</div>
</div>
<!----------- End content  ------------>
@endsection


@section('moreJS')

@stop
