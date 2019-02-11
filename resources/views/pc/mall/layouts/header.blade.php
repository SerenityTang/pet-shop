{{--顶部导航--}}
<div class="head_top">
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
                            <li><a href="{{ url('') }}" target="_blank">个人中心</a></li>
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

<div class="head-middle clearfix">
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
            <div class="search-hot">热搜:</div>
            <a href="{{ url('') }}" class="search_advs" target="_blank" name="ddnav_adv_s"
               dd_name="高级搜索">高级搜索</a>
        </div>
    </div>
</div>

<div class="head-nav">
    <div class="nav">
        <ul>
            <li class="nav-left">
                <div class="allbtn">
                    <a href="javascript:void(0);" class="main-nav">
                        <i class="iconfont icon-shangpinfenlei"></i>
                        全部商品分类
                    </a>
                    <ul style="width:190px" class="jspop box">
                        <li class="category-item">
                            <a class="category-title" href="#"><i>&nbsp;</i>狗狗 / 犬</a>
                            <div class="category-detail">
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">小型宠物犬</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">泰迪犬</a>
                                        <a href="">比熊犬</a>
                                        <a href="">约克夏</a>
                                        <a href="">柯基犬</a>
                                        <a href="">比格犬</a>
                                        <a href="">博美犬</a>
                                        <a href="">腊肠犬</a>
                                        <a href="">蝴蝶犬</a>
                                        <a href="">马尔济斯</a>
                                        <a href="">茶杯犬</a>
                                        <a href="">西施犬</a>
                                        <a href="">法国斗牛犬</a>
                                        <a href="">京巴狗</a>
                                        <a href="">可卡犬</a>
                                        <a href="">雪纳瑞</a>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">中型宠物犬</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">拉布拉多</a>
                                        <a href="">柴犬</a>
                                        <a href="">哈士奇</a>
                                        <a href="">牛头梗</a>
                                        <a href="">松狮犬</a>
                                        <a href="">古代牧羊犬</a>
                                        <a href="">金毛</a>
                                        <a href="">喜乐蒂</a>
                                        <a href="">苏格兰牧羊犬</a>
                                        <a href="">萨摩耶</a>
                                        <a href="">古代牧羊犬</a>
                                        <a href="">狼狗</a>
                                        <a href="">杜高犬</a>
                                        <a href="">昆明犬</a>
                                        <a href="">银狐犬</a>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">大型宠物犬</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">纽芬兰犬</a>
                                        <a href="">马犬</a>
                                        <a href="">阿拉斯加犬</a>
                                        <a href="">藏獒</a>
                                        <a href="">罗威纳犬</a>
                                        <a href="">格力犬</a>
                                        <a href="">斑点狗</a>
                                        <a href="">圣伯纳犬</a>
                                        <a href="">杜宾犬</a>
                                        <a href="">大白熊犬</a>
                                        <a href="">中亚牧羊犬</a>
                                        <a href="">阿富汗猎犬</a>
                                        <a href="">美国恶霸犬</a>
                                        <a href="">中亚牧羊犬</a>
                                        <a href="">高加索犬</a>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">主粮</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">纽芬兰犬</a>
                                        <a href="">马犬</a>
                                        <a href="">阿拉斯加犬</a>
                                        <a href="">藏獒</a>
                                        <a href="">罗威纳犬</a>
                                        <a href="">格力犬</a>
                                        <a href="">斑点狗</a>
                                        <a href="">圣伯纳犬</a>
                                        <a href="">杜宾犬</a>
                                        <a href="">大白熊犬</a>
                                        <a href="">中亚牧羊犬</a>
                                        <a href="">阿富汗猎犬</a>
                                        <a href="">美国恶霸犬</a>
                                        <a href="">中亚牧羊犬</a>
                                        <a href="">高加索犬</a>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li class="category-item">
                            <a class="category-title" href="#"><i>&nbsp;</i>猫猫</a>
                            <div class="category-detail">
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">宠物猫</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">波斯猫</a>
                                        <a href="">加菲猫</a>
                                        <a href="">蓝猫</a>
                                        <a href="">缅因猫</a>
                                        <a href="">中华田园猫</a>
                                        <a href="">无毛猫</a>
                                        <a href="">缅甸猫</a>
                                        <a href="">英国短毛猫</a>
                                        <a href="">美国短毛猫</a>
                                        <a href="">布偶猫</a>
                                        <a href="">暹罗猫</a>
                                        <a href="">豹猫</a>
                                        <a href="">金吉拉猫</a>
                                        <a href="">曼基康猫</a>
                                        <a href="">折耳猫</a>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li class="category-item">
                            <a class="category-title" href="#"><i>&nbsp;</i>水族</a>
                            <div class="category-detail">
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">金鱼</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">玉兔</a>
                                        <a href="">鹅头红</a>
                                        <a href="">红珍珠</a>
                                        <a href="">包金</a>
                                        <a href="">红白球</a>
                                        <a href="">红水泡</a>
                                        <a href="">十二红蝶尾</a>
                                        <a href="">十二红龙睛</a>
                                        <a href="">五花兰寿</a>
                                        <a href="">王字虎头</a>
                                        <a href="">红望天</a>
                                        <a href="">蚕眼龙睛</a>
                                        <a href="">紫蝶尾</a>
                                        <a href="">金头黑白狮</a>
                                        <a href="">扯旗红水泡</a>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">锦鲤鱼</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">黄鲤</a>
                                        <a href="">白写锦鲤</a>
                                        <a href="">金银鳞锦鲤</a>
                                        <a href="">大和锦</a>
                                        <a href="">九纹龙</a>
                                        <a href="">黄写锦鲤</a>
                                        <a href="">德国三色锦鲤</a>
                                        <a href="">四段红白锦鲤</a>
                                        <a href="">绯秋翠锦鲤</a>
                                        <a href="">御殿樱红锦鲤</a>
                                        <a href="">墨衣锦鲤</a>
                                        <a href="">金昭和光写锦鲤</a>
                                        <a href="">二段红白锦鲤</a>
                                        <a href="">德国别甲锦鲤</a>
                                        <a href="">赤别甲锦鲤</a>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">魟鱼</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">珍珠魟</a>
                                        <a href="">黑白魟</a>
                                        <a href="">豹魟</a>
                                        <a href="">金点魟</a>
                                        <a href="">天线魟</a>
                                        <a href="">帝王老虎魟</a>
                                        <a href="">金帝王魟</a>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">罗汉鱼</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">金苹果</a>
                                        <a href="">印尼金花</a>
                                        <a href="">金花马骝</a>
                                        <a href="">帝王金花</a>
                                        <a href="">泰金</a>
                                        <a href="">彩虹</a>
                                        <a href="">红金花</a>
                                        <a href="">太阳金花</a>
                                        <a href="">雪山</a>
                                        <a href="">台湾达摩金花</a>
                                        <a href="">重金属</a>
                                        <a href="">彩虹王</a>
                                        <a href="">幻彩金花</a>
                                        <a href="">红马</a>
                                    </dd>
                                </dl>
                                <dl>
                                    <dt>
                                        <span class="cate-subtitle">虎鱼</span>
                                        <i class="iconfont icon-ic_arrow_r"></i>
                                    </dt>
                                    <dd>
                                        <a href="">泰国虎</a>
                                        <a href="">印尼虎</a>
                                        <a href="">北部泰国虎</a>
                                        <a href="">银虎</a>
                                        <a href="">新几内亚虎</a>
                                    </dd>
                                </dl>
                            </div>
                        </li>
                        <li class="category-item">

                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-middle"><a href="">首页</a></li>
            <li class="nav-middle"><a href="">慕宠闪购</a></li>
            <li class="nav-middle"><a href="">慕宠众筹</a></li>
            <li class="nav-middle"><a href="">预告</a></li>
        </ul>
    </div>
</div>


