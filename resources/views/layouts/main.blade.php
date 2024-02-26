<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>AdminLTE 3 | Dashboard 2</title>

    <!-- Google Font: Source Sans Pro -->
    @include('layouts.style')

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('style')
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__wobble" src="{{asset('images/quiz.jpg')}}" alt="AdminLTELogo" height="100"
                width="100">
        </div>
        @include('layouts.navbar')

        @include('layouts.sidebar')

        <div class="content-wrapper">
            @yield('content')
        </div>

        @include('layouts.rightbar')

        @include('layouts.footer')
        <!-- Main Footer -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    @include('layouts.script')
    @stack('script')
</body>

</html>