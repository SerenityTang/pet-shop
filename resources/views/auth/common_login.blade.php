@extends('pc.core.layouts.common_login_register_app')
@section('title')
    慕宠账号 - 登录 | @parent
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default {{ route_class() }}-panel">
                    <div class="panel-heading logo"><img src="/imgs/logo.png" alt=""></div>
                    <h2 class="{{ route_class() }}-title">慕宠账号登录</h2>
                    <div class="panel-body">
                        <form id="{{ route_class() }}" class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label {{--for="username"--}} class="col-md-4 control-label">用户名</label>

                                <div class="col-md-5">
                                    <input id="username" type="username" class="form-control" name="username"
                                           value="{{ old('username') }}" placeholder="用户名/手机号码/邮箱" autofocus>
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
                                <label {{--for="password"--}} class="col-md-4 control-label">密码</label>

                                <div class="col-md-5">
                                    <input id="password" type="password" class="form-control" name="password"
                                           placeholder="密码">
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

                            <div class="form-group" style="margin-bottom: 0px;">
                                <p class="other-panel">
                                    <span class="keep-login"><input id="remember" type="checkbox"
                                                                    name="remember" {{ old('remember') ? 'checked' : '' }}>保持登录</span>
                                    <span class="forget-register">
                                        <a class="forget-pwd-btn" href="{{ route('password.request') }}">忘记密码</a>
                                        <span class="divide"> | </span>
                                        <a class="register-btn" href="{{ route('register') }}">免费注册</a>
                                    </span>
                                </p>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="button" class="btn btn-primary login-btn">
                                        登录
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
        //表单聚焦删除错误提示
        $('form div input').focus(function () {
            $(this).parents('div.form-group').find('em').text('');
        });

        //点击注册按钮
        $('.login-btn').click(function () {
            $.ajax({
                type: 'post',
                url: '{{ route('login') }}',
                data: $('#login').serialize(),
                cache: false,
                success: function (res) {
                    if (res.code == 400) {
                        $('form div em').eq(0).text(res.data['username']);
                        $('form div em').eq(1).text(res.data['password']);
                    } else {
                        location.href = '{{ url("/") }}';
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
@stop