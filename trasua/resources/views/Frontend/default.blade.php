<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('frontendpublic/assets/images/icons/favicon.png') }}">


    <!-- Vendor CSS -->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontendpublic/assets/vendor/fontawesome-free/css/all.min.css') }}">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{ asset('frontendpublic/assets/vendor/swiper/swiper-bundle.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('frontendpublic/assets/vendor/magnific-popup/magnific-popup.min.css') }}">

    <!-- Default CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontendpublic/assets/css/demo10.min.css') }}">

    @yield('style')
</head>
</head>

<body class="home">
    <div class="page-wrapper">
        @include('Frontend.parts.header')

        @yield('content')

        @include('Frontend.parts.footer')
    </div>


    <script src="{{ asset('frontendpublic/assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontendpublic/assets/vendor/jquery.plugin/jquery.plugin.min.js') }}"></script>
    <script src="{{ asset('frontendpublic/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('frontendpublic/assets/vendor/jquery.countdown/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontendpublic/assets/vendor/zoom/jquery.zoom.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('frontendpublic/assets/js/main.min.js') }}"></script>

    <script>
        // Tìm tất cả các nút sản phẩm và thêm sự kiện click
        let count = JSON.parse(localStorage.getItem('count')) || 0;
        $('.cart-count').text(count);

        $('.btn-product').on('click', function() {
            // Tìm sản phẩm tương ứng
            const product = $(this).closest('.product');
            const productName = product.find('.product-name a').text();
            const slug = product.find('.slug').val();

            // Tìm giỏ hàng hiện tại trong localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Tìm sản phẩm trong giỏ hàng
            const existingProduct = cart.find(product => product.slug === slug);

            if (existingProduct) {
                // Tăng số lượng sản phẩm lên 1 nếu sản phẩm đã có trong giỏ hàng
                existingProduct.so_luong += 1;
            } else {
                // Thêm sản phẩm mới vào giỏ hàng nếu chưa có trong giỏ hàng
                cart.push({
                    ten_san_pham: productName,
                    slug: slug,
                    so_luong: 1
                });
            }

            // Lưu lại giỏ hàng mới vào localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Tính lại tổng số lượng sản phẩm trong giỏ hàng
            count = cart.reduce((acc, cur) => acc + cur.so_luong, 0);
            // Lưu lại số lượng sản phẩm vào localStorage và cập nhật hiển thị trên giao diện
            localStorage.setItem('count', JSON.stringify(count));
            $('.cart-count').text(count);
        });
    </script>
    @yield('script')
</body>

</html>
