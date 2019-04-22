<header class="header">
	<div class="container">
		<div class="site-nav">
			<nav class="navbar navbar-expand-lg">
		      <a class="navbar-brand" href="{{URL :: to('/') }}"><i class="far fa-comments"></i> Chat Server</a>
		      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
		        <span class="navbar-toggler-icon"></span>
		      </button>

		      <div class="collapse navbar-collapse" id="navbarsExample05">
		        <ul class="navbar-nav ml-auto">
		          <li class="nav-item active">
		            <a class="nav-link" href="{{URL :: to('/') }}">Home <span class="sr-only">(current)</span></a>
		          </li>
		          <li class="nav-item">
		            <a class="nav-link" href="{{URL :: to('/pricing') }}">Pricing</a>
		          </li>
				  <li class="nav-item">
		            <a class="nav-link" href="{{URL :: to('/features') }}">Features</a>
		          </li>
		          @if (Auth::guest())
					 <li class="nav-item">
			            <a class="nav-link" href="{{URL :: to('/login') }}">Login</a>
			          </li>
					  <li class="nav-item">
			            <a class="nav-link btn btn-primary " href="{{URL :: to('/register') }}">Company Register</a>
			          </li>
					@else
						<li class="nav-item">
							@if(Auth::user()->role == 'admin')
				            <a class="nav-link" href="{{URL :: to('/admin/dashboard') }}">Dashboard</a>
				            @elseif(Auth::user()->role == 'owner')
				             <a class="nav-link" href="{{URL :: to('/owner/dashboard') }}">Dashboard</a>
				            @endif
				        </li>
						<li class="nav-item">
				            <a class="nav-link" href="{{URL :: to('/logout') }}">Logout</a>
				        </li>
					@endif


		        </ul>

		      </div>
		    </nav>
		</div>

	</div>
</header>