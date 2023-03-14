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
        <div class="page-content">
            <div class="container">
                <div class="row gutter-lg mb-10">
                    <div class="col-lg-8 pr-lg-4 mb-6">
                        <table class="shop-table cart-table">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail"><span>Ảnh</span></th>
                                    <th class="product-name"><span>Sản phẩm</span></th>
                                    <th class="product-size">Size</th>
                                    <th class="product-price"><span>Giá</span></th>
                                    <th class="product-quantity"><span>Số lượng</span></th>
                                    <th class="product-subtotal"><span>Thành tiền</span></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                        <div class="cart-action mb-6">
                            <a href="{{ url()->previous() }}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i
                                    class="w-icon-long-arrow-left"></i>Continue
                                Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-4 sticky-sidebar-wrapper">
                        <div class="sticky-sidebar">
                            <div class="cart-summary mb-4">
                                <form action="{{ route('gio-hang.create') }}" method="get" id="dat-hang">
                                    @csrf
                                    <h3 class="cart-title text-uppercase">Thanh toán</h3>

                                    <hr class="divider">

                                    <div class="shipping-calculator">

                                        <div class="shipping-calculator-form">
                                            <div class="form-group">
                                                <input class="form-control form-control-md ho-ten" type="text" placeholder="Họ tên" required>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md sdt" minlength="10" maxlength="10" type="text"
                                                    placeholder="Số điện thoại" required>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md" type="text" placeholder="Thái Nguyên" disabled>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md dia-chi" type="text" placeholder="Địa chỉ cụ thể" required>
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-md ghi-chu" type="text" placeholder="Ghi chú..." required>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="divider mb-6">
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Phí vận chuyển:</label>
                                        <span class="ls-50">15.000 VND</span>
                                    </div>
                                    <div class="order-total d-flex justify-content-between align-items-center">
                                        <label>Tổng tiền:</label>
                                        <span class="ls-50 result"></span>
                                    </div>

                                    <button class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
                                        Đặt hàng<i class="w-icon-long-arrow-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
@endsection

@section('script')
    <script src="{{ asset('frontendpublic/assets/vendor/sticky/sticky.js') }}"></script>
    <script src="{{ asset('frontendpublic/assets/js/main.min.js') }}"></script>

    <script>
        $(document).ready(async function() {
            const cart = JSON.parse(localStorage.getItem('cart'));
            const table = document.getElementsByTagName('tbody')[0];
            const token = '{{ csrf_token() }}'

            if (cart) {
                count = cart.reduce((acc, cur) => acc + cur.so_luong, 0) ?? 0
                localStorage.setItem('count', JSON.stringify(count));
                $('.cart-count').text(count);

                try {
                    const response = await $.ajax({
                        type: 'POST',
                        url: `{{ route('api.gio-hang.data') }}`,
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        data: JSON.stringify(cart)
                    });

                    response.forEach(e => {
                        const tr = document.createElement('tr')
                        tr.setAttribute('slug', e.slug)

                        let a = e.kich_co
                        let html = ""
                        for (let i = 0; i < a.length; i++) {
                            html += `<option value="${a[i]}">${a[i]}</option>`
                        }

                        tr.innerHTML =
                            `
                        <td class="product-thumbnail">
                            <div class="p-relative">
                                <a href="product-default.html">
                                    <figure>
                                        <img src="{{ asset('storage/images/sanpham/') }}/${e.anh_san_pham}"
                                            width="300" height="338">
                                    </figure>
                                </a>
                                <button type="submit" class="btn btn-close"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </td>
                        <td class="product-name">
                            <a href="product-default.html">${e.ten_san_pham}</a>
                        </td>
                        <td class="product-size">
                            <div>
                                <select class="size-select">
                                    ${html}
                                </select>
                            </div>
                        </td>
                        <td class="product-price"><span class="amount">${e.gia.toLocaleString('it-IT', {style : 'currency', currency : 'VND'})} </span></td>
                        <td class="product-quantity">
                            <div class="">
                                <input class="quantity" type="number" min="1" value="${e.so_luong}"
                                    max="100">
                                <button class="price plus w-icon-plus"></button>
                                <button class="price minus w-icon-minus"></button>
                            </div>
                        </td>
                        <td class="product-subtotal">
                            <span class="amount price-result"></span>
                        </td>
                    `
                        table.appendChild(tr)
                    });

                    let parent = table.querySelectorAll('tr')

                    parent.forEach(e => {
                        const amount = e.getElementsByClassName('product-subtotal')[0].getElementsByClassName('amount')[0];
                        let quantity = e.getElementsByClassName('quantity')[0].value
                        let price = e.querySelector('.product-price .amount').textContent

                        amount.textContent = (parseInt(quantity) * parseInt(price.replace(/\./g, '').replace(' VND', ''))).toLocaleString(
                            'it-IT', {
                                style: 'currency',
                                currency: 'VND'
                            });
                    })

                    let priceBtn = document.querySelectorAll('.price')
                    let amounts = document.querySelectorAll('.price-result')
                    let result = document.querySelector('.result')
                    let total = 0
                    amounts.forEach(e => {
                        const result = parseInt(e.textContent.replace(/\./g, '').replace(' VND', ''));
                        total += result
                    })
                    result.textContent = (total + 15000).toLocaleString('it-IT', {
                        style: 'currency',
                        currency: 'VND'
                    });

                    priceBtn.forEach(e => {
                        e.addEventListener('click', function() {
                            c(e);
                        });
                    })

                    let quantityPlusBtn = document.querySelectorAll('.plus')

                    quantityPlusBtn.forEach(e => {
                        e.addEventListener('click', function(event) {
                            const val = event.target.parentElement.querySelector('.quantity');
                            if (parseInt(val.value) < 100) {
                                val.value = parseInt(val.value) + 1 + "";
                                c(event.target);
                            }
                        });
                    });

                    let quantityMinusBtn = document.querySelectorAll('.minus')

                    quantityMinusBtn.forEach(e => {
                        e.addEventListener('click', function(event) {
                            const val = event.target.parentElement.querySelector('.quantity');
                            if (parseInt(val.value) > 1) {
                                val.value = parseInt(val.value) - 1 + "";
                                c(event.target);
                            }
                        });
                    });

                    let removeBtn = document.querySelectorAll('.btn-close')

                    removeBtn.forEach(e => e.onclick = function(event) {
                        const parent = event.target.closest('tr')
                        let index = cart.findIndex(x => x.slug === parent.getAttribute('slug'))
                        cart.splice(index, 1)
                        localStorage.setItem('cart', JSON.stringify(cart))
                        parent.remove()

                        let amounts = document.querySelectorAll('.price-result')
                        let result = document.querySelector('.result')
                        let total = 0
                        amounts.forEach(e => {
                            const result = parseInt(e.textContent.replace(/\./g, '').replace(' VND', ''));
                            total += result
                        })
                        result.textContent = (15000 + total).toLocaleString('it-IT', {
                            style: 'currency',
                            currency: 'VND'
                        });

                        count = cart.reduce((acc, cur) => acc + cur.so_luong, 0);
                        localStorage.setItem('count', JSON.stringify(count));
                        $('.cart-count').text(count);
                    })


                    function c(e) {
                        const parent = e.closest('tr')
                        const amount = parent.querySelector('.product-subtotal .amount')
                        const quantity = e.parentElement.querySelector('.quantity').value
                        const price = parent.querySelector('.product-price .amount').textContent
                        const result = document.querySelector('.result')
                        const amounts = document.querySelectorAll('.price-result')

                        amount.textContent = (parseInt(quantity) * parseInt(price.replace(/\./g, '').replace(' VND', ''))).toLocaleString('it-IT', {
                            style: 'currency',
                            currency: 'VND'
                        });

                        let cart = JSON.parse(localStorage.getItem('cart'))
                        let index = cart.findIndex(x => x.slug === parent.getAttribute('slug'))
                        cart[index].so_luong = quantity
                        localStorage.setItem('cart', JSON.stringify(cart))

                        let total = 0
                        amounts.forEach(e => {
                            const result = parseInt(e.textContent.replace(/\./g, '').replace(' VND', ''));
                            total += result
                        })
                        result.textContent = (15000 + total).toLocaleString('it-IT', {
                            style: 'currency',
                            currency: 'VND'
                        });

                        count = cart.reduce((acc, cur) => acc + cur.so_luong, 0);
                        localStorage.setItem('count', JSON.stringify(count));
                        $('.cart-count').text(count);
                    }

                } catch (error) {
                    console.log(error);
                }

            }

            const formDatHang = document.getElementById('dat-hang')

            formDatHang.onsubmit = function(e) {
                e.preventDefault()
                const tongtien = document.getElementsByClassName('result')[0].textContent
                const tongTien = parseInt(tongtien.replace(/\./g, '').replace(' VND', ''))
                const tbody = document.getElementsByTagName('tbody')[0]
                const sanpham = tbody.querySelectorAll('tr')
                const ho_ten = document.getElementsByClassName('ho-ten')[0].value
                const sdt = document.getElementsByClassName('sdt')[0].value
                const dia_chi = document.getElementsByClassName('dia-chi')[0].value
                const ghi_chu = document.getElementsByClassName('ghi-chu')[0].value


                let sanPham = [{
                    ho_ten: ho_ten,
                    sdt: sdt,
                    dia_chi: dia_chi,
                    tong_tien: tongTien,
                    ghi_chu: ghi_chu,
                }]

                sanpham.forEach(e => {
                    const slug = e.getAttribute('slug')
                    const ten_san_pham = e.querySelector('.product-name a').textContent
                    const size_san_pham = e.querySelector('.size-select').value
                    const sl_san_pham = e.querySelector('.product-quantity .quantity').value
                    const thanh_tien = e.querySelector('.product-subtotal .price-result').textContent
                    const thanhTien = parseInt(thanh_tien.replace(/\./g, '').replace(' VND', ''))
                    const gia = e.querySelector('.product-price .amount').textContent
                    const _gia = parseInt(gia.replace(/\./g, '').replace(' VND', ''))

                    sanPham.push({
                        slug: slug,
                        ten_san_pham: ten_san_pham,
                        size: size_san_pham,
                        so_luong: sl_san_pham,
                        gia: _gia,
                        thanh_tien: thanhTien
                    })
                })

                localStorage.setItem('checkout', JSON.stringify(sanPham));
                formDatHang.submit()
            }
        });
    </script>
@endsection
