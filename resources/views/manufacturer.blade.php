@extends('layouts.app')

@section('title', 'SKATEBOARD DECKS MANUFACTURER')

@push('head.meta')
    <meta name="description" content="2HEX skateboard decks manufacturer manufacturing skateboards, decks, grip tapes, skateboard-components and skateboard wheels">

    <meta name="keywords" content="skateboard decks manufacturer, skateboard decks supplier, skateboard decks factory, skateboard, decks, manufacturer, factory, supplier, skateboard griptape manufacturer, skateboard griptape supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
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
                                                    href="{{route('get.skateboard.configurator')}}"
                                                    id="start_purchase"
                                                    class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                            >
                                                select your decks
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

                                        <div class="m-separator m-separator--fit"></div>
                                        <div id="decktemplates"> </div>
                                        <br>


                                        <table style="width:100%" >
                                            <tr>
                                                <th>
                                                    @if (Auth::user())
                                                        <a href="/skateboard-deck-production/2HEX-skateboard-deck-design-template.pdf"> <p style="color: #5867dd">✖ Download Skateboard Deck Template:</p></a>

                                                    @else
                                                        <a href="{{route('register')}}"> <p style="color: #5867dd">✖ Download Skateboard Deck Template:</p></a>
                                                    @endif
                                                </th>
                                                <th>
                                                    @if (Auth::user())
                                                        <a href="/img/skateboard/SKATEBOARD-DECK-TEMPLATE-PSD-MOCKUP.psd"><p style="color: #5867dd">✖ Download Skateboard Deck Mockup:</p></a>
                                                    @else
                                                        <a href="{{route('register')}}"><p style="color: #5867dd">✖ Download Skateboard Deck Mockup:</p></a>
                                                    @endif
                                                </th>
                                            </tr>
                                            <tr>
                                                <td> <img src="/img/skateboard/free-skateboard-deck-design-template.jpg"     style="width: 80%;" alt="free skateboard deck design template"> </td>
                                                <td> <img src="/img/skateboard/free-psd-deck-mockup.jpg"                     style="width: 80%;" alt="free skateboard deck design template"> </td> <br>
                                            </tr>
                                            <tr>
                                                <td valign="top">    <p>
                                                        <b>Download skateboard deck template.</b><br>
                                                        The skateboard deck template includes:<br>
                                                        - 1:1 sized skateboard deck outline.<br>
                                                        - 9" x 33" artboard for heat transfers.<br>
                                                        - Design process instructions

                                                    </p>  </td>

                                                <td valign="top">    <p>
                                                        <b>Download 2HEX' hyper-realistic skateboard deck mockup.</b><br>
                                                        The skateboard deck mockup includes:<br>
                                                        -	2HEX original deck shape.<br>
                                                        -	American hard rock maple veneer (same as our decks).<br>
                                                        -	An editable color-film to replicate all veneer colors.<br>
                                                        -	A bottom and top print preview.<br>
                                                        -	A mask-layer automatically cutting your design to the deck shape.<br>
                                                        -	Instructions for users who are new to Photoshop.

                                                    </p>    </td>
                                            </tr>
                                        </table>

                                        <br>
                                        <br>

                                        <b style="color: #716aca">SKATEBOARD DECK PRODUCTION LOCATIONS</b><br>
                                            We have two skateboard production locations: China and Germany.<br>
                                            In China we run all major skateboard productions, this includes the productions
                                            of our own stock for Germany as well as the productions for many of the world's leading professional skateboard companies.<br>
                                            We regularly ship pre-manufactured blank skateboard decks to Germany, so that we can offer faster turn around times to European skateboard businesses.<br>
                                        <br>
                                        <b>"I am European, do I save on shipping when ordering skateboard decks from Germany?"</b><br>
                                        Instead of the high delivery costs, we have high labour costs in Germany. These higher labour costs are equivalent to the delivery cost from China.
                                        Therefor the final price including delivery stays the same no matter if your decks come from Germany or from China.<br>
                                        <br>
                                        <b>"I want my skateboard decks sent from Germany, where can I select this option?"</b><br>
                                        Make sure to select random veneer colors and Epoxy glue decks with American maple - those are the decks we have on stock in Germany.
                                        After submitting your order, reply to our order confirmation email stating that you want your decks made in Germany for a faster production time.
                                        <br>
                                        <br>
                                        <b>"I am American, what shall I select?"</b><br>
                                        All of our decks come from our production in China. Instead of shipping the decks to Germany first, we will send your decks directly from China.<br>

                                            <br><br>


                                            <b style="color: #716aca">PRODUCTION & DELIVERY TIME OF CUSTOM SKATEBOARD DECKS</b><br>
                                            The skateboard decks production time in China is 6 weeks.<br>
                                            The skateboard decks production time in Germany is 4 weeks.<br>
                                            <br>
                                            <b>Delivery Time for American businesses:</b> <br>
                                            Delivery from China to any American country is 5 weeks;<br>
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
                                        href="{{route('get.skateboard.configurator')}}" 
                                        id="start_purchase" 
                                        class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                    >
                                        add custom skateboard decks to your order
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

                                <h2 class="m-section__heading" style="color: #5867dd">Plan your order!</h2>

                                <div class="m-section__content">
                                    <p>
                                        We will now take you to the deck configurator.
                                    </p>
                                    <p>

                                        If you want your design in multiple sizes, add a new batch for each size.
                                        The more batches you add, the further the price drops.
                                    </p>




                                    <a href="{{route('get.skateboard.configurator')}}">
                                        <h2 class="m-section__heading" style="color: #5867dd">Start Here</h2></a>

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