@extends('layouts.email')

@section('content')
<div class="adM">
<div style="padding:15px;padding-bottom:0px;">
<div style="padding-top:13px">
<p>A New Statement Analysis account registered on <b>www.eps-na.com</b>. 
	
		</br>
		<b>Below are the details.</b>
		</br>
		</br>
<table class="adM"rules="all" style="border-color: #666;width:100%;margin-top:25px;" cellpadding="10">

<tr style='background: #eee;'><td><strong>Attribute:</strong> </td><td><strong>Details:</strong></td></tr>
<tr><td><strong>Name:</strong> </td><td>{{$emaildata['uname']}}</td></tr>
<tr><td><strong>Business Name:</strong> </td><td>{{$emaildata['business']}}</td></tr>
<tr><td><strong>Email:</strong> </td><td>{{$emaildata['email']}}</td></tr>
<tr><td><strong>Phone:</strong> </td><td>{{$emaildata['phone']}}</td></tr>
<tr><td><strong>Current Rate:</strong> </td><td>{{$emaildata['current_rate']}}</td></tr>
<tr><td><strong>State:</strong> </td><td>{{$emaildata['state']}}</td></tr>
<tr><td><strong>City:</strong> </td><td>{{$emaildata['city']}}</td></tr>
<tr><td><strong>Hear From:</strong> </td><td>{{$emaildata['city']}}</td></tr>
<tr><td><strong>Other Media:</strong> </td><td>{{$emaildata['hear_about_other']}}</td></tr>

</table>


	
		
		
</div>
</div>
<div style="background:#f4f4f4;padding:10px;color: #747477; font-size: 14px; font-family: 'Open Sans', Arial, sans-serif; line-height: 24px;">

</div>
<div style="background:#f4f4f4;min-height:2px"></div>

</div>
@endsection
