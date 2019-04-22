@extends('layouts.admin')

@section('adminHead')
@extends('layouts.adminHead')
@stop

@section('content')
<link rel="stylesheet" type="text/css" href="{{ URL::to('/assets/css/custom.css') }}" />
 <div class="page-content">

    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div class="clearfix"></div>
    <div class="content sm-gutter">
		<ul class="breadcrumb">
        <li>
          <p>{!! HTML::link('dashboard', 'Dashboard', array('id' => '')) !!}</p>
        </li>
        <li>
          {!! HTML::link('/admin/users/manage', 'Manage Users', array('id' => '')) !!}
        </li>
        <li><a class="active" href="javascript:;">Edit User Information</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Edit User Info</h3>
		@if(Session::has('message'))
<div class="alert {{ Session::get('alert-class') }}"><button data-dismiss="alert" class="close"></button>
{{ Session::get('message') }}
</div>
@endif	
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
       <div class="col-md-12">
		 <div class="panel grid">
        <div class="panel-heading"> <span class="panel-title"> <span class="fa fa-pencil"></span> Edit User </span> </div>
        <div class="panel-body">
		<form enctype="multipart/form-data" class="form-horizontal" id="userEdit" accept-charset="UTF-8" action="{{ URL :: to('admin/users/edit') }}/<?=$User->id;?>" method="POST">
			 {!! Form::hidden('_token', csrf_token()) !!}
			 {!! Form::hidden('id', $User->id) !!}
             				     
			<fieldset class="fieldset"> <legend class="legend">Member Information</legend>
			<div class="form-group">
              <label class="col-lg-2 control-label">First Name:</label>
             <div class="col-lg-6">
				 {!! Form::text('FirstName', $User->FirstName , ['class'=>'form-control', 'id'=>'FirstName','placeholder'=>'Type Your First Name']) !!}
                 </div>
            </div>
            
			<div class="form-group">
              <label class="col-lg-2 control-label">Last Name:</label>
             <div class="col-lg-6">
				 {!! Form::text('LastName', $User->LastName, ['class'=>'form-control', 'id'=>'LastName','placeholder'=>'Type Your last Name']) !!}
                </div>
            </div>
			<div class="form-group">
			<label class="col-lg-2 control-label" for="inputPhone">Gender:</label>
			<div class="col-lg-6 selectC">
			<?php $list= array('Male' => 'Male', 'Female' => 'Female'); ?>
			{!! Form::select('Gender', $list,$User->Gender, array('class'=>'form-control select2', 'id'=>'Gender')) !!}
			</div> 
			</div> 
			<div class="form-group">
			<label class="col-lg-2 control-label" for="maskedDate">Your Birthday:</label>
			<div class="col-lg-6">
			<div class="input-group input-append success date col-md-11 no-padding"> 
			{!! Form::text('DateOfBirth', $User->DateOfBirth, ['class'=>'form-control', 'id'=>'DateOfBirth','placeholder'=>'Date of Birth','autocomplete'=>'off']) !!} 
			 <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
			</div>
			</div>
			</div>

            
		  </fieldset>
			  
			<fieldset class="fieldset"> <legend class="legend">Login Information</legend>
			<div class="form-group">
              <label class="col-lg-2 control-label">Username:</label>
             <div class="col-lg-6">
				 {!! Form::text('username', $User->username, ['class' => 'form-control','id'=>'Username','placeholder'=>'Type Your username']) !!}
				</div>
            </div>
			<div class="form-group">
              <label class="col-lg-2 control-label">Email Address:</label>
              <div class="col-lg-6">
				{!! Form::text('email', $User->email, ['class'=>'form-control', 'id'=>'Email','placeholder'=>'Type Your Email']) !!}
           	  </div>
            </div>
            
			<div class="form-group">
              <label class="col-lg-2 control-label">Password:</label>
             <div class="col-lg-6">
			{!! Form::password('password', array('class'=>'form-control', 'id'=>'Password','placeholder'=>'Enter The Password')) !!}
             </div>
             </div>
             
			<div class="form-group">
              <label class="col-lg-2 control-label">Confirm Password:</label>
             <div class="col-lg-6">
			 {!! Form::password('confirmPassword', array('class'=>'form-control', 'id'=>'confirmPassword','placeholder'=>'Confirm Password')) !!}
           </div>
            </div>
					
			</fieldset> 
			  
			<fieldset class="fieldset"> <legend class="legend">Contact Information</legend>
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputMobile"> Mobile:</label>
                                   
              <div class="col-lg-6">
				  <div class="col-md-2">
					  <?php list($code, $number) =  mb_split("-", $User->Mobile); ?>
					 {!! Form::text('CunCode', $code, ['class'=>'form-control', 'id'=>'CunCode','placeholder'=>'+01']) !!} 
					  </div>
                      <div class="col-md-10">
					 {!! Form::text('Mobile', $number, ['class'=>'form-control', 'id'=>'Mobile','placeholder'=>'Mobile Number']) !!}
                      </div>
				  </div>
            </div>
			
			
			<div class="form-group">
			<label for="Address" class="col-lg-2 control-label">Address:</label>
              <div class="col-lg-6">
				  {!! Form::textarea('Address', $User->Address, ['class'=>'form-control', 'id'=>'Address','rows'=>'4']) !!}
					</div>
                </div>
					
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputPhone">Country:</label>
              <div class="col-lg-6">
				  {!! Form::text('Country', $User->Country, ['class'=>'form-control', 'id'=>'Country','placeholder'=>'Country']) !!}
				 </div>
            </div> 
			            

			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputStandard">State:</label>
              <div class="col-lg-6">
				   {!! Form::text('State', $User->State, ['class'=>'form-control', 'id'=>'State','placeholder'=>'State']) !!}
                </div>
            </div>
            
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputStandard">City:</label>
              <div class="col-lg-6 selectC">
				 {!! Form::text('City', $User->City, ['class'=>'form-control', 'id'=>'City','placeholder'=>'City']) !!}
				  </div>			
			</div>
			
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputMobile">Zip Code:</label>
              <div class="col-lg-6">
				  {!! Form::text('PostalCode', $User->PostalCode, ['class'=>'form-control', 'id'=>'PostalCode','placeholder'=>'Postal Code']) !!}
				 </div>
            </div>
			
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputMobile"> Occupation:</label>
              <div class="col-lg-6">
				  {!! Form::text('Occupation', $User->Occupation, ['class'=>'form-control', 'id'=>'Occupation','placeholder'=>'Occupation']) !!}
				 </div>
            </div>
			
			</fieldset>
				
			<fieldset class="fieldset">
			<legend class="legend">Member Profile</legend>  
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputMobile"> Member's Photo:</label>
              <div class="col-lg-6">
				  <img alt="1.jpeg" src="{{ URL :: to('/dp') }}/<?php echo($User->image !='')? $User->image.'.'.$User->ext : '1.jpeg';?>" style="border: 1px dashed rgb(204, 204, 204); width: 100px; height: 100px;">
				 
				 </div>
            </div>
			
			 
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputPhone">Choose Photo:</label>
              <div class="col-lg-2">
				<div class="upload-image">
				<input type="hidden" id="UserPhoto" value="<?=$User->image.'.'.$User->ext;?>" name="image">
				<div class="btn btn-info btn-gradient"><label for="AdImageFiles">+Add Photo</label> 
				<input type="file" title="Select Your Profile Image" id="member_photo_upload" style="width:62%;" class="upload" name="avtar">
				</div>
				
				</div>
				
				<div class="input-group col-md-4 pull-left">
				<div id="images"></div>
				</div>
				
             </div>
          
              <div class="col-lg-1">
				<div style="font-size: 18px;" class="btn-group">or 
				</div>
				</div>
              <div class="col-lg-2">
		
				<button type="button" class="btn btn-info btn-gradient pull-right avtr"><span class="glyphicons glyphicons-old_man"></span> Choose avtar</button>	
				</div>
				</div>
				<div class="form-group avtarGroup">
				<label class="col-lg-2 control-label" for="inputPhone">Choose any one:</label>
				<div class="col-lg-10">
				<?php for($av=1;$av<=18;$av++){ 
					echo '<div class="avtars"><input type="radio" name="avtar1" id="av'.$av.'" value="'.$av.'.jpeg">';
					?>
					<img src="{{URL :: to('/assets/img/avatars') }}/<?=$av;?>.jpeg"></div>
					<?php } ?>
				</div>
				</div>
            
			   <div class="form-group"></div>
			   <div class="form-group">
			   <label class="col-lg-2 control-label" for="inputMobile"></label>
              <div style="text-align: left;" class="col-lg-6">
				  <div class="btn-group">
					{!!  Form::submit('Save',['class'=>'btn btn-danger btn-cons bg-blue3 bg-gradient pull-right reload']); !!}
					</div>
				  <div class="btn-group">
					  {!!  Form::reset('Reset',['class'=>'btn btn-danger btn-cons bg-red3 bg-gradient pull-right reload']); !!}
					</div>
				
             </div>
            </div>
			     
			                                 
			
			</fieldset>
           	{!! Form::close() !!}
           	
           	  </div>
      </div>
    
		
	</div>
     </div>
     
      </div>
   </div>
	
	</div>
@endsection

@section('moreJS')
<script src="{{ URL::to('/assets/js/form_validations.js') }}" type="text/javascript"></script>
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
