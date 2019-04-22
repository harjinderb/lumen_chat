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
          {!! HTML::link('/admin/category/manage', 'Manage Categories', array('id' => '')) !!}
        </li>
        <li><a class="active" href="javascript:;">Edit Category</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Category Information</h3>
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
       <div class="col-md-12">
		 <div class="panel grid">
        <div class="panel-heading"> <span class="panel-title"> <span class="fa fa-pencil"></span> Edit Category </span> </div>
        <div class="panel-body">
		<form enctype="multipart/form-data" class="form-horizontal" id="userEdit" accept-charset="UTF-8" action="{{ URL :: to('admin/category/edit') }}/<?=$category->id;?>" method="POST">
			 {!! Form::hidden('_token', csrf_token()) !!}
			 {!! Form::hidden('id', $category->id) !!}
             <fieldset class="fieldset"> <legend class="legend">Category Information</legend>
			<div class="form-group">
              <label class="col-lg-2 control-label">Category Name:</label>
             <div class="col-lg-6">
				 {!! Form::text('name', $category->name , ['class'=>'form-control', 'id'=>'CategoryName','placeholder'=>'Enter the category name']) !!}
                 </div>
            </div>
            
			<div class="form-group">
              <label class="col-lg-2 control-label">Category Slug:</label>
             <div class="col-lg-6">
				{!! Form:: text('slug',$category->slug, ['class'=>'form-control','id'=>'CategorySlug','placeholder'=>'Category Slug'] ) !!}
                </div>
            </div>
			<div class="form-group">
			<label class="col-lg-2 control-label" for="inputPhone">Parent Id:</label>
			<div class="col-lg-6 selectC">
			{!! Form::select('parent_id', $parent, $category->parent_id ,array('class'=>'form-control select2', 'id'=>'parent')) !!}
			</div> 
			</div> 
			<div class="form-group">
            <label class="col-lg-2 control-label" for="inputComments">Status:</label>
              <div class="col-lg-6 selectC">
				  <?php $status= array('1'=>'Enable','0'=>'Disable'); ?>
				  {!! Form::select('active', $status,$category->active,array('class'=>'form-control select2', 'id'=>'status')) !!}
			  </div>
            </div> 
            <div class="form-group">
            <label class="col-lg-2 control-label" for="inputComments">Dispaly in navigation:</label>
              <div class="col-lg-6 selectC">
				  <?php $status= array('1'=>'Yes','0'=>'No'); ?>
				  {!! Form::select('navigation', $status,$category->navigation,array('class'=>'form-control select2', 'id'=>'inNavigation')) !!}
			  </div>
            </div> 
			<div class="form-group">
			<label class="col-lg-2 control-label" for="inputPhone">Description:</label>
			<div class="col-lg-6 selectC">
			{!! Form::text('intro', $category->intro , ['class'=>'form-control', 'id'=>'description','placeholder'=>'Enter the description (optional)']) !!}
			</div> 
			</div> 
		
            
		  </fieldset>
                         
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
$('#CategoryName').blur(function(){
	var str = jQuery('#CategoryName').val().toLowerCase();
	var patt1 = str.trim(); 
	var result = patt1.replace(/\s{1,}/g, '-');
	$("#CategorySlug").val(result);
	});
</script>
@stop
