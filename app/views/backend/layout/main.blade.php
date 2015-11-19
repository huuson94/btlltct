<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Backend | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="{{ asset('public/backend/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- FontAwesome 4.3.0 -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons 2.0.0 -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="{{ asset('public/backend/dist/css/AdminLTE.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins
        folder instead of downloading all of them to reduce the load. -->
        <link href="{{ asset('public/backend/dist/css/skins/_all-skins.min.css') }}" rel="stylesheet" type="text/css" />
        {{ HTML::script('public/assets/js/frontend/jquery-ui.min.js') }}
        {{ HTML::script('public/assets/js/frontend/jquery-1.11.3.min.js') }}
    </head>
    <body class="skin-blue">
        <div class="wrapper">
            @include('backend.layout.header')
            @include('backend.layout.sidebar')
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <section class="content">
                    @yield('content')
                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            {{-- <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 2.0
                </div>
                <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
            </footer> --}}
        </div><!-- ./wrapper -->
        
        <!-- jQuery UI 1.11.2 -->
        <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="{{ asset('public/backend/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('public/backend/dist/js/app.min.js') }}" type="text/javascript"></script>
        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="{{ asset('public/backend/dist/js/pages/dashboard.js') }}" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="{{ asset('public/backend/dist/js/demo.js') }}" type="text/javascript"></script>
    </body>
</html>