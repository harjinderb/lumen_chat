<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>@yield('title')</title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <meta content="" name="description" />
  <meta content="" name="author" />
  <!--     Fonts and icons     -->
    {!! HTML::style('assets/css/googlefonts.css') !!}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  {!! HTML::style('assets/css/material-dashboard.css?v=2.1.0') !!}
  {!! HTML::style('assets/css/custom.css') !!}
  {!! HTML::style('assets/demo/demo.css') !!}

  @yield('moreHead')

  {!! HTML::script('js/jquery.min.js') !!}
</head>
