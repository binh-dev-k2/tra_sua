<div class="nk-header nk-header-fixed">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-header-logo ms-n1">
                <div class="nk-sidebar-toggle"><button class="btn btn-sm btn-icon btn-zoom sidebar-toggle d-sm-none"><em
                            class="icon ni ni-menu"></em></button><button
                        class="btn btn-md btn-icon btn-zoom sidebar-toggle d-none d-sm-inline-flex"><em
                            class="icon ni ni-menu"></em></button></div>

                <a href="index-2.html" class="logo-link">
                    <div class="logo-wrap">

                    </div>
                </a>
            </div>
            @auth
            <nav class="nk-header-menu nk-navbar"></nav>


                <div class="nk-header-tools">
                    <ul class="nk-quick-nav ms-2">
                        <li><button class="btn btn-icon btn-sm btn-zoom d-sm-none" data-bs-toggle="offcanvas"
                                data-bs-target="#notificationOffcanvas"><em class="icon ni ni-bell"></em></button>
                            <button class="btn btn-icon btn-md btn-zoom d-none d-sm-inline-flex" data-bs-toggle="offcanvas"
                                data-bs-target="#notificationOffcanvas"><em class="icon ni ni-bell"></em></button>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown">
                                <div class="d-sm-none">
                                    <div class="media media-md media-circle"><img src="adminpublic/images/avatar/a.jpg" alt=""
                                            class="img-thumbnail"></div>
                                </div>
                                <div class="d-none d-sm-block">
                                    <div class="media media-circle"><img src="adminpublic/images/avatar/a.jpg" alt=""
                                            class="img-thumbnail"></div>
                                </div>
                            </a>

                            <div class="dropdown-menu dropdown-menu-md">
                                <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                    <div class="media-group">
                                        <div class="media media-xl media-middle media-circle"><img
                                                src="{{ asset('adminpublic/images/avatar/a.jpg') }}" alt=""
                                                class="img-thumbnail">
                                        </div>
                                        <div class="media-text">
                                            <div class="lead-text">{{ Auth::user()->name }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-content dropdown-content-x-lg py-3 border-bottom border-light">
                                    <ul class="link-list">
                                        <li><a href="profile.html"><em class="icon ni ni-user"></em>
                                                <span>My Profile</span></a></li>
                                    </ul>
                                </div>
                                <div class="dropdown-content dropdown-content-x-lg py-3">
                                    <ul class="link-list">
                                        <li><a href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <em class="icon ni ni-signout"></em>
                                                <span>Log Out</span></a></li>
                                    </ul>
                                </div>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        {{-- @endguest --}}
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</div>
