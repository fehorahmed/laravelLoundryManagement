<!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Dashboard | Hyper - Responsive Bootstrap 5 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description">
        <meta content="Coderthemes" name="author">
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('admin_assets/images/favicon.ico')}}">

        <!-- third party css -->
        <link href="{{asset('admin_assets/css/vendor/jquery-jvectormap-1.2.2.css')}}" rel="stylesheet" type="text/css">


        <!-- third party css end -->
        <link href="{{asset('admin_assets/css/vendor/dataTables.bootstrap5.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin_assets/css/vendor/responsive.bootstrap5.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin_assets/css/vendor/buttons.bootstrap5.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin_assets/css/vendor/select.bootstrap5.css')}}" rel="stylesheet" type="text/css">
        <!-- App css -->
        <link href="{{asset('admin_assets/css/icons.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('admin_assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="light-style">
        <link href="{{asset('admin_assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="dark-style">

    </head>



    @yield('main_contant')






    
        <!-- bundle -->
        <script src="{{asset('admin_assets/js/vendor.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/app.min.js')}}"></script>

        <!-- third party js -->
        <script src="{{asset('admin_assets/js/vendor/apexcharts.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/jquery-jvectormap-1.2.2.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/jquery-jvectormap-world-mill-en.js')}}"></script>

        
        <!-- third party js ends -->
        <script src="{{asset('admin_assets/js/vendor/jquery.dataTables.min.js')}}"></script>
        <script src="{{asset('admin_assetsjs/vendor/dataTables.bootstrap5.j')}}s"></script>
        <script src="{{asset('admin_assets/js/vendor/dataTables.responsive.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/responsive.bootstrap5.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/dataTables.buttons.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/buttons.bootstrap5.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/buttons.html5.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/buttons.flash.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/buttons.print.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/dataTables.keyTable.min.js')}}"></script>
        <script src="{{asset('admin_assets/js/vendor/dataTables.select.min.js')}}"></script>
        <!-- demo app -->
        <script src="{{asset('admin_assets/js/pages/demo.dashboard.js')}}"></script>
        <!-- end demo js-->
        
   
    @yield('script')
    </body>
</html>