<!DOCTYPE HTML>
<html lang="zxx">

<head>
    <title>Xe Nam Định</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Xe Nam Dinh, Xe Nghia Hung" />
    
    <!-- //Meta tag Keywords -->

    <!-- Custom-Files -->
    <link href="{{ asset('web/css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <!-- Bootstrap-Core-CSS -->
    <link href="{{ asset('web/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('web/css/style2.css')}}" rel='stylesheet' type='text/css' />
    <!-- Style-CSS -->
    <link href="{{ asset('web/css/font-awesome.min.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="" href="{{ asset('css/app.css') }}">
    <meta name="name" content="{{ csrf_token() }}">
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
    {{-- <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=683890102171898&autoLogAppEvents=1"></script> --}}
    
</head>

<body>
    <div id="fb-root"></div>
    @include('frontend.layouts.partials.login-modal')
    @include('frontend.layouts.partials.register-modal')

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
<script src="{{ asset('web/js/socket.js') }}" type="text/javascript" charset="utf-8"></script>
<script>
    function showModal(modal_id,hidden_id=""){
        $("#"+modal_id).modal({backdrop: "static"});
        if(hidden_id != "")
            $("#"+hidden_id).modal('hide');
    }
    $(document).ready(function($) {

        // $('#range-time-go').datetimepicker();
        $('.time, .clock_go, .tc_clock_go, .clock_back, .tc_clock_back').datetimepicker({
            format: 'LT'
        });
        $('.date').datetimepicker({
            format: 'YYYY-MM-DD'
        });

        var is_modal = "";

        @if(count($errors) > 0)
            var errors = {!! $errors !!};
            var is_modal = (errors.is_modal) ? errors.is_modal[0] : "";
        @endif

        if(is_modal != ""){
            // $("#"+is_modal).modal({backdrop: 'static'});
            displayModal(is_modal);
        }
        @if(session('error_login'))
            displayModal('loginModal');
            @php
                session()->forget('error_login');
            @endphp
        @endif

        @if(session('danger'))
           $.notify('{{session('danger')}}',{type:'danger'});
            @php
                session()->forget('danger');
            @endphp
        @elseif(session('success'))
            $.notify('{{session('success')}}',{type:'success'});
            @php
                session()->forget('success');
            @endphp
        @endif

        function displayModal(id_modal){
            $("#"+id_modal).modal({backdrop: "static"});
        }

    

    });
</script>

</html>
