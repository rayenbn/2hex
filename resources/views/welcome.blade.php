@extends('layouts.app')

@section('title', 'SKATEBOARD MANUFACTURER')

@push('head.scripts')
    <script>
        if (location.hash) {
            let target = location.hash;
            let el = document.querySelector(target);
            if (el) {
                window.scrollTop = el.offsetTop;
            }
        }
    </script>
    <link rel="stylesheet" href="/ism/css/my-slider.css"/>
    <script src="/ism/js/ism-2.2.min.js"></script>
@endpush

@push('head.meta')
    <meta name="description" content="2HEX skateboard manufacturer manufacturing skateboards, skateboard decks, skateboard wheels, skateboard griptapes and high quality complete skateboards.">
    <meta name="keywords" content="skateboard manufacturer, skateboard supplier, skateboard factory, skateboard, manufacturer, supplier, factory, skateboard manufacturers, skateboard factories, 2hex, Germany, Australia, Europe, England, Great Britain, Board, skateboard production">
@endpush

@section('content')
    <div class="m-grid__item m-grid__item--fluid {{$isHomePage ? '' : 'm-wrapper'}}">
    
		<!-- BEGIN: Subheader -->
		<div class="m-subheader ">
            @if(session()->has('message'))
                <div class="alert alert-success">
                {{ session()->get('message')}}
                </div>
            @endif

			<div class="d-flex align-items-center">
				<div class="mr-auto">
                    <!-- <h1 class="m-subheader__title ">2HEX Skateboard Manufacturer</h1> -->
                </div>
            </div>
        </div>
        <!-- END: Subheader -->
                    
		<div class="m-content">


        <!--
            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" style="width: 100%;" role="alert">
                <div class="m-alert__text">
                    <h4>
                        <a href="{{route('register')}}">Register</a> 
                        to make the best 
                        <a href="{{route('skateboard.manufacturer')}}">decks</a> and
                        <a href="{{route('griptape.manufacturer')}}">griptapes</a> for your brand!
                    </h4>

                    We at 2HEX give everyone access to the highest quality skateboard production by making customization options and cost calculations transparent.


                </div>
            </div>
-->
            <div class="m-alert m-alert--icon  m-alert--square alert alert-dismissible m--margin-bottom-30" style="width: 100%; background-color: transparent;" role="alert">
                <div class="m-alert__text">
                    <h2>Custom Productions for Skateboard Companies.</h2>
                    Get access to simple, reliable, transparent, pro quality, mass productions of skateboard wheels, decks and grip tapes.<br>
                    With 2HEX skateboard companies can produce customized skateboard components and track productions online.
                </div>
            </div>


            <div class="m--margin-bottom-30">
                <div class="ism-slider" data-play_type="loop" data-radio_type="thumbnail" id="my-slider">
                    <ol>
                        <li>
                            <img
                                    src="{{ asset('/skateboard-deck-production/skateboard-manufacturer-factory-skate.jpg') }}"
                                    alt="2HEX Your Skateboard Manufacturer"
                                    title="2HEX Your Skateboard Manufacturer"
                                    style="width: 100%;"
                            >
                        </li>

                        <li>
                            <img src="/ism/image/slides/2HEX-skateboard-wheels-manufacturer-factory.jpg">
                        </li>
                        <li>
                            <img
                                    src="/ism/image/slides/2HEX-skateboard-griptape-manufacturer-factory.jpg"
                            >
                        </li>
                    </ol>
                </div>
            </div>


            <!--
            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" role="alert">
				<div class="m-alert__text">
                    <img 
                        src="{{ asset('/skateboard-deck-production/2HEX-skateboard-manufacturer-warehouse-factory-skate.jpg') }}" 
                        alt="2HEX Your Skateboard Manufacturer" 
                        title="2HEX Your Skateboard Manufacturer" 
                        style="width: 100%;"
                    />
				</div>
			</div>
            -->
                        
			<!--Begin::Section-->

        <!--
            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" style="width: 100%;" role="alert">
                <div class="m-alert__text" style="background-image: url(/img/wall.jpg); background-size: 100%;">


                    <h2>Custom Productions for Skateboard Companies.</h2>
                   Get access to simple, reliable, transparent, pro quality, mass productions of skateboard wheels, decks and grip tapes.<br>
                    With 2HEX skateboard companies can produce customized skateboard components and track productions online.
                </div>
            </div>
