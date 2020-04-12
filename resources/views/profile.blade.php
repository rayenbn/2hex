@extends('layouts.app')

@section('title', 'SKATEBOARD PRODUCTION PROFILE')

@push('head.meta')
    <meta name="description" content="2HEX skateboard production profile. 2HEX skateboard production profile lets you check on your production process at 2HEX skateboard factory.">

    <meta name="keywords" content="skateboard production profile, skateboard company profile, skateboard manufacturer, skateboard supplier, skateboard factory, skateboard, manufacturer, supplier, factory, skateboard manufacturers, skateboard factories, 2hex, Board, skateboard production">

@endpush

@section('content')

    @php $isAdmin = auth()->check() && auth()->user()->isAdmin(); @endphp

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

                            <div class="m-portlet__body-separator"></div>
                            <b>Problems Scrolling?</b><br>
                            Place your cursor over a grey background and try again.
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
                                            Saved
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_2" role="tab">
                                            My Address
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_3" role="tab">
                                            My Details
                                        </a>
                                    </li>
                                    <li class="nav-item m-tabs__item">
                                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_user_profile_tab_4" role="tab">
                                            My Productions
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                        <div class="tab-content">

                            <div class="tab-pane active" id="m_user_profile_tab_1">
                                <div class="m-form m-form--fit m-form--label-align-right">
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group m--margin-top-10 m--hide">
                                            <div class="alert m-alert m-alert--default" role="alert">
                                                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row" id="saved_orders">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">Saved Orders</h3>
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
                                        
                                        @if($isAdmin)
                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">Saved Batches</h3>
                                            </div>
                                            <form action="/add_summary" method="post" class="m-form m-form--fit m-form--label-align-right post-forms">
                                            {{ csrf_field() }}
                                            <table class="table table-striped- table-bordered table-hover table-checkable table-responsive" id="summary-table">
                                                @if(count($savedOrderBatches) > 0)
                                                    @include('partials.skateboards', ['skateboards' => $savedOrderBatches, 'batches' => 1, 'fees' => $fees])
                                                @endif
                                                @if(count($savedGripBatches) > 0)
                                                    @include('partials.grips', ['grips1' => $savedGripBatches, 'batches' => 1, 'fees' => $fees])
                                                @endif

                                                @if(count($savedWheelBatches) > 0)
                                                    @include('partials.wheels', ['wheels1' => $savedWheelBatches, 'batches' => 1, 'fees' => $fees])
                                                @endif

                                                @if(count($savedTransferBatches) > 0)
                                                    @include('partials.transfers', ['transfers1' => $savedTransferBatches, 'batches' => 1, 'fees' => $fees])
                                                @endif
                                            </table>

                                                <button type="submit" name="submit" value="Add" class="btn btn-outline-info">Add to Summary</button>
                                                &nbsp &nbsp
                                                <button type="submit" name="submit" value="Delete" class="btn btn-outline-danger">Delete</button>
                                            </form>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                                
                                
                            </div>
                            
                            <div class="tab-pane " id="m_user_profile_tab_2">
                                <!-- Form delivery address -->
                                <form-delivery-address :shipinfo="{{ json_encode($shipinfo) }}"/>   
                            </div>

                            <div class="tab-pane " id="m_user_profile_tab_3">
                                <!-- Form user details -->
                                <form-user-details :user="{{ json_encode(auth()->user()) }}"/>
                            </div>

                            <div class="tab-pane " id="m_user_profile_tab_4">
                                <div class="m-form m-form--fit m-form--label-align-right">
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group m--margin-top-10 m--hide">
                                            <div class="alert m-alert m-alert--default" role="alert">
                                                The example form below demonstrates common HTML form elements that receive updated styles from Bootstrap with additional classes.
                                            </div>
                                        </div>


                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                        <div class="form-group m-form__group row" id="submitted_orders">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">Submitted Orders</h3>
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
                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                        
                                        <!-- @if($isAdmin) -->
                                        <!--Begin::Portlet-->
                                        <div class="proccess_bar">
                                            <div class="proccess_percent"></div>
                                        </div>
                                        <form class="" action="production_filter" method="POST" id="production_filter">
                                            {{ csrf_field() }}
                                            <div class="filter_body row">
                                                <div class="col-lg-6">
                                                    <p>Productions</p>
                                                    <select
                                                        class="form-control filter_email form_input"
                                                        id="select_order"
                                                        name="select_order"
                                                        style="width:100%;"
                                                    >
                                                        <option value="" disabled>SELECT</option>
                                                        @foreach($returnorder as $orderinfo)
                                                            <option @if($selected_order == $orderinfo->invoice_number) selected @endif value="{{$orderinfo->invoice_number}}">Order #{{$orderinfo->invoice_number}}</option>    
                                                            @php
                                                                if($selected_order == $orderinfo->invoice_number)
                                                                    $selected_invoice = $orderinfo->invoice_number;
                                                            @endphp
                                                        @endforeach
                                                    </select>
                                                    <input type="hidden" name="order_id" id="order_id" >
                                                </div> 
                                                <div class="col-lg-6">
                                                    <div class="row">
                                                        <div class='col-md-5'>
                                                            <p>Start Date:</p>
                                                            <div class="form-group m--padding-top-10">
                                                                <span>{{$startdate}}</span>
                                                            </div>
                                                        </div>
                                                        <div class='col-md-5'>
                                                            <p>Finish Date:</p>
                                                            <div class="form-group m--padding-top-10">
                                                                <span>{{$enddate}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </form>
                                        <div class="m-portlet  m-portlet--full-height ">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <h3 class="m-portlet__head-text">
                                                            Your Current Production #{{isset($selected_invoice)?$selected_invoice:''}}
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body">
                                                <div class="m-scrollable" data-scrollable="true" data-height="380" data-mobile-height="300">

                                                    <!--Begin::Timeline 2 -->
                                                    <div class="m-timeline-2">
                                                        <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                                        @foreach($comments as $key => $comment)
                                                            <div class="m-timeline-2__item @if($key != 0) m--margin-top-30 @endif">
                                                                <span class="m-timeline-2__item-time">{{$comment->date}}</span>
                                                                <div class="m-timeline-2__item-cricle">
                                                                    <i class="fa fa-genderless m--font-brand"></i>
                                                                </div>
                                                                <div class="m-timeline-2__item-text  m--padding-top-5">
                                                                    {{$comment->comment}}
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        </div>
                                                    </div>

                                                    <!--End::Timeline 2 -->
                                                </div>
                                            </div>
                                        </div>
                                        <!--End::Portlet-->
                                        <!-- @endif -->


                                    </div>
                                </div>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            startdate = new Date("{{$startdate}}");
            today = new Date();
            enddate = new Date("{{$enddate}}");
            percent = Math.floor((today - startdate) / (enddate - startdate) * 100);
            if(enddate < today)
                percent = 100;
            if(startdate > today)
                percent = 0;
            
            $('.proccess_percent').css('width', percent + '%');
        });
    </script>
@endsection