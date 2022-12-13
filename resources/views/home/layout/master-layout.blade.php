<!DOCTYPE html>
<html lang="en">

<head>
    <title>Academics &mdash; Website by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('public/home/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('public/home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/home/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('public/home/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/home/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/home/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/home/css/jquery.fancybox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('public/home/css/bootstrap-datepicker.css') }}">

    <link rel="stylesheet" href="{{ asset('public/home/fonts/flaticon/font/flaticon.css') }}">

    <link rel="stylesheet" href="{{ asset('public/home/css/aos.css') }}">
    <link href="{{ asset('public/home/css/jquery.mb.YTPlayer.min.css') }}" media="all" rel="stylesheet"
        type="text/css">

    <link rel="stylesheet" href="{{ asset('public/home/css/style.css') }}">

</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <div class="site-wrap">
        @include('home.common.header')
        @yield('section')
        @yield('section-list-test')
        @yield('section-lesson')
        @include('home.common.footer')
    </div>
    <script src="{{ asset('public/home/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset('public/home/js/jquery-migrate-3.0.1.min.js') }}')}}"></script>
    <script src="{{ asset('public/home/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('public/home/js/popper.min.js') }}"></script>
    <script src="{{ asset('public/home/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/home/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('public/home/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('public/home/js/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('public/home/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('public/home/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('public/home/js/aos.js') }}"></script>
    <script src="{{ asset('public/home/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('public/home/js/jquery.sticky.js') }}"></script>
    <script src="{{ asset('public/home/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('public/home/js/main.js') }}"></script>
</body>

</html>
