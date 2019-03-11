<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif @yield('title', config('app.name'))</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
      WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>
    <!--end::Web font -->
    <!--begin::Base Styles -->  
    <!--begin::Page Vendors -->
    <link href="../../../asset/vendors/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors -->
    <link href="../../../asset/vendors/base/vendors.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../../../asset/demo/default/base/style.bundle.css" rel="stylesheet" type="text/css" />
    <link href="../../../css/leftsidebar.css" rel="stylesheet" type="text/css" />

    <!--end::Base Styles -->
    <link rel="shortcut icon" href="../../../asset/demo/default/media/img/logo/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<!-- end::Head -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <!-- Header -->
        @include('admin.layouts.header')
                                                                                
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            @include('admin.layouts.leftsidebar')
            <!-- Main Content -->
            @yield('content')

        </div>
        <!-- Footer -->
        <!-- begin::Scroll Top -->
        <div class="m-scroll-top m-scroll-top--skin-top" data-toggle="m-scroll-top" data-scroll-offset="500" data-scroll-speed="300">
            <i class="la la-arrow-up"></i>
        </div>
        <!-- end::Scroll Top -->                                                                                                
    </div>
</body>
<!--begin::Base Scripts -->
<script src="{{asset('asset/vendors/base/vendors.bundle.js')}}"></script>
<script src="{{asset('asset/demo/default/base/scripts.bundle.js')}}"></script>
<script src="{{asset('asset/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('asset/demo/default/custom/components/calendar/basic.js')}}"></script>
<!--end::Base Scripts -->  

</html>
