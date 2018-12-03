{{--顶部导航--}}
<div class="head_t">
    <div class="inner clearfix">
        <ul class="tools fl">
            <li><a href="{{ sld_prefix('www') }}" class="ao">慕宠网首页</a></li>
        </ul>

        <ul class="user fr">
            <ul class="login fr">
                <li>
                    <a id="login" href="{{ route('login') }}" target="_blank">
                        <span>请登录</span>
                    </a>
                </li>
                <span class="sep">|</span>
                <li>
                    <a id="signup" href="{{ route('register') }}" target="_blank">
                        <span>免费注册</span>
                    </a>
                </li>
                <span class="sep">|</span>
                <li>
                    <a href="{{ url('') }}" target="_blank">
                        <span>我的订单</span>
                    </a>
                </li>
                <span class="sep">|</span>
                <li id="my-account">
                    <a href="javascript: void(0);" class="my-muchong">
                        <span style="padding-right: 26px;">我的慕宠<span class="triangle"></span></span>
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
                        <span><i class="iconfont icon-xiazai1 ico"></i>我的购物车(<span class="cart-item-num">0</span>)</span>
                    </a>
                    <ul>
                        <li></li>
                    </ul>
                </li>
                <span class="sep">|</span>
                <li id="customer-service">
                    <a href="javascript: void(0);" class="my-service">
                        <span style="padding-right: 26px;">客户服务<span class="triangle"></span></span>
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
                    <a href="javascript: void(0)"><span style="border:none; padding-left: 26px;">手机慕宠<span
                                    class="triangle"></span></span></a>
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

<div class="head-m clearfix">
    <h1 class="logo"><a href="{{ url('') }}"></a></h1>
    <div class="search">
        <div class="search-header">
            <form action="{{ url('') }}" method="get" target="_blank">
                <div class="search-form clearfix">
                    <input type="text" value="" class="search-input" name="keyword" placeholder="搜索商品"/>
                    <i class="iconfont icon-sousuo search-ico"></i>
                    <input type="submit" value="" class="search-btn"/>
                </div>
            </form>
        </div>

        <div class="search-bottom">
            <div class="search-hot">热搜: </div>
            <a href="{{ url('') }}" class="search_advs" target="_blank" name="ddnav_adv_s"
               dd_name="高级搜索">高级搜索</a>
        </div>
    </div>
</div>

