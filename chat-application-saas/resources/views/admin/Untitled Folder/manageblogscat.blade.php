@extends('layouts.admin')

@section('adminHead')
@extends('layouts.adminHead')
@stop

@section('content')
 <div class="page-content">
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM--> 
    <div class="clearfix"></div>
    <div class="content sm-gutter">
		<ul class="breadcrumb">
        <li>
          <p>{!! HTML::link('dashboard', 'Dashboard', array('id' => '')) !!}</p>
        </li>
        <li><a class="active" href="javascript:;">Manage Blog Categories</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i> 
		<h3>Manage Blog Categories</h3>
		@if(Session::has('message'))
<div class="alert {{ Session::get('alert-class') }}"><button data-dismiss="alert" class="close"></button>
{{ Session::get('message') }}
</div>
@endif	
		</div>
		
 
		 <div class="modal fade" id="addBlogcat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"> 
		<div class="modal-dialog">
		  <div class="modal-content">

		  <div class="modal-footer" style="margin-bottom:40px;">
		  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			  <br>
			  <h3 style="float:left;">Category Information</h3>
			</div>

			  {!! Form::open(array('url' => 'admin/blog/addblogcat','id'=>'addblogcategory','class'=>'form-horizontal full-width','method'=>'post')) !!}
			<div class="modal-header">
			 

		
           <fieldset class="account_information">
				<div class="row form-row">
					<div class="col-md-6">
						<div class="input-with-icon  right">
						<i class=""></i>
						<input type="text" value="" name="name" placeholder="Category Name" id="name" class="form-control">
						</div>
					</div>
					<div class="col-md-6">
					<div class="input-with-icon  right">
					<i class=""></i>
					<input type="text" value="" name="slug" placeholder="Category Slug" id="slug" class="form-control">
					</div>
				</div>
				</div>
				<div class="row form-row">
				<div class="col-md-12">
					<div class="input-with-icon  right">
					<i class=""></i>
					<input type="text" value="" name="intro" placeholder="Description" id="intro" class="form-control">
					</div>
				</div>
				</div>
		

			
			  
					
			  <br>
			</div>
			
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="submit" class="btn btn-primary addBlogcat" id="">Save</button>
			</div>
			  {!! Form::close()!!}
			  
	
		  </div>
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div> 
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>All <span class="semi-bold">Blogs Categories</span></h4>
              <div class="align-right">
		 <a class="btn btn-danger btn-gradient blogDelete" href="#addBlogcat" data-toggle="modal" data-target="#addBlogcat"  title="Add New Category">Add New Category</a>
		</div>
            </div>
			
            <div class="grid-body ">
				<table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:3%">Id</th>
                    <th style="width:5%">Category</th>
                    <th style="width:5%" data-hide="phone,tablet">Slug</th>
                    <th style="width:15%" data-hide="phone,tablet">Description</th>
                    <th style="width:9%" data-hide="phone,tablet">Modified</th>
                    <th style="width:5%" data-hide="phone,tablet">Status</th>
                    <th style="width:10%">Action</th>
                  </tr>
                </thead>
                <tbody>
					<?php foreach($allblogscat as $blog){ ?>
                  <tr id="row<?=$blog->id;?>">
                    <td class="v-align-middle"><?=$blog->id;?></td>
                    <td class="v-align-middle"><?=$blog->name;?></td>
                    <td class="v-align-middle"><?=$blog->slug;?></td>
                    <td class="v-align-middle"><span class="muted"><?=$blog->intro;?></span></td>
                    <td><span class="muted"><?php $date= $blog->modified;
							echo date_format(new DateTime($date),"Y/m/d H:i a");
						 ?></td>
                    <td class="v-align-middle">
					<?php if($blog->active == 1){ ?>
                    <button class="btn btn-primary btn-gradient changeStatus reload" id="<?=$blog->id;?>" rel="0" type="button" title="Disable"><i class="fa fa-ban"></i> </button>
                    <?php }else{ ?>
                    <button class="btn btn-default btn-gradient changeStatus reload" id="<?=$blog->id;?>" rel="1" type="button" title="Enable"><i class="fa fa-check"></i> </button>
                    <?php } ?>
                    </td>
                    <td class="v-align-middle">
					<div data-toggle="buttons-radio" class="btn-group">
					<button class="btn btn-primary btn-gradient reload" type="button" title="View" onclick="window.location.href = '{{URL :: to('admin/blogcat/view') }}/<?=$blog->id;?>';"><i class="fa fa-eye"></i> </button>
                    <button class="btn btn-success btn-gradient reload" type="button" title="Edit" onclick="window.location.href = '{{URL :: to('admin/blogcat/edit') }}/<?=$blog->id;?>';"><i class="fa fa-pencil"></i> </button>
                    <a class="btn btn-danger btn-gradient blogDelete" href="#deletePost" data-toggle="modal" data-target="#deleteBlog" id="<?=$blog->id;?>" title="Delete"><i class="fa fa-remove"></i></a>
                    
                      </div>
                    
                    </td>
                  </tr>
                  <?php } ?>
               </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   </div>
   
   <div class="modal fade" id="deleteBlog" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			  <br>
			  <i class="fa fa-close fa-7x"></i>
			  <h5 id="myModalLabel" class="semi-bold">Are you sure that you want to delete "<b class="blogname"></b>" post?</h5>
					
			  <br>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="button" class="btn btn-primary deleteBlog" data-dismiss="modal" id="" type="submit">Confirm</button>
			</div>
	
		  </div>
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div> 


	
 
   
   
