<header id="overview">
	<nav class="banner" role="navigation">

<div class="content">
<div class="col-md-12">
<a href="{{URL::to('/')}}" class="logo pull-left"><img src="{{URL :: to('assets/img/logo.png') }}" data-src="{{URL :: to('assets/img/logo.png') }}" data-src-retina="{{URL :: to('assets/img/logo.png') }}" style="height: auto; width: 160px ! important;" alt=""/></a>
{{--*/ $root = App\Categories::parentnavigation() /*--}}
@foreach($root as $root) 
@if($root['slug']=='home')
@else
<a class="drawer-link pull-left show-at-small" data-drawer="{{$root['slug']}}" data-link-action="Business Types Drawer" data-link-label="Banner" href="#">{{$root['name']}}</a>	
@endif
@endforeach		




@if (Auth::guest())
{!! HTML::link('user/register', 'Register', array('class' => 'pull-right gap-right-line-height')) !!} 
{!! HTML::link('auth/login', 'Login', array('class' => 'pull-right gap-right-line-height')) !!}
@else
{!! HTML::link('/logout', 'Logout', array('class' => 'pull-right gap-right-line-height')) !!}
{!! HTML::link('dashboard', 'Account', array('class' => 'pull-right gap-right-line-height')) !!}
@endif
{!! HTML::link('contact_eps', 'Contact', array('class' => 'pull-right gap-right-line-height')) !!}
</div>
</div>

<div class="image">
</div>
</nav>
</header>
<nav class="nav-drawer">
 {{--*/ $root = App\Categories::parentnavigation() /*--}}
						@foreach($root as $root) 
						@if($root['slug']=='home')
						@else
						<div class="drawer" id="{{$root['slug']}}">
						<nav class="content pad-vert-small inverted">
							{{--*/  $child = App\Categories::childnavigation($root['id'])	/*--}} 
							@if($child!='No child')
							<div class="group one-half-at-medium gap-bottom-line-height gap-bottom-none-at-medium">
							<ul class="reset one-half-at-large">			
							@foreach($child as $child) 
							<li class="reader contactless">
							<a data-link-action="{{$child['name']}}" data-link-label="Verticals Nav" href="{{$child['slug']}}"><span>{{$child['name']}}</span></a>
							</li>
							@endforeach
							</ul>
							</div>
							@endif
						</nav>
						</div>

						@endif
						@endforeach
</nav>

<div class="main-content" role="main">
<section class="hero" id="hero-section">
<div class="image">
</div>
</section>

