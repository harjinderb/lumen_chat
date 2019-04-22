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
          {!! HTML::link('/admin/blogs/managecat', 'Manage Blogs Category', array('id' => '')) !!}
        </li>
        <li><a class="active" href="javascript:;">Edit Blog Category</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Blog Category Information</h3>
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
        <div class="panel-heading"> <span class="panel-title"> <span class="fa fa-pencil"></span> Edit Blog Category </span> </div>
       <div class="panel-body">
		

		{!! Form::open(array('url' => 'admin/blogcat/edit/'.$blogcat->id,'id'=>'addblogcategory','class'=>'form-horizontal')) !!}
          
             				     
			<fieldset class="fieldset"> <legend class="legend">General Information</legend>
			
		
			<div class="form-group">
              <label class="col-lg-2 control-label">Category</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
                {!! Form::text('name', $blogcat->name , ['class'=>'form-control', 'id'=>'name','placeholder'=>'Enter the category name']) !!}
                </div>
                </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Slug</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
                {!! Form::text('slug', $blogcat->slug , ['class'=>'form-control', 'id'=>'slug','placeholder'=>'Enter the category slug']) !!}
                </div>
                </div>
            </div>

            <div class="form-group">
              <label class="col-lg-2 control-label">Description</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
                {!! Form::text('intro', $blogcat->intro , ['class'=>'form-control', 'id'=>'title','placeholder'=>'Enter the category description.']) !!}
                </div>
                </div>
            </div>
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
{!! HTML::script('assets/js/form_validations.js') !!}
<script>
$(document).on('mousemove mousedown','.colorpicker-saturation',function(){
var color= $('#cp4').val();
if(color!=''){
 $('.headertextcolor').css('background',color);
$('.headertextcolor').prev('input').css('border-color',color);
}else{
$('.headertextcolor').css('background','rgb(234, 233, 234)');	
}
});
</script>
<script>
   
  

 function readURL(input) {
    
        var imageFiles;
    
        imageFiles = document.getElementById('featuredImageUpload').files
       
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
     jQuery('#featuredImageUpload').change(function(){
	   readURL(this);
	 });
 
 

</script>
@stop
