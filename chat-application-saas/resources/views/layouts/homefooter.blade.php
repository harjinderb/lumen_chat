		<style type="text/css">
		.personal_information,
		.company_information{
			display:none;
		}
	</style>
<section class="signup" id="signup">

<div class="content pad-vert-small border-top align-center">
	<div class="p-t-10 p-b-20">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
							<h3 class="text-center m-b-30">Let us show you what we can do for <span class="semi-bold">you!</span></h3>
											
						{!! Form::open(array('url' => 'subscribe','id'=>'subscribe','class'=>'form-no-horizontal-spacing')) !!}
						<div class="row form-row">
							<div class="col-md-6 col-md-offset-2 no-padding  col-sm-6 col-sm-offset-2 col-xs-10 col-xs-offset-1">
								<div class="input-with-icon  right">
								<i class=""></i>
								<input name="email" id="email" type="text" class="form-control " placeholder="Enter your email address">
								</div>
								<p id="showError" style="color:#f35958;"></p>
								<p id="showSuccess" style="color:#0aa699;"></p>
							</div>
							<div class="col-md-4 col-sm-4 col-xs-4 xs-p-l-10">
								<button type="submit" class="button gap-bottom-line-height">Get Started</button>
								
							</div>	
						</div>
					{!! Form::close()!!}
				</div>					
		
			</div>
				
		</div>
	</div>
</section>
<footer class="page-footer inverted" role="footer">
<div class="container">
			<div class="p-t-30 p-b-20">
				<div class="row">
					<div class="col-md-3">
						<h3>BBB Accredited</h3>
						<p>EPS strives to bring the best customer service and support in the industry to each of its customers.</p>
						<a title="Click for the Business Review of Electronic Payment Systems, LLC, a Credit Card - Merchant Services in Englewood CO" target="_blank" href="http://www.bbb.org/denver/business-reviews/credit-card-a-merchant-services/electronic-payment-systems-in-englewood-co-23001241#sealclick"><img style="border: 0;width: 100%;" src="http://seal-denver.bbb.org/seals/blue-seal-293-61-electronicpaymentsystemsllc-23001241.png"  alt="Click for the BBB Business Review of this Credit Card - Merchant Services in Englewood CO"></a>
						
						<div class="clearfix"></div>
					</div>
					<div class="col-md-3">
						<h3>Recent Articles</h3>
						
					</div>
					<div class="col-md-3">
					<h3>Navigation</h3>
					 <ul class="nav footernav">
					{{--*/ $root = App\Categories::parentnavigation() /*--}}
					<li ><a href="{{URL::to('/')}}">Home</a></li>
					@foreach($root as $root) 
					@if($root['slug']=='home')
					@else
					<li ><a href="{{$root['slug']}}">{{$root['name']}}</a></li>
					@endif
					@endforeach
					<li><a href="/contact-eps">Contact</a></li>
					</ul>
					</div>
					<div class="col-md-3 ">
					<?php $query = DB :: table('business')->get();
					foreach ($query as $value) {
					$query = $value;
					}
					?>

				<h3>Contact EPS</h3>
				<address>
					  <p>{{$query->address}}</p>
					</address>
					<p><span class="semi-bold">Client Support:</span> <a href="mailto:{{$query->client_support}}">{{$query->client_support}}</a><br>
					<span class="semi-bold">National Sales:</span> <a href="mailto:{{$query->national_sales}}">{{$query->national_sales}}</a></p>
					<h3 class="m-t-20">FOLLOW US</h3>
					<div class="col-md-12 followus hoverimg" >
						<div class="col-md-3  no-padding">
						<a target="_blank" title="Visit @EPS_NA on Twitter" href="http://twitter.com/EPS_NA"><img alt="Twitter icon" src="{{URL::to('assets/front/img/icon/twitter.png')}}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="200"></a>
						</div>
						<div class="col-md-3  no-padding">
						<a target="_blank" title="Visit EPS-NA on Facebook" href="http://www.facebook.com/electronic.payment.systems"><img alt="Facebook icon" src="{{URL::to('assets/front/img/icon/facebook.png')}}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="300"></a>
						</div>
						<div class="col-md-3  no-padding">
						<a target="_blank" title="Visit EPS-NA on LinkedIn" href="http://www.linkedin.com/company/electronic-payment-systems"><img alt="LinkedIn icon" src="{{URL::to('assets/front/img/icon/linkedin.png')}}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="400"></a>
						</div>
						<div class="col-md-3  no-padding">
						<a target="_blank" title="Visit EPS-NA on YouTube" href="http://www.youtube.com/user/EPS90EZPayPlan">
							<img alt="YouTube icon" src="{{URL::to('assets/front/img/icon/youtube.png')}}" typeof="foaf:Image" data-ride="animated" data-animation="fadeInUp" data-delay="500"></a> 
						</div>
							
							<div class="clearfix"></div>
							
						</div>
					</div>
				</div>
			</div>
	
		</div>
<div class="modal-footer eps p-t-20">
<p class="text-center">Electronic Payment Systems &copy; 2015 | EPS is a registered ISO/MSP of Esquire Bank, 320 Old Country Road Garden City NY 11530 | <a href="{{ URL::to('privacy-policy')}}">Privacy Policy</a> | <a href="{{ URL::to('terms_and_conditions')}}">Terms &amp; Conditions</a></p>
</div>

</footer>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <span class="close" data-dismiss="modal" aria-hidden="true">×</span>
			  <br>
			  <i class="fa fa-credit-card fa-7x"></i>
			  <h3 id="myModalLabel" class="semi-bold">Free Statement Analysis</h3>
			  <p class="no-margin">Get started today! Fill out the form below to start accepting payments with your new merchant account and receive a free credit card reader.</p>
			  <p class="m-t-10">Call Us Today: <big>(800) 863-5995</big></p>
			  <br>
			</div>
				{!! Form::open(array('url' => 'statementAnalysis','id'=>'analysis','class'=>'form-no-horizontal-spacing')) !!}
			<div class="modal-body">
				<fieldset class="account_information">
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
				</fieldset>

				<fieldset class="company_information">
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
				</fieldset>

				<fieldset class="personal_information">
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
				</fieldset>			
			
			</div>
			<div class="modal-footer">
			  
			  <fieldset class="account_information">
				  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				  <button class="btn-green next">Continue</button>
				  </fieldset>
			  <fieldset class="company_information">
				  <button type="button" class="btn btn-danger previous">Back</button>
				  <button class="btn-green next">Continue</button>
				  </fieldset>
			  <fieldset class="personal_information">
				  <button type="button" class="btn btn-danger align-left previous">Back</button>
				  <button class="btn-green" type="submit">Submit</button>
				</fieldset>
			  
			</div>
			{!! Form::close()!!}
		  </div>
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
		</div>
	
</div>
