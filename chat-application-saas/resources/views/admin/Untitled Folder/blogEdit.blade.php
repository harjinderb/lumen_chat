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
          {!! HTML::link('/admin/blogs/manage', 'Manage Blogs', array('id' => '')) !!}
        </li>
        <li><a class="active" href="javascript:;">Edit Blog</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Blog Information</h3>
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
       <div class="col-md-12">
		 <div class="panel grid">
        <div class="panel-heading"> <span class="panel-title"> <span class="fa fa-pencil"></span> Edit Blog </span> </div>
       <div class="panel-body">
		

		{!! Form::open(array('url' => 'admin/blog/edit/'.$blog->id,'id'=>'addblog','class'=>'form-horizontal','files'=>true)) !!}
          
             				     
			<fieldset class="fieldset"> <legend class="legend">General Information</legend>
			
			<div class="form-group">
			<label class="col-lg-2 control-label" for="inputPhone">Select Blog:</label>
			<div class="col-lg-6 selectC">  
			<div class="input-with-icon  right">                                       
			<i class=""></i>
			{!! Form::select('category_id', $categories,$blog->category_id,array('class'=>'form-control select2', 'id'=>'parent')) !!}
			</div> 
			</div> 
			
			</div>
			<div class="form-group">
              <label class="col-lg-2 control-label">Title</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
                {!! Form::text('title', $blog->title , ['class'=>'form-control', 'id'=>'title','placeholder'=>'Enter the blog title']) !!}
                </div>
                </div>
            </div>
            
			<div class="form-group">
              <label class="col-lg-2 control-label">Heading</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
                {!! Form::text('heading', $blog->heading , ['class'=>'form-control', 'id'=>'heading','placeholder'=>'Enter the blog heading.']) !!}
                   </div>
                   </div>
            </div>
			
			<div class="form-group">
              <label class="col-lg-2 control-label">Short Content:</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
				  {!! Form::textarea('short_content', $blog->short_content , ['class'=>'form-control', 'id'=>'short_content','placeholder'=>'Enter the blog short content.','rows'=>'4']) !!}
		      </div>
		      </div>
            </div>
				
		
			<div class="form-group">
			<label for="Address" class="col-lg-2 control-label">Content:</label>
              <div class="col-lg-10">
	
				  {!! Form::textarea('content', $blog->content , ['rows'=>'15','class'=>'form-control text-editor', 'id'=>'editor1','placeholder'=>'Enter the blog content.']) !!}	
					
				   </div>
                </div>
				
				
			<div class="form-group">
            <label class="col-lg-2 control-label" for="inputComments">Status:</label>
              <div class="col-lg-6 selectC">
				  <?php $status= array('1'=>'Enable','0'=>'Disable'); ?>
				  {!! Form::select('status', $status,$blog->status,array('class'=>'form-control select2', 'id'=>'status')) !!}
			  </div>
            </div> 
           <div class="form-group">
            <label class="col-lg-2 control-label" for="inputComments">Sidebar:</label>
              <div class="col-lg-6 selectC">
				  <?php $status= array('1'=>'Yes','0'=>'No'); ?>
				  {!! Form::select('sidebar', $status,$blog->sidebar,array('class'=>'form-control select2', 'id'=>'sidebar')) !!}
			  </div>
            </div> 
			</fieldset>
			<fieldset class="fieldset">
			<legend class="legend">Meta Information</legend>   
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputPhone">Meta Title:</label>
              <div class="col-lg-6">
				  {!! Form::text('meta_title', $blog->meta_title , ['class'=>'form-control', 'id'=>'BlogMetaTitle','placeholder'=>'Enter the blog Meta Title.']) !!}
			</div>
              	</div>
			
			
			<div class="form-group">
              <label class="col-lg-2 control-label">Keywords:</label>
             <div class="col-lg-6">
				  {!! Form::text('keywords', $blog->keywords , ['class'=>'form-control', 'id'=>'BlogKeywords','placeholder'=>'Enter the blog keywords.']) !!}
		                
              </div>
            </div>
            
			<div class="form-group">
              <label class="col-lg-2 control-label">Description:</label>
             <div class="col-lg-6">
				  {!! Form::textarea('meta_description', $blog->meta_description , ['class'=>'form-control', 'id'=>'BlogMetaDescription','placeholder'=>'Enter the Meta Ddescription of blog.','rows'=>'3']) !!}
		      </div>
            </div>
            
            </fieldset>
            <fieldset class="fieldset">
			<legend class="legend">Media Information</legend>
			
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputMobile">Featured Image:</label>
              <div class="col-lg-6">
				  <?php if($blog->featuredImage !=''){ ?>
				  <img src="{{ URL :: to('/media/Blogs') }}/<?php echo $blog->featuredImage.'320x170.'.$blog->ext;?>" style="border: 1px dashed rgb(204, 204, 204); width: 320px; height: 170px;">
			<div class="checkbox checkbox check-success">
              <input type="checkbox" name="deleteimage" id="checkbox1">
              <label for="checkbox1">Delete Featured Image </label>
            </div>
				 <?php }else{ echo  'No featured image'; } ?>
			
				
				 </div>
            </div>
			<div class="form-group">
			<label class="col-lg-2 control-label">Choose Image:</label>
			<div class="col-lg-6">
			<div class="upload-image">
				<input type="hidden" value="<?=$blog->featuredImage.'.'.$blog->ext;?>" name="image">
				<input type="hidden" id="featuredImage" name="hiddenfeaturedImage" value="">
				<div class="btn btn-info btn-gradient"><label for="AdImageFiles">+Add Photo</label> 
				<input type="file" title="Select Featured Image" id="featuredImageUpload" style="width:62%;" class="upload" name="featuredImage">
				</div>
				
				</div>
				
				<div class="input-group col-md-4 pull-left">
				<div id="images"></div>
				      
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
