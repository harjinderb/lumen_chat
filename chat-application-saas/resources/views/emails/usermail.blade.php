@extends('layouts.email')

@section('content')
<div class="adM"> 
<div style="padding:15px;padding-bottom:0px;">
<div style="padding-top:13px">
<p ><h2 style="margin-bottom:20px;">Welcome to <b>www.eps-na.com</b></h2>
<p style="margin-bottom:20px;">You have been successfully added to our mailing list, keeping you up-to-date with our latest news.</p>
		</br>
		
		<p style="margin-bottom:20px;">Subscribed Email: <b>{{$emaildata['email']}}</b></p>
		</br>
		
		<p>If you have any questions or need help please call us at {{$emaildata['query']}}.</p> </br>
		<p style="margin-bottom:20px;">Your feedback about the services we provide is very important to us.  
		If you have feedback you would like to share with us,  
		you are welcome to reply to this email or give us a call at the office.</p> </br>
		<p style="margin-bottom:20px;">Please <a href="{{$emaildata['unsubscribe']}}">click here</a> to Unsubscribe our Newsletter </p> </br>
		
		</br>
		</br>
		</br>

		<p>Thank You for choosing EPS!</p></br>
</div>
</div>
<div style="background:#f4f4f4;padding:10px;color: #747477; font-size: 14px; font-family: 'Open Sans', Arial, sans-serif; line-height: 24px;">

</div>
<div style="background:#f4f4f4;min-height:2px"></div>

</div>
@endsection
