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
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
    
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


            <div class="m--margin-bottom-30">
                <div class="ism-slider" data-play_type="loop" data-radio_type="thumbnail" id="my-slider">
                    <ol>
                        <li>
                            <img
                                src="{{ asset('/skateboard-deck-production/2HEX-skateboard-manufacturer-warehouse-factory-skate.jpg') }}"
                                alt="2HEX Your Skateboard Manufacturer"
                                title="2HEX Your Skateboard Manufacturer"
                                style="width: 100%;"
                            >
                        </li>

                        <li>
                            <img src="/ism/image/slides/2HEX-skateboard-wheels-manufacturer-factory.jpg">
                        </li>
                        <li>
                            <img src="/ism/image/slides/2HEX-skateboard-griptape-manufacturer-factory.jpg">
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

            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" style="width: 100%;" role="alert">
                <div class="m-alert__text">


                    <h2>We want athletes to create great skateboard companies!</h2>
                    We do so by offering easy access to reliable, pro quality mass productions.<br>
                    Our users choose from over 100 billion product variations when planning their productions on 2HEX.
                    <br>
                    2HEX is a web platform to arrange sport equipment productions online.<br>
                    <br>
                    <a href="{{route('register')}}">
                        <button type="button" class="btn m-btn m-btn--gradient-from-danger m-btn--gradient-to-warning">→ Register to plan your production!</button>
                    </a>

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
                                        <span>add decks to order</span>
                                        <i class="la la-arrow-right"></i>
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
                                        <span>add wheels to order</span>
                                        <i class="la la-arrow-right"></i>
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



                <div class="col-xl-4">
                    <!--begin:: samples-->
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
                    <!--end:: samples-->
                </div>



                <div class="col-xl-4">
                    <!--begin:: newsletter-->
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
                    <!--end:: newsletter-->
                </div>


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

             <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" style="width: 100%;" role="alert">
                 <div class="m-alert__text">


                     <a href="{{route('inquirieschoice')}}">
                         <button type="button" class="btn btn-secondary">

                             <i class="m-menu__link-icon flaticon-email"> </i>
                             &nbsp Questions? Message us!</button>
                     </a>

                 </div>
             </div>
         
			<div class="row">
				<div class="col-xl-12">
					<div class="m-portlet m-portlet--full-height ">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h2 class="m-portlet__head-text">
                                        The Skateboard Manufacturer Blog
									</h2>
								</div>
							</div>

                            @php $request = request(); @endphp

                            <div class="m-portlet__head-caption">
                                <div class="d-flex justify-content-between mr-4">
                                   <!--
                                    <a
                                        href="{{route('index',['gap' => 'last_month', '#blog'])}}"
                                        class="btn btn-sm m-btn--pill {{$request->get('gap') == 'last_month' ? 'btn-brand' : ''}}"
                                    >
                                        Last Month
                                    </a>
                                    <a
                                        href="{{route('index', ['gap' => 'last_year', '#blog'])}}"
                                        class="btn btn-sm m-btn--pill {{$request->get('gap') == 'last_year' ? 'btn-brand' : ''}}"
                                    >
                                        Last Year
                                    </a>
                                    <a
                                        href="{{route('index', ['gap' => 'all', '#blog'])}}"
                                        class="btn btn-sm m-btn--pill {{$request->get('gap') == 'all' || empty($request->get('gap')) ? 'btn-brand' : ''}}"
                                    >
                                        All time
                                    </a>
                                    -->

                                </div>
                                @if($posts->count())
                                    {{ $posts->fragment('blog')->appends($request->input())->links() }}
                                @endif
                            </div>


                            @if(auth()->check() && auth()->user()->isAdmin())
    							<div class="m-portlet__head-caption">
                                    <a href="{{ route('blog.create') }}" class="btn btn-outline-success">New Post</a>
                                </div>
                            @endif
						</div>
						<div class="m-portlet__body">

							<div class="tab-content">
								<div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
                                    <div class="m-widget5">

                                        @forelse ($posts as $article)
                                            @include('blog.partials.article', ['article' => $article])
                                        @empty
                                            <p>We haven't published anything yet, but soon there will be something to read here.</p>
                                        @endforelse

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


            <div class="alert alert-info m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30" role="alert">

                <div class="m-alert__text">

                    <a href="{{route('register')}}">
                        <button type="button" class="btn m-btn m-btn--gradient-from-primary m-btn--gradient-to-info">→ Register to plan your production!</button><br>
                    </a>
                </div>

            </div>

        </div>
</div>
@endsection