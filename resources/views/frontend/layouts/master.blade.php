<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Land Real Estates Category Bootstrap Responsive website Template | Home :: w3layouts</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Xe Nam Dinh, Xe Nghia Hung" />
    <script>
        addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        }
    </script>
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="{{ asset('web/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- Bootstrap-Core-CSS -->
    <link href="{{ asset('web/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('web/css/style2.css')}}" rel='stylesheet' type='text/css' />
    <!-- Style-CSS -->
    <link href="{{ asset('web/css/font-awesome.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="{{ asset('css/app.css') }}" href="">
    <!-- Font-Awesome-Icons-CSS -->
    <!-- //Custom-Files -->

    <!-- Web-Fonts -->
    {{-- <link
        href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet"> --}}
    <!-- //Web-Fonts -->
    @yield('style')
    <style type="text/css" media="screen">

    </style>
</head>

<body>
    <div class="loader"></div>
    <span class="content-body">
        @include('frontend.layouts.partials.header')
        @yield('content')
        @include('frontend.layouts.partials.footer')
    </span>
   

</body>

<script src="{{ asset('js/app.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/vendor.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/manifest.js') }}" type="text/javascript" charset="utf-8"></script>
<script src="{{ asset('js/custom.js') }}" type="text/javascript" charset="utf-8"></script>

@yield('script')
<script>
    $(document).ready(function($) {

        @if(session('danger'))
           $.notify('{{session('danger')}}',{type:'danger'});
        @elseif(session('success'))
            $.notify('{{session('success')}}',{type:'success'});
        @endif


    });
</script>

</html>
