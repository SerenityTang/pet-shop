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

    <!-- 样式 -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="/bitbug_favicon.ico">

    <script src="{{ asset('libs/jQuery/jQuery-2.2.0.min.js') }}"></script>
</head>
<body>
<div id="app" class="{{ route_class() }}-page">
    @if(!getEmailStatus())
        <div class="alert alert-warning alert-email">
            <a href="#" class="close close-btn" data-dismiss="alert">&times;</a>
            <strong>警告！</strong>您账号还没有验证邮箱进行激活喔，请<a href="{{ email_facilitator() }}" class="go-email">
                前往邮箱</a>验证 或 重新<a href="javascript:void(0)" class="again-send">发送邮件</a>进行账号激活！
        </div>
    @endif
    @include('pc.core.layouts.common_header')
    <div class="container">
        @yield('content')
    </div>
    @include('pc.core.layouts.common_footer')
</div>
<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('libs/layui/layui.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
<!-- JS 脚本 -->
<script src="{{ mix('js/app.js') }}"></script>

<script>
    $('.again-send').click(function () {
        $.ajax({
            type: 'post',
            url: '{{ url('user/send/email') }}',
            data: {
                _token: '{{csrf_token()}}',
                email : '{{ \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->email : '' }}',
                subject: '{{ config('global.email.register_subject') }}',
                remarks: '{{ config('global.email.register_remarks') }}'
            },
            cache: false,
            success: function (res) {
                if (res.code == 500) {
                    layer.msg(res.message);
                } else {
                    layer.msg(res.message);
                }
            },
            error: function () {
                layer.msg('系统错误！', {
                    icon: 2,
                    time: 2000,
                });
            }
        });
    })
</script>

@section('footer')
@show
</body>
</html>