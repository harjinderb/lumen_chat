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
        <li><a class="active" href="javascript:;">Manage Users</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Manage Users</h3>
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>All <span class="semi-bold">Users</span></h4>
              
            </div>
            <div class="grid-body ">
				<table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:3%">Id</th>
                    <th style="width:9%">Name</th>
                    <th style="width:5%" data-hide="phone,tablet">Username</th>
                    <th style="width:10%" data-hide="phone,tablet">Email</th>
                    <th style="width:5%" data-hide="phone,tablet">Mobile</th>
                    <th style="width:10%" data-hide="phone,tablet">Last Login</th>
                    <th style="width:5%" data-hide="phone,tablet">Status</th>
                    <th style="width:10%">Action</th>
                  </tr>
                </thead>
                <tbody>
					<?php foreach($allUsers as $users){ ?>
                  <tr id="row<?=$users->id;?>">
                    <td class="v-align-middle"><?=$users->id;?></td>
                    <td class="v-align-middle"><?=$users->FirstName.' '.$users->LastName;?></td>
                    <td class="v-align-middle"><span class="muted"><?=$users->username;?></span></td>
                    <td><span class="muted"><?=$users->email; ?></span></td>
                    <td><span class="muted"><?=$users->Mobile; ?></span></td>
                    <td><span class="muted"><?php if($users->updated_at == '0000-00-00 00:00:00'){
						echo 'Not login yet';
						}else{ 
							$date= $users->updated_at;
							echo date_format(new DateTime($date),"Y/m/d H:i a");
						 } ?></span></td>
                    <td class="v-align-middle">
					<?php if($users->active == 1){ ?>
                    <button class="btn btn-primary btn-gradient changeStatus reload" id="<?=$users->id;?>" rel="0" type="button" title="Disable"><i class="fa fa-ban"></i> </button>
                    <?php }else{ ?>
                    <button class="btn btn-default btn-gradient changeStatus reload" id="<?=$users->id;?>" rel="1" type="button" title="Enable"><i class="fa fa-check"></i> </button>
                    <?php } ?>
                    </td>
                    <td class="v-align-middle">
					<div data-toggle="buttons-radio" class="btn-group">
					<button class="btn btn-primary btn-gradient reload" type="button" title="View" onclick="window.location.href = '{{URL :: to('admin/users/view') }}/<?=$users->id;?>';"><i class="fa fa-eye"></i> </button>
                    <button class="btn btn-success btn-gradient reload" type="button" title="Edit" onclick="window.location.href = '{{URL :: to('admin/users/edit') }}/<?=$users->id;?>';"><i class="fa fa-pencil"></i> </button>
                   
                   <a class="btn btn-danger btn-gradient userDelete" href="#deleteUser" data-toggle="modal" data-target="#deleteUser" id="<?=$users->id;?>" title="Delete"><i class="fa fa-remove"></i></a>
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
   
   <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
		  <div class="modal-content">
			<div class="modal-header">
			  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
			  <br>
			  <i class="fa fa-close fa-7x"></i>
			  <h5 id="myModalLabel" class="semi-bold">Are you sure that you want to delete "<b class="username"></b>" User?</h5>
					
			  <br>
			</div>
			<div class="modal-footer">
			  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  <button type="button" class="btn btn-primary deleteUser" data-dismiss="modal" id="" type="submit">Confirm</button>
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
	
	
	$.post('{{ URL :: to('changeStatus')}}',{id:id,status:status,_token:token},function(data){
		
			 $('#row'+id).addClass('row_selected');
			 	
			setTimeout(function(){			
			$('#row'+id).removeClass('row_selected','slow');
			},2000);
			});
});

$('.userDelete').click(function(){
  var username = $(this).parents('tr').children('td:nth-child(2)').text();
  var id= $(this).attr('id');
  $('.username').text(username);
  $('.deleteUser').attr('id',id);
});

$('.deleteUser').click(function(){
	var id= $(this).attr('id');
	var token= '{{ csrf_token() }}';
			
			$.post('{{ URL :: to('userDelete')}}',{id:id,_token:token},function(data){

			$('#row'+id).addClass('row_selected');

			setTimeout(function(){			
			$('#row'+id).removeClass('row_selected');
			$('#row'+id).remove();
			},2000);
			});
});

</script>
@stop
