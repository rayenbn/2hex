@extends('auth.layouts.auth')

@section('content')
    <div class="m-login__signup">
        <div class="m-login__head">
            <h3 class="m-login__title">
                Sign Up
            </h3>
            <div class="m-login__desc">
                Enter your details to create your account.
            </div>
        </div>
        @if (session('status'))
            <div 
                class="alert alert-success alert-dismissible fade show m-alert m-alert--air" 
                role="alert"
                style="padding: 0.85rem 2.5rem;margin: 15px 0;"
            >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                {{ session('status') }}
            </div>
        @endif

        @if (!$errors->isEmpty())
            <div class="alert alert-danger alert-dismissible fade show   m-alert m-alert--air" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                {!! $errors->first() !!}
            </div>
        @endif
        {{ Form::open(['route' => 'register', 'class' => 'm-login__form m-form']) }}
            <div class="form-group m-form__group">
                <input class="form-control m-input" type="text" name="name" placeholder="{{ __('views.auth.register.input_0') }}" value="{{ old('name') }}" required autofocus >
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input" type="email" name="email" placeholder="{{ __('views.auth.register.input_1') }}" required>
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input" type="password" name="password" placeholder="{{ __('views.auth.register.input_2') }}" required>
            </div>
            <div class="form-group m-form__group">
                <input class="form-control m-input m-login__form-input--last" type="password"  name="password_confirmation" placeholder="{{ __('views.auth.register.input_3') }}" required>
            </div>
            <div class="row form-group m-form__group m-login__form-sub">
                <div class="col m--align-left">
                    @if(config('auth.captcha.registration'))
                        @captcha()
                    @endif
                    <span class="m-form__help"></span>
                </div>
            </div>
        <div class="m-login__desc">
            By registering you sign up to our skateboard industry insights newsletter and allow our team to contact you.
            You can opt out by clicking "unsubscribe" at the bottom of every email.
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
                Already have account ?
            </span>
            &nbsp;&nbsp;
            <a href="{{ route('login') }}" id="m_login_signup" class="m-link m-link--focus m-login__account-link">
                Log in
            </a>
        </div>
    </div>    
@endsection
