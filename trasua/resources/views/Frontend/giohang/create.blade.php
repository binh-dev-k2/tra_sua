@extends('Frontend.default')

@section('style')
    <link rel="stylesheet" type="text/css" href="{{ asset('frontendpublic/assets/css/style.min.css') }}">
@endsection

@section('content')
    <main class="main cart">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav">
            <div class="container">
                <ul class="breadcrumb shop-breadcrumb bb-no">
                    <li class="active"><a href="{{ route('gio-hang.index') }}">Giỏ hàng</a></li>
                    <li aria-current="page">Đơn hàng</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content mb-10 pb-2">
            <div class="container">
                <div class="order-success text-center font-weight-bolder text-dark">
                    <i class="fas fa-check"></i>
                    Đặt hàng thành công. <br />Bạn sẽ được liên lạc trong ít phút để xác nhận đơn hàng!
                </div>
                <!-- End of Order Success -->

                <div class="order-details-wrapper mt-5 mb-5">
                    <h4 class="title text-uppercase ls-25 mb-5">Thông tin đơn hàng</h4>
                    <table class="order-table">
                        <thead>
                            <tr>
                                <th class="text-dark">Sản phẩm</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Phí vận chuyển:</th>
                                <td>15.000 VND</td>
                            </tr>
                            <tr class="total">
                                <th class="border-no" style="font-weight: 600; color: black; font-size: 20px">Tổng tiền:</th>
                                <td class="border-no total-price" style="font-weight: 600; color: black; font-size: 20px"></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- End of Order Details -->

                <div id="account-addresses">
                    <div class="row">
                        <div class="col mb-8">
                            <div class="ecommerce-address billing-address">
                                <h4 class="title title-underline ls-25 font-weight-bold">Thông tin khách hàng</h4>
                                <address class="mb-4">
                                    <table class="address-table">
                                        <tbody>
                                            <tr>
                                                <td>Họ tên: <span class="user-name"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Số điện thoại: <span class="user-phone"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Địa chỉ: <span class="user-address"></span></td>
                                            </tr>
                                            <tr>
                                                <td>Ghi chú: <span class="user-note"></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Account Address -->


                <div class="sub-orders mb-10">
                    <h4 class="title mb-5 font-weight-bold ls-25">Lưu ý</h4>
                    <div class="alert alert-icon alert-inline mb-5">
                        <i class="w-icon-exclamation-triangle"></i>
                        <strong>Note: </strong>Hãy chụp lại đơn hàng này để được xác nhận khi giao hàng.
                    </div>
                </div>
                <!-- End of Sub Orders-->

                <a href="#" class="btn btn-dark btn-rounded btn-icon-left btn-back mt-6"><i class="w-icon-long-arrow-left"></i>Tiếp tục mua hàng</a>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
@endsection

@section('script')
    <script src="{{ asset('frontendpublic/assets/vendor/sticky/sticky.js') }}"></script>
    <script src="{{ asset('frontendpublic/assets/js/main.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            const checkout = JSON.parse(localStorage.getItem('checkout')) || []
            const token = '{{ csrf_token() }}'

            if (checkout) {
                $.ajax({
                    url: `{{ route('api.gio-hang.store') }}`,
                    method: "POST",
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': token
                    },
                    data: JSON.stringify(checkout),
                    success: function(response) {
                        console.log(response);
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        // Xử lý lỗi ở đây
                    }
                });

                localStorage.removeItem('count')
                localStorage.removeItem('cart')
                $('.cart-count').text(0);

                const table = document.getElementsByClassName('order-table')[0]
                const user_name = document.getElementsByClassName('user-name')[0]
                const user_phone = document.getElementsByClassName('user-phone')[0]
                const user_address = document.getElementsByClassName('user-address')[0]
                const total_price = document.getElementsByClassName('total-price')[0]
                const user_note = document.getElementsByClassName('user-note')[0]

                user_name.textContent = checkout[0].ho_ten
                user_phone.textContent = checkout[0].sdt
                user_address.textContent = checkout[0].dia_chi
                total_price.textContent = checkout[0].tong_tien.toLocaleString('it-IT', {
                    style: 'currency',
                    currency: 'VND'
                });
                user_note.textContent = checkout[0].ghi_chu

                const tbody = table.getElementsByTagName('tbody')[0]
                for (let i = 1; i < checkout.length; i++) {
                    const tr = document.createElement('tr')
                    tr.setAttribute('slug', checkout[i].slug)
                    const tien = checkout[i].thanh_tien.toLocaleString('it-IT', {
                        style: 'currency',
                        currency: 'VND'
                    })

                    tr.innerHTML =
                        `
                    <td>
                        <a href="#" class="prd-name">${checkout[i].ten_san_pham}</a>&nbsp;<strong class="prd-quantity">x ${checkout[i].so_luong}</strong><br>
                        Size : <span class="prd-size">${checkout[i].size}</span>
                    </td>
                    <td class="prd-price">${tien}</td>
                `
                    tbody.appendChild(tr)
                }
            }
        })
    </script>
@endsection
