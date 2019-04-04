@extends('layouts.app')

@section('content')
   <div class="m-grid__item m-grid__item--fluid m-wrapper">

                    <!-- BEGIN: Subheader -->
                    

                    <!-- END: Subheader -->
                    
                    
        <div class="m-content">
            <div class="row">
                <div class="col-xl-9">

                    <!--Begin::Main Portlet-->
                    <div class="m-portlet">

                        <!--begin: Portlet Head-->
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Skateboard Deck Configurator
                                        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline" id="breadcrumbs">
                                    
                                            <li class="m-nav__item">
                                                <a href="/" class="m-nav__link">
                                                    <span class="m-nav__link-text">Home -</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="skateboard-deck-manufacturer" class="m-nav__link">
                                                    <span class="m-nav__link-text">Configurator -</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="skateboard-deck-configurator" class="m-nav__link">
                                                    <span class="m-nav__link-text">SB Deck</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </h3>
                                </div>
                            </div>       
                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">
                                        <a href="#" data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="Get help with filling up this form">
                                            <i class="flaticon-info m--icon-font-size-lg3"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!--end: Portlet Head-->
                        <!--begin: Form Wizard-->
                        <div class="m-wizard m-wizard--1 m-wizard--success" id="m_wizard">

                            <!--begin: Message container -->
                            <div class="m-portlet__padding-x">

                                <!-- Here you can put a message or alert -->
                            </div>

                            <!--end: Message container -->
        <div class="progress" style="height: 2px;"></div>

                            <!--begin: Form Wizard Form-->
                            
                                <div class="m-form m-form--label-align-left- m-form--state-">
                                    <!--begin: Form Body -->
                                    <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                        <iframe width="100%" height="220" src="https://sketchfab.com/models/0f583557d87a461e8e920741ad39575c/embed" frameborder="0" allow="autoplay; fullscreen; vr" mozallowfullscreen="true" webkitallowfullscreen="true"></iframe>

                                        <div class="m-form__actions m-form__actions">
                                            Skateboard decks are the most frequently replaced part of skateboards, which
                                            makes it a popular first product for skateboard companies. Skateboard decks
                                            offer a lot of customization options, enabling brands to differentiate from
                                            the current trend and create their own style.
                                    </p>
                                    <p>
                                        Start the configuration process to create a skateboard deck production
                                        that perfectly fits to your brand - by quality, usage and style!
                                    </p>
                                </div>
                                    </div>
                                    <!--end: Form Body -->

                                    <!--begin: Form Actions -->
                                    <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                        <div class="m-form__actions m-form__actions">
                                                <a href="skateboard-deck-configurator" id="start_purchase" class="btn btn-primary m-btn m-btn--custom m-btn--icon">
                                                    add custom skateboard decks to your order
                                                    <i class="la la-arrow-right"></i>
                                                </a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <!--end: Form Wizard-->
                    </div>
                    <!--End::Main Portlet-->
                </div>
                
                <div class="col-xl-3">
                    <div class="m-portlet">
                        <div class="m-portlet__body">
                            <div class="m-section">
                                <h2 class="m-section__heading">Skateboard Decks</h2>
                                <div class="m-section__content">
                                    
                                    <img alt="" src="/skateboard-deck-production/width-skateboard-decks-factory-2hex.jpg" style="width: 100%" />
                
                                </div>
                            </div>
                            <!--end: Form Body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection