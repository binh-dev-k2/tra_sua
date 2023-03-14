<header class="header has-center">
    <div class="header-top">
        <div class="container">
            <div class="header-left mx-auto">
                <i class="w-icon-map-marker"></i>
                <p class="welcome-msg ml-1">Thái Nguyên </p>
            </div>
            <div class="header-right">
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">

            </div>
            <!-- End of Header Left -->

            <div class="header-center">
                <a href="{{ route('homepage') }}" class="logo ml-lg-0">
                    <img src="{{ asset('frontendpublic/assets/images/demos/demo10/header-logo.png') }}" alt="logo"
                        width="145" height="45" />
                </a>
            </div>
            <!-- End of Header Center -->

            <div class="header-right">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <span class="text-capitalize">Liên hệ:</span>
                        </h4>
                        <a href="tel:0123456789" class="phone-number font-weight-bolder ls-50">0123456789</a>
                    </div>
                </div>
                <div class="dropdown cart-dropdown mr-0 mr-lg-2">
                    <a href="{{ route('gio-hang.index') }}" class="cart-toggle label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count" style="right: 0"></span>
                        </i>
                        <span class="cart-label">Giỏ hàng</span>
                    </a>
                </div>
            </div>
            <!-- End of Header Right -->
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header has-dropdown">
        <div class="container">
            <div class="inner-wrap justify-content-center">
                <div class="header-left">
                    <nav class="main-nav ml-8">
                        <ul class="menu active-underline">
                            <li class="active">
                                <a href="{{ route('homepage') }}">Trang chủ</a>
                            </li>
                            <li>
                                <a href="shop-banner-sidebar.html">Sản phẩm</a>

                                <!-- Start of Megamenu -->
                                <ul>
                                    <li><a href="blog.html">Đồ ăn</a></li>
                                    <li><a href="blog-listing.html">Đồ uống</a></li>
                                </ul>
                                <!-- End of Megamenu -->
                            </li>
                            <li>
                                <a href="vendor-dokan-store.html">Giới thiệu</a>
                            </li>
                            <li>
                                <a href="blog.html">Liên hệ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Start of Mobile Menu -->
<div class="mobile-menu-wrapper">
    <div class="mobile-menu-overlay"></div>
    <!-- End of .mobile-menu-overlay -->

    <a href="#" class="mobile-menu-close"><i class="close-icon"></i></a>
    <!-- End of .mobile-menu-close -->

    <div class="mobile-menu-container scrollable">
        <form action="#" method="get" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Search"
                required />
            <button class="btn btn-search" type="submit">
                <i class="w-icon-search"></i>
            </button>
        </form>
        <!-- End of Search Form -->
        <div class="tab">
            <ul class="list-style-none pl-0">
                <li class="nav-item">
                    <a href="#main-menu" class="nav-link active">Main Menu</a>
                </li>
            </ul>
        </div>
        <div class="tab-content">
            <div class="tab-pane active" id="main-menu">
                <ul class="mobile-menu">
                    <li><a href="demo10.html">Home</a></li>
                    <li>
                        <a href="shop-banner-sidebar.html">Shop</a>
                        <ul>
                            <li><a href="blog.html">Classic</a></li>
                            <li><a href="blog-listing.html">Listing</a></li>
                            <li>
                                <a href="post-single.html">Single Post</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="vendor-dokan-store.html">Vendor</a>
                    </li>
                    <li>
                        <a href="blog.html">Blog</a>
                    </li>
                    <li>
                        <a href="about-us.html">Pages</a>
                    </li>
                </ul>
            </div>
            <div class="tab-pane" id="categories">
                <ul class="mobile-menu">
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-tshirt2"></i>Fashion
                        </a>
                    </li>
                    <li>
                        <a href="shop-fullwidth-banner.html">
                            <i class="w-icon-home"></i>Home & Garden
                        </a>
                    </li>
                    <li>
                        <a href="shop-banner-sidebar.html" class="font-weight-bold text-primary text-uppercase ls-25">
                            View All Categories<i class="w-icon-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End of Mobile Menu -->

