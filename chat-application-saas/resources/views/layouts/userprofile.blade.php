<!DOCTYPE html>
<html class="no-js lang-en country-US locale-en-US " lang="en">
<head>
    @include('layouts.homehead')
     @yield('extrastyle')
</head>

<body class="home-page hero-image-split">
	<div class="main-wrapper">
		@include('layouts.profileheader')

		@yield('content')

		@include('layouts.homefooter')
	</div>
 @include('layouts.homefoot')
 
 @yield('moreJS')

</body>
</html>
