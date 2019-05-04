<?php $__env->startSection('content'); ?>
    <?php if(session('status')): ?>
        <div class="alert alert-success alert-dismissible fade show   m-alert m-alert--air" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <?php echo e(session('status')); ?>

        </div>
    <?php endif; ?>

    <?php if(!$errors->isEmpty()): ?>
        <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
            <?php echo $errors->first(); ?>

        </div>
    <?php endif; ?>
    <div class="m-login__signin">
        <?php echo e(Form::open(['route' => 'login', 'class'=>'m-login__form m-form'])); ?>

            <div class="form-group m-form__group">
                <input class="form-control m-input" type="text" name="email" value="<?php echo e(old('email')); ?>" placeholder="<?php echo e(__('views.auth.login.input_0')); ?>" required autofocus >
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input m-login__form-input--last" type="password" placeholder="<?php echo e(__('views.auth.login.input_1')); ?>" required name="password">
            </div>
            <div class="row m-login__form-sub">
                <div class="col m--align-left m-login__form-left">
                    <label class="m-checkbox  m-checkbox--light">
                        <input type="checkbox" name="remember"  <?php echo e(old('remember') ? 'checked' : ''); ?>>
                        Remember me
                        <span></span>
                    </label>
                </div>
                <div class="col m--align-right m-login__form-right">
                    <a href="<?php echo e(route('password.request')); ?>" id="m_login_forget_password" class="m-link">
                        Forget Password ?
                    </a>
                </div>
            </div>
            <div class="m-login__form-action">
                <button id="m_login_signin_submit" class="btn btn-focus m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                    Sign In
                </button>
                &nbsp;&nbsp;&nbsp;
                <!--
                Facebook Login
                <a href="<?php echo e(route('social.redirect', ['facebook'])); ?>" class="btn btn-success btn-facebook m-btn m-btn--pill m-btn--custom m-btn--air  m-login__btn m-login__btn--primary">
                    <i class="fa fa-facebook"></i>
                    Facebook
                </a> -->

            </div>
        <?php echo e(Form::close()); ?>

    </div>
    <div class="m-stack__item m-stack__item--center">
        <div class="m-login__account">
            <span class="m-login__account-msg">
                Don't have an account yet ?
            </span>
            &nbsp;&nbsp;
            <a href="<?php echo e(route('register')); ?>" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
                Sign Up
            </a>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('auth.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>