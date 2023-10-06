<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="app-url" content="{{ env('APP_URL') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('meta_title', env('APP_NAME'))</title>
    <meta name="description" content="@yield('meta_description', 'Shops')" />
    <meta name="keywords" content="@yield('meta_keywords', 'Shops')">
    @include('frontend.layouts.css')
</head>
<body>
    {{-- @include('frontend.layouts.navbar') --}}
    @yield('content')
    {{-- @include('frontend.layouts.footer') --}}
    @include('frontend.layouts.script')
    @yield('script')
</body>
</html>