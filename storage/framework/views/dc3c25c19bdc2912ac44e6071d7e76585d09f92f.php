<?php $__env->startSection('content'); ?>
    <div class="m-login__signup">
        <div class="m-login__head">
            <h3 class="m-login__title">
                Sign Up
            </h3>
            <div class="m-login__desc">
                Enter your details to create your account.
            </div>
        </div>
        <?php if(session('status')): ?>
            <div 
                class="alert alert-success alert-dismissible fade show m-alert m-alert--air" 
                role="alert"
                style="padding: 0.85rem 2.5rem;margin: 15px 0;"
            >
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
        <?php echo e(Form::open(['route' => 'register', 'class' => 'm-login__form m-form'])); ?>

            <div class="form-group m-form__group">
                <input class="form-control m-input" type="text" name="name" placeholder="<?php echo e(__('views.auth.register.input_0')); ?>" value="<?php echo e(old('name')); ?>" required autofocus >
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input" type="email" name="email" placeholder="<?php echo e(__('views.auth.register.input_1')); ?>" required>
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input" type="password" name="password" placeholder="<?php echo e(__('views.auth.register.input_2')); ?>" required>
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input m-login__form-input--last" type="password"  name="password_confirmation" placeholder="<?php echo e(__('views.auth.register.input_3')); ?>" required>
            </div>
            <div class="row form-group m-form__group m-login__form-sub">
                <div class="col m--align-left">
                    <?php if(config('auth.captcha.registration')): ?>
                        <?php echo app('captcha')->render(); ?>
                    <?php endif; ?>
                    <span class="m-form__help"></span>
                </div>
            </div>

        <div class="m-login__desc">
            By registering you agree to our
            <a href="../imprint" class="m-nav__link">
                <span class="m-nav__link-text" style="color: #c2acf4;"><b>Terms and Conditions</b></span>
            </a>.
        </div>


            <div class="m-login__form-action">
                <button id="m_login_signup_submit" class="btn m-btn m-btn--pill m-btn--custom m-btn--air m-login__btn m-login__btn--primary">
                    Sign Up
                </button>
            </div>
        </form>
    </div>
    <div class="m-stack__item m-stack__item--center">
        <div class="m-login__account">
            <span class="m-login__account-msg">
                Already have an account ?
            </span>
            &nbsp;&nbsp;
            <a href="<?php echo e(route('login')); ?>" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
                Log in
            </a>
        </div>
    </div>    
<?php $__env->stopSection(); ?>

<?php echo $__env->make('auth.layouts.auth', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>