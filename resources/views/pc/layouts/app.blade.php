<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Laravel Shop') - Laravel 电商教程</title>

    {{--bootstrap
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">--}}

    <!-- 样式 -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <script src="{{ asset('libs/jQuery/jQuery-2.2.0.min.js') }}"></script>
</head>
<body>
<div id="app" class="{{ route_class() }}-page">
    @include('pc.layouts.header')
    <div class="container">
        @yield('content')
    </div>
    @include('pc.layouts.footer')
</div>
<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
<!-- JS 脚本 -->
<script src="{{ mix('js/app.js') }}"></script>
</body>
</html>