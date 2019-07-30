@extends('layouts.app')

@section('title', 'SKATEBOARD GRIPTAPES MANUFACTURER')

@push('head.meta')
    <meta name="description" content="2HEX skateboard griptapes manufacturer manufacturing skateboards, griptapes, decks, skateboard-components and skateboard wheels">

    <meta name="keywords" content="skateboard griptape manufacturer, skateboard griptape supplier, skateboard griptape factory, skateboard, griptape, longboard griptape manufacturer, manufacturer, longboard, factory, supplier, skateboard decks manufacturer, skateboard decks supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
@endpush

@section('content')
   <div class="m-grid__item m-grid__item--fluid m-wrapper">                        
        <div class="m-content">
            <div class="row">
                <div class="col-xl-9">

                    <!--Begin::Main Portlet-->
                    <div class="m-portlet">

                        <!--begin: Portlet Head-->
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h1 class="m-portlet__head-text">
                                        Grip Tape Configurator
                                        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline" id="breadcrumbs">
                                    
                                            <li class="m-nav__item">
                                                <a href="/" class="m-nav__link">
                                                    <span class="m-nav__link-text">Home -</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a 
                                                    href="{{ route('griptape.manufacturer') }}" 
                                                    class="m-nav__link"
                                                >
                                                    <span class="m-nav__link-text">Configurator -</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a 
                                                    href="{{ route('griptape.index') }}" 
                                                    class="m-nav__link"
                                                >
                                                    <span class="m-nav__link-text">Grip</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </h1>
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
                                    <div id="preview" style="
                                        height: 250px;
                                        background-image: url(/img/griptape/custom-skateboard-griptapes-2hex.jpg);
                                        background-size: contain;
                                        background-repeat: no-repeat;
                                    "></div>
                                    <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                        <div class="m-form__actions" style="text-align: center; padding: 15px 0;">
                                            <a
                                                href="{{ route('griptape.index') }}"
                                                id="start_purchase"
                                                class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                            >
                                                select your grip tape
                                                <i class="la la-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="m-form__actions">
                                        <p>
                                            Add the perfect skateboard griptapes to your next production run!

                                            2HEX griptape configurator lets you choose from different griptape sizes, material qualities, perforation, prints, cuts, colors, back-papers and packaging options! <br>
                                            <br>
                                            The configurator lets you upload your own designs.
                                            <ul style="margin-left: 5px;">
                                                <li>
                                                    Make sure the upload is complete, by the field below turning green and your design name being shown.
                                                </li>
                                                <li>
                                                    Select the amount of colors in your design. If you use 4 colors, more or even a photo print, select CMYK.
                                                </li>
                                                <li>
                                                    If you want the same print for multiple grip tape sizes, just select your previously uploaded design from the drop down selection.
                                                </li>
                                            </ul>
                                            <br>
                                            We keep your design set up for 9 months after every production. This means, that if you re-order the same design within 9 months of your last production, you don’t have to re-pay the setup fee for the design.

                                            <br><br>
            
                                            <b style="color: #716aca">LOCATIONS</b>
                                            <br>
                                            Griptapes are currently only offered from our Chinese works!
                                            <br><br>
                                            We have two production locations: China and Germany.<br>
                                            In Germany we transfer print custom designs on blank decks. In China we run all major productions, this includes the productions of our own stock for Germany as well as the productions for many of the world's leading professional skateboard companies.<br>
                                            <br><br>

                                            <b style="color: #716aca">CUSTOMIZATION BY LOCATION & QUANTITY</b><br>
                                            By adding griptapes to your order, your order will automatically be manufactured in our Chinese works. In our Chinese works, the minimum per design is 50 decks. If you only want to order 10 to 40 decks, do not add grip tapes to your order. 
                                            <br><br>

                                            <b style="color: #716aca">PRODUCTION & DELIVERY TIME</b><br>
                                            The skateboard griptapes production time in China is 3 weeks.
                                            The skateboard decks production time in China is 6 weeks.
                                            The skateboard decks production time in Germany is 4 weeks.
                                            <br>
                                            <br>
                                            <b>Delivery Time for European businesses:</b> <br>
                                            Delivery from Germany to any European country is 1 week;<br>
                                            Delivery from China to any European country is 5 weeks.<br>
                                            If you order 50 or more decks and a fast production and delivery is more important to you, just answer to our order confirmation and tell us that you want your production made in Germany. We will manually correct your invoice accordingly.<br>
                                            <br>
                                            <b>Delivery Time for Asian businesses:</b><br>
                                            Delivery from China to any Asian country is 2 weeks;<br>
                                            Delivery from Germany to any Asian country is 5 weeks.<br>
                                            <br>
                                        </p>
                                    </div>
                                </div>
                            </div>
                                <!--end: Form Body -->

                            <!--begin: Form Actions -->
                            <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                <div class="m-form__actions" style="text-align: center; padding: 15px 0;">
                                    <a 
                                        href="{{ route('griptape.index') }}" 
                                        id="start_purchase" 
                                        class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                    >
                                        add custom grip tape to your order
                                        <i class="la la-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                        <!--end: Form Wizard-->
                    <!--End::Main Portlet-->
                </div>
                
                <div class="col-xl-3">
                    <div class="m-portlet">
                        <div class="m-portlet__body">
                            <div class="m-section">
                                <h2 class="m-section__heading">Grip Tape</h2>
                                <div class="m-section__content">
                                    <img alt="Grip Tape" title="Grip Tape" src="/img/griptape/manufacturer-right-side.jpg" style="width: 100%" />
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