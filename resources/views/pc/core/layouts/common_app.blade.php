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

    @section('css')
    @show

    <!-- 样式 -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">

    @section('style')
    @show

    <link rel="shortcut icon" href="/bitbug_favicon.ico">

    <script src="{{ asset('libs/jQuery/jQuery-2.2.0.min.js') }}"></script>
</head>
<body class="top-warn">
<div id="app" class="{{ route_class() }}-page">
    <!-- 注册自动登录后根据用户邮箱验证状态提示 -->
    @if(!getEmailStatus())
        <div class="alert alert-warning alert-email">
            <a href="#" class="close close-btn" data-dismiss="alert">&times;</a>
            <strong>警告！</strong>您账号还没有验证邮箱进行激活喔，请<a href="{{ email_facilitator() }}" class="go-email">前往邮箱</a>验证 或 重新<a href="javascript:void(0)" class="again-send">发送邮件</a>进行账号激活！否则影响您使用平台的功能。
        </div>
    @endif

    <!-- 模态框（Modal） -->
    <div class="modal fade" id="emailVerified" tabindex="-1" role="dialog" aria-labelledby="emailVerifiedLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-top">
                    <button type="button" class="close modal-close" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                    <h4 class="modal-title title" id="emailVerifiedLabel">激活账号</h4>
                </div>
                <div class="modal-body">
                    <div class="alert alert-warning alert-tip">
                        <strong>警告！</strong>为避免影响您使用平台的功能，请先进行邮箱验证以激活账号！
                    </div>
                    <p class="content-tip">
                        激活邮件已发送，请<a href="@if (session('email_verified')) {{ session('email_verified') }} @endif" class="go-email">前往邮箱</a>查收（注意检查回收站、垃圾箱中是否有激活邮件）并验证。如果仍未收到，请尝试重新<a href="javascript:void(0)" class="again-send">发送邮件</a>进行账号激活！否则影响您使用平台的功能。
                    </p>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal -->
    </div>

    @include('pc.core.layouts.common_header')
    <div class="container">
        @yield('content')
    </div>
    @include('pc.core.layouts.common_footer')
</div>
{{--<script src="{{ asset('libs/bootstrap/js/bootstrap.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ asset('libs/layui/layui.all.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/common.js') }}"></script>
<!-- JS 脚本 -->
<script src="{{ mix('js/app.js') }}"></script>

<script>
    /*邮箱验证提示模态框*/
    @if (session('email_verified'))
    $('#emailVerified').modal('show');
    @endif

    /*用户未登录 或 用户点击邮箱验证提示关闭按钮*/
    @if (!\Illuminate\Support\Facades\Auth::check() || (\Illuminate\Support\Facades\Auth::check() && \Illuminate\Support\Facades\Auth::user()->email_verified == true))
    $('body').removeClass('top-warn');
    @endif
    $('.close-btn').click(function () {
        $('body').removeClass('top-warn');
    });

    /*邮箱验证提示重新发送邮件*/
    $('.again-send').click(function () {
        $.ajax({
            type: 'post',
            url: '{{ url('user/send/email') }}',
            data: {
                _token: '{{csrf_token()}}',
                email: '{{ \Illuminate\Support\Facades\Auth::check() ? \Illuminate\Support\Facades\Auth::user()->email : '' }}',
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