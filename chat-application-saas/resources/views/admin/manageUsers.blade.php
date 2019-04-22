@extends('layouts.admin')
@section('title')
{{$page_title}}
@stop
@section('moreHead')
@stop
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-primary">
					<h4 class="card-title ">All Users</h4>
					<p class="card-category"></p>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<br>
						<table class="table table-hover table-condensed" id="example">
							<thead>
								<tr>
									<th style="width:9%">Name</th>
									<th style="width:10%" data-hide="phone,tablet">Email</th>
									<th style="width:5%" data-hide="phone,tablet">Mobile</th>
									<th style="width:10%" data-hide="phone,tablet">Last Login</th>
									<th style="width:5%" data-hide="phone,tablet">Status</th>
									<th style="width:10%">Action</th>
								</tr>
							</thead>
							<tbody>
								@forelse($allUsers as $key => $users)
								<tr id="row<?=$users['_id'];?>">
									<td class="v-align-middle"> {{$users['first_name'] . ' ' . $users['last_name']}}</td>
									<td><span class="muted"> {{$users['email']}}</span></td>
									<td><span class="muted"> {{$users['mobile']}}</span></td>
									<td><span class="muted">
										@if($users['updated_at'] == '0000-00-00 00:00:00')
											{{'Not login yet'}}
										@else
											{{ date_format(new DateTime($users['updated_at']), "Y/m/d H:i a") }}
										@endif
									</span></td>
									<td class="v-align-middle status">
										@if ($users['status'] == 1)
										<span class="text-success"> Active</span>
										@else
										<span class="text-danger">Deactivated</span>
										@endif
									</td>
									<td class="v-align-middle">
										<div data-toggle="buttons-radio" class="btn-group">
											<button class="btn btn-info btn-gradient reload showUserData" id="{{$users['_id']}}" data-toggle="modal" data-target="#userData">
											<i class="fa fa-eye"></i> <div class="ripple-container"></div>
											</button>
											@if ($users['status'] == 1)
											<button class="btn btn-success btn-gradient changeStatus reload" id="{{$users['_id']}}" rel="0" type="button" title="Disable"><i class="fa fa-ban"></i> </button>
											@else
											<button class="btn btn-default btn-gradient changeStatus reload" id="{{$users['_id']}}" rel="1" type="button" title="Enable"><i class="fa fa-check"></i> </button>
											@endif
										</div>
									</td>
								</tr>
								@empty
								<tr>
									<td rowspan="5">
										No record found!
									</td>
								</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<!-- --------------------Model ------------>
			<div class="modal fade" id="userData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog modal-notice" style="max-width:1200px; width: 100%">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="myModalLabel">Complate Information of Owner</h5>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
							<i class="material-icons">close</i>
							</button>
						</div>
						<div class="modal-body">
							<div class="instruction" id="userProfileData">
								<div class="row">
									<div class="col-md-8">
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Fist Name</label>
													<div class="fname"></div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<div class="lname"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Email Address</label>
													<div class="email"></div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Mobile </label>
													<div class="mobile"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Adress</label>
													<div class="address"></div>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>About Me</label>
													<div class="about"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-md-4">
										<div class="picture">
											<img src="{{URL :: to('/images/avatar.png') }}" alt="User Image" class="rounded img-fluid">
										</div><br>
										<p class="description text-gray">Created-at : <a href="javascript:void(0)" class="created"></a></p>
										<p class="description text-gray">Last Login : <a href="javascript:void(0)" class="lastlogin"></a></p>
									</div>
								</div>
							</div>
							<hr>
							<strong>All Comapanies</strong>
							<div class="instruction" id="userCompanyData">
								<div class="row">
									<div class="col-md-12">
										<br/>
										<table class="table table-hover table-condensed" id="comapanies">
											<thead>
												<tr>
													<td>Name</td>
													<td>Email</td>
													<td>Mobile</td>
												</tr>
											</thead>
											<tbody>

											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<div class="modal-footer justify-content-center">
							<button type="button" class="btn btn-info btn-round" data-dismiss="modal">Close<div class="ripple-container"><div class="ripple-decorator ripple-on ripple-out" style="left: 72px; top: 24.5px; background-color: rgb(255, 255, 255); transform: scale(14.625);"></div></div></button>
						</div>
					</div>
				</div>
			</div>
			<!-- --------------------Model end------------>
		</div>
	</div>
</div>
@endsection
@section('moreJS')
<script>
$(document).on('click','button.showUserData',function(){
	var id= $(this).attr('id');
	var token= '{{ csrf_token() }}';
	$.post('{{ URL :: to('admin/user-complete-data')}}',{id:id,_token:token},function(data){
		var userProfile = data.userData;
		var userComapnies = data.userAnotgerData;
		if(userProfile !== undefined && userProfile !=''){
			$('#userProfileData .fname').html(isValid(userProfile.first_name));
			$('#userProfileData .lname').html(isValid(userProfile.last_name));
			$('#userProfileData .email').html(isValid(userProfile.email));
			$('#userProfileData .mobile').html(isValid(userProfile.mobile));
			$('#userProfileData .address').html(isValid(userProfile.address));
			$('#userProfileData .about').html(isValid(userProfile.about_me));
			$('#userProfileData .created').html(isValid(userProfile.created_at));
			$('#userProfileData .lastlogin').html(isValid(userProfile.updated_at));
			if(isValid(userProfile.image)!='NA'){
				$('#userProfileData .picture img').attr('src',userProfile.image);
			}else{
				var defaultImage = '{{URL :: to('/images/avatar.png') }}';
				$('#userProfileData .picture img').attr('src',defaultImage);
			}
		}else{
			$('#userProfileData').html('<h5>Record not found.</h5>');
		}
		if(userComapnies !== undefined && userComapnies !=''){
			var companiesData = '<tr>';
			$.each( userComapnies, function( key, value ) {
			  companiesData += '<td>'+value.name+'</td>';
			  companiesData += '<td>'+value.email+'</td>';
			  companiesData += '<td>'+value.mobile+'</td>';
			});
			companiesData += '</tr>';
			$('#userCompanyData #comapanies tbody').html(companiesData);
		}else{
			$('#userCompanyData').html('<h5>Record not found.</h5>');
		}
	});
});
function isValid(data){
	if(data === undefined || data == ''){
		return 'NA';
	}else{
		return data;
	}
}
$(document).on('click','button.changeStatus',function(){
	var id= $(this).attr('id');
	var status= $(this).attr('rel');
	var token= '{{ csrf_token() }}';
	$.post('{{ URL :: to('admin/change-user-status')}}',{id:id,status:status,_token:token},function(data){
			if(status==0){
				$('#row'+id+' td div button.changeStatus').html('<i class="fa fa-check"></i>');
				$('#row'+id+' td div button.changeStatus').removeClass('btn-success').addClass('btn-default');
				$('#row'+id+' td div button.changeStatus').attr('rel', '1');
				$('#row'+id+' td.status').html('<span class="text-danger">Deactivated</span>');
			}else if(status==1){
				$('#row'+id+' td div button.changeStatus').html('<i class="fa fa-ban"></i>');
				$('#row'+id+' td div button.changeStatus').removeClass('btn-default').addClass('btn-success');
				$('#row'+id+' td div button.changeStatus').attr('rel', '0');
				$('#row'+id+' td.status').html('<span class="text-success"> Active</span>');
			}
			$('#row'+id).addClass('row_selected');
			setTimeout(function(){
			$('#row'+id).removeClass('row_selected','slow');
			},2000);
	});
});
</script>
@stop