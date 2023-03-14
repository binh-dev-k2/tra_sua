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
                                <h2 class="nk-block-title">Quản lý loại sản phẩm</h2>
                            </div>
                            <div class="nk-block-head-content">
                                <ul class="d-flex">
                                    <li><a href="{{ route('loaisanpham.create') }}" class="btn btn-primary btn-md"><em
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
                                        <th class="tb-col"><span class="overline-title">Tên loại sản phẩm</span></th>
                                        <th class="tb-col"><span class="overline-title">Số lượng sản phẩm</span></th>
                                        <th class="tb-col tb-col-md"><span class="overline-title">Mô tả</span></th>
                                        <th class="tb-col tb-col-end" data-sortable="false"><span
                                                class="overline-title">Hành động</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($loai_san_pham as $loai)
                                        <tr>
                                            <td class="tb-col">
                                                <div class="media-text"><a
                                                        href="{{ route('loaisanpham.edit', ['slug' => $loai->slug]) }}"
                                                        class="title">{{ $loai->ten_loai }}</a></div>
                                            </td>
                                            <td class="tb-col"><span>{{ $loai->getSanPham->count() }}</span></td>
                                            <td class="tb-col tb-col-md"><span>{{ $loai->mo_ta }}</span></td>
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
                                                                    <a href="{{ route('loaisanpham.edit', $loai->slug) }}">
                                                                        <em class="icon ni ni-edit"></em>
                                                                        <span>Sửa</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#xoasanpham">
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

                                        <div class="modal fade" id="xoasanpham" data-bs-keyboard="false" tabindex="-1"
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
                                                            action="{{ route('loaisanpham.destroy', ['slug' => $loai->slug]) }}">
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
