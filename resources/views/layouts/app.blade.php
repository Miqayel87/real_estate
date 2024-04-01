<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/color.css')}}">

</head>
<body>
    <div class="wrapper">
        @include('inc.header')
        @yield('content')
    </div>



    <!-- Scripts
    ================================================== -->
    <script type="text/javascript" src="{{asset('scripts/jquery-3.4.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/jquery-migrate-3.1.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/chosen.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/magnific-popup.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/owl.carousel.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/rangeSlider.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/sticky-kit.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/slick.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/masonry.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/mmenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/tooltips.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('scripts/custom.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

</body>
</html>
