@extends('layouts.admin')
@section('title')
{{$page_title}}
@stop
@section('content')
@php
$prifix = \Request::route()->getPrefix();
@endphp
<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      @if(Session::has('message'))
      <div class="alert {{ Session::get('alert-class') }}">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <i class="material-icons">close</i>
        </button>
        {{ Session::get('message') }}
      </div>
      </br>
      @endif
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit Profile</h4>
          <p class="card-category">Complete your profile</p>
        </div>
        <div class="card-body">
          @if ($errors->any())
          <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div><br />
          @endif
          <br>
          {!! Form::open(array('url'=> $prifix.'/profileEdit','id'=>'userUpdate','class'=>'userUpdate-form','files' => true)) !!}
          {!! Form::hidden('id',$userData->_id) !!}
          <input type="hidden" id="UserPhoto" value="<?=$userData->image;?>" name="image">
          <input type="file" id="member_photo_upload" name="avtar" accept="image/*" class="upload profileEdit" style="display:none;" capture/>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating" for="First Name *">Fist Name *</label>
                {!! Form::text('first_name',$userData->first_name, ['class'=>'form-control','id'=>'first_name']) !!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating" for="Last Name *">Last Name *</label>
                {!! Form::text('last_name',$userData->last_name, ['class'=>'form-control','id'=>'last_name']) !!}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating" for="Email Address *">Email Address *</label>
                {!! Form::text('email',$userData->email, ['class'=>'form-control','id'=>'email']) !!}
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating" for="Mobile *">Mobile *</label>
                {!! Form::text('mobile',$userData->mobile, ['class'=>'form-control number','id'=>'mobile']) !!}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating" for="Adress *">Adress *</label>
                {!! Form::text('address',$userData->address, ['class'=>'form-control','id'=>'address']) !!}
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label>About Me *</label>
                <div class="form-group">
                  <label class="bmd-label-floating" for="About Me *"> Write about yourself...</label>
                  {!! Form::textarea('about_me',$userData->about_me, ['class'=>'form-control','id'=>'about_me','rows'=>'2']) !!}
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4 class="card-title">Change Password</h4>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating" for="Password">Password </label>
                <input type="password" class="form-control" id="password" name="password">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label class="bmd-label-floating" for="Confirm Password">Confirm Password</label>
                <input type="password" class="form-control" name="confirmPassword">
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary pull-right updateProfile">Update Profile</button>
          <div class="clearfix"></div>
          {!! Form::close() !!}
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card card-profile">
        <div class="card-avatar">
          <a href="javascript:void(0)" id="imageUpload" style="display:none; position: absolute;">
            <i class="material-icons">photo_camera</i>
          </a>
          @if($userData->image != '')
            	$extension_pos = strrpos($userData->image, '.');
            	$thumb = substr($userData->image, 0, $extension_pos) . '-200x200' . substr($userData->image, $extension_pos);

              <img class="img profileImg" src="<?php echo $thumb; ?>" />
          @else
            <img class="img profileImg" src="{{URL :: to('/images/avatar.png') }}" />
          @endif
        </div>
        <div class="card-body">
          <h4 class="card-title"><?=ucwords($userData->first_name . ' ' . $userData->last_name);?></h4>
          <h6 class="card-category text-gray">
          @if(Auth::user()->role == 'admin')
          Super Admin
          @elseif(Auth::user()->role == 'owner')
          CEO / Co-Founder
          @endif
          </h6>
          <h7 class="card-category text-gray">Profile <?php echo ($userData->status == 1) ? '<b class="text-success">Active</b>' : '<b class="text-danger">Deactivate</b>'; ?></h7>
          <p class="card-description">{{$userData->about_me}}</p>
          @if(Auth::user()->role == 'owner')
          <h4 class="card-category text-orange">Number of Companies :- <a href="{{URL :: to('owner/companies') }}"><span class="text-white badge badge-info card-title"><?=count($userData->companies);?></span></a></h4>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('moreJS')
{!! HTML::script('js/form_validations.js') !!}
{!! HTML::script('js/common.js') !!}
<script type="text/javascript">
  $("#imageUpload").click(function () {
    $("#member_photo_upload").trigger('click');
  });

  jQuery(document).ready(function(){
    jQuery('.profileImg, #imageUpload').mouseenter(function(){
     jQuery('#imageUpload').show();
    }).mouseout(function(){
      jQuery('#imageUpload').hide();
    });
  });

  function readURL(input) {
    var imageFiles;
    imageFiles = document.getElementById('member_photo_upload').files
    for(i=0; i<=imageFiles.length;i++){
      if (input.files && input.files[i]) {
        var reader = new FileReader();
        reader.onload = function (e) {
         jQuery('img.profileImg').attr('src',e.target.result);
        }
        reader.readAsDataURL(input.files[i]);
      }
    }
  }

  jQuery('#member_photo_upload').change(function(){
    readURL(this);
  });

  onlyNumber('number');
</script>
@stop