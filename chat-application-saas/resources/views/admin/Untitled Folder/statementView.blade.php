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
          {!! HTML::link('/admin/blog/managecat', 'Manage Statement Analysis', array('id' => '')) !!}
        </li>
        <li><a class="active" href="javascript:;">Statement Analysis Information</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Statement Info</h3>
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
         <div class="col-md-12 grid">
      <div class="panel">
        <div class="panel-heading"> <span class="panel-title"> <i class="fa  fa-file-text-o"></i> View Post</span>
         
        </div>
        <div class="panel-body">
		
       <table style="clear: both" class="table table-bordered table-striped" id="user">
            <tbody>
              <tr>
                <td style="width: 30%;">Name:</td>
                <td style="width: 70%;"><?=$statementData[0]->name;?></td>
              </tr>
              <tr>
                <td>Business Name:</td>
                <td><?=$statementData[0]->business;?></td>
              </tr>
              <tr>
                <td>Email:</td>
                <td><?=$statementData[0]->email;?></td>
              </tr>
              <tr>
                <td>Phone:</td>
                <td><?=$statementData[0]->phone;?></td>
              </tr>
              <tr>
                <td>Current Rate</td>
                <td><?=$statementData[0]->current_rate;?></td>
              </tr>
              <tr>
                <td>State</td>
                <td><?=$statementData[0]->state;?></td>
              </tr>
              <tr>
                <td>City</td>
                <td><?=$statementData[0]->city;?></td>
              </tr>
              <tr>
                <td>Hear About</td>
                <td><?=$statementData[0]->hear_about;?></td>
              </tr>
              <tr>
                <td>Hear About Other</td>
                <td><?=$statementData[0]->hear_about_other;?></td>
              </tr><tr>
                <td>Modified</td>
                <td><?=$statementData[0]->modified;?></td>
              </tr>
             

              
            </tbody>
          </table> </div>
      </div>
    
       
    </div>  </div>
      </div>
   </div>
		  </div>
@endsection

@section('moreJS')

@stop
