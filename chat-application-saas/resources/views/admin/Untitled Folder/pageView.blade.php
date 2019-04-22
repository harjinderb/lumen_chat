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
        <li><a class="active" href="javascript:;">CMS Page Information</a></li>
      </ul>
		<div class="page-title">
		<i class="icon-custom-left"></i>
		<h3>Page Info</h3>
		</div>
	   <!-- BEGIN DASHBOARD TILES -->
   <div class="row-fluid">
        <div class="span12">
         <div class="col-md-12 grid">
      <div class="panel">
        <div class="panel-heading"> <span class="panel-title"> <i class="fa  fa-file-text-o"></i> View Page</span>
          <div class="panel-header-menu pull-right mr10">
            <label class="checkbox-inline mr10">
			<a class="btn btn-info btn-gradient btn-sm reload" data-style="expand-left" href="{{URL :: to('admin/cms-pages/edit') }}/<?=$pageId;?>"><i class="fa fa-pencil"></i> <span class="ladda-label">Edit</span></a>            
            </label>
               </div>
        </div>
        <div class="panel-body">
		
       <table style="clear: both" class="table table-bordered table-striped" id="user">
            <tbody>
              <tr>
                <td style="width: 30%;">Category:</td>
                <td style="width: 70%;"><?=$pageData[0]->category_name;?></td>
              </tr>
              <tr>
                <td>Title:</td>
                <td><?=$pageData[0]->title;?></td>
              </tr>
              <tr>
                <td>Heading:</td>
                <td><?=$pageData[0]->heading;?></td>
              </tr>
              <tr>
                <td>Short Content:</td>
                <td><?=$pageData[0]->short_content;?></td>
              </tr>
              <tr>
                <td>Content:</td>
                <td><div class="view_cintent"><?=$pageData[0]->content;?></div>
				</td>
              </tr>
              <tr>
                <td>Status:</td>
                <td><?php echo($pageData[0]->status == 1)? 'Enable' : 'Disable'; ?></td>
              </tr>
              <tr>
                <td>Meta Title:</td>
                <td><?=$pageData[0]->meta_title;?></td>
              </tr>
              <tr>
                <td>Meta Keywords:</td>
                <td><?=$pageData[0]->keywords;?></td>
              </tr>
              <tr>
                <td>Meta Description:</td>
                <td><?=$pageData[0]->meta_description;?></td>
              </tr>
              <tr>
                <td>Featured Image</td>
                <td>@if($pageData[0]->featuredImage !='')<img src="{{ URL :: to('/media/CMSPages') }}/<?=$pageData[0]->featuredImage.'380x215.'.$pageData[0]->ext;?>" class="cmsbanner">@else 
                No featured image
                @endif</td>
              </tr>
              <tr>
                <td>Created</td>
                <td><?=$pageData[0]->created;?></td>
              </tr>
              <tr>
                <td>Modified</td>
                <td><?=$pageData[0]->modified;?></td>
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
