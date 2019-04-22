<!DOCTYPE html>
<html lang="en">
<head>
	@include('layouts.uihead')
</head>
<body class="account-log">

	@yield('content')

	<!-- Scripts -->
{!! HTML::script('assets/plugins/jquery-validation/js/jquery.validate.min.js') !!}
 @yield('moreJS')
</body>
</html>
