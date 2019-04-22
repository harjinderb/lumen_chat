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
          {!! HTML::link('/admin/cms-pages/manage', 'Manage Pages', array('id' => '')) !!}
        </li>
        <li><a class="active" href="javascript:;">Edit Page</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>CMS Page Information</h3>
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
        <div class="panel-heading"> <span class="panel-title"> <span class="fa fa-pencil"></span> Edit Page </span> </div>
       <div class="panel-body">
		

		{!! Form::open(array('url' => 'admin/cms-pages/edit/'.$page->id,'id'=>'addpage','class'=>'form-horizontal','files'=>true)) !!}
          
             				     
			<fieldset class="fieldset"> <legend class="legend">General Information</legend>
			
			<div class="form-group">
			<label class="col-lg-2 control-label" for="inputPhone">Select Page:</label>
			<div class="col-lg-6 selectC">  
			<div class="input-with-icon  right">                                       
			<i class=""></i>
			{!! Form::select('category_id', $categories,$page->category_id,array('class'=>'form-control select2', 'id'=>'parent')) !!}
			</div> 
			</div> 
			
			</div>
			<div class="form-group">
              <label class="col-lg-2 control-label">Title</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
                {!! Form::text('title', $page->title , ['class'=>'form-control', 'id'=>'title','placeholder'=>'Enter the page title']) !!}
                </div>
                </div>
            </div>
            
			<div class="form-group">
              <label class="col-lg-2 control-label">Heading</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
                {!! Form::text('heading', $page->heading , ['class'=>'form-control', 'id'=>'heading','placeholder'=>'Enter the page heading.']) !!}
                   </div>
                   </div>
            </div>
			<div class="form-group">
              <label class="col-lg-2 control-label">Sub Heading</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
                {!! Form::text('sub_heading', $page->sub_heading , ['class'=>'form-control', 'id'=>'sub-heading','placeholder'=>'Enter the page sub heading.']) !!}
                   </div>
                   </div>
            </div>
			<div class="form-group">
              <label class="col-lg-2 control-label">Short Content:</label>
             <div class="col-lg-6">  
			<div class="input-with-icon  right">                                       
				<i class=""></i>
				  {!! Form::textarea('short_content', $page->short_content , ['class'=>'form-control', 'id'=>'short_content','placeholder'=>'Enter the page short content.','rows'=>'4']) !!}
		      </div>
		      </div>
            </div>
				
		
			<div class="form-group">
			<label for="Address" class="col-lg-2 control-label">Content:</label>
              <div class="col-lg-10">
	
				  {!! Form::textarea('content', $page->content , ['rows'=>'15','class'=>'form-control text-editor', 'id'=>'editor1','placeholder'=>'Enter the page content.']) !!}	
					
				   </div>
                </div>
				
				
			<div class="form-group">
            <label class="col-lg-2 control-label" for="inputComments">Status:</label>
              <div class="col-lg-6 selectC">
				  <?php $status= array('1'=>'Enable','0'=>'Disable'); ?>
				  {!! Form::select('status', $status,$page->status,array('class'=>'form-control select2', 'id'=>'status')) !!}
			  </div>
            </div> 
           <div class="form-group">
            <label class="col-lg-2 control-label" for="inputComments">Sidebar:</label>
              <div class="col-lg-6 selectC">
				  <?php $status= array('1'=>'Yes','0'=>'No'); ?>
				  {!! Form::select('sidebar', $status,$page->sidebar,array('class'=>'form-control select2', 'id'=>'sidebar')) !!}
			  </div>
            </div> 
			</fieldset>
			<fieldset class="fieldset">
			<legend class="legend">Meta Information</legend>   
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputPhone">Meta Title:</label>
              <div class="col-lg-6">
				  {!! Form::text('meta_title', $page->meta_title , ['class'=>'form-control', 'id'=>'CmsPageMetaTitle','placeholder'=>'Enter the page Meta Title.']) !!}
			</div>
              	</div>
			
			
			<div class="form-group">
              <label class="col-lg-2 control-label">Keywords:</label>
             <div class="col-lg-6">
				  {!! Form::text('keywords', $page->keywords , ['class'=>'form-control', 'id'=>'CmsPageKeywords','placeholder'=>'Enter the page keywords.']) !!}
		                
              </div>
            </div>
            
			<div class="form-group">
              <label class="col-lg-2 control-label">Description:</label>
             <div class="col-lg-6">
				  {!! Form::textarea('meta_description', $page->meta_description , ['class'=>'form-control', 'id'=>'CmsPageMetaDescription','placeholder'=>'Enter the Meta Ddescription of page.','rows'=>'3']) !!}
		      </div>
            </div>
            
            </fieldset>
            <fieldset class="fieldset">
			<legend class="legend">Media Information</legend>
			
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputMobile">Featured Image:</label>
              <div class="col-lg-6">
				  <?php if($page->featuredImage !=''){ ?>
				  <img src="{{ URL :: to('/media/CMSPages') }}/<?php echo $page->featuredImage.'360x170.'.$page->ext;?>" style="border: 1px dashed rgb(204, 204, 204); width: 320px; height: 170px;">
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
				<input type="hidden" value="<?=$page->featuredImage.'.'.$page->ext;?>" name="image">
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
              <label class="col-lg-2 control-label">Heading Text(H1):</label>
             <div class="col-lg-6">
				  {!! Form::text('headerTextH1', $page->headerTextH1 , ['class'=>'form-control', 'id'=>'headerTextH1','placeholder'=>'Enter the header text(H1)']) !!}
		                
              </div>
            </div>
            <div class="form-group">
              <label class="col-lg-2 control-label">Heading Text(H2):</label>
             <div class="col-lg-6">
				  {!! Form::text('headerTextH2', $page->headerTextH2 , ['class'=>'form-control', 'id'=>'headerTextH2','placeholder'=>'Enter the header text(H2)']) !!}
		                
              </div>
            </div>
             <div class="form-group">
            <label class="col-lg-2 control-label" for="inputComments">Header Text Position:</label>
              <div class="col-lg-6 selectC">
				  <?php $status= array('center'=>'Center','left'=>'Left','right'=>'Right'); ?>
				  {!! Form::select('headingPosition', $status,$page->headingPosition,array('class'=>'form-control select2', 'id'=>'position')) !!}
			  </div>
            </div> 
            <div class="form-group">
			<label class="col-lg-2 control-label" for="inputPhone">Header Text Color:</label>
			<div class="col-lg-6">  
			<div class="input-with-icon  right" style="position:relative;">                                       
			<i class=""></i>
			{!! Form::text('headingTextColor', $page->headingTextColor,array('class'=>'form-control my-colorpicker-control', 'id'=>'cp4','data-color'=>'rgb(234, 233, 234)','data-color-format'=>'hex','data-colorpicker-guid'=>'8','style'=>'text-indent: 40px;')) !!}
			<span class="headertextcolor" style="background: <?php echo ($page->headingTextColor!='')? $page->headingTextColor : 'rgb(234, 233, 234);';?>"></span>
			</div> 
			</div> 
			</div> 
			
			
			<div class="form-group">
              <label class="col-lg-2 control-label" for="inputMobile">Header Image:</label>
              <div class="col-lg-6">
				  <?php if($page->headerimage !=''){ ?>
				  <img src="{{ URL :: to('/media/headerImage') }}/<?php echo $page->headerimage.'320x170.'.$page->headerext;?>" style="border: 1px dashed rgb(204, 204, 204); width: 320px; height: 170;">
			<div class="checkbox checkbox check-success">
              <input type="checkbox" name="deleteheaderimage" id="checkbox2">
              <label for="checkbox2">Delete Header Image </label>
            </div>
				 <?php }else{ echo  'No header image'; } ?>
			
				
				 </div>
            </div>
			<div class="form-group">
			<label class="col-lg-2 control-label">Choose Header Image:</label>
			<div class="col-lg-6">
			<div class="upload-image">
				<input type="hidden" value="<?=$page->headerimage.'.'.$page->headerext;?>" name="headerimage">
				<input type="hidden" id="headerImage" name="hiddenheaderimage">
		 		   
				
				<div class="btn btn-info btn-gradient"><label for="AdImageFiles">+Add Photo</label> 
				<input type="file" title="Select Header Image" id="headerImageUpload" style="width:62%;" class="upload" name="headerimage">
				
				</div>
				
				</div>
				
				<div class="input-group col-md-4 pull-left">
				<div id="himages"></div>
				      
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
 
 function hreadURL(input) {
    
        var imageFiles;
    
        imageFiles = document.getElementById('headerImageUpload').files
       
         for(i=0; i<=imageFiles.length;i++){
        if (input.files && input.files[i]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
         var image = '<div class="slott m-t-10" id="slot-2" data-slot="2"><img class="thumbnail" height="100" width="100" id="imageId" src="' + e.target.result + '"/></div>';
		   jQuery('#himages').html(image); 
		   jQuery('#himages1').html(''); 
		   }
         reader.readAsDataURL(input.files[i]);
        }
  		  }
    }
    
   
    jQuery('#headerImageUpload').change(function(){
	   hreadURL(this);
	 });

</script>
@stop
