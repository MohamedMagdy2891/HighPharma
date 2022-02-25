<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=" utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>HighPharma | {{ $page }}</title>
    <meta name="csrf_token" content="{{ csrf_token() }}">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="/assets/dist/img/AdminLTELogo.png" type="image/x-icon">

    @include('admin.layouts.style')
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('admin.layouts.sidebar')

        @yield('content')

        @include('admin.layouts.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->


    </div>
    <!-- ./wrapper -->

    @include('admin.layouts.scripts')

</body>

</html>
