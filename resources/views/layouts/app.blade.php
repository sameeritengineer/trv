<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- plugins:css -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="{{asset('asset/vendors/feather/feather.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendors/ti-icons/css/themify-icons.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendors/css/vendor.bundle.base.css')}}">
      <!-- endinject -->
      <!-- Plugin css for this page -->
      <link rel="stylesheet" href="{{asset('asset/css/richtext.min.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendors/ti-icons/css/themify-icons.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('asset/js/select.dataTables.min.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendors/select2/select2.min.css')}}">
      <link rel="stylesheet" href="{{asset('asset/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
      <!-- End plugin css for this page -->
      <!-- inject:css -->
      <link rel="stylesheet" href="{{asset('asset/css/vertical-layout-light/style.css')}}">
      <!-- endinject -->
      <link rel="shortcut icon" href="{{asset('asset/images/logob.png')}}" />
      <!-- data-table css-->
      <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
   @include('layouts.nav')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      @include('layouts.extra')
      @include('layouts.sidebarnav')
      <!-- partial -->
      <div class="main-panel">
        <main>
            @yield('content')
        </main>

        <!-- content-wrapper ends -->
        @include('layouts.footer')
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{asset('asset/vendors/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('asset/vendors/chart.js/Chart.min.js')}}"></script>
  <script src="{{asset('asset/vendors/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('asset/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('asset/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('asset/js/off-canvas.js')}}"></script>
  <script src="{{asset('asset/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('asset/js/template.js')}}"></script>
  <script src="{{asset('asset/js/settings.js')}}"></script>
  <script src="{{asset('asset/js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{asset('asset/js/dashboard.js')}}"></script>
  <script src="{{asset('asset/js/Chart.roundedBarCharts.js')}}"></script>
  <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
  <script src="{{asset('asset/vendors/select2/select2.min.js')}}"></script>
  <script type="text/javascript" src="{{asset('asset/js/jquery.richtext.js')}}"></script>
  <!-- End custom js for this page--> 
  @yield('footer.script')   
    
</body>
</html>