-->
            <div class="m-portlet" style="background-color: #eceff1; margin-top: 10%;">


                <div class="row">

                    <div class="col-xl-4" style="margin: 20px;" >
                        <p>
                            <img alt="" src="/img/skateboard/process-devices.jpg" style="width: 100%" />
                        </p>
                    </div>
                    <div class="col-xl-6 my-auto">
                        <h2>Your Production Order in 3 Steps:</h2>
                        <p>1. customize your decks, wheels or griptapes </p>
                        <p>2. upload your designs</p>
                        <p>3. check your shopping cart and submit</p>
                        <p>We will do the rest!</p>
                        <p>
                            @if (Auth::user())
                            <div class="dropdown">
                                <button
                                        class="btn m-btn dropdown-toggle dropdown-toggle-split m-btn--gradient-from-primary m-btn--gradient-to-info"
                                        type="button"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        id="actions"
                                >
                                    Select a Product to get started!
                                </button>


                                <div class="dropdown-menu" aria-labelledby="actions">
                                    <a class="dropdown-item" href="{{ route('griptape.manufacturer') }}">
                                       Griptapes
                                    </a>
                                    <a class="dropdown-item" href="{{ route('skateboard.manufacturer') }}">
                                        Decks
                                    </a>
                                    <a class="dropdown-item" href="{{ route('wheels.manufacturer') }}">
                                        Wheels
                                    </a>
                                </div>

                            </div>

                            @else
                                <a href="{{route('register')}}">
                            <button type="button" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info">Register now to start your production!</button>
                        </a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>


			<div class="row">

				<div class="col-xl-4">
					<!--begin:: Widgets/Activity-->
					<div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text m--font-dark">
										Skateboard Decks
									</h3>
								</div>
							</div>

							<div class="m-portlet__head m-portlet__head--fit">
								<div class="m-portlet__head-caption">
									<div class="m-portlet__head-action">

									</div>
								</div>
							</div>
						</div>
						<div class="m-portlet__body">
							<div class="m-widget17">
								<div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
									<div>
										<div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
											<img src="/skateboard-deck-production/stacked-skateboard-decks-factory-2hex.jpg" alt="skateboard decks manufacturer" style="width: 100%;">
										</div>
									</div>
								</div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Shapes
											</span>
                                            <span class="m-widget17__desc">
												Check our big list of shapes
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Sales
											</span>
                                            <span class="m-widget17__desc">
												Our bestseller!
											</span>
                                        </div>
                                    </div>
                                </div>
							</div>
							<div style="text-align: justify; color: #9699a4;">
								<h3>Skateboard Decks</h3>
								Skateboard decks are the most frequently replaced part of skateboards, which
								makes it a popular first product for skateboard companies. Skateboard decks
								offer a lot of customization options, enabling brands to differentiate from
								the current trend and create their own style.
							</div>
							<br>
							<div class="m-widget19__action">
								<a href="{{route('skateboard.manufacturer')}}" class="btn btn-sm btn-danger m-btn--pill  btn-brand">
                                    <span>
                                        <span>Customize & Add to Shopping Cart</span>
                                    </span>
								</a>
							</div>

						</div>
					</div>
					<!--end:: Widgets/Activity-->
				</div>


                <div class="col-xl-4">
                    <!--begin:: Wheels-->
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text m--font-dark">
                                        Skateboard Wheels
                                    </h3>
                                </div>
                            </div>

                            <div class="m-portlet__head m-portlet__head--fit">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-action">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget17">
                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                    <div>
                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
                                            <img src="/img/Wheels/skateboard-wheels-print/custom-skateboard-wheels-factory-banner-2hex.jpg" alt="custom skateboard wheels manufacturer" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Shapes
											</span>
                                            <span class="m-widget17__desc">
												Check our big list of shapes
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												OEM
											</span>
                                            <span class="m-widget17__desc">
												Add your print and packaging
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: justify; color: #9699a4;">
                                <h3>Skateboard Wheels</h3>
                                Create your own skateboard wheels technology! Create your own shapes, urethane,
                                color and print. To make a perfect first impression, wrap a cardboard around your
                                custom packed wheels and have them shipped to you in cartons with your company's
                                product details and logo!
                            </div>
                            <br>
                            <div class="m-widget19__action">
                                    <a href="skateboard-wheels-manufacturer" class="btn btn-sm btn-danger m-btn--pill  btn-brand">
                                    <span>
                                        <span>Customize & Add to Shopping Cart</span>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!--end:: Widgets/Activity-->
                </div>





                <!-- Grip Tape -->
                <div class="col-xl-4">
                    @include('widgets.grip-tape-widget')
                </div>


