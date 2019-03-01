<div class="user_nav">
    <div class="wrap clearfix">
        <!-- logo -->
        <h1 class="logo"><a href="{{ url('/user/index') }}"></a></h1>
        <!-- nav -->
        <div class="user_header_nav">
            <ul class="nav_list clearfix">
                <li class="nav_item cur">
                    <a href="{{ url('/user/index') }}" class="item">首页</a>
                </li>
                <li class="nav_item">
                    <a href="" class="item">账户设置
                        <span class="iconfont icon-35_xiangxiajiantou down"></span>
                    </a>
                    <div class="pull_list_wrap">
                        <div class="pull_list">
                            <a href="" class="pull_list_item">个人信息</a>
                            <a href="" class="pull_list_item">账户安全</a>
                            <a href="{{ url('user/addresses') }}" class="pull_list_item">地址管理</a>
                        </div>
                    </div>
                </li>
                <li class="nav_item">
                    <a href="" class="item">消息</a>
                </li>
            </ul>
        </div>
    </div>
</div></div>