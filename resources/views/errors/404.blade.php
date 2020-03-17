<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
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
    <link
        href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
    <link
        href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
        rel="stylesheet">
</head>

<body>
    <div class="col-md-4 offset-md-4 text-center header-error">
        <img style="width:100%" src="{{ asset('web/images/404.png') }}" alt="">
        <h3>404 -PAGE NOT FOUND</h3>
        <p>Chúng tôi dường như không thể tìm thấy trang bạn tìm kiếm</p>
        <div class="row">
            <div class="col-6">
                <a href="{{ route('home') }}" title="">
                    <button type="submit" class="btn button-style-w3" style="background-color: blue;color: white">Về Trang Chủ</button>
                </a>
            </div>
            <div class="col-6">
                <button type="submit" onclick="goBack()" class="btn button-style-w3 back-btn" style="background-color: red;color: white">Trở Lại</button>
            </div>
            
        </div>
    </div>

</body>
<script>
    function goBack(){
        window.history.back()
    }
</script>
</html>