</div>
		
		

@endsection

@section('moreJS')
<script src="{{ URL::to('/assets/js/form_validations.js') }}" type="text/javascript"></script>
<script>
$('.DTTT').remove();

$('.changeStatus.reload').on('click', function () {
	var el = jQuery(this).parents(".grid");
	blockUI(el);
	window.setTimeout(function () {
		unblockUI(el);
	}, 1000);
});
    
    
$(document).on('click','button.changeStatus',function(){
	var id= $(this).attr('id');
	var status= $(this).attr('rel');
	var token= '{{ csrf_token() }}';
	
	if(status==0){
		$(this).attr({
		removeClass: 'btn-primary',
		addClass: 'btn-default',
		rel: '1',
		html: '<i class="fa fa-check"></i>'
		},1000);
	}else if(status==1){
		$(this).attr({
		removeClass: 'btn-default',
		addClass: 'btn-primary',
		rel: '0',
		html: '<i class="fa fa-ban"></i>'
		},1000);
		
	}
	

	$.post('{{ URL :: to('blogscat/changeStatus')}}',{id:id,status:status,_token:token},function(data){
		
			 $('#row'+id).addClass('row_selected');
			 	
			setTimeout(function(){			
			$('#row'+id).removeClass('row_selected','slow');
			},2000);
			});
});
 
$(document).on('click','.blogDelete',function(){
  var catname= $(this).parents('tr').children('td:nth-child(3)').text();
  var id= $(this).attr('id');
  $('.blogname').text(catname);
  $('.deleteBlog').attr('id',id);
});

$('.deleteBlog').click(function(){
	var id= $(this).attr('id');
	var token= '{{ csrf_token() }}';
			
			$.post('{{ URL :: to('blogcatDelete')}}',{id:id,_token:token},function(data){

			$('#row'+id).addClass('row_selected');

			setTimeout(function(){			
			$('#row'+id).removeClass('row_selected');
			$('#row'+id).remove();
			},2000);
			});
});




$('#name').blur(function(){
	var str = jQuery('#name').val().toLowerCase();
	var patt1 = str.trim(); 
	var result = patt1.replace(/\s{1,}/g, '-');
	$("#slug").val(result);
	});
</script>
@stop
