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
				<h2 class="popup-title text-center">Registration</h2>
				<div class="form-common form-user mt-30">
					  @if ($errors->any())
				          <div class="alert alert-danger">
				              <ul>
				                  @foreach ($errors->all() as $error)
				                      <li>{{ $error }}</li>
				                  @endforeach
				              </ul>
				          </div><br />
				      @endif
					{!! Form::open(array('url' => 'users/register','id'=>'userRegister','class'=>'form-no-horizontal-spacing','files'=>'true')) !!}
						<div class="form-group">
							<div class="row">
								<div class="col-6">
									{{ Form::label('First Name *')}}
									{!! Form::text('first_name','', ['class'=>'form-control','id'=>'first_name','value'=>'']) !!}
								</div>
								<div class="col-6">
									{{ Form::label('Last Name *')}}
									{!! Form::text('last_name','', ['class'=>'form-control','id'=>'last_name','value'=>'']) !!}
								</div>
							</div>
						</div>
						<div class="form-group">
							{{ Form::label('Mobile *')}}
							{!! Form::text('mobile','', ['class'=>'form-control number','id'=>'mobile','value'=>'']) !!}
						</div>
						<div class="form-group">
							{{ Form::label('Email Address *')}}
							{!! Form::text('email','', ['class'=>'form-control','id'=>'email','value'=>'']) !!}
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-6">
									<label>Password *</label>
									<input type="password" class="form-control" id="password" name="password">
								</div>
								<div class="col-6">
									<label>Confirm Password *</label>
									<input type="password" class="form-control" name="confirmPassword">
								</div>
							</div>
						</div>
						<div class="form-user-footer text-center">
							<h4>Company Details</h4>
						</div>
						<div class="form-group">
							{{ Form::label('Company Name *')}}
							{!! Form::text('company_name','', ['class'=>'form-control','id'=>'cName','value'=>'']) !!}
						</div>
						<div class="form-group">
							{{ Form::label('Company Email *')}}
							{!! Form::text('company_email','', ['class'=>'form-control','id'=>'cEmail','value'=>'']) !!}
						</div>
						<div class="form-group">
							{{ Form::label('Company Mobile *')}}
							{!! Form::text('company_mobile','', ['class'=>'form-control number','id'=>'cMobile','value'=>'']) !!}
						</div>
						<div class="form-group text-center">
							<button class="btn btn-primary btn-sm-cs" type="submit">Sign Up</button>
						</div>
					{!! Form::close() !!}

				</div>
				<div class="form-user-footer text-center">
					<h4>Already have a account ? <a href="{{ URL::to('/login')}}" class="color-theme"><i>Login</i></a></h4>
				</div>
			</div>
</div>

@endsection


@section('moreJS')
{!! HTML::script('js/loginRegValidation.js') !!}
{!! HTML::script('js/common.js') !!}
<script type="text/javascript">
	onlyNumber('number');
</script>
@stop
