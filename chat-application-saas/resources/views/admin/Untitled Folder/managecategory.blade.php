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
        <li><a class="active" href="javascript:;">Manage Categories</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Manage Categories List</h3>
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>All <span class="semi-bold">Categories</span></h4>
              
            </div>
            <div class="grid-body ">
				<table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:3%">S.No</th>
                    <th style="width:3%">Id</th>
                    <th style="width:10%">Name</th>
                    <th style="width:5%" data-hide="phone,tablet">Slug</th>
                    <th style="width:5%" data-hide="phone,tablet">Parent</th>
                    <th style="width:15%" data-hide="phone,tablet">Discription</th>
                    <th style="width:10%" data-hide="phone,tablet">Modified</th>
                    <th style="width:3%" data-hide="phone,tablet">Status</th>
                    <th style="width:10%">Action</th>
                  </tr>
                </thead>
                <tbody>
					<?php $s=1; foreach($allCategories as $category){ ?>
                  <tr id="row<?=$category->id;?>">
                    <td class="v-align-middle"><?=$s;?></td>
                    <td class="v-align-middle"><?=$category->id;?></td>
                    <td class="v-align-middle"><?=$category->name;?></td>
                    <td class="v-align-middle"><span class="muted"><?=$category->slug;?></span></td>
                    <td><span class="muted"><?php echo ($category->parent_id !='0')? $category->parent_id : 'Self'; ?></span></td>
                    <td><span class="muted"><?=$category->intro; ?></span></td>
                    <td><span class="muted"><?php $date= $category->modified;
							echo date_format(new DateTime($date),"Y/m/d H:i a");
						 ?></td>
                    <td class="v-align-middle">
					<?php if($category->active == 1){ ?>
                    <button class="btn btn-primary btn-gradient changeStatus reload" id="<?=$category->id;?>" rel="0" type="button" title="Disable"><i class="fa fa-ban"></i> </button>
                    <?php }else{ ?>
                    <button class="btn btn-default btn-gradient changeStatus reload" id="<?=$category->id;?>" rel="1" type="button" title="Enable"><i class="fa fa-check"></i> </button>
                    <?php } ?>
                    </td>
                    <td class="v-align-middle">
					<div data-toggle="buttons-radio" class="btn-group">
					<button class="btn btn-primary btn-gradient reload" type="button" title="View" onclick="window.location.href = '{{URL :: to('admin/category/view') }}/<?=$category->id;?>';"><i class="fa fa-eye"></i> </button>
                    <button class="btn btn-success btn-gradient reload" type="button" title="Edit" onclick="window.location.href = '{{URL :: to('admin/category/edit') }}/<?=$category->id;?>';"><i class="fa fa-pencil"></i> </button>
                    <a class="btn btn-danger btn-gradient catDelete" href="#deleteCat" data-toggle="modal" data-target="#deleteCat" id="<?=$category->id;?>" title="Delete"><i class="fa fa-remove"></i></a>
                      </div>
                    </td>
                  </tr>
                  <?php $s++; } ?>
               </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
   </div>
   
  	<div class="modal fade" id="deleteCat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			  <br>
			  <i class="fa fa-close fa-7x"></i>
			  <h5 id="myModalLabel" class="semi-bold">Are you sure that you want to delete "<b class="catname"></b>" Category?</h5>
					
			  <br>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="button" class="btn btn-primary deleteCat" data-dismiss="modal" id="" type="submit">Confirm</button>
			</div>
	
		  </div>
		  <!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
		</div> 
 
</div>
		
		

@endsection

@section('moreJS')
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
	
	
	$.post('{{ URL :: to('category/changeStatus')}}',{id:id,status:status,_token:token},function(data){
		
			 $('#row'+id).addClass('row_selected');
			 	
			setTimeout(function(){			
			$('#row'+id).removeClass('row_selected','slow');
			},2000);
			});
});

$(document).on('click','.catDelete',function(){
  var catname= $(this).parents('tr').children('td:nth-child(3)').text();
  var id= $(this).attr('id');
  $('.catname').text(catname);
  $('.deleteCat').attr('id',id);
});

$('.deleteCat').click(function(){
	var id= $(this).attr('id');
	var token= '{{ csrf_token() }}';
			
			$.post('{{ URL :: to('categoryDelete')}}',{id:id,_token:token},function(data){

			$('tr#row'+id).addClass('row_selected');

			setTimeout(function(){			
			$('tr#row'+id).removeClass('row_selected');
			$('tr#row'+id).remove();
			},2000);
			});
});
</script>
@stop
