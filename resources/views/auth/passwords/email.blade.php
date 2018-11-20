@extends('pc.core.layouts.common_login_register_app')

@section('title')
    慕宠账号 - 重置密码 | @parent
@stop

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default {{ route_class() }}-panel">
                <div class="panel-heading logo"><img src="/imgs/logo.png" alt=""></div>
                <h2 class="{{ route_class() }}-title">重置密码</h2>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <p class="import-msg">请输入您需要找回的慕宠账号：</p>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" align="middle" placeholder="请输入用户名/手机号码/邮箱" autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-3"></div>

                            <div class="col-md-4">
                                <input id="captcha" type="text" class="form-control" name="captcha"
                                       placeholder="请输入验证码" maxlength="5">
                            </div>
                            <div class="col-md-3 captcha-pic">
                                <img src="{{captcha_src()}}" style="cursor: pointer"
                                     onclick="this.src='{{ captcha_src() }}'+Math.random()">
                            </div>
                            <div class="col-md-2">
                                <span class="help-block error-msg">
                                    <em class="captcha-error-msg"></em>
                                </span>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="button" class="btn btn-primary next-btn">
                                    下一步
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
        //点击注册按钮
        $('.next-btn').click(function () {
            $.ajax({
                type: 'post',
                url: '{{ route('register') }}',
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