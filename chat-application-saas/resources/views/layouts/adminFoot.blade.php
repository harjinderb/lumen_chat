 <!--   Core JS Files   -->

 {!! HTML::script('assets/js/core/popper.min.js') !!}
 {!! HTML::script('assets/js/core/bootstrap-material-design.min.js') !!}
 {!! HTML::script('assets/js/plugins/perfect-scrollbar.jquery.min.js') !!}
  <!-- Chartist JS -->
 {!! HTML::script('assets/js/plugins/chartist.min.js') !!}
  <!--  Notifications Plugin    -->
 {!! HTML::script('assets/js/plugins/bootstrap-notify.js') !!}
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
 {!! HTML::script('assets/js/material-dashboard.min.js?v=2.1.0') !!}
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  {!! HTML::script('assets/demo/demo.js') !!}
  {!! HTML::script('assets/plugins/jquery-validation/js/jquery.validate.min.js') !!}

  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();

    });
  </script>

  @yield('moreJS')