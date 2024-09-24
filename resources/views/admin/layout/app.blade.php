<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AYA Sompo </title>
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    @include('admin.layout.head')
    @stack('child-css')
</head>

<body class="sidebar-mini layout-fixed layout-navbar-fixed">
    @include('admin.layout.flash-message')
    <div class="wrapper">
        @include('admin.layout.header')
        @include('admin.layout.sidebar')
        <div class="content-wrapper">
            @yield('content')
        </div>
    </div>
    <aside class="control-sidebar control-sidebar-dark">
    </aside>
    @include('admin.layout.script')
    @stack('child-scripts')
</body>

</html>
