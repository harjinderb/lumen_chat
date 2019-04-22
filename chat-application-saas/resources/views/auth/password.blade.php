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
				<h2 class="popup-title text-center">Forgot Password </h2>
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
					{!! Form::open(array('url'=> 'users/forgot','id'=>'forgot-form','class'=>'forgot-form')) !!}
						<div class="form-group">
							{{ Form::label('Email Address *')}}
							{!! Form::text('email','', ['class'=>'form-control','id'=>'email','value'=>'']) !!}
						</div>
						<div class="form-group text-center">
							<button class="btn btn-primary btn-cons pull-right SignIn" type="submit">Send Password Reset Link</button>
						</div>
					{!! Form::close() !!}

				</div>
				<div class="form-user-footer text-center">
					<h4>Go to <a href="{{ URL::to('/login')}}" class="color-theme"><i>Login</i></a> page.</h4>
				</div>
			</div>
		</div>

  </div>

@endsection

@section('moreJS')
{!! HTML::script('js/loginRegValidation.js') !!}

@stop
