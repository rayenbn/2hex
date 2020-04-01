@extends('layouts.app')

@section('title', 'SKATEBOARD WHEEL MANUFACTURER')

@push('head.meta')
    <meta name="description" content="2HEX skateboard decks manufacturer manufacturing skateboards, decks, grip tapes, skateboard-components and skateboard wheels">

    <meta name="keywords" content="skateboard wheels manufacturer, skateboard decks supplier, skateboard decks factory, skateboard, decks, manufacturer, factory, supplier, skateboard griptape manufacturer, skateboard griptape supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
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
                                        Skateboard Bearings Configurator
                                        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline" id="breadcrumbs">
                                    
                                            <li class="m-nav__item">
                                                <a href="/" class="m-nav__link">
                                                    <span class="m-nav__link-text">Home -</span>
                                                </a>
                                            </li>
                                            <li class="m-nav__item">
                                                <a href="skateboard-wheels-manufacturer" class="m-nav__link">
                                                    <span class="m-nav__link-text">Bearings Configurator</span>
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
                                        height: 300px;
                                        background-image: url(/img/Wheels/2hex-custom-skateboard-wheels.jpg);
                                        background-size: contain;
                                        background-repeat: no-repeat;
                                    "></div>
                                    <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                        <div class="m-form__actions" style="text-align: center; padding: 15px 0;">
                                            <a
                                                href="{{route('bearings.configurator')}}"
                                                id="start_purchase"
                                                class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                            >
                                                develope your bearings
                                                <i class="la la-arrow-right"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="m-form__actions">
                                        <p style="padding: 0 30px;">
                                            Start the development of your own skateboard wheels. Take your time to develop an innovative new style of wheels
                                            OR simply keep the preset to order standard skateboard wheels.<br>
                                            <br>
                                            Skateboard wheels offer a lot of customization options, enabling skateboard brands to differentiate from
                                            the current trend and create their own style.<br>

                                            <br><br>

                                        <b style="color: #716aca">LOCATIONS</b><br>
                                            2HEX is a German company, with productions all over the world.
                                            Our skateboard wheels are manufactured in China. To save on shipping costs and time, we will not ship skateboard wheels to Germany before
                                            forwarding the wheels to you. Instead, your custom skateboard wheels will be sent directly to your door.<br>
                                            <br><br>

                                            <b style="color: #716aca">PRODUCTION TIME</b><br>
                                            The production time of custom skateboard wheels is 6 weeks.<br>
                                            <br><br>

                                            <b>DELIVERY TIME TO EUROPE, AMERICA and REST OF THE WORLD</b> <br>
                                            Up to 400 sets of skateboard wheels (or 100 KG), the cheapest and fastest option is airfreight. The delivery takes 10 working days.<br>
                                            If you order 500 sets of wheels, or if you add other products to reach a weight of over 110 KG the goods will be delivered by Ocean Freight.
                                            This delivery will take 6 weeks, door to door.<br>
                                            <br>
                                            <b>DELIVERY TIME TO ASIA</b><br>
                                            p to 400 sets of skateboard wheels (or 100 KG), the cheapest and fastest option is airfreight. The delivery takes 8 working days.<br>
                                            If you order 500 sets of wheels, or if you add other products to reach a weight of over 110 KG the goods will be delivered by Ocean or Land.
                                            This delivery will take 3 weeks, door to door.<br>
                                            <br>


                                        </p>
                                    </div>
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

                                <h2 class="m-section__heading" style="color: #5867dd">Plan your order!</h2>

                                <div class="m-section__content">
                                    <p>
                                        Skateboard wheels configurator FAQ.
                                    </p>
                                    <p>
                                        Follow the notes on the right side, to learn how to best use the configurator.
                                    </p>

                                    <a href="{{route('bearings.configurator')}}">
                                        <h2 class="m-section__heading" style="color: #5867dd">Start Here</h2></a>

                                    <img alt="" src="/img/Wheels/2hex-skateboard-wheels-factory.jpg" style="width: 100%" />
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