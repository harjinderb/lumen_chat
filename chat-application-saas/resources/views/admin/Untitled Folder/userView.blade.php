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
        <li><a class="active" href="javascript:;">User Information</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>User Info</h3>
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
         <div class="col-md-12 grid">
      <div class="panel">
        <div class="panel-heading"> <span class="panel-title"> <i class="fa  fa-file-text-o"></i> User Profile</span>
          <div class="panel-header-menu pull-right mr10">
            <label class="checkbox-inline mr10">
			<a class="btn btn-info btn-gradient btn-sm reload" data-style="expand-left" href="{{URL :: to('admin/users/edit') }}/<?=$userId;?>"><i class="fa fa-pencil"></i> <span class="ladda-label">Edit</span></a>            
            </label>
               </div>
        </div>
        <div class="panel-body">
		
          <table style="clear: both" class="table table-bordered table-striped" id="user">
            <tbody>
              <tr>
                <td style="width: 30%;">First Name</td>
                <td style="width: 70%;"><?=$userData[0]->FirstName; ?></td>
              </tr>
              <tr>
                <td>Last Name</td>
                <td><?=$userData[0]->LastName; ?></td>
              </tr>
              <tr>
                <td>User Name</td>
                <td><?=$userData[0]->username; ?></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><?=$userData[0]->email; ?></td>
              </tr>
              
              <tr>
                <td>Mobile</td>
                <td><?=$userData[0]->Mobile; ?> </td>
              </tr>
              <tr>
                <td>Gender</td>
                <td><?=$userData[0]->Gender; ?> </td>
              </tr>
              <tr>
                <td>Birthday</td>
                <td><?=$userData[0]->DateOfBirth; ?> </td>
              </tr>
              <tr>
                <td>Address</td>
                <td><?=$userData[0]->Address; ?> </td>
              </tr>
              <tr>
                <td>City</td>
                <td><?=$userData[0]->City; ?> </td>
              </tr>
              <tr>
                <td>State</td>
                <td><?=$userData[0]->State; ?> </td>
              </tr>
              <tr>
                <td>Country</td>
                <td><?=$userData[0]->Country; ?> </td>
              </tr>
              <tr>
                <td>Zip</td>
                <td><?=$userData[0]->PostalCode; ?> </td>
              </tr>
              <tr>
                <td>Ip</td>
                <td><?=$userData[0]->UserIP; ?> </td>
              </tr>
              <tr>
                <td>Status</td>
                <td><?php echo($userData[0]->active == 1)? 'Enable' : 'Disable'; ?> </td>
              </tr>
              <tr>
                <td>Photo</td>
                <td><img src="{{ URL :: to('/dp') }}/<?=$userData[0]->image.'.'.$userData[0]->ext;?>" class="cat_icon"> </td>
              </tr>
              <tr>
                <td>Occupation</td>
                 <td><?=$userData[0]->Occupation; ?></td>
              </tr>
              <tr>
                <td>Created</td>
                <td><?=$userData[0]->Created; ?></td>
              </tr>
              
              
            </tbody>
          </table>
        </div>
      </div>
    
       
    </div>  </div>
      </div>
   </div>
		  </div>
@endsection

@section('moreJS')

@stop
