<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" ng-app="myApp">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
  
    <!-- Styles -->


    <!-- Bootstrap Core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{asset('vendor/bootstrap/css/metisMenu.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('dist/css/sb-admin-2.css') }}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{asset('vendor/morrisjs/morris.css') }}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{asset('vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    @yield('css')
    @yield('scriptTop')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

      
</head>
<body class="fixed-left" ng-controller="LogCtrl">
    <div id="wrapper">
        @include('inc.topbar')
        @include('inc.leftbar')

        <main class="py-4">
            <div class="content-page">
                <div class="content">
                    <div id="page-wrapper">

                    <div class="row">
                     @include('inc.message')
                    @yield('content')
                </div>
            </div>
                </div>
            </div>
        </main>
        <footer class="footer text-center">
                    Copyright &copy; {{date('Y')}} by GreenLand. All rights reserved | Designed by Eng.Rashid (+255 655 437 667)
        </footer>
    </div>


        <!-- jQuery -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- Morris Charts JavaScript -->
    <script src="{{asset('vendor/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('vendor/metisMenu/metisMenu.min.js')}}../"></script>
    <script src="{{asset('data/morris-data.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('dist/js/sb-admin-2.js')}}"></script>
    
    <script src="{{asset('js/invoice2.js')}}"></script>
     
     <script src="{{asset('js/invoice.js')}}"></script>
        @yield('script')
</body>
</html>
