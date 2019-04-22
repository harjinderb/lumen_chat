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
        <li><a class="active" href="javascript:;">Manage Statement Analysis</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Manage Statement Analysis</h3>
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>All <span class="semi-bold">Statements</span></h4>
              
            </div>
            <div class="grid-body ">
				<table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:5%">Id</th>
                    <th style="width:10%">Name</th>
                    <th style="width:10%" data-hide="phone,tablet">Business Name</th>
                    <th style="width:15%" data-hide="phone,tablet">Email</th>
                    <th style="width:10%" data-hide="phone,tablet">Phone</th>
                    <th style="width:10%" data-hide="phone,tablet">Cur Rate</th>
                    <th style="width:10%" data-hide="phone,tablet">State</th>
					<th style="width:10%" data-hide="phone,tablet">City</th>
			               
                    <th style="width:10%">Action</th>
                  </tr>
                </thead>
                <tbody>
					<?php foreach($allstatements as $statement){ ?>
                  <tr id="row<?=$statement->id;?>">
                    <td class="v-align-middle"><?=$statement->id;?></td>
                    <td class="v-align-middle"><?=$statement->name;?></td>
                    <td class="v-align-middle"><span class="muted"><?=$statement->business;?></span></td>
                    <td><span class="muted"><?php echo $statement->email; ?></span></td>
                    <td><span class="muted"><?php echo $statement->phone; ?></span></td>
                    <td><span class="muted"><?php echo $statement->current_rate; ?></span></td>
                    <td><span class="muted"><?php echo $statement->state; ?></span></td>
					<td><span class="muted"><?php echo $statement->city; ?></span></td>
                                     
                 
                    <td class="v-align-middle">
					<div data-toggle="buttons-radio" class="btn-group">
					<button class="btn btn-primary btn-gradient reload" type="button" title="View" onclick="window.location.href = '{{URL :: to('admin/statement/view') }}/<?=$statement->id;?>';"><i class="fa fa-eye"></i> </button>
                     <a class="btn btn-danger btn-gradient statementDelete" href="#deleteStatement" data-toggle="modal" data-target="#deleteStatement" id="<?=$statement->id;?>" title="Delete"><i class="fa fa-remove"></i></a>
                    
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
   
   <div class="modal fade" id="deleteStatement" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
			  <button type="button" class="btn btn-primary deleteStatement" data-dismiss="modal" id="" type="submit">Confirm</button>
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

   

$(document).on('click','.statementDelete',function(){
  var catname= $(this).parents('tr').children('td:nth-child(3)').text();
  var id= $(this).attr('id');
  $('.blogname').text(catname);
  $('.deleteStatement').attr('id',id);
});

$('.deleteStatement').click(function(){
	var id= $(this).attr('id');
	var token= '{{ csrf_token() }}';
			
			$.post('{{ URL :: to('statementDelete')}}',{id:id,_token:token},function(data){

			$('#row'+id).addClass('row_selected');

			setTimeout(function(){			
			$('#row'+id).removeClass('row_selected');
			$('#row'+id).remove();
			},2000);
			});
});
</script>
@stop
