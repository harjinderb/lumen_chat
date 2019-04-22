@yield('adminHead')
<!-- BEGIN BODY -->
<body class="registration-body no-top">
	<div class="col-md-12 regHeader">
        <a href="{{ URL :: to('/') }}"><img src="{{ URL :: to('assets/img/logo.png') }}" class="logo" alt=""  data-src="{{ URL :: to('assets/img/logo.png') }}" data-src-retina="{{ URL :: to('assets/img/logo.png') }}" width="106" height="21"/></a>
     
        </div>
<div class="container">

@yield('content')
</div>
@extends('layouts.adminFoot')

@section('moreJS')
{!! HTML::script('assets/js/login.js') !!}
{!! HTML::script('assets/js/form_validations.js') !!}

<script>
   
  
$('.avtr').click(function(){
$('#member_photo_upload').val("");
$('#images').html("");
$("input[type='radio']#av1").prop('checked', true);
$('.avtarGroup').fadeIn(1500);
});

$('#member_photo_upload').click(function(){
$("input[type='radio']#av1").prop('checked', false);
$('.avtarGroup').hide();
});



 function readURL(input) {
    
        var imageFiles;
    
        imageFiles = document.getElementById('member_photo_upload').files
       
         for(i=0; i<=imageFiles.length;i++){
        if (input.files && input.files[i]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
         var image = '<div class="slott" id="slot-2" data-slot="2"><img class="thumbnail" height="100" width="100" id="imageId" src="' + e.target.result + '"/></div>';
		   jQuery('#images').html(image); 
		   jQuery('#images1').html(''); 
		   }
         reader.readAsDataURL(input.files[i]);
        }
  		  }
    }
    
    jQuery('#member_photo_upload').change(function(){
	   readURL(this);
	 });

</script>

@stop
