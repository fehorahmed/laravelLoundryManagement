<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loundry Site here</title>
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- VENDOR CSS-->
    <link rel="stylesheet" href="{{asset('font_assets/vendor/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('font_assets/vendor/css/normalize.css')}}">


    <!--RESOURCE FILES-->
    <link rel="stylesheet" href="{{asset('font_assets/resources/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('font_assets/resources/css/responsive.css')}}">


</head>

<body>
   

@yield('main_layout')




    <!--JS SCRIPT-->
    <script src="{{asset('font_assets/vendor/js/html5shiv.min.js')}}"></script>
    <script src="{{asset('font_assets/vendor/js/respond.min.js')}}"></script>
    <script src="{{asset('font_assets/vendor/js/selectivizr-min.js')}}"></script>
    <script src="{{asset('font_assets/vendor/js/bootstrap.min.js')}}"></script>

</body>

</html>

