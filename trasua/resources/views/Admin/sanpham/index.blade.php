@extends('Admin.default')

@section('style')
@endsection

@section('content')
    <div class="nk-content">
        <div class="container">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head">
                        <div class="nk-block-head-between flex-wrap gap g-2">
                            <div class="nk-block-head-content">
                                <h2 class="nk-block-title">Quản lý sản phẩm</h2>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="d-flex">
                                    <li><a href="{{ route('sanpham.create') }}" class="btn btn-primary btn-md"><em
                                                class="icon ni ni-plus"></em><span>Thêm</span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="card">
                            <table class="datatable-init table" data-nk-container="table-responsive">
                                <thead class="table-light">
                                    <tr>
                                        <th class="tb-col"><span class="overline-title">Tên sản phẩm</span></th>
                                        <th class="tb-col tb-col-md"><span class="overline-title">Loại</span></th>
                                        <th class="tb-col tb-col-md"><span class="overline-title">Size</span></th>
                                        <th class="tb-col"><span class="overline-title">Số lượng</span></th>
                                        <th class="tb-col"><span class="overline-title">Giá gốc</span></th>
                                        <th class="tb-col tb-col-md"><span class="overline-title">Giá bán</span></th>
                                        <th class="tb-col tb-col-md"><span class="overline-title">Trạng thái</span></th>
                                        <th class="tb-col tb-col-end" data-sortable="false"><span
                                                class="overline-title">Hành động</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($san_pham as $sp)
                                        <tr>
                                            <td class="tb-col">
                                                <div class="media-group">
                                                    <div class="media media-lg media-middle tb-col-md" style="width: 5rem; height: 5rem"><img
                                                            src="{{ asset('storage/images/sanpham/' . $sp->anh_san_pham) }}"
                                                            alt="img"></div>
                                                    <div class="media-text"><a href="{{ route('sanpham.edit', ['slug' => $sp->slug]) }}"
                                                            class="title">{{ $sp->ten_san_pham }}</a></div>
                                                </div>
                                            </td>
                                            <td class="tb-col tb-col-md"><span>{{ $sp->getLoaiSanPham->ten_loai }}</span></td>
                                            @php
                                                $data = json_decode($sp->kich_co);
                                                $a = "";
                                                foreach ($data as $value) {
                                                    $a .= $sp->getKichCo($value)->ten . "  ";
                                                }
                                            @endphp

                                            <td class="tb-col tb-col-md"><span>{{ $a }}</span></td>
                                            <td class="tb-col"><span>{{ $sp->so_luong }}</span></td>
                                            <td class="tb-col tb-col-md"><span>{{ $sp->gia_goc }}</span></td>
                                            <td class="tb-col"><span>{{ $sp->gia }}</span></td>
                                            <td class="tb-col"><span>{{ $sp->getTrangThai->ten_trang_thai }}</span></td>
                                            <td class="tb-col tb-col-end">
                                                <div class="dropdown">
                                                    <a href="#" class="btn btn-sm btn-icon btn-zoom me-n1"
                                                        data-bs-toggle="dropdown">
                                                        <em class="icon ni ni-more-v"></em>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-end">
                                                        <div class="dropdown-content py-1">
                                                            <ul class="link-list link-list-hover-bg-primary link-list-md">
                                                                <li>
                                                                    <a href="{{ route('sanpham.edit', $sp->slug) }}">
                                                                        <em class="icon ni ni-edit"></em>
                                                                        <span>Sửa</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#xoasp">
                                                                        <em class="icon ni ni-trash"></em>
                                                                        <span>Xóa</span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>

                                        <div class="modal fade" id="xoasp" data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="scrollableLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-top">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="scrollableLabel">Bạn
                                                            chắc chắc muốn xóa?
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">Đồng ý
                                                        nghĩa là bạn muốn xóa toàn
                                                        bộ dữ liệu liên quan đến
                                                        loại sản phẩm này!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Đóng</button>
                                                        <form method="POST"
                                                            action="{{ route('sanpham.destroy', ['slug' => $sp->slug]) }}">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class="btn btn-sm btn-primary">Đồng
                                                                ý</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection
