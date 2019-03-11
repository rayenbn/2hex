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
                                    <span class="m-card-profile__name">Mark Andre</span>
                                    <a href="" class="m-card-profile__email m-link">mark.andre@gmail.com</a>
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

                                                <div class="saved-order-list-item">
                                                    <div class="btn btn-secondary">Continue</div>
                                                    <div class="btn btn-secondary">
                                                        Saved order: 2019/02/01 20:23
                                                    </div>
                                                </div>
                                                <div class="saved-order-list-item">
                                                    <div class="btn btn-secondary">Continue</div>
                                                    <div class="btn btn-secondary">
                                                        Saved order: 2019/02/01 20:23
                                                    </div>
                                                </div>
                                                <div class="saved-order-list-item">
                                                    <div class="btn btn-secondary">Continue</div>
                                                    <div class="btn btn-secondary">
                                                        Saved order: 2019/02/01 20:23
                                                    </div>
                                                </div>
                                                <div class="saved-order-list-item">
                                                    <div class="btn btn-secondary">Continue</div>
                                                    <div class="btn btn-secondary">
                                                        Saved order: 2019/02/01 20:23
                                                    </div>
                                                </div>
                                                <div class="saved-order-list-item">
                                                    <div class="btn btn-secondary">Continue</div>
                                                    <div class="btn btn-secondary">
                                                        Saved order: 2019/02/01 20:23
                                                    </div>
                                                </div>
                                                <div class="saved-order-list-item">
                                                    <div class="btn btn-secondary">Continue</div>
                                                    <div class="btn btn-secondary">
                                                        Saved order: 2019/02/01 20:23
                                                    </div>
                                                </div>
                                                                                                            
                                            </div>
                                        </div>
                                        
                                        <div class="m-form__seperator m-form__seperator--dashed m-form__seperator--space-2x"></div>
                                        <div class="form-group m-form__group row" id="submitted_orders">
                                            <div class="col-10 ml-auto">
                                                <h3 class="m-form__section">2. Submitted Orders</h3>
                                            </div>
                                            <div class="m-scrollable saved-order-list" data-scrollbar-shown="true" data-scrollable="true" data-height="300" style="overflow:hidden; height: 300px">

                                                <div class="saved-order-list-item">
                                                    <div>                                                                   
                                                        <div class="btn btn-secondary" style="flex-wrap: wrap;display: flex;">
                                                            <div>
                                                                Order Number: XYZ5432 2019/02/01&nbsp;&nbsp; 
                                                            </div> 
                                                            <div>
                                                                Submitted: 2019/02/033 20:35
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <div class="btn btn-secondary">View</div>
                                                            <div class="btn btn-secondary">re-use</div>
                                                            <div class="btn btn-secondary">Invoice</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="saved-order-list-item">
                                                    <div>                                                                   
                                                        <div class="btn btn-secondary" style="flex-wrap: wrap;display: flex;">
                                                            <div>
                                                                Order Number: XYZ5432 2019/02/01&nbsp;&nbsp; 
                                                            </div> 
                                                            <div>
                                                                Submitted: 2019/02/033 20:35
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <div class="btn btn-secondary">View</div>
                                                            <div class="btn btn-secondary">re-use</div>
                                                            <div class="btn btn-secondary">Invoice</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="saved-order-list-item">
                                                    <div>                                                                   
                                                        <div class="btn btn-secondary" style="flex-wrap: wrap;display: flex;">
                                                            <div>
                                                                Order Number: XYZ5432 2019/02/01&nbsp;&nbsp; 
                                                            </div> 
                                                            <div>
                                                                Submitted: 2019/02/033 20:35
                                                            </div>                                                                      
                                                        </div>
                                                    </div>
                                                    <div>
                                                        <div>
                                                            <div class="btn btn-secondary">View</div>
                                                            <div class="btn btn-secondary">re-use</div>
                                                            <div class="btn btn-secondary">Invoice</div>
                                                        </div>
                                                    </div>
                                                </div>

                                                
                                                
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
                                                <input class="form-control m-input" type="text" value="Your Company name">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Full Name</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="Mark Andre">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Country</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="Germany">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Tax ID</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="DE1342562772">
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
                                                <input class="form-control m-input" type="text" value="Birdspouse">
                                                <span class="m-form__help">Private name if you do not have a company.</span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Address</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="205 Downhillstreet">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">City</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="San Francisco">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">State</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="California">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Postcode</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="45000">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Country</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="45000">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Contact Person</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="Tony Hawk">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="number" value="+456669067890">
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

                                <form class="m-form m-form--fit m-form--label-align-right">
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
                                                <input class="form-control m-input" type="text" value="Your full name" placeholder="Enter your full name">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Position in company</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="CEO"  placeholder="Enter your position">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Company Name</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="Ding Boards" placeholder="Enter your company name">
                                            </div>
                                        </div>
                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Phone No.</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="number" value="+496669067890" placeholder="Enter your phone number">
                                            </div>
                                        </div>

                                        <div class="form-group m-form__group row">
                                            <label for="example-text-input" class="col-2 col-form-label">Email Address.</label>
                                            <div class="col-7">
                                                <input class="form-control m-input" type="text" value="john@dingboards.com" name="email" placeholder="Enter your email">
                                            </div>
                                        </div>


                                    </div>

                                    <div class="m-portlet__foot m-portlet__foot--fit">
                                        <div class="m-form__actions">
                                            <div class="row">
                                                <div class="col-2">
                                                </div>
                                                <div class="col-7">
                                                    <button type="reset" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
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
                    <p>We have received your order. You will receive an email in 5 Minutes.” If you do not receive the email, you can find the order summary and invoice in your profile. The order will be processed after we receive your payment.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection