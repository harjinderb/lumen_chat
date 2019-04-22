@extends('layouts.email')

@section('content')
<div class="adM">
<div style="padding:15px;padding-bottom:0px;">
<div style="padding-top:13px">
<p>A new account has just been created for you with <b>www.eps-na.com</b>. 
		You now have access and may log in to our online portal.</p>
		</br>
		</br>
		<b>Below you will find your login information.</b>
		</br>
		</br>
		<p>Login Link: <b><a target="_blank" href="{{ URL :: to('auth/login') }}" style="color: #777;">{{ URL :: to('auth/login') }}</a></b></p>
		<p>Username: <b>{{$emaildata['username']}}</b></p>
		<p>Password: <b>{{$emaildata['password']}}</b></p> 
		</br>
		@if($emaildata['link']!='No Link')
		</br>
		<p>Please click on this button for activate your account.</p> </br>
		<div style="background:#f4f4f4;padding:10px;color: #747477;margin:10px 0; font-size: 14px; font-family: 'Open Sans', Arial, sans-serif; line-height: 24px;">
	<a target="_blank" 
	style="padding:15px;width:250px;text-align:center;background:#599100;text-decoration:none;color:#f4f4f4" href="{{URL::to('user-activate')}}/{{$emaildata['link']}}">Click here for activation</a>
		<div style="padding-top:15px">
		</div>
		</div>
		@endif
		<p>If you have any questions or need help please call us at {{$emaildata['query']}}.</p> </br>

		<p>Your feedback about the services we provide is very important to us.  
		If you have feedback you would like to share with us,  
		you are welcome to reply to this email or give us a call at the office.</p> </br>
		</br>

		<p>Thank You for choosing EPS!</p></br>
</div>
</div>
<div style="background:#f4f4f4;padding:10px;color: #747477; font-size: 14px; font-family: 'Open Sans', Arial, sans-serif; line-height: 24px;">

</div>
<div style="background:#f4f4f4;min-height:2px"></div>

</div>
@endsection
