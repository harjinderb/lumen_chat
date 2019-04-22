<div role="navigation" class="navbar navbar-default navbar-static-top">
  <div class="container">
    <div class="compressed">
     <div class="navbar-header col-md-12 text-center">
	 <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" id="resp-menu2"  type="button">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
<a href="{{URL::to('/')}}" class="navbar-brand col-md-12"><img src="{{URL :: to('assets/img/logo.png') }}" data-src="{{URL :: to('assets/img/logo.png') }}" data-src-retina="{{URL :: to('assets/img/logo.png') }}" width="119" height="22" alt=""/></a>		 
</div>   
        <div class="top-profile">
			<ul class="nav navbar-nav navbar-right loginul" >
					
					@if (Auth::guest())
					<li >{!! HTML::link('auth/login', 'Login', array('id' => '')) !!}</li>
					<li >{!! HTML::link('user/register', 'Register') !!} </li>
					@else
						<li class="dropdown">
							
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}
							<div class="user-details">
							<div class="username"> {{ Auth::user()->FirstName }} <span class="bold">{{ Auth::user()->LastName }}</span> </div>
						  </div>
							 <span class="caret"></span></a>
							
							<ul aria-labelledby="user-options" role="menu" class="dropdown-menu  pull-right">
							<li >{!! HTML::link('/logout', 'Logout', array('id' => '')) !!}</li>
							</ul>
							
						</li>
					
					@endif

</ul>
</div><!--/.nav-collapse -->

        <ul class="menu menu2 nav navbar-nav navbar-right">
	  {{--*/ $root = App\Categories::parentnavigation() /*--}}
				<li ><a href="@if (Auth::guest()){{URL::to('/')}}@else{{URL::to('/frontend')}}@endif">Home</a></li>
	  			@foreach($root as $root) 
				@if($root['slug']=='home')
				@else
				<li ><a href="{{$root['slug']}}">{{$root['name']}}</a>
					{{--*/  $child = App\Categories::childnavigation($root['id'])	/*--}} 
					@if($child!='No child')
					<ul class="sub-menu">				
					@foreach($child as $child) 
					<li ><a href="{{$child['slug']}}">{{$child['name']}}</a>
						 {{--*/  $child1 = App\Categories::childnavigation($child['id'])	/*--}} 
						@if($child1!='No child')
						<ul>				
						 @foreach($child1 as $child1) 
						 <li ><a href="{{$child1['slug']}}">{{$child1['name']}}</a>
							{{--*/  $child2 = App\Categories::childnavigation($child1['id'])	/*--}} 
							@if($child2!='No child')
							<ul>				
							@foreach($child2 as $child2) 
							<li ><a href="{{$child2['slug']}}">{{$child2['name']}}</a>
							</li>
							@endforeach
							</ul>
							@endif
						 </li>
						 @endforeach
						</ul>
						@endif
					</li>
					@endforeach
					</ul>
					@endif
				</li>
				@endif
				@endforeach
				<li><a href="/contact_eps">Contact</a></li>
  </ul>

      <!--/.nav-collapse -->
    </div>
  </div>
</div>
