
<!doctype html>
<html lang="en">

<head>
    @include('admin.partials.css-link')
</head>

<body class=" layout-fluid">
    <script src="{{ asset('backend/dist') }}/js/demo-theme.min.js?1684106062"></script>
    <div class="page">
            @include('admin.partials.sidebar')
        <div class="page-wrapper">
            <!-- Page header -->
            @include('admin.partials.header')
            <!-- Page body -->
            <div class="page-body">
                <div class="container-xl">
                     @yield('admin')
                </div>
            </div>
            @include('admin.partials.footer')
        </div>
    </div>

    @include('admin.partials.script')

</html>
