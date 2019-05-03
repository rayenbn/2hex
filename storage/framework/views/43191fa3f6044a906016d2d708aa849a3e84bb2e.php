<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->
<head>
    <meta charset="utf-8" />
    <title>2HEX | Products</title>
    <meta name="description" content="Latest updates and statistic charts">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--begin::Web font -->
    <script src="<?php echo e(asset('/js/webfont.js')); ?>"></script>
    <script>
      WebFont.load({
        google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
        active: function() {
            sessionStorage.fonts = true;
        }
      });
    </script>
    <script src="<?php echo e(asset('/js/jquery.min.js')); ?>"></script>

    <link rel="stylesheet" type="text/css" href="<?php echo e(mix('/css/bundle.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(mix('/css/all.css')); ?>">
    <?php echo $__env->yieldPushContent('head.scripts'); ?>
    <?php echo $__env->yieldPushContent('head.styles'); ?>

    <!--end::Base Styles -->
    <link rel="shortcut icon" href="<?php echo e(asset('/asset/app/media/img/logos/favicon.ico')); ?>" />
    <meta name="google-site-verification" content="Rda4X-ni7CsAy_pqqFhXeRbf_WToW3o1vpnu5peqMp4" />
</head>
<!-- end::Head -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default" signed="<?php echo e(Auth::User()?1:0); ?>">
    
    <div class="m-grid m-grid--hor m-grid--root m-page" id="app">
        <!-- Header -->
        <?php echo $__env->make('layouts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                                                                
        <div id="app" class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <?php echo $__env->make('layouts.menuleft', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Main Content -->
            <?php echo $__env->yieldContent('content'); ?>

        </div>
        <!-- Footer -->
        <!-- begin::Scroll Top -->
        <?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('layouts.quickside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- end::Scroll Top -->        

    </div>
    <?php echo $__env->make('layouts.analystics', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>


<!--begin::Base Scripts -->
<script src="<?php echo e(mix('/js/all.js')); ?>"></script>

<script src="<?php echo e(asset('asset/demo/default/custom/components/calendar/basic.js')); ?>"></script>


<script src="<?php echo e(asset('asset/demo/default/custom/crud/forms/widgets/select2.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('asset/demo/default/custom/crud/forms/widgets/bootstrap-touchspin.js')); ?>" type="text/javascript"></script>

<script src="<?php echo e(asset('asset/demo/default/custom/crud/wizard/wizard.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(asset('/js/vue.js')); ?>"></script>
<script src="<?php echo e(asset('/js/index.umd.js')); ?>"></script>
<script src="<?php echo e(asset('asset/app/js/manufacture.js')); ?>"></script>
<script src="<?php echo e(asset('asset/app/js/script.js')); ?>"></script>

<?php echo $__env->make('layouts.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldPushContent('footer.scripts'); ?>
<!--end::Base Scripts -->  

</html>
