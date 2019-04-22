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
          {!! HTML::link('/admin/blog/managecat', 'Manage Blogs Category', array('id' => '')) !!}
        </li>
        <li><a class="active" href="javascript:;">Blog Category Information</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Category Info</h3>
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
         <div class="col-md-12 grid">
      <div class="panel">
        <div class="panel-heading"> <span class="panel-title"> <i class="fa  fa-file-text-o"></i> View Post</span>
          <div class="panel-header-menu pull-right mr10">
            <label class="checkbox-inline mr10">
			<a class="btn btn-info btn-gradient btn-sm reload" data-style="expand-left" href="{{URL :: to('admin/blogcat/edit') }}/<?=$blogcatId;?>"><i class="fa fa-pencil"></i> <span class="ladda-label">Edit</span></a>            
            </label>
               </div>
        </div>
        <div class="panel-body">
		
       <table style="clear: both" class="table table-bordered table-striped" id="user">
            <tbody>
              <tr>
                <td style="width: 30%;">Blog Category:</td>
                <td style="width: 70%;"><?=$blogcatData[0]->name;?></td>
              </tr>
              <tr>
                <td>Slug:</td>
                <td><?=$blogcatData[0]->slug;?></td>
              </tr>
              <tr>
                <td>Description:</td>
                <td><?=$blogcatData[0]->intro;?></td>
              </tr>
                     <tr>
                <td>Status:</td>
                <td><?php echo($blogcatData[0]->active == 1)? 'Enable' : 'Disable'; ?></td>
              </tr>
             
              <tr>
                <td>Created</td>
                <td><?=$blogcatData[0]->created;?></td>
              </tr>
              <tr>
                <td>Modified</td>
                <td><?=$blogcatData[0]->modified;?></td>
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
