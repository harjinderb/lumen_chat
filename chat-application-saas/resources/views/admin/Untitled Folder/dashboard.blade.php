@extends('layouts.admin')

@section('adminHead')
@extends('layouts.adminHead')
@stop

@section('content')
  <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content sm-gutter">
      <div class="page-title">
      </div>
	   <!-- BEGIN DASHBOARD TILES -->
	  <div class="row">	 
		<div class="col-md-4 col-vlg-3 col-sm-6">
			<div class="tiles green m-b-10">
              <div class="tiles-body">
			  <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">OVERALL SALES </div>
			         <div class="widget-stats">
                      <div class="wrapper transparent"> 
						<span class="item-title">Overall Visits</span> <span class="item-count animate-number semi-bold" data-value="2415" data-animation-duration="700">0</span>
					  </div>
                    </div>
                    <div class="widget-stats">
                      <div class="wrapper transparent">
						<span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="751" data-animation-duration="700">0</span> 
					  </div>
                    </div>
                    <div class="widget-stats ">
                      <div class="wrapper last"> 
						<span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="1547" data-animation-duration="700">0</span> 
					 </div>
                    </div>
                    <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                      <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="64.8%" ></div>
                    </div>
                    <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
			  </div>			
			</div>	
	

		</div>
		<div class="col-md-4 col-vlg-3 col-sm-6">
			<div class="tiles blue m-b-10">
              <div class="tiles-body">
			  <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">OVERALL VISITS </div>
			         <div class="widget-stats">
                      <div class="wrapper transparent"> 
						<span class="item-title">Overall Visits</span> <span class="item-count animate-number semi-bold" data-value="15489" data-     animation-duration="700">0</span>
					  </div>
                    </div>
                    <div class="widget-stats">
                      <div class="wrapper transparent">
						<span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="551" data-animation-duration="700">0</span> 
					  </div>
                    </div>
                    <div class="widget-stats ">
                      <div class="wrapper last"> 
						<span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="1450" data-animation-duration="700">0</span> 
					 </div>
                    </div>
                    <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                      <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="54%" ></div>
                    </div>
                    <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
			  </div>			
			</div>	
		</div>
		<div class="col-md-4 col-vlg-3 col-sm-6">
			<div class="tiles purple m-b-10">
              <div class="tiles-body">
			  <div class="controller"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                <div class="tiles-title text-black">SERVER LOAD </div>
			         <div class="widget-stats">
                      <div class="wrapper transparent"> 
						<span class="item-title">Overall Load</span> <span class="item-count animate-number semi-bold" data-value="5695" data-animation-duration="700">0</span>
					  </div>
                    </div>
                    <div class="widget-stats">
                      <div class="wrapper transparent">
						<span class="item-title">Today's</span> <span class="item-count animate-number semi-bold" data-value="568" data-animation-duration="700">0</span> 
					  </div>
                    </div>
                    <div class="widget-stats ">
                      <div class="wrapper last"> 
						<span class="item-title">Monthly</span> <span class="item-count animate-number semi-bold" data-value="12459" data-animation-duration="700">0</span> 
					 </div>
                    </div>
                    <div class="progress transparent progress-small no-radius m-t-20" style="width:90%">
                      <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="90%" ></div>
                    </div>
                    <div class="description"> <span class="text-white mini-description ">4% higher <span class="blend">than last month</span></span></div>
			  </div>			
			</div>	
		</div>	
		 </div>
	  <!-- END DASHBOARD TILES -->
      
       <div class="row hidden-xlg">
			<div class="col-md-4 col-sm-6">
				  <div class="row ">
				   <!-- BEGIN BLOG POST SIMPLE-->
					<div class="col-md-12 m-b-10">	
					  <div class="widget-item ">
					  <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
					  <div class="tiles green " style="max-height:345px">
						<div class="tiles-body">
						  <h3 class="text-white m-t-50 m-b-30 m-r-20"> Webarch <span class="semi-bold">UI Bundle
							highly customizable UI
							elements</span> </h3>
						  <div class="overlayer bottom-right fullwidth">
							<div class="overlayer-wrapper">
							  <div class=" p-l-20 p-r-20 p-b-20 p-t-20">
								<div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
								<div class="clearfix"></div>
							  </div>
							</div>
						  </div>
						  <br>
						</div>
					  </div>
					  <div class="tiles white ">
						<div class="tiles-body">
						  <div class="row">
							<div class="user-comment-wrapper pull-left">
							  <div class="profile-wrapper"> <img src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="35" height="35"> </div>
							  <div class="comment">
								<div class="user-name text-black bold"> David <span class="semi-bold">Cooper</span> </div>
								<div class="preview-wrapper">@ revox </div>
							  </div>
							  <div class="clearfix"></div>
							</div>
							<div class="pull-right m-r-20"> <span class="bold text-black small-text">24m</span> </div>
							<div class="clearfix"></div>
							<div class="p-l-15 p-t-10 p-r-20">
							  <p>The attention to detail and the end product is stellar!  I enjoyed the process </p>
							  <div class="post p-t-10 p-b-10">
								<ul class="action-bar no-margin p-b-20 ">
								  <li><a href="#" class="muted bold"><i class="fa fa-comment  m-r-10"></i>1584</a> </li>
								  <li><a href="#" class="text-error bold"><i class="fa fa-heart  m-r-10"></i>47k</a> </li>
								</ul>
								<div class="clearfix"></div>
							  </div>
							</div>
						  </div>
						</div>
					  </div>
					</div>
					</div>
				   <!-- END BLOG POST SIMPLE-->
				  </div>
				  <div class="row">
				<!-- BEGIN BLOG POST WITH CAROUSEL IMAGE -->
                <div class="col-md-12 m-b-10">					
				  <div class="widget-item ">
				  <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                  <div class="tiles white p-t-15">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="profile-img-wrapper pull-left m-l-10">
                          <div class=" p-r-10">
						  <img src="assets/img/profiles/c.jpg" alt="" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" width="35" height="35"> </div>
                        </div>
                      </div>
                      <div class="col-md-10">
                        <div class="user-name text-black bold large-text"> John <span class="semi-bold">Smith</span> </div>
                        <div class="preview-wrapper">shared a picture with <span class="bold">Jane Smith</span>.</div>
                      </div>
                    </div>
                    <div id="image-demo-carl" class="m-t-15 owl-carousel owl-theme">						
						  <div class="item"><img src="assets/img/others/1.jpg" alt=""></div>
						  <div class="item"><img src="assets/img/others/2.jpg" alt=""></div>
					</div>
                    <div class="post p-b-15 p-t-15 p-l-15 b-b b-grey">
                      <ul class="action-bar no-margin ">
                        <li><a href="#" class="muted"><i class="fa fa-comment m-r-5"></i> 24</a> </li>
                        <li><a href="#" class="text-error bold"> <i class="fa fa-heart-o  m-r-5"></i> 5</a> </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <p class="p-t-10 p-b-10 p-l-15 p-r-15"><span class="bold">Jane Smith, John Smith, David Jester, pepper</span> post and 214 others like this.</p>
                    <div class="clearfix"></div>
                    <div class="p-b-10 p-l-10 p-r-10">
                      <div class="profile-img-wrapper pull-left"> <img src="assets/img/profiles/avatar_small.jpg" alt="" data-src="assets/img/profiles/avatar_small.jpg" data-src-retina="assets/img/profiles/avatar_small2x.jpg" width="35" height="35"> </div>
                      <div class="inline pull-right" style="width:86%">
                        <div class="input-group transparent ">
                          <input type="text" class="form-control" placeholder="Write a comment">
                          <span class="input-group-addon"> <i class="fa fa-camera"></i> </span> </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  </div>
                </div>
                <!-- END BLOG POST WITH CAROUSEL IMAGE -->
			  </div>
		      </div>
            
			 <div class="col-md-4 col-sm-6 hidden-sm">
              <div class="row">
				<!-- BEGIN BLOG POST WITH IMAGE -->
                <div class="col-md-12 m-b-10">					
				   <div class="widget-item ">
				  <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                  <div class="tiles green  overflow-hidden full-height" style="max-height:214px">
                    <div class="overlayer bottom-right fullwidth">
                      <div class="overlayer-wrapper">
                        <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                          <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                    <img src="assets/img/others/10.png" alt="" class="lazy hover-effect-img"> </div>
                  <div class="tiles white ">
                    <div class="tiles-body">
                      <div class="row">
					  <div class="user-profile-pic text-left"> 
						<img width="69" height="69" data-src-retina="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" src="assets/img/profiles/avatar.jpg" alt=""> 
						 <div class="pull-right m-r-20 m-t-35"> <span class="bold text-black small-text">24m</span> </div>
					  </div>
                        <div class="col-md-5 no-padding">                          
                          <div class="user-comment-wrapper">
                            <div class="comment">
                              <div class="user-name text-black bold"> David <span class="semi-bold">Jester</span> </div>
                              <div class="preview-wrapper">@ revox </div>
                            </div>							  
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="col-md-7 no-padding">
                       
                          <div class="clearfix"></div>
                          <div class="m-r-20 m-t-20 m-b-10  m-l-10">
                            <p class="p-b-10">The attention to detail and the end product is stellar!  I enjoyed the process </p>
                            <a href="#" class="hashtags m-b-5"> #new york city </a> <a href="#" class="hashtags m-b-5"> #amazing </a> <a href="#" class="hashtags m-b-5"> #citymax </a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
				<!-- END BLOG POST WITH IMAGE -->
			  </div>
               <div class="row">
				<!-- BEGIN BLOG POST SIMPLE -->
                <div class="col-md-12 m-b-10">				
				  <div class="widget-item ">
				  <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                  <div class="tiles purple " style="max-height:345px">
                    <div class="tiles-body">

                      <h3 class="text-white m-t-50 m-b-30 m-r-20"> Webarch <span class="semi-bold">UI Bundle
                        highly customizable UI
                        elements</span> </h3>
                      <div class="overlayer bottom-right fullwidth">
                        <div class="overlayer-wrapper">
                          <div class=" p-l-20 p-r-20 p-b-20 p-t-20">
                            <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>
                      <br>
                    </div>
                  </div>
                  <div class="tiles white ">
                    <div class="tiles-body">
                      <div class="row">
                        <div class="user-comment-wrapper pull-left">
                          <div class="profile-wrapper"> 
						  <img src="assets/img/profiles/d.jpg" alt="" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" width="35" height="35">
						  </div>
                          <div class="comment">
                            <div class="user-name text-black bold"> Jane <span class="semi-bold">Smith</span> </div>
                            <div class="preview-wrapper">@ webarch </div>
                          </div>
                          <div class="clearfix"></div>
                        </div>
                        <div class="pull-right m-r-20"> <span class="bold text-black small-text">24m</span> </div>
                        <div class="clearfix"></div>
                        <div class="p-l-15 p-t-10 p-r-20">
                          <p>The attention to detail and the end product is stellar!  I enjoyed the process </p>
                          <div class="post p-t-10 p-b-10">
                            <ul class="action-bar no-margin p-b-20 ">
                              <li><a href="#" class="muted bold"><i class="fa fa-comment  m-r-10"></i>1584</a> </li>
                              <li><a href="#" class="text-error bold"><i class="fa fa-heart  m-r-10"></i>47k</a> </li>
                            </ul>
                            <div class="clearfix"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
				<!-- END BLOG POST SIMPLE -->
			 </div>
			</div>
          
		     <div class="col-md-4 col-sm-6">
              <div class="row">
				<!-- BEGIN BLOG POST WITH MAP -->
                <div class="col-md-12 m-b-10">
				  <div class="widget-item ">
				  <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                  <div class="tiles white p-t-15">
                    <div class="row">
                      <div class="col-md-2">
                        <div class="profile-img-wrapper pull-left m-l-10">
                          <div class=" p-r-10">
						  <img src="assets/img/profiles/h.jpg" alt="" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" width="35" height="35">
						  
						  </div>
                        </div>
                      </div>
                      <div class="col-md-10">
                        <div class="user-name text-black bold large-text"> David <span class="semi-bold">Jester</span> </div>
                        <div class="preview-wrapper">was with <span class="bold">Jane Smith</span> and 4 others at <span class="bold">The Shore By O</span>.</div>
                      </div>
                    </div>
                    <div id="location-map" class="m-t-15 " style="height: 200px"> </div>
                    <div class="post p-b-15 p-t-15 p-l-15 b-b b-grey">
                      <ul class="action-bar no-margin ">
                        <li><a href="#" class="muted"><i class="fa fa-comment m-r-5"></i> 24</a> </li>
                        <li><a href="#" class="text-error bold"> <i class="fa fa-heart-o  m-r-5"></i> 5</a> </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <p class="p-t-10 p-b-10 p-l-15 p-r-15"><span class="bold">Jane Smith, John Smith, David Jester, pepper</span> post and 214 others like this.</p>
                    <div class="clearfix"></div>
                    <div class="p-b-10 p-l-10 p-r-10">
                      <div class="profile-img-wrapper pull-left"> 
					  <img width="35" height="35" alt="" src="assets/img/profiles/e.jpg" data-src="assets/img/profiles/e.jpg" data-src-retina="assets/img/profiles/e2x.jpg"> </div>
                      <div class="inline pull-right" style="width:86%">
                        <div class="input-group transparent ">
                          <input type="text" class="form-control" placeholder="Write a comment">
                          <span class="input-group-addon"> <i class="fa fa-camera"></i> </span> </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                  </div>
                </div>
				<!-- END BLOG POST WITH MAP -->
			  </div>
             <div class="row">
				<!-- BEGIN BLOG POST WITH IMAGE -->
                <div class="col-md-12 m-b-10">					
				   <div class="widget-item ">
				  <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                  <div class="tiles green  overflow-hidden full-height" style="max-height:214px">
                    <div class="overlayer bottom-right fullwidth">
                      <div class="overlayer-wrapper">
                        <div class="tiles gradient-black p-l-20 p-r-20 p-b-20 p-t-20">
                          <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                          <div class="clearfix"></div>
                        </div>
                      </div>
                    </div>
                    <img src="assets/img/others/10.png" alt="" class="lazy hover-effect-img"> </div>
                  <div class="tiles white ">
                    <div class="tiles-body">
                      <div class="row">
					  <div class="user-profile-pic text-left"> 
						<img width="69" height="69" data-src-retina="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" src="assets/img/profiles/avatar.jpg" alt=""> 
						 <div class="pull-right m-r-20 m-t-35"> <span class="bold text-black small-text">24m</span> </div>
					  </div>
                        <div class="col-md-5 no-padding">                          
                          <div class="user-comment-wrapper">
                            <div class="comment">
                              <div class="user-name text-black bold"> David <span class="semi-bold">Jester</span> </div>
                              <div class="preview-wrapper">@ revox </div>
                            </div>							  
                            <div class="clearfix"></div>
                          </div>
                        </div>
                        <div class="col-md-7 no-padding">
                       
                          <div class="clearfix"></div>
                          <div class="m-r-20 m-t-20 m-b-10  m-l-10">
                            <p class="p-b-10">The attention to detail and the end product is stellar!  I enjoyed the process </p>
                            <a href="#" class="hashtags m-b-5"> #new york city </a> <a href="#" class="hashtags m-b-5"> #amazing </a> <a href="#" class="hashtags m-b-5"> #citymax </a> </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                </div>
				<!-- BEGIN BLOG POST WITH IMAGE -->
			  </div>
			</div>
          
		  </div>


	   </div>
		  </div>

@endsection
