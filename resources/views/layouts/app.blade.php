<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>2HEX | Products</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <link href="../../../css/style.css" rel="stylesheet" type="text/css" />

    <!--end::Base Styles -->
    <link rel="shortcut icon" href="../../../asset/app/media/img/logos/favicon.ico" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<!-- end::Head -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" signed="{{Auth::User()?1:0}}">
    
    <div class="m-grid m-grid--hor m-grid--root m-page" id="app">
        <!-- Header -->
        @include('layouts.header')
                                                                                
        <div id="app" class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            @include('layouts.menuleft')
            <!-- Main Content -->
            @yield('content')

        </div>
        <!-- Footer -->
        <!-- begin::Scroll Top -->
        @include('layouts.footer')
        @include('layouts.quickside')
        <!-- end::Scroll Top -->        

    </div>
    @include('layouts.analystics')
</body>

<!--begin::Base Scripts -->
<script src="{{asset('asset/vendors/base/vendors.bundle.js')}}"></script>
<script src="{{asset('asset/demo/default/base/scripts.bundle.js')}}"></script>



<script src="{{asset('asset/vendors/custom/fullcalendar/fullcalendar.bundle.js')}}"></script>
<script src="{{asset('asset/demo/default/custom/components/calendar/basic.js')}}"></script>


<script src="{{asset('asset/demo/default/custom/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
<script src="{{asset('asset/demo/default/custom/crud/forms/widgets/bootstrap-touchspin.js')}}" type="text/javascript"></script>

<script src="{{asset('asset/demo/default/custom/crud/wizard/wizard.js')}}" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/merge-images"></script>
    <script src="{{asset('asset/app/js/manufacture.js')}}"></script>
    <script src="{{asset('asset/app/js/script.js')}}"></script>

    @include('layouts.script')
<!--end::Base Scripts -->  

</html>
