<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

      <!-- favicon -->
      <link rel="icon" type="image/png" href="{{asset('frontend-asset/images/logob.png')}}">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="{{asset('frontend-asset/vendors/bootstrap/css/bootstrap.min.css')}}" media="all">
      <!-- jquery-ui css -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend-asset/vendors/jquery-ui/jquery-ui.min.css')}}">
      <!-- fancybox box css -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend-asset/vendors/fancybox/dist/jquery.fancybox.min.css')}}">
      <!-- Fonts Awesome CSS -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend-asset/vendors/fontawesome/css/all.min.css')}}">
      <!-- Elmentkit Icon CSS -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend-asset/vendors/elementskit-icon-pack/assets/css/ekiticons.css')}}">
      <!-- slick slider css -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend-asset/vendors/slick/slick.css')}}">
      <link rel="stylesheet" type="text/css" href="{{asset('frontend-asset/vendors/slick/slick-theme.css')}}">
      <!-- google fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,400&display=swap" rel="stylesheet">
      <!-- Custom CSS -->
      <link rel="stylesheet" type="text/css" href="{{asset('frontend-asset/style.css')}}">
</head>
<body class="home">
	<div id="siteLoader" class="site-loader">
         <div class="preloader-content">
            <img src="assets/images/loader1.gif" alt="">
         </div>
      </div>
          <div id="page" class="page">
         @include('layouts.frontheader') 
         <main id="content" class="site-main">
            @yield('content')
         </main>
           @include('layouts.frontfooter') 

      </div>  

  <!-- JavaScript -->
      <script src="{{asset('frontend-asset/vendors/jquery/jquery.js')}}"></script>
      <script src="{{asset('frontend-asset/vendors/waypoint/waypoints.js')}}"></script>
      <script src="{{asset('frontend-asset/vendors/bootstrap/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('frontend-asset/vendors/jquery-ui/jquery-ui.min.js')}}"></script>
      <script src="{{asset('frontend-asset/vendors/countdown-date-loop-counter/loopcounter.js')}}"></script>
      <script src="{{asset('frontend-asset/vendors/counterup/jquery.counterup.min.js')}}"></script>
      <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
      <script src="{{asset('frontend-asset/vendors/masonry/masonry.pkgd.min.js')}}"></script>
      <script src="{{asset('frontend-asset/vendors/slick/slick.min.js')}}"></script>
      <script src="{{asset('frontend-asset/vendors/fancybox/dist/jquery.fancybox.min.js')}}"></script>
      <script src="{{asset('frontend-asset/vendors/slick-nav/jquery.slicknav.js')}}"></script>
      <script src="{{asset('frontend-asset/js/custom.min.js')}}"></script>   
</body>
</html>
