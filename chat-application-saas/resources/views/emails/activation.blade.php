@extends('layouts.email')

@section('content')
<div class="adM">
<div style="padding:15px;padding-bottom:0px;">
<div style="padding-top:13px">
<p>Your account has been generated successfully.</p>

		</br>
		<p>Please click on this button for activate your account.</p> </br>
		<div style="background:#f4f4f4;padding:10px;color: #747477;margin:10px 0; font-size: 14px; font-family: 'Open Sans', Arial, sans-serif; line-height: 24px;">
	<a target="_blank"
	style="padding:15px;width:250px;text-align:center;background:#599100;text-decoration:none;color:#f4f4f4" href="{{URL::to('user-activate')}}/{{$emaildata['link']}}">Click here for activation</a>
		<div style="padding-top:15px">
		</div>
		</div>

</div>
</div>
<div style="background:#f4f4f4;padding:10px;color: #747477; font-size: 14px; font-family: 'Open Sans', Arial, sans-serif; line-height: 24px;">

</div>
<div style="background:#f4f4f4;min-height:2px"></div>

</div>
@endsection
