@extends('layouts.app')
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
					<h3 class="m-subheader__title ">2HEX Your Skateboard Manufacturer</h3>
				</div>
			</div>
		</div>
		<!-- END: Subheader -->
                    
		<div class="m-content">


            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" style="width: 100%;" role="alert">
                <div class="m-alert__text">
                    <h4>
                        <a href="{{route('register')}}">Sign Up</a> 
                        and choose the best 
                        <a href="{{route('skateboard.manufacturer')}}">decks</a> and
                        <a href="{{route('griptape.manufacturer')}}">griptapes</a> for your brand!
                    </h4>

                    We give everyone access to the highest quality skateboard production! We make skateboard customization options and cost calculations transparent.


                </div>
            </div>


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
                        
			<!--Begin::Section-->
			<div class="row">

                <div class="col-xl-4">
                    <!--begin:: Widgets/Activity-->
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
                                            <img src="/skateboard-deck-production/skateboard-production-factory-manufacturer-catalog.jpg" alt="" style="width: 100%;">
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
                    <!--end:: Widgets/Activity-->
                </div>

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
											<img src="/skateboard-deck-production/stacked-skateboard-decks-factory-2hex.jpg" alt="" style="width: 100%;">
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
                
                <!-- Grip Tape -->
                <div class="col-xl-4">
                    @include('widgets.grip-tape-widget')
                </div>



                <div class="col-xl-4">
                    <!--begin:: Widgets/Activity-->
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
                                            <img src="/skateboard-deck-production/skateboard-manufacturer-samples-widget.jpg" alt="" style="width: 100%;">
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
                                <h3>Deck & Grip Samples</h3>
                                Order a sample pack with decks and griptapes. Test our samples to feel the
                                high product quality offered at 2HEX. You can order between one and three
                                decks with your required shape, concave and other specifications. Each deck
                                comes with a separately packed griptape.
                            </div>
                            <br>
                            <div class="m-widget19__action">
                                <a href="samples" class="btn btn-sm btn-danger m-btn--pill  btn-brand">
                                    <span>
                                        <span>order samples</span>
                                        <i class="la la-arrow-right"></i>
                                    </span>
                                </a>
                            </div>

                        </div>
                    </div>
                    <!--end:: Widgets/Activity-->
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
         
			<div class="row">
				<div class="col-xl-12">
					<div class="m-portlet m-portlet--full-height ">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text">
                                        The Skateboard Company Founder's Blog
									</h3>
								</div>
							</div>
                            
                            @if($posts->count())
                                <div class="m-portlet__head-caption">
                                    {{ $posts->fragment('blog')->links() }}
                                </div>
                            @endif

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
            
            <div class="alert alert-brand m-alert m-alert--icon m-alert--air m-alert--square m--margin-bottom-30" role="alert">
                <div class="m-alert__icon">
                    <i class="flaticon-exclamation-1"></i>
                </div>
                <div class="m-alert__text">
                    We are building up a new web presence. If you need more info, visit
                    <a href="http://skateboard-factory.com" class="m-link m-link--warning m--font-bold" target="_blank">
                        our old website.
                    </a>
                    or download our
                    <a href="newsletter" class="m-link m-link--warning m--font-bold" target="_blank">
                        catalog
                    </a>
                </div>
            </div>

        </div>
</div>
@endsection