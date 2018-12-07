<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@section('keywords'){{ config('global.keywords') }}@show">
    <meta name="description" content="@section('description'){{ config('global.description') }}@show">
    <meta name="author" content="{{ config('global.author') }}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@section('title'){{ config('global.title') }}@show</title>

    {{--bootstrap
    <link rel="stylesheet" href="{{ asset('libs/bootstrap/css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('libs/layui/css/layui.css') }}" media="all">

    {{--Font--}}
    <link rel="stylesheet" href="{{ asset('libs/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/iconfont/iconfont.css') }}">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="{{ asset('libs/swiper/css/swiper.min.css') }}">

    @section('css')
    @show

    <!-- 样式 -->
    <link href="{{ mix('css/mall_app.css') }}" rel="stylesheet">

    @section('style')
    @show

    <link rel="shortcut icon" href="/bitbug_favicon.ico">

    <script src="{{ asset('libs/jQuery/jQuery-2.2.0.min.js') }}"></script>
</head>
<body>
<div id="app" class="{{ route_class() }}-page">
    @include('pc.mall.layouts.header')

    @include('pc.mall.layouts.slideshow')

    <div class="container">
        @yield('content')
    </div>
    {{--@include('pc.layouts.main_footer')--}}
</div>
{{--<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('libs/layui/layui.all.js') }}"></script>
<!-- JS 脚本 -->
<script src="{{ mix('js/app.js') }}"></script>

@section('footer')
@show
</body>
</html>