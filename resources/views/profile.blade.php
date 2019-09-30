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
                                <form class="m-form m-form--fit m-form--label-align-right">
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

                                        <div class="form-group m-form__group row">
                                        <div class="col-10 ml-auto">
                                            <h3 class="m-form__section">Saved Batches</h3>
                                        </div>

                                            <table class="table table-striped- table-bordered table-hover table-checkable table-responsive table-sm">
                                                <thead style="background-color: #52a3f0; color: white;">
                                                <tr>

                                                    <th>Select</th>
                                                    <th>Name</th>
                                                    <th>Preview</th>
                                                    <th>Films Made:</th>
                                                    <th>QTY</th>
                                                    <th>Size</th>
                                                    <th>Preview Name</th>
                                                    <th>Artwork Name</th>
                                                    <th>Color QTY</th>
                                                    <th>Pantone Colors</th>
                                                    <th>Transp.</th>
                                                    <th>Edit</th>
                                                </tr>
                                                </thead>

                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <label class="m-checkbox">
                                                                <input id="closeButton" type="checkbox" value="checked" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td>Surfer Bail</td>
                                                        <td>
                                                            <img src="img/surfer.png" width="200en">
                                                        </td>
                                                        <td>
                                                            Paid:
                                                            2019/10/06
                                                        </td>
                                                        <td>60</td>
                                                        <td>9"x33"</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>
                                                            P289765
                                                            P536789
                                                            P56HU79
                                                        </td>
                                                        <td>No</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="m-checkbox">
                                                                <input id="closeButton" type="checkbox" value="checked" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td>Fish Drowne</td>
                                                        <td>
                                                            <img src="img/fish.png" width="200en">
                                                        </td>
                                                        <td>Not yet made</td>
                                                        <td>150</td>
                                                        <td>9"x33"</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>
                                                            P289765
                                                            P536789
                                                            P56HU79
                                                        </td>
                                                        <td>No</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                        <label class="m-checkbox">
                                                            <input id="closeButton" type="checkbox" value="checked" />
                                                            <span></span>
                                                        </label>
                                                        </td>
                                                        <td>Shark Can</td>
                                                        <td>
                                                            <img src="img/shark.png" width="200en">
                                                        </td>
                                                        <td>Not yet made</td>
                                                        <td>100</td>
                                                        <td>9"x33"</td>
                                                        <td>-</td>
                                                        <td></td>
                                                        <td>-</td>
                                                        <td>
                                                            P289765
                                                            P536789
                                                            P56HU79
                                                        </td>
                                                        <td>Yes</td>
                                                        <td>-</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <label class="m-checkbox">
                                                                <input id="closeButton" type="checkbox" value="checked" />
                                                                <span></span>
                                                            </label>
                                                        </td>
                                                        <td>Shark Can</td>
                                                        <td>
                                                            <img src="img/shark.png" width="200en">
                                                        </td>
                                                        <td>Not yet made</td>
                                                        <td>70</td>
                                                        <td>9"x33"</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>-</td>
                                                        <td>
                                                            P289765
                                                            P536789
                                                            P56HU79
                                                        </td>
                                                        <td>Yes</td>
                                                        <td>-</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <a href="skateboard-deck-configurator/" class="btn btn-outline-info">Add to Summary</a>
                                            &nbsp &nbsp
                                            <a href="skateboard-remove/" class="btn btn-outline-danger">Delete</a>
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

                            <div class="tab-pane " id="m_user_profile_tab_4">
                                <form class="m-form m-form--fit m-form--label-align-right">
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

                                        <!--Begin::Portlet-->
                                        <div class="m-portlet  m-portlet--full-height ">
                                            <div class="m-portlet__head">
                                                <div class="m-portlet__head-caption">
                                                    <div class="m-portlet__head-title">
                                                        <h3 class="m-portlet__head-text">
                                                            Your Current Production #201910161
                                                        </h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="m-portlet__body">
                                                <div class="m-scrollable" data-scrollable="true" data-height="380" data-mobile-height="300">

                                                    <!--Begin::Timeline 2 -->
                                                    <div class="m-timeline-2">
                                                        <div class="m-timeline-2__items  m--padding-top-25 m--padding-bottom-30">
                                                            <div class="m-timeline-2__item">
                                                                <span class="m-timeline-2__item-time">10:00</span>
                                                                <div class="m-timeline-2__item-cricle">
                                                                    <i class="fa fa-genderless m--font-danger"></i>
                                                                </div>
                                                                <div class="m-timeline-2__item-text  m--padding-top-5">
                                                                    Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                                                    incididunt ut labore et dolore magna
                                                                </div>
                                                            </div>
                                                            <div class="m-timeline-2__item m--margin-top-30">
                                                                <span class="m-timeline-2__item-time">12:45</span>
                                                                <div class="m-timeline-2__item-cricle">
                                                                    <i class="fa fa-genderless m--font-success"></i>
                                                                </div>
                                                                <div class="m-timeline-2__item-text m-timeline-2__item-text--bold">
                                                                    AEOL Meeting With
                                                                </div>
                                                                <div class="m-list-pics m-list-pics--sm m--padding-left-20">
                                                                    <a href="../../#"><img src="assets/app/media/img/users/100_4.jpg" title=""></a>
                                                                    <a href="../../#"><img src="assets/app/media/img/users/100_13.jpg" title=""></a>
                                                                    <a href="../../#"><img src="assets/app/media/img/users/100_11.jpg" title=""></a>
                                                                    <a href="../../#"><img src="assets/app/media/img/users/100_14.jpg" title=""></a>
                                                                </div>
                                                            </div>
                                                            <div class="m-timeline-2__item m--margin-top-30">
                                                                <span class="m-timeline-2__item-time">14:00</span>
                                                                <div class="m-timeline-2__item-cricle">
                                                                    <i class="fa fa-genderless m--font-brand"></i>
                                                                </div>
                                                                <div class="m-timeline-2__item-text m--padding-top-5">
                                                                    Make Deposit <a href="#" class="m-link m-link--brand m--font-bolder">USD 700</a> To ESL.
                                                                </div>
                                                            </div>
                                                            <div class="m-timeline-2__item m--margin-top-30">
                                                                <span class="m-timeline-2__item-time">16:00</span>
                                                                <div class="m-timeline-2__item-cricle">
                                                                    <i class="fa fa-genderless m--font-warning"></i>
                                                                </div>
                                                                <div class="m-timeline-2__item-text m--padding-top-5">
                                                                    Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                                                    incididunt ut labore et dolore magna elit enim at minim<br>
                                                                    veniam quis nostrud
                                                                </div>
                                                            </div>
                                                            <div class="m-timeline-2__item m--margin-top-30">
                                                                <span class="m-timeline-2__item-time">17:00</span>
                                                                <div class="m-timeline-2__item-cricle">
                                                                    <i class="fa fa-genderless m--font-info"></i>
                                                                </div>
                                                                <div class="m-timeline-2__item-text m--padding-top-5">
                                                                    Placed a new order in <a href="#" class="m-link m-link--brand m--font-bolder">SIGNATURE MOBILE</a> marketplace.
                                                                </div>
                                                            </div>
                                                            <div class="m-timeline-2__item m--margin-top-30">
                                                                <span class="m-timeline-2__item-time">16:00</span>
                                                                <div class="m-timeline-2__item-cricle">
                                                                    <i class="fa fa-genderless m--font-brand"></i>
                                                                </div>
                                                                <div class="m-timeline-2__item-text m--padding-top-5">
                                                                    Lorem ipsum dolor sit amit,consectetur eiusmdd tempor<br>
                                                                    incididunt ut labore et dolore magna elit enim at minim<br>
                                                                    veniam quis nostrud
                                                                </div>
                                                            </div>
                                                            <div class="m-timeline-2__item m--margin-top-30">
                                                                <span class="m-timeline-2__item-time">17:00</span>
                                                                <div class="m-timeline-2__item-cricle">
                                                                    <i class="fa fa-genderless m--font-danger"></i>
                                                                </div>
                                                                <div class="m-timeline-2__item-text m--padding-top-5">
                                                                    Received a new feedback on <a href="#" class="m-link m-link--brand m--font-bolder">FinancePro App</a> product.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!--End::Timeline 2 -->
                                                </div>
                                            </div>
                                        </div>

                                        <!--End::Portlet-->


                                    </div>
                                </form>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection