<!-- Swiper -->
<div class="carousel">
    <div class="swiper-container">
        <ul class="swiper-wrapper">
            <li style="background-color: red" class="swiper-slide"><a class="big"
                                                                      href="">{{--<img src="{{ asset('imgs/1.jpg') }}" alt="">--}}</a>
            </li>
            <li style="background-color: yellow" class="swiper-slide"><a class="big"
                                                                         href="">{{--<img src="{{ asset('imgs/2.jpg') }}" alt="">--}}</a>
            </li>
            <li style="background-color: blue" class="swiper-slide"><a class="big"
                                                                       href="">{{--<img src="{{ asset('imgs/3.jpg') }}" alt="">--}}</a>
            </li>
            <li style="background-color: green" class="swiper-slide"><a class="big"
                                                                        href="">{{--<img src="{{ asset('imgs/4.jpg') }}" alt="">--}}</a>
            </li>
            <li style="background-color: pink" class="swiper-slide"><a class="big"
                                                                        href="">{{--<img src="{{ asset('imgs/5.jpg') }}" alt="">--}}</a>
            </li>
            <li style="background-color: gray" class="swiper-slide"><a class="big"
                                                                       href="">{{--<img src="{{ asset('imgs/6.jpg') }}" alt="">--}}</a>
            </li>
        </ul>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next hide"></div>
        <div class="swiper-button-prev hide"></div>
    </div>
</div>

@section('footer')
    <!-- Swiper JS -->
    <script type="text/javascript" src="{{ asset('libs/swiper/js/swiper.min.js') }}"></script>
    <!-- Initialize Swiper -->
    <script>
        var mySwiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            loop: true,         //循环
            autoplay: {
                delay: 3000,    //3秒自动切换一次
            },
            pagination: {       //分页
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {       //左右按钮
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
                hideOnClick: true,
                hiddenClass: 'my-button-hidden',
            },
        });
        //鼠标覆盖停止自动切换
        $(".swiper-slide").mouseover(function (){
            mySwiper.autoplay.stop();
            mySwiper.navigation.$nextEl.removeClass('hide');
            mySwiper.navigation.$prevEl.removeClass('hide');
        }).mouseout(function (){
            mySwiper.autoplay.start();
            mySwiper.navigation.$nextEl.addClass('hide');
            mySwiper.navigation.$prevEl.addClass('hide');
        });
        $('.swiper-button-next, .swiper-button-prev').mouseover(function () {
            mySwiper.navigation.$nextEl.removeClass('hide');
            mySwiper.navigation.$prevEl.removeClass('hide');
        })
    </script>
@stop