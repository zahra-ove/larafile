<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.head')
</head>

<body class="preload home1 mutlti-vendor">

<!-- ================================
START MENU AREA
================================= -->
<!-- start menu-area -->
    @include('layout.header')
<!-- end /.menu-area -->
<!--================================
END MENU AREA
=================================-->

    {{-- @include('layout.notifications'); --}}

    @yield('content')

<!--================================
START FOOTER AREA
=================================-->
    @include('layout.footer')
<!--================================
END FOOTER AREA
=================================-->

    <!--js links-->

    @include('layout.scripts')

    <!--sweet alert -->
    {{-- @include('sweetalert::alert') --}}

<!-- end of js links -->
</body>


</html>
