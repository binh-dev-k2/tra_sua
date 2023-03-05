@extends('Frontend.default')

@section('content')
    <main class="main">
        <section class="intro-wrapper">
            <div class="swiper-container swiper-theme nav-inner pg-inner swiper-nav-lg animation-slider pg-xxl-hide pg-show nav-xxl-show nav-hide"
                data-swiper-options="{
            'slidesPerView': 1,
            'breakpoints': {
                '1500': {
                    'nav': true,
                    'dots': false
                }
            },
            'autoplay': {
                'delay': 8000,
                'disableOnInteraction': false
            }
        }">
                <div class="swiper-wrapper row gutter-no cols-1">
                    <div class="swiper-slide banner banner-fixed intro-slide intro-slide1"
                        style="background-image: url(https://bizweb.dktcdn.net/100/424/895/themes/817481/assets/slider_2.jpg?1653586880128); background-color: #434448;
                    background-color: #F7F8FA;">
                    </div>
                    <div class="swiper-slide banner banner-fixed intro-slide intro-slide"
                        style="background-image: url(https://bizweb.dktcdn.net/100/424/895/themes/817481/assets/slider_3.jpg?1653586880128); background-color: #434448;">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
                <button class="swiper-button-next"></button>
                <button class="swiper-button-prev"></button>
            </div>
        </section>
        <!-- End of Intro Wrapper  -->

        <section class="mt-10">
            <div class="container">
                <div class="row mx-auto">
                    <div class="col-md-6">
                        <div class="banner banner-fixed banner-lg br-sm">
                            <figure>
                                <a href="#">
                                    <img class="mb-2"
                                        src="https://bizweb.dktcdn.net/100/424/895/themes/817481/assets/banner2_1.jpg?1653586880128"
                                        alt="Banner" height="300" style="background-color: #828994" />
                                </a>
                            </figure>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="banner banner-fixed banner-md br-sm">
                            <figure>
                                <a href="#">
                                    <img class="mb-2"
                                        src="https://bizweb.dktcdn.net/100/424/895/themes/817481/assets/banner2_2.jpg?1653586880128"
                                        alt="Banner" height="300" style="background-color: #828994" />
                                </a>
                            </figure>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-10">
            <div class="hidden">
                <div class="container">
                    <div class="row mx-auto">
                        <div class="col-md-8 pl-0 pr-0">
                            <div class="row" style="margin-left: 4px">
                                <div class="col-md-6 pl-1 pr-1">
                                    <div class="mb-2"><a href="#"><img style="display: block"
                                                src="https://bizweb.dktcdn.net/100/424/895/themes/817481/assets/banner_1.jpg?1653586880128"
                                                alt=""></a></div>
                                </div>
                                <div class="col-md-6 pl-1 pr-1">
                                    <div class="mb-2"><a href="#"><img style="display: block"
                                                src="https://bizweb.dktcdn.net/100/424/895/themes/817481/assets/banner_2.jpg?1653586880128"
                                                alt=""></a></div>
                                </div>
                                <div class="col-md-6 pl-1 pr-1">
                                    <div class="mb-2"><a href="#"><img style="display: block"
                                                src="https://bizweb.dktcdn.net/100/424/895/themes/817481/assets/banner_3.jpg?1653586880128"
                                                alt=""></a></div>
                                </div>
                                <div class="col-md-6 pl-1 pr-1">
                                    <div class="mb-2"><a href="#"><img style="display: block"
                                                src="https://bizweb.dktcdn.net/100/424/895/themes/817481/assets/banner_4.jpg?1653586880128"
                                                alt=""></a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="col-md-12">
                                <a href="#">
                                    <img src="https://bizweb.dktcdn.net/100/424/895/themes/817481/assets/banner_5.jpg?1653586880128"
                                        alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="mt-10">
            <div class="container">
                <h3 class="text-center">ĐƯỢC ƯA THÍCH NHẤT</h3>
                <div class="row cols-xl-4 cols-lg-4 cols-sm-3 cols-2 mb-10 mx-auto">
                    <div class="p-4">
                        <div class="product product-simple text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="https://bizweb.dktcdn.net/thumb/grande/100/424/895/products/kem-dua-cocoo-nen2.png?v=1620205359000"
                                        alt="Product" width="200" height="200" />
                                </a>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Cho vào giỏ hàng">Mua
                                        hàng</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Cusual Handbag</a></h4>
                                <div class="product-price">
                                    <div class="price">
                                        <ins class="new-price">$90.63</ins><del class="old-price">$96.38</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Grid Item -->

                    <div class="p-4">
                        <div class="product product-simple text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="	https://bizweb.dktcdn.net/thumb/grande/100/424/895/products/kem-dua-cocoo-nen2.png?v=1620205359000"
                                        alt="Product" width="200" height="200" />
                                </a>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Cho vào giỏ hàng">Mua
                                        hàng</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Cusual Handbag</a></h4>
                                <div class="product-price">
                                    <div class="price">
                                        <ins class="new-price">$90.63</ins><del class="old-price">$96.38</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Grid Item -->

                    <div class="p-4">
                        <div class="product product-simple text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="	https://bizweb.dktcdn.net/thumb/grande/100/424/895/products/kem-dua-cocoo-nen2.png?v=1620205359000"
                                        alt="Product" width="200" height="200" />
                                </a>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Cho vào giỏ hàng">Mua
                                        hàng</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Cusual Handbag</a></h4>
                                <div class="product-price">
                                    <div class="price">
                                        <ins class="new-price">$90.63</ins><del class="old-price">$96.38</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Grid Item -->

                    <div class="p-4">
                        <div class="product product-simple text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="	https://bizweb.dktcdn.net/thumb/grande/100/424/895/products/kem-dua-cocoo-nen2.png?v=1620205359000"
                                        alt="Product" width="200" height="200" />
                                </a>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Cho vào giỏ hàng">Mua
                                        hàng</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Cusual Handbag</a></h4>
                                <div class="product-price">
                                    <div class="price">
                                        <ins class="new-price">$90.63</ins><del class="old-price">$96.38</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Grid Item -->
                    <div class="grid-space col-xl-4col col-1"></div>
                </div>
                <!-- End of Products 1 -->
            </div>
        </section>
        <!-- End of Container -->

        <section class="mt-10">
            <div class="container">
                <h3 class="text-center">SẢN PHẨM BÁN CHẠY</h3>
                <div class="row mx-auto">
                    <div class="col-md-3 col-sm-4 col-xs-6">
                        <div class="product product-simple text-center">
                            <figure class="product-media">
                                <a href="product-default.html">
                                    <img src="https://bizweb.dktcdn.net/thumb/grande/100/424/895/products/kem-dua-cocoo-nen2.png?v=1620205359000"
                                        alt="Product" width="200" height="200" />
                                </a>
                                <div class="product-action">
                                    <a href="#" class="btn-product btn-quickview" title="Cho vào giỏ hàng">Mua
                                        hàng</a>
                                </div>
                            </figure>
                            <div class="product-details">
                                <h4 class="product-name"><a href="product-default.html">Cusual Handbag</a></h4>
                                <div class="product-price">
                                    <div class="price">
                                        <ins class="new-price">$90.63</ins><del class="old-price">$96.38</del>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Products 1 -->
            </div>
        </section>
        <!-- End of Container -->

        <section class="section_about mb-10">
            <div class="grey-section pt-10 pb-5">
                <div class="container mt-2">
                    <h3 class="text-center">VỀ CHÚNG TÔI</h3>
                    <div class="row mx-auto">
                        <div class="col-md-6 d-flex flex-column justify-content-center pt-4 pb-4 pl-6 pr-6">
                            <h3 class="text-white">Trà sữa gì gì đấy</h3>
                            <div class="">Xuất phát từ một thức quà vặt dân dã mang hương vị truyền thống từ 80 năm
                                trước tại xứ dừa Côn Đảo,&nbsp;<strong>Kem dừa COCOO&nbsp;</strong>xuất hiện tại Hà Nội hứa
                                hẹn sẽ là một món giải khát CỰC HOT mùa hè này! </div>
                        </div>
                        <div class="col-md-6">
                            <div class="video-container">
                                <script type="text/javascript">
                                    document.write(
                                        "<iframe width='100%' height='100%' src='https://www.youtube.com/embed/3hHZXuysYdU' frameborder='0' allowfullscreen></iframe>"
                                    );
                                </script>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- End of Container -->
            </div>
        </section>
        <!-- Grey Section -->
    </main>
@endsection
