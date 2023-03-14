<div class="nk-sidebar nk-sidebar-fixed is-theme" id="sidebar">
    <div class="nk-sidebar-element nk-sidebar-head">
        <div class="nk-sidebar-brand">
            <a href="" class="logo-link">
                <div class="logo-wrap">Kho</div>
            </a>
            <div class="nk-compact-toggle me-n1"><button
                    class="btn btn-md btn-icon text-light btn-no-hover compact-toggle"><em
                        class="icon off ni ni-chevrons-left"></em><em class="icon on ni ni-chevrons-right"></em></button>
            </div>
            <div class="nk-sidebar-toggle me-n1"><button
                    class="btn btn-md btn-icon text-light btn-no-hover sidebar-toggle"><em
                        class="icon ni ni-arrow-left"></em></button></div>
        </div>
    </div>
    <div class="nk-sidebar-element nk-sidebar-body">
        <div class="nk-sidebar-content">
            <div class="nk-sidebar-menu" data-simplebar>
                <ul class="nk-menu">
                    <li class="{{ request()->is('admin/') ? 'active' : '' }}">
                        <a href="{{ route('dashboard') }}" class="nk-menu-link">
                            <span class="nk-menu-icon">
                                <em class="icon ni ni-home"></em>
                            </span>
                            <span class="nk-menu-text">Trang chủ</span>
                        </a>
                    </li>
                    @auth
                        <li class="{{ request()->is('admin/san-pham*') ? 'active' : '' }}">
                            <a href="{{ route('sanpham.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon">
                                    <em class="icon ni ni-package"></em>
                                </span><span class="nk-menu-text">Quản lý sản phẩm</span>
                            </a>
                        </li>

                        <li class="{{ request()->is('admin/loai-san-pham*') ? 'active' : '' }}"><a
                                href="{{ route('loaisanpham.index') }}" class="nk-menu-link"><span class="nk-menu-icon"><em
                                        class="icon ni ni-layers"></em></span><span class="nk-menu-text">Quản lý loại sản
                                    phẩm</span></a></li>

                        <li class="{{ request()->is('admin/don-hang*') ? 'active' : '' }}"><a href="{{ route('donhang.index') }}"
                                class="nk-menu-link"><span class="nk-menu-icon"><em
                                        class="icon ni ni-archive"></em></span><span class="nk-menu-text">Quản lý đơn hàng</span></a></li>

                        <li class="nk-menu-item"><a href="apps/todo/todo.html" class="nk-menu-link"><span
                                    class="nk-menu-icon"><em class="icon ni ni-users"></em></span><span
                                    class="nk-menu-text">Quản lý tài khoản</span></a></li>
                    @endauth
                </ul>
            </div>
        </div>
    </div>
</div>
