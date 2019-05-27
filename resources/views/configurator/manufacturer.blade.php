@extends('layouts.app')

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
                                    <h3 class="m-portlet__head-text">
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
                                    <iframe 
                                        width="100%" 
                                        height="220" 
                                        src="https://sketchfab.com/models/0f583557d87a461e8e920741ad39575c/embed" 
                                        frameborder="0" 
                                        allow="autoplay; fullscreen; vr" 
                                        mozallowfullscreen="true" 
                                        webkitallowfullscreen="true">
                                    </iframe>
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
                                        <p style="padding: 0 30px;">

                                            Start the configuration process to create a skateboard deck production
                                            that perfectly fits to your brand - by quality, specifications and style!<br>
                                            <br>
                                            Skateboard decks are the most frequently replaced part of skateboards, which
                                            makes it a popular first product for skateboard companies. Skateboard decks
                                            offer a lot of customization options, enabling brands to differentiate from
                                            the current trend and create their own style.<br>

                                            <br><br>

                                        <b style="color: #716aca">LOCATIONS</b><br>
                                            We have two production locations: China and Germany.<br>
                                            In China we run all major productions, this includes the productions
                                            of our own stock for Germany as well as the productions for many of the world's leading professional skateboard companies.<br>
                                            We regularly ship pre-manufactured blank decks to Germany, so that we can offer small quantities and
                                            fast turn around times to European skateboard businesses.<br>
                                            <br><br>

                                       <b style="color: #716aca">CUSTOMIZATION BY LOCATION & QUANTITY</b><br>
                                            Orders of 50 skateboard decks or more will be made in our Chinese production. Here we offer all customization options,
                                            so that you can make skateboard decks that perfectly fit to your riders' tricks and style!<br>
                                            If your order 10 to 40 skateboard decks, we will print your designs on pre-manufactured skateboard decks in Germany.
                                            When ordering decks from our stock, you can only select the deck shape, concave and print.<br>
                                      <br><br>

                                            <b style="color: #716aca">PRODUCTION & DELIVERY TIME</b><br>
                                            The production time in China is 6 weeks.<br>
                                            The production time in Germany is 4 weeks.<br>
                                            <br>
                                            <b>Delivery Time for European businesses:</b> <br>
                                            Delivery from Germany to any European country is 1 week;<br>
                                            Delivery from China to any European country is 5 weeks.<br>
                                            If you order 50 or more decks and a fast production and delivery is more important to you than fully customizing your decks,
                                            then complete and submit your order and answer to our order confirmation email to tell us that you want your production made in Germany.
                                            We will correct your invoice accordingly.<br>
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