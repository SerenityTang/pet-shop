{{--顶部导航--}}
<div class="head-top">
    <div class="inner clearfix">
        <ul class="tools fl">
            <li><a href="{{ sld_prefix('www') }}" class="ao">慕宠网首页</a></li>
        </ul>

        <ul class="user fr">
            <ul class="login fr">
                @if(Auth::guest())
                    <li>
                        <a id="login" href="{{ route('login') }}">
                            <span class="login-register">请登录</span>
                        </a>
                    </li>
                    {{--<span class="sep">|</span>--}}
                    <li>
                        <a id="signup" href="{{ route('register') }}">
                            <span class="login-register">免费注册</span>
                        </a>
                    </li>
                @else
                    <li id="account-info">
                        <a href="javascript: void(0);" class="user-name">
                            <span style="padding: 0 0 0 5px;"
                                  class="name">{{ \Illuminate\Support\Facades\Auth::user()->username }}</span>
                            <i class="iconfont icon-35_xiangxiajiantou"></i>
                        </a>
                        <ul>
                            <li><a href="{{ url('/user/index') }}" target="_blank">个人中心</a></li>
                            <li><a href="{{ url('logout') }}">退出登录</a></li>
                        </ul>
                    </li>
                @endif
                <span class="sep">|</span>
                <li>
                    <a href="{{ url('') }}" target="_blank">
                        <span>我的订单</span>
                    </a>
                </li>
                <span class="sep">|</span>
                <li id="my-account">
                    <a href="javascript: void(0);" class="my-muchong">
                        <span style="padding: 0 0 0 15px;">我的慕宠</span>
                        <i class="iconfont icon-35_xiangxiajiantou"></i>
                    </a>
                    <ul>
                        <li><a href="{{ url('') }}" target="_blank">我的慕钻</a></li>
                        <li><a href="{{ url('') }}" target="_blank">账户余额</a></li>
                        <li><a href="{{ url('') }}" target="_blank">我的收藏</a></li>
                        <li><a href="{{ url('') }}" target="_blank">我的优惠券</a></li>
                    </ul>
                </li>
                <span class="sep">|</span>
                <li id="shopping-cart">
                    <a href="{{ url('') }}" class="my-shopping" target="_blank">
                        <span><i class="iconfont icon-xiazai1 ico"></i>我的购物车(<span
                                    class="cart-item-num">0</span>)</span>
                    </a>
                    <ul>
                        <li></li>
                    </ul>
                </li>
                <span class="sep">|</span>
                <li id="customer-service">
                    <a href="javascript: void(0);" class="my-service">
                        <span style="padding: 0 0 0 15px;">客户服务</span>
                        <i class="iconfont icon-35_xiangxiajiantou"></i>
                    </a>
                    <ul>
                        <li><a href="{{ url('') }}" target="_blank">帮助中心</a></li>
                        <li><a href="{{ url('') }}" target="_blank">建议反馈</a></li>
                        <li><a href="{{ url('') }}" target="_blank">慕宠服务</a></li>
                        <li><a href="{{ url('') }}" target="_blank">在线客服</a></li>
                    </ul>
                </li>
                <span class="sep">|</span>
                <li id="mobile-shop">
                    <a href="javascript: void(0)">
                        <span style="border:none; padding: 0 10px 0 26px;">
                            <i class="iconfont icon-shouji ico" style="margin: 1px -23px 0 12px; font-size: 13px"></i>
                            手机慕宠
                            <i class="iconfont icon-35_xiangxiajiantou"></i>
                        </span>
                    </a>
                    <ul>
                        <li class="qrcode"><a href="javascript:void(0);" target="_blank"><img
                                        src="" alt=""></a></li>
                        <li><a href="{{ url('') }}"
                               target="_blank">下载爱宠团&nbsp;&gt;</a></li>
                    </ul>
                </li>
            </ul>

        </ul>
    </div>
</div>