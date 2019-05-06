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
    @stack('head.scripts')
    @stack('head.styles')

    <!--end::Base Styles -->
    <link rel="shortcut icon" href="{{ asset('/asset/app/media/img/logos/favicon.ico')}}" />
    <meta name="google-site-verification" content="Rda4X-ni7CsAy_pqqFhXeRbf_WToW3o1vpnu5peqMp4" />
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

    </div>
    @include('layouts.analystics')
</body>


<!--begin::Base Scripts -->
<script src="{{ mix('/js/all.js') }}"></script>

<script src="{{asset('asset/demo/default/custom/components/calendar/basic.js')}}"></script>


<script src="{{asset('asset/demo/default/custom/crud/forms/widgets/select2.js')}}" type="text/javascript"></script>
<script src="{{asset('asset/demo/default/custom/crud/forms/widgets/bootstrap-touchspin.js')}}" type="text/javascript"></script>

<script src="{{ asset('asset/demo/default/custom/crud/wizard/wizard.js') }}" type="text/javascript"></script>


<script src="{{ asset('/js/vue.js') }}"></script>
<script src="{{ asset('/js/index.umd.js') }}"></script>
<script src="{{ asset('asset/app/js/manufacture.js') }}"></script>
<script src="{{ asset('asset/app/js/script.js') }}"></script>

<script src="{{ asset('/js/scripts.js') }}"></script>



@include('layouts.script')
@stack('footer.scripts')
<!--end::Base Scripts -->  

</html>
