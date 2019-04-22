<!DOCTYPE html>
<html lang="en">
@include('layouts.adminHead')
<body class="">
	<div class="wrapper ">
	   		@include('layouts.adminSidebar')
	    <div class="main-panel">
	    		@include('layouts.adminHeader')
	      	<div class="content">
				@yield('content')
	      	</div>
	      @include('layouts.adminFooter')
	    </div>
	</div>
      @include('layouts.adminFoot')
</body>
</html>
