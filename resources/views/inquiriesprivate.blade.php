@extends('layouts.app')

@section('title', 'CONTACT YOUR SKATEBOARD MANUFACTURER')

@push('head.meta')
    <meta name="description" content="2HEX skateboard factory contact page.  Leave us a message to run your custom skateboard production with 2HEX, your oem skateboard manufacturer.">

    <meta name="keywords" content="2HEX contact, skateboard factory contact, skateboard manufacturer contact, skateboard manufacturer, skateboard supplier, skateboard factory">
@endpush

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">

            <div 
                class="alert alert-success alert-dismissible fade show m-alert m-alert--air" 
                role="alert"
                style="padding: 0.85rem 2.5rem;margin: 15px 0; display: none;"
            >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <span>Successfully Delivered</span>
            </div>
            <div 
                class="alert alert-danger alert-dismissible fade show m-alert m-alert--air" 
                role="alert"
                style="padding: 0.85rem 2.5rem;margin: 15px 0; display: none;"
            >
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
                <span>Please Accept Our Terms Policy</span>
            </div>

            <!--Begin::Main Portlet-->
            <div class="m-portlet m-portlet--full-height">

                <!--begin: Portlet Head-->
                <div class="m-portlet__head">
                    <div class="m-portlet__head-caption">
                        <div class="m-portlet__head-title">
                            <h3 class="m-portlet__head-text">
                                Personal Skateboard Production Inquiry
                            </h3>
                        </div>
                    </div>
                </div>

                <!--end: Portlet Head-->

                <!--begin: Portlet Body-->
                <div class="m-portlet__body m-portlet__body--no-padding">

                    <!--begin: Form Wizard-->
                    <div class="m-wizard m-wizard--4 m-wizard--brand" id="m_wizard">
                        <div class="row m-row--no-padding">
                            <div class="col-xl-3 col-lg-12 m--padding-top-20 m--padding-bottom-15">

                                <!--begin: Form Wizard Head -->
                                <div class="m-wizard__head">

                                    <!--begin: Form Wizard Nav -->
                                    <div class="m-wizard__nav">
                                        <div class="m-wizard__steps">
                                            <div class="m-wizard__step m-wizard__step--done" m-wizard-target="m_wizard_form_step_1">
                                                <div class="m-wizard__step-info">
                                                    <a href="#" class="m-wizard__step-number">
                                                        <span><span>1</span></span>
                                                    </a>
                                                    <div class="m-wizard__step-label">
                                                        Product
                                                    </div>
                                                    <div class="m-wizard__step-icon"><i class="la la-check"></i></div>
                                                </div>
                                            </div>
                                            <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                                <div class="m-wizard__step-info">
                                                    <a href="#" class="m-wizard__step-number">
                                                        <span><span>2</span></span>
                                                    </a>
                                                    <div class="m-wizard__step-label">
                                                        Contact
                                                    </div>
                                                    <div class="m-wizard__step-icon"><i class="la la-check"></i></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Form Wizard Nav -->
                                </div>

                                <!--end: Form Wizard Head -->
                            </div>
                            <div class="col-xl-9 col-lg-12">

                                <!--begin: Form Wizard Form-->
                                <div class="m-wizard__form">

                                    <form class="m-form m-form--label-align-left- m-form--state-" id="m_form">
                                        <input type="hidden" value="private" id="inq_type">
                                        <!--begin: Form Body -->
                                        <div class="m-portlet__body m-portlet__body--no-padding">

                                            <!--begin: Form Wizard Step 1-->
                                            <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                                                <div class="m-form__section m-form__section--first">
                                                    <div class="m-form__heading">
                                                        <h3 class="m-form__heading-title">Product</h3>
                                                    </div>
                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Product & Quantity:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="product" id="product"  class="form-control m-input" required placeholder="200 Skateboard Decks" value="">
                                                            <span class="m-form__help">Please enter your required product(s) and the approximate quantity.</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Question:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="question"  id="question" class="form-control m-input" required placeholder="What is the production lead time?" value="">
                                                            <span class="m-form__help">Please enter your question.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!--end: Form Wizard Step 1-->


                                            <!--begin: Form Wizard Step 2-->
                                            <div class="m-wizard__form-step" id="m_wizard_form_step_2">

                                                <!--begin::Section-->
                                                <div class="m-accordion m-accordion--default" id="m_accordion_1" role="tablist">

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* First and Last Name:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="text" name="name" id="name" class="form-control m-input" required placeholder="Ryan Miller" value="">
                                                            <span class="m-form__help">Please enter your first and last name</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group m-form__group row">
                                                        <label class="col-xl-3 col-lg-3 col-form-label">* Email:</label>
                                                        <div class="col-xl-9 col-lg-9">
                                                            <input type="email" name="email" id="email" class="form-control m-input" required placeholder="ryan.miller@gmail.com" value="">
                                                            <span class="m-form__help">We will send our answer to this email address.</span>
                                                        </div>
                                                    </div>

                                                </div>

                                                <!--end::Section-->



                                                <!--end::Section-->
                                                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                                                <div class="form-group m-form__group m-form__group--sm row">


                                                    <div class="col-xl-12">
                                                        <div class="m-checkbox-inline">
                                                            <label class="m-checkbox m-checkbox--solid m-checkbox--brand">
                                                                <input type="checkbox" name="accept" value="1" id="accept">
                                                                * I have read and I agree to 2HEX' <a href="/imprint#terms" class="m-nav__link">Terms and Conditions</a>.<br>
                                                                <span></span>
                                                            </label>
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>

                                            <!--end: Form Wizard Step 4-->
                                        </div>

                                        <!--end: Form Body -->

                                        <!--begin: Form Actions -->
                                        <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                            <div class="m-form__actions">
                                                <div class="row">
                                                    <div class="col-lg-6 m--align-left">
                                                        <a href="#" class="btn btn-secondary m-btn m-btn--custom m-btn--icon" data-wizard-action="prev">
																		<span>
																			<i class="la la-arrow-left"></i>&nbsp;&nbsp;
																			<span>Back</span>
																		</span>
                                                        </a>
                                                    </div>
                                                    <div class="col-lg-6 m--align-right">
                                                        <button href="#" class="btn btn-primary m-btn m-btn--custom m-btn--icon" data-wizard-action="submit">
																		<span>
																			<i class="la la-check"></i>&nbsp;&nbsp;
																			<span>Submit</span>
																		</span>
                                                        </button>
                                                        <a href="#" class="btn btn-success m-btn m-btn--custom m-btn--icon" data-wizard-action="next">
																		<span>
																			<span>Save &amp; Continue</span>&nbsp;&nbsp;
																			<i class="la la-arrow-right"></i>
																		</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!--end: Form Actions -->
                                    </form>
                                </div>

                                <!--end: Form Wizard Form-->
                            </div>
                        </div>
                    </div>

                    <!--end: Form Wizard-->
                </div>

                <!--end: Portlet Body-->
            </div>

            <!--End::Main Portlet-->
        </div>


    </div>
@endsection