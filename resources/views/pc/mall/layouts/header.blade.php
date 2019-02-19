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