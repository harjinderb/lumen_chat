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
				<h2 class="popup-title text-center">Reset Password</h2>
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


					{!! Form::open(array('url'=> 'users/resetpassword','id'=>'resetpassword-form','class'=>'resetpassword-form')) !!}
						<input type="hidden" name="token" value="{{ $token }}">

						<div class="form-group">
							<label class="control-label">Password *</label>
							<input type="password" class="form-control" id="password" name="password">
						</div>

						<div class="form-group">
							<label class="control-label">Confirm Password *</label>
							<input type="password" class="form-control" name="confirmPassword">
						</div>

						<div class="form-group text-center">
								<button type="submit" class="btn btn-primary">
									Reset Password
								</button>
						</div>
					{!! Form::close() !!}
				</div>
				<div class="form-user-footer text-center">
					<h4>Go to <a href="{{ URL::to('/login')}}" class="color-theme"><i>Login</i></a> page.</h4>
				</div>
			</div>
</div>

@endsection


@section('moreJS')
{!! HTML::script('js/loginRegValidation.js') !!}
@stop


