<div class="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="" class="logo pull-left"><img src="/imgs/imoop-logo.png" width="190" height="50"/></a>

                <!-- 用户栏 -->
                <div class="aw-user-nav active hidden-xs hidden-sm">
                    @if(Auth::guest())
                        <!-- 登录&注册栏 -->
                        <a href="{{ url('login') }}" class="btn btn-hollow active" target="_blank">登录</a>
                        <a href="{{ url('register') }}" class="btn btn-primary" target="_blank">注册</a>
                        <!-- end 登录&注册栏 -->
                    @else

                    @endif
                </div>
                <!-- end 用户栏 -->

                <!-- 搜索框 -->
                <!-- end 搜索框 -->

                <!-- 中间导航菜单栏 -->
                <div class="aw-top-nav navbar">
                    <nav class="hidden-xs hidden-sm">
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{ sld_prefix('www') }}">首页</a>
                            </li>
                            <li>
                                <a href="{{ sld_prefix('mall') }}" target="_blank">宠物商城</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}">宠物资讯</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}">宠物社区</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}">宠物百科</a>
                            </li>
                            <li>
                                <a href="{{ url('') }}">宠物医疗</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- end 中间导航菜单栏 -->
            </div>
        </div>
    </div>
</div>