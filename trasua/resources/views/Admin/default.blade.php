<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? "Quản lý" }}</title>

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="shortcut icon" href="{{ asset('adminpublic/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('adminpublic/assets/css/style8a4f.css?v1.1.0') }}">
    <link rel="stylesheet" href="{{ asset('adminpublic/assets/css/libs/editors/quill8a4f.css?v1.1.0') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/jquery.dataTables.min.css"
        integrity="sha512-1k7mWiTNoyx2XtmI96o+hdjP8nn0f3Z2N4oF/9ZZRgijyV4omsKOXEnqL1gKQNPy2MTSP9rIEWGcH/CInulptA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    @yield('style')
</head>

<body class="nk-body" data-sidebar-collapse="lg" data-navbar-collapse="lg">
    <div class="nk-app-root">
        <div class="nk-main">
            @include('Admin.parts.sidebar')

            <div class="nk-wrap">
                @include('Admin.parts.header')

                <div class="nk-content">
                    @if (session('status'))
                        <div class="alert alert-{{ session('type') }}" id="{{ session('type') }}">
                            {{ session('status') }}
                        </div>
                        <script>
                            setTimeout(function() {
                                document.getElementById("{{ session('type') }}").style.display = "none";
                            }, 5000); // 5000 milliseconds = 5 seconds
                        </script>
                    @endif

                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"
        integrity="sha512-BkpSL20WETFylMrcirBahHfSnY++H2O1W+UnEEO4yNIl+jI2+zowyoGJpbtk6bx97fBXf++WJHSSK2MV4ghPcg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('adminpublic/assets/js/libs/editors/quill.js') }}"></script>
    <script src="{{ asset('adminpublic/assets/js/bundle.js') }}"></script>
    <script src="{{ asset('adminpublic/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('adminpublic/assets/js/charts/analytics-chart.js') }}"></script>
    <script src="{{ asset('adminpublic/assets/js/data-tables/data-tables.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
        integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @yield('script')
</body>

</html>
