@extends('pc.core.layouts.common_login_register_app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default {{ route_class() }}-panel">
                    <p class="{{ route_class() }}-skip">
                        <a class="home" href="{{ sld_prefix('www') }}">慕宠首页</a>
                        <a class="mall" href="{{ sld_prefix('mall') }}">慕宠商城</a>
                        <span>已有账号？请<a class="login" href="{{ route('login') }}">登录</a></span>
                    </p>
                    <div class="panel-heading logo"><img src="/imgs/logo.png" alt=""></div>
                    <h2 class="{{ route_class() }}-title">注册慕宠账号</h2>
                    <div class="panel-body">
                        <form id="{{ route_class() }}" class="form-horizontal" method="POST"
                              action="{{ route('register') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label {{--for="username"--}} class="col-md-4 control-label">用户名</label>

                                <div class="col-md-5">
                                    <input id="username" type="text" class="form-control" name="username"
                                           value="{{ old('username') }}" placeholder="请输入用户名" autofocus>
                                </div>

                                <div class="col-md-3">
                                    {{--@if ($errors->has('username'))--}}
                                    {{--<span class="help-block error-msg">--}}
                                    {{--<em>{{ $errors->first('username') }}</em>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    <span class="help-block error-msg">
                                        <em></em>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label {{--for="email"--}} class="col-md-4 control-label">{{--手机号 / --}}邮箱</label>

                                <div class="col-md-5">
                                    <input id="email" type="email" class="form-control" name="email"
                                           value="{{ old('email') }}" placeholder="请输入邮箱">
                                </div>

                                <div class="col-md-3">
                                    {{--@if ($errors->has('email'))--}}
                                    {{--<span class="help-block error-msg">--}}
                                    {{--<em>{{ $errors->first('email') }}</em>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    <span class="help-block error-msg">
                                        <em></em>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label {{--for="password"--}} class="col-md-4 control-label">登录密码</label>

                                <div class="col-md-5">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="请输入登录密码">
                                </div>

                                <div class="col-md-3">
                                    {{--@if ($errors->has('password'))--}}
                                    {{--<span class="help-block error-msg">--}}
                                    {{--<em>{{ $errors->first('password') }}</em>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    <span class="help-block error-msg">
                                        <em></em>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label {{--for="password-confirm"--}} class="col-md-4 control-label">确认密码</label>

                                <div class="col-md-5">
                                    <input id="password-confirm" type="password" class="form-control"
                                           name="password_confirmation" placeholder="请输入确认密码">
                                </div>

                                <div class="col-md-3">
                                    {{--@if ($errors->has('password_confirmation'))--}}
                                    {{--<span class="help-block error-msg">--}}
                                    {{--<em>{{ $errors->first('password_confirmation') }}</em>--}}
                                    {{--</span>--}}
                                    {{--@endif--}}
                                    <span class="help-block error-msg">
                                        <em></em>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label {{--for="captcha"--}} class="col-md-4 control-label">验证码</label>

                                <div class="col-md-3">
                                    <input id="captcha" type="text" class="form-control" name="captcha"
                                           placeholder="请输入验证码" maxlength="5">
                                </div>
                                <div class="col-md-3 captcha-pic">
                                    <img src="{{captcha_src()}}" style="cursor: pointer"
                                         onclick="this.src='{{ captcha_src() }}'+Math.random()">
                                </div>

                                {{--@if($errors->has('captcha'))--}}
                                {{--<div class="col-md-2">--}}
                                {{--<span class="help-block error-msg">--}}
                                {{--<em class="captcha-error-msg">{{$errors->first('captcha')}}</em>--}}
                                {{--</span>--}}
                                {{--</div>--}}
                                {{--@endif--}}
                                <div class="col-md-2">
                                    <span class="help-block error-msg">
                                        <em class="captcha-error-msg"></em>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <span class="msg">
                                    <input id="agreement" class="agreement" type="checkbox">
                                    注册账号即表示您同意并愿意遵守慕宠
                                    <a href="">《用户协议》</a>和<a href="">《隐私政策》</a>
                                </span>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="button" class="btn btn-primary submit-btn" disabled="disabled">
                                        立即注册
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    <script>
        //同意协议修改注册按钮样式
        $('#agreement').change(function () {
            if ($('#agreement').prop('checked')) {
                $('.btn').removeClass('submit-btn');
                $('.btn').attr("disabled", false);
            } else {
                $('.btn').addClass('submit-btn');
                $('.btn').attr("disabled", true);
            }
        });

        //表单聚焦删除错误提示
        $('form div input').focus(function () {
            $(this).parents('div.form-group').find('em').text('');
        });

        //点击注册按钮
        $('.submit-btn').click(function () {
            $.ajax({
                type: 'post',
                url: '{{ route('register') }}',
                {{--data: {--}}
                        {{--_token: '{{csrf_token()}}',--}}
                        {{--'email': $('#email').val(),--}}
                        {{--'username': $('#username').val(),--}}
                        {{--'password': $('#password').val(),--}}
                        {{--'password_confirmation': $('#password_confirmation').val(),--}}
                        {{--'captcha': $('#captcha').val(),--}}
                        {{--},--}}
                data: $('#register').serialize(),
                cache: false,
                success: function (res) {
                    if (res.code == 200) {
                        layer.open({
                            type: 1,
                            anim: 0,
                            shade: [0.2, '#393D49'],
                            area: ['380px', '160px'],
                            skin: 'layer-layout',
                            title: false,
                            content: res.message,
                            time: 13000,
                            end: function () {
                                location.href = '{{ url("/") }}';
                            }
                        });
                        $('.count-down').text('13 s 后自动返回首页 或 点击关闭返回首页');
                        countDown(13);
                    } else if (res.code == 400) {
                        $('form div em').eq(0).text(res.data['username']);
                        $('form div em').eq(1).text(res.data['email']);
                        $('form div em').eq(2).text(res.data['password']);
                        $('form div em').eq(3).text(res.data['password_confirmation']);
                        $('form div em').eq(4).text(res.data['captcha']);

                        //提交表单信息有误刷新图片验证码
                        $('form img').click();
                    }
                },
                error: function () {
                    layer.msg('系统错误！', {
                        icon: 2,
                        time: 2000,
                    });
                }
            });

            //注册后弹出层的倒计时
            function countDown(time) {
                $(".count-down").show();
                $('.count-down').text(time + ' s 后自动返回首页 或 点击关闭返回首页');
                --time;
                setTimeout(
                    function () {
                        countDown(time);
                    },
                    1000
                );
            }
        })
    </script>
@stop



