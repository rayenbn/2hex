@extends('admin.layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <div class="m-content">
            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
                <div class="m-alert__icon">
                    <i class="flaticon-exclamation m--font-warning"></i>
                </div>
                <div class="m-alert__text">
                    Hello {{Auth::user()->name}}! Welcome to {{env('APP_NAME')}}.
                </div>
            </div>
        </div>
    </div>
@endsection
