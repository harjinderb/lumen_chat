@extends('auth')

@section('title') {{$page_title}} @stop


@section('content')
<div class="account-page-wrap">
			<div class="account-page">
				<div class="account-log-logo">
					<a href="{{ URL::to('/')}}"><i class="far fa-comments"></i> Chat Server</a>
				</div>
				@if(Session::has('message'))
				<div class="alert {{ Session::get('alert-class') }}"><button data-dismiss="alert" class="close"></button>
					{{ Session::get('message') }}
					</div>
					</br>
				@endif
				<h2 class="popup-title text-center">Log in </h2>
				<div class="form-common form-user mt-30">
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
					{!! Form::open(array('url'=> 'users/login','id'=>'login-form','class'=>'login-form')) !!}
						<div class="form-group">
							{{ Form::label('Email Address *')}}
							{!! Form::text('email','', ['class'=>'form-control','id'=>'username','value'=>'']) !!}
						</div>
						<div class="form-group">
							{{ Form::label('Password *')}}
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-6">
									<input id="md_checkbox_34" class="filled-in chk-col-amber rememberMe" type="checkbox">
									<label for="md_checkbox_34">Remember Me</label>
								</div>
								<div class="col-6 text-right">
									<a href="{{ URL::to('/forgot')}}">Forgot Password?</a>
								</div>
							</div>
						</div>
						<div class="form-group text-center">
							<button class="btn btn-primary btn-cons pull-right SignIn" type="submit">Login</button>
						</div>
					{!! Form::close() !!}

				</div>
				<div class="form-user-footer text-center">
					<h4>Don't have a account yet? <a href="{{ URL::to('/register')}}" class="color-theme"><i>Register</i></a></h4>
				</div>
			</div>
		</div>

  </div>

@endsection

@section('moreJS')
{!! HTML::script('js/loginRegValidation.js') !!}

<script>

		if (localStorage.chkbx && localStorage.chkbx != '' && (localStorage.usrname!=undefined || localStorage.usrname!='undefined')) {
		jQuery('.rememberMe').attr('checked', 'checked');

		jQuery('#username').val(localStorage.usrname);
		jQuery('#password').val(localStorage.pass);

		} else {
		jQuery('.rememberMe').removeAttr('checked');
		jQuery('#username').val('');
		jQuery('#password').val('');
		}

		$('.rememberMe').click(function() {

		if (jQuery('.rememberMe').is(':checked')) {
			// save username and password
			localStorage.usrname = jQuery('#username').val();
			localStorage.pass = jQuery('#password').val();
			localStorage.chkbx = jQuery('.rememberMe').val();
		} else {
			localStorage.usrname = '';
			localStorage.pass = '';
			localStorage.chkbx = '';
		}
		});

		$('.SignIn').click(function() {
		var newUser=  jQuery('#username').val();
		var newPass = jQuery('#password').val();
		if (jQuery('.rememberMe').is(':checked') && localStorage.usrname != newUser){

			localStorage.usrname = newUser;
			localStorage.pass = newPass;
			localStorage.chkbx = jQuery('.rememberMe').val();
		} else {
			localStorage.usrname = localStorage.usrname;
			localStorage.pass = localStorage.pass;
			localStorage.chkbx = localStorage.chkbx;
		}
		});

        </script>

@stop

