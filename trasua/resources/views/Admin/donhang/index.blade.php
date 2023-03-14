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
                                <h2 class="nk-block-title">Quản lý đơn hàng</h2>
                            </div>
                            <div class="nk-block-head-content">
                            </div>
                        </div>
                    </div>
                    <div class="nk-block">
                        <div class="card">
                            <table class="datatable-init table" data-nk-container="table-responsive">
                                <thead class="table-light">
                                    <tr>
                                        <th class="tb-col"><span class="overline-title">Mã đơn</span></th>
                                        <th class="tb-col"><span class="overline-title">Khách hàng</span></th>
                                        <th class="tb-col"><span class="overline-title">Ngày đặt</span></th>
                                        <th class="tb-col tb-col-md"><span class="overline-title">Liên hệ</span></th>
                                        <th class="tb-col"><span class="overline-title">Trạng thái</span></th>
                                        <th class="tb-col tb-col-end" data-sortable="false"><span
                                                class="overline-title">Hành động</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($don_hang as $dh)
                                        <tr>
                                            <td class="tb-col"><span>#{{ $dh->id }}</span></td>
                                            <td class="tb-col"><span>#{{ $dh->ten_khach }}</span></td>
                                            <td class="tb-col"><span>#{{ $dh->ngay_dat_hang }}</span></td>
                                            <td class="tb-col tb-col-md"><span>{{ $dh->sdt }}</span></td>
                                            <td class="tb-col"><span>{{ $dh->getTrangThai->ten_trang_thai }}</span></td>
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
                                                                    <a href="{{ route('donhang.store', $dh->id) }}">
                                                                        <em class="icon ni ni-edit"></em>
                                                                        <span>Đã nhận hàng</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#xoadonhang">
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

                                        <div class="modal fade" id="xoadonhang" data-bs-keyboard="false" tabindex="-1"
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
                                                        đơn hàng này!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-bs-dismiss="modal">Đóng</button>
                                                        <form method="POST"
                                                            action="{{ route('donhang.destroy', $dh->id) }}">
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