<!--
                <div class="col-xl-4">
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                        <div class="m-portlet__head">

                            <div class="m-portlet__head m-portlet__head--fit">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-action">

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget17">
                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                    <div>
                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
                                            <img src="/skateboard-deck-production/skateboard-manufacturer-samples-widget.jpg" alt="skateboard manufacturer" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
                                                Test
											</span>
                                            <span class="m-widget17__desc">
												Test the 2HEX product quality.
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Quality
											</span>
                                            <span class="m-widget17__desc">
												Great quality sells best!
											</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: justify; color: #9699a4;">
                                <h3>Sample Sets</h3>
                                Order a sample pack with decks and griptapes. Test our samples to feel the
                                high product quality offered at 2HEX. You can order between one and three
                                decks with your required shape, concave and other specifications. Each deck
                                comes with a separately packed griptape.
                            </div>
                            <br>
                            <div class="m-widget19__action">
                                <a href="samplesets" class="btn btn-sm btn-danger m-btn--pill  btn-brand">
                                    <span>
                                        <span>order samples</span>
                                        <i class="la la-arrow-right"></i>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>



                <div class="col-xl-4">
                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                </div>
                            </div>

                            <div class="m-portlet__head m-portlet__head--fit">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-action">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__body">
                            <div class="m-widget17">
                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                    <div>
                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides">
                                            <img src="/skateboard-deck-production/skateboard-production-factory-manufacturer-catalog.jpg" alt="skateboard manufacturer catalog" style="width: 100%;">
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget17__stats">
                                    <div class="m-widget17__items m-widget17__items-col1">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-	flaticon-presentation-1 m--font-brand"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Our Offer
											</span>
                                            <span class="m-widget17__desc">
												See our major products
											</span>
                                        </div>
                                    </div>
                                    <div class="m-widget17__items m-widget17__items-col2">
                                        <div class="m-widget17__item">
											<span class="m-widget17__icon">
												<i class="flaticon-graph m--font-success"></i>
											</span>
                                            <span class="m-widget17__subtitle">
												Best
											</span>
                                            <span class="m-widget17__desc">
												See best sellers
											</span>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div style="text-align: justify; color: #9699a4;">
                                <h3>Catalog & Newsletter</h3>
                                Signup to our newsletter and download our product catalog!<br>
                                The catalog is filled with numerous high definition photos
                                of 2HEX skateboard products. The newsletter brings you the
                                most important skateboard production updates; right to your inbox.
                            </div>
                            <br>
                            <div class="m-widget19__action">
                                <a href="newsletter" class="btn btn-sm btn-danger m-btn--pill  btn-brand">
                                    <span>
                                        <span>get our catalog</span>
                                        <i class="la la-arrow-right"></i>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            -->

                <!-- MANUAL PRODUCTS -->

			</div>

		</div>




        <!--
		<div class="m-subheader ">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="m-subheader__title ">2HEX' Blog</h3>
				</div>
			</div>
		</div>
        -->


		 <div class="m-content" id="blog">


             <div class="m-portlet">
                 <div class="row">
                     <div class="col-xl-4" style="margin: 20px;">
                         <p>
                             <img alt="" src="/skateboard-deck-production/2hex-book.jpg" style="width: 100%" />
                         </p>
                         <br>
                     </div>

                     <div class="col-xl-6 my-auto">
                         <link href="../../../css/classic-10_7.css" rel="stylesheet" type="text/css" />
                         <div id="mc_embed_signup">
                            <form action="/bookdown" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate">
                                {{ csrf_field() }}
                                <div id="mc_embed_signup_scroll" style="max-width: 700px;">

                                     <h2 style="color: #d46671">GET THE SKATEBOARD COMPANY FOUNDERS BOOK</h2>
                                     <div style="text-align: justify; color: #9699a4; padding-right: 20px;">
                                        <p>This book guides you through the difficulties of building a skateboard company. It helps you identify and solve problems, which big skateboard companies struggled with when they started.</p>
                                     </div>
                                     <div class="mc-field-group">
                                         <input type="email" value="" name="email" class="required email" id="mce-EMAIL" placeholder="enter your email address">
                                     </div>
                                     <div class="mc-field-group">
                                         <input type="text" value="" name="fname" class="" id="mce-FNAME" placeholder="enter your first name">
                                     </div>
                                     @if(session()->has('error'))
                                        <span style="color: red">You have already submitted with this email.</span>
                                     @endif
                                     @if(session()->has('success'))
                                        <span style="color: blue">Successfully subscribed. Please check you email</span>
                                     @endif

                                     <div id="mce-responses" class="clear">
                                         <div class="response" id="mce-error-response" style="display:none"></div>
                                         <div class="response" id="mce-success-response" style="display:none"></div>
                                     </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                     <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_647f3b724d78e4fe975871794_bb8f89e732" tabindex="-1" value=""></div>
                                     <div class="clear"><input type="submit" value="Receive the Book by Email*" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
                                     <br>
                                     <div style="text-align: justify; color: #9699a4;">
                                    <p>*By submitting you agree to our terms and conditions.</p>
                                 </div>
                                </div>
                            </form>
                         </div>
                    </div>

                 </div>
             </div>

            <div class="alert alert-info m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30" style="width: 100%;" role="alert">

                <div class="m-alert__text">
                    @if (Auth::user())
                        <div class="dropdown">
                            <button
                                class="btn m-btn dropdown-toggle dropdown-toggle-split m-btn--gradient-from-primary m-btn--gradient-to-info"
                                type="button"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false"
                                id="actions"
                            >
                                Select a Product to get started!
                            </button>
                            <div class="dropdown-menu" aria-labelledby="actions">
                                <a class="dropdown-item" href="{{ route('griptape.manufacturer') }}">
                                    Griptapes
                                </a>
                                <a class="dropdown-item" href="{{ route('skateboard.manufacturer') }}">
                                    Decks
                                </a>
                                <a class="dropdown-item" href="{{ route('wheels.manufacturer') }}">
                                    Wheels
                                </a>
                            </div>
                        </div>
                    @else
                        <a href="{{route('register')}}">
                            <button type="button" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info" style="width: 100%;">→ Register now to see our prices!</button><br>
                        </a>
                    @endif
                </div>

            </div>

        </div>
</div>
@endsection
