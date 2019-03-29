@extends('layouts.app')

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
                                Please keep your address up to date, so that we can arrange a seemless delivery.
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
                                                @foreach($orders as $order)
                                                    <div class="saved-order-list-item">
                                                        <div class="btn btn-secondary"><a href="/summary/{{$order->saved_date}}">Continue</a></div>
                                                        <div class="btn btn-secondary">
                                                            Saved order: {{$order->saved_date}}
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
                                                            <div>
                                                                Order Number: XYZ5432 2019/02/01&nbsp;&nbsp; 
                                                            </div> 
                                                            <div>
                                                                Submitted: {{$order->saved_date}}
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <div class="btn btn-secondary"><a href="/summary/view/{{$order->saved_date}}">View</a></div>
                                                            <div class="btn btn-secondary"><a href="/summary/{{$order->saved_date}}">re-use</a></div>
                                                            <div class="btn btn-secondary"><a href="/export_csv/{{$order->saved_date}}">Invoice</a></div>
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
                                
                                <form class="m-form m-form--fit m-form--label-align-right">
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group m--margin-top-10 m--hide">
                    
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">1. Invoice Address</h3>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" id="invoice_company" type="text" value="{{isset($shipinfo)?$shipinfo->invoice_company:''}}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" id="invoice_name" type="text" value="{{isset($shipinfo)?$shipinfo->invoice_name:''}}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Country</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" id="invoice_country" type="text" value="{{isset($shipinfo)?$shipinfo->invoice_country:''}}">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Tax ID</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" id="invoice_taxid" type="text" value="{{isset($shipinfo)?$shipinfo->invoice_taxid:''}}">
                                                <span class="m-form__help">European companies must either provide their European Tax ID or pay 19% value addet tax.</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                        
                                       
                                        <div class="form-group m-form__group row">
                                        
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">2. Shipping Address</h3>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" id="shipping_company" type="text" value="{{isset($shipinfo)?$shipinfo->shipping_company:''}}">
                                                <span class="m-form__help">Private name if you do not have a company.</span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Address</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" id="shipping_address" type="text" value="{{isset($shipinfo)?$shipinfo->shipping_address:''}}">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">City</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" id="shipping_city" type="text" value="{{isset($shipinfo)?$shipinfo->shipping_city:''}}">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">State</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="{{isset($shipinfo)?$shipinfo->shipping_state:''}}" id="shipping_state">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Postcode</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="{{isset($shipinfo)?$shipinfo->shipping_postcode:''}}" id="shipping_postcode">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Country</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="{{isset($shipinfo)?$shipinfo->shipping_country:''}}" id="shipping_country">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Contact Person</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="{{isset($shipinfo)?$shipinfo->shipping_contactperson:''}}" id="shipping_contactperson">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="number" value="{{isset($shipinfo)?$shipinfo->shipping_phone:''}}" id="shipping_phone">
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions">
                                            <div class="row">
                                                <div class="col-2">
                                                </div>
                                                <div class="col-7">
                                                    <button type="button" class="btn btn-accent m-btn m-btn--air m-btn--custom"  data-toggle="modal" data-target="#m_modal_6">Save changes</button>&nbsp;&nbsp;
                                                    <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                
                            </div>
                            <div class="tab-pane " id="m_user_profile_tab_3">

                                <form class="m-form m-form--fit m-form--label-align-right" action="/detail_save" method="POST" id="detailForm">
                                    {{ csrf_field() }}
                                    <div class="m-portlet__body">
                                        <div class="form-group m-form__group m--margin-top-10 m--hide">

                                        </div>
                                        <div class="form-group m-form__group row">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">My Details</h3>
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" name="name" type="text" value="{{Auth::user()?Auth::user()->name:''}}" placeholder="Enter your full name">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Position in company</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="{{Auth::user()?Auth::user()->position:''}}"  placeholder="Enter your position" name="position">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="{{Auth::user()?Auth::user()->company_name:''}}" placeholder="Enter your company name" name="company_name">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="number" value="{{Auth::user()?Auth::user()->phone_num:''}}" placeholder="Enter your phone number" name="phone_num">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Email Address.</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="{{Auth::user()?Auth::user()->email:''}}" name="email" placeholder="Enter your email" name="email">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions">
                                            <div class="row">
                                                <div class="col-2">
                                                </div>
                                                <div class="col-7">
                                                    <button type="Submit" class="btn btn-accent m-btn m-btn--air m-btn--custom" id="save_details">Save changes</button>&nbsp;&nbsp;
                                                    <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <!-- end:: Content -->
    <div class="modal fade" id="m_modal_6" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to save this?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_address" data-dismiss="modal">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection