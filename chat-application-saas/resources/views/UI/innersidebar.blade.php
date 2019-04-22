	<div class="col-md-4 col-sm-4">	
	<div class="view-content">

	<div class="page-sidebar" id="main-menu">

		<div class="page-sidebar-wrapper scrollbar-dynamic m-t-20" id="main-menu-wrapper">
		<ul class="innerpage_sidebar">
		{{--*/ $root = App\Categories::parentnavigation(); $i=1; $uri = Request::path(); /*--}}
		
	  			@foreach($root as $root) 
					@if($root['slug']=='home')
					@else
					<li class=""><a href="javascript:;" class="@if($uri==$root['slug']) active @endif"><span class="title"> {{$root['name']}}</span></a>
						{{--*/  $child = App\Categories::childnavigation($root['id'])	/*--}} 
						@if($child!='No child')
						<ul class="sub-menu">				
							@foreach($child as $child) 
							<li ><a href="{{$child['slug']}}" class="@if($uri==$child['slug']) active @endif"><span class="title">{{$child['name']}}</span></a></li>
							@endforeach
							</ul>
						@endif
					</li>
					@endif
					{{--*/ $i++; /*--}}
				@endforeach
		  </ul>
		</div>
    </div>


	</div>
	</div>
