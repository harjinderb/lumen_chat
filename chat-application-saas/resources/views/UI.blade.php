<!doctype html>
<html>
<head>
    @include('layouts.uihead')
</head>
<body>
<div class="main-wrapper">
		@include('layouts.uiheader')

		@yield('content')

		@include('layouts.uifooter')

</div>
 @include('layouts.uifoot')

 @yield('moreJS')

</body>
</html>
