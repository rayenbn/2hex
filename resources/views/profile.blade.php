@extends('layouts.app')

@section('title', 'SKATEBOARD PRODUCTION PROFILE')

@push('head.meta')
    <meta name="description" content="2HEX skateboard production profile. 2HEX skateboard production profile lets you check on your production process at 2HEX skateboard factory.">

    <meta name="keywords" content="skateboard production profile, skateboard company profile, skateboard manufacturer, skateboard supplier, skateboard factory, skateboard, manufacturer, supplier, factory, skateboard manufacturers, skateboard factories, 2hex, Board, skateboard production">
@endpush

@section('content')
    <!-- Start Content -->
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <!-- BEGIN: Subheader -->
        <div class="m-subheader ">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="m-subheader__title ">My Profile</h3>
                </div>
                
            </div>
        </div>

        <!-- END: Subheader -->
        <div class="m-content">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    <div class="m-portlet m-portlet--full-height" id="user_address">
                        <div class="m-portlet__body">
                            <div class="m-card-profile">
                                <div class="m-card-profile__title m--hide">
                                    Your Profile
                                </div>
                                <div class="m-card-profile__details">
                                    <span class="m-card-profile__name">{{Auth::User()?Auth::User()->name:'Please LogIn Or Register'}}</span>
                                    <a href="" class="m-card-profile__email m-link">{{Auth::user()?Auth::User()->email:''}}</a>
                                </div>
                            </div>
                            <div class="m-portlet__body-separator"></div>
                                Please keep your address up to date, so that we can arrange a seamless delivery.
                            <div class="m-portlet__body-separator"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="m-portlet m-portlet--full-height m-portlet--tabs  ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-tools">
                                <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                            <i class="flaticon-share m--hide"></i>
                                            My Orders
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                            Invoice & Delivery Address
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                            My Details
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="m_user_profile_tab_1">
                                <form class="m-form m-form--fit m-form--label-align-right">
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group m--margin-top-10 m--hide">
                                            <div class="alert m-alert m-alert--default" role="alert">
                                                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row" id="saved_orders">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">1. Saved Orders</h3>                                                            
                                            </div>
                                            <div class="m-scrollable saved-order-list" data-scrollbar-shown="true" data-scrollable="true" data-height="300" style="overflow:hidden; height: 300px">
                                                @foreach($unSubmitOrders as $order)
                                                    <div class="saved-order-list-item">
                                                        <div class="btn btn-secondary"><a href="/summary/{{$order->saved_date}}">Continue</a></div>
                                                        <div class="btn btn-secondary">
                                                            Saved order: {{$order->saved_name}}
                                                        </div>
                                                        <div class="btn btn-secondary">
                                                            <a class="remove_button" href="/remove_saveorder/{{$order->saved_date}}">Remove</a>
                                                        </div>
                                                    </div>    
                                                @endforeach
                                            </div>
                                        </div>
                                        
                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                        <div class="form-group m-form__group row" id="submitted_orders">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">2. Submitted Orders</h3>
                                            </div>
                                            <div class="m-scrollable saved-order-list" data-scrollbar-shown="true" data-scrollable="true" data-height="300" style="overflow:hidden; height: 300px">
                                            
                                            @foreach($submitorders as $order)
                                                
                                            <div class="saved-order-list-item">
                                                <div>                                                                   
                                                    <div class="btn btn-secondary" style="flex-wrap: wrap;display: flex;">
                                                        <div>Order Number: #{{$order->invoice_number}}&nbsp;&nbsp;</div> 
                                                        <div>Submitted: {{$order->saved_date}}</div>                                                                      
                                                    </div>
                                                </div>
                                                <div>
                                                    <div>
                                                        <div class="btn btn-secondary">
                                                            <a href="/summary/view/{{$order->saved_date}}">View</a>
                                                        </div>
                                                        <div class="btn btn-secondary">
                                                            <a href="/summary/{{$order->saved_date}}">re-use</a>
                                                        </div>
                                                        <div class="btn btn-secondary">
                                                            <a href="{{ route('export.csv.id', $order->saved_date) }}">Invoice</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                
                                            @endforeach
                                            
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                                
                            </div>
                            
                            <div class="tab-pane " id="m_user_profile_tab_2">
                                <!-- Form delivery address -->
                                <form-delivery-address :shipinfo="{{ json_encode($shipinfo) }}"/>   
                            </div>

                            <div class="tab-pane " id="m_user_profile_tab_3">
                                <!-- Form user details -->
                                <form-user-details :user="{{ json_encode(auth()->user()) }}"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection