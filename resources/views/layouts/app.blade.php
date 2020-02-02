<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>@yield('title', '2HEX | Products')</title>
    @stack('head.meta')
    <meta name="author" content="{{ config('meta.defaults.author', '2HEX Skateboard Manufacturer') }}">
    <meta name="google-site-verification" content="Rda4X-ni7CsAy_pqqFhXeRbf_WToW3o1vpnu5peqMp4" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="{{ asset('/js/webfont.js') }}"></script>
    <script>
      WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>
    <script src="{{ asset('/js/jquery.min.js') }}"></script>

    <link rel="stylesheet" type="text/css" href="{{ mix('/css/bundle.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('/css/all.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ mix('/mix/css/app.css') }}">
    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{ asset('/asset/app/media/img/logos/favicon.ico')}}" />
    <style> 
        .filter_body{
            padding-left: 30px;
        }
        .filter_body .row{
            margin-top: 0px;
        }
        .m-timeline-2:before{
            left: 8.09rem;
        }
        .m-timeline-2 .m-timeline-2__items .m-timeline-2__item .m-timeline-2__item-cricle{
            left: 7.3rem;
        }
        .m-timeline-2 .m-timeline-2__items .m-timeline-2__item .m-timeline-2__item-text{
            padding-left: 8.2rem;
            padding-right: 10px;
        }
        #production_filter{
            margin-bottom: 20px;
        }
        .proccess_bar{
            width: 100%;
            height: 2px;
            margin-bottom: 10px;
            background: #e9ecef;
        }
        .proccess_percent{
            height: 100%;
            background-color: #36a3f7;
            width: 1%;
        }
        .datepicker{
            width: 265px;
        }
        .paid{
            color: green;
        }
        .post-forms{
            width: 100%;
        }
    </style>
    @stack('head.scripts')
    @stack('head.styles')

</head>
<!-- end::Head -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" signed="{{Auth::User()?1:0}}">
    
    <div class="m-grid m-grid--hor m-grid--root m-page" id="app">


        <!-- Header -->
        @include('layouts.header')
                                                                                
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            @include('layouts.menuleft')
            <!-- Main Content -->
            @yield('content')

        </div>
        <!-- Footer -->
        <!-- begin::Scroll Top -->
        @include('layouts.footer')
        @include('layouts.quickside')
        <!-- end::Scroll Top -->        

        <notifications :duration="3000" group="main" />
    </div>

    @include('layouts.analystics')

</body>


<!--begin::Base Scripts -->


<script src="{{asset('asset/demo/default/custom/components/calendar/basic.js')}}"></script>


<script src="{{asset('asset/demo/default/custom/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
<script src="{{asset('asset/demo/default/custom/crud/forms/widgets/bootstrap-touchspin.js')}}" type="text/javascript"></script>

<script src="{{ asset('asset/demo/default/custom/crud/wizard/wizard.js') }}" type="text/javascript"></script>


<!-- <script src=" asset('/js/vue.js') }}"></script> -->
<script src="{{ asset('/js/index.umd.js') }}"></script>
<!-- <script src=" asset('asset/app/js/manufacture.js') }}"></script> -->
<!-- <script src="{{ asset('asset/app/js/script.js') }}"></script> -->

<script src="{{ mix('/mix/all.js') }}"></script>

<script src="{{ mix('/mix/manifest.js') }}"></script>
<script src="{{ mix('/mix/vendor.js') }}"></script>
<script src="{{ mix('/mix/app.js') }}"></script>

{{-- @include('layouts.script') --}}

@stack('footer.scripts')
<!--end::Base Scripts -->  

</html>