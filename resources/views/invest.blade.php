@extends('layouts.app')

@section('title', 'INVEST IN 2HEX')

@push('head.meta')
    <meta name="description" content="2HEX skateboard factory. A skateboard manufacturer of skateboard decks, skateboard wheels, skateboard griptapes and high quality complete skateboards.">

	<meta name="keywords" content="2hex, skateboard, skateboard manufacturer, skateboard supplier, skateboard factory, manufacturer, supplier, factory, skateboard manufacturers, skateboard factories, Germany, Australia, Europe, England, Great Britain, Board, skateboard production">
@endpush

@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">

				
		<div class="m-content">
			<div class="row">
                
				<div class="col-xl-9">
					<div class="m-portlet">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h3 class="m-portlet__head-text" id="imprint">
										Test our demo account.
									</h3>
								</div>
							</div>
						</div>
                        
						<div class="m-wizard m-wizard--1 m-wizard--success" id="m_wizard">
							<div class="m-portlet__padding-x"> </div>
								<div class="m-form m-form--label-align-left- m-form--state-">
										<div class="m-form__actions m-form__actions">
											<p>
												<b>Login to test our demo account.</b>
											</p>
											<br>
											<p>user: niklas@2hex.com</p>
											<p>password: niklas@2hex.com</p>
											<br>
											<p>To receive an automatic invoice by email:</p>
											<p>Go to profile "Niklas V", "my details" and enter your email address.<br>
												Then go to "Your Summary" to submit the prepared order.</p>
											<br>
											<br>
											<p><b>Important Pages:</b></p>
											<p>• <a href="https://www.2hex.com/login" class="m-nav__link">Login</a></p>
											<p>• <a href="https://www.2hex.com/skateboard-deck-configurator" class="m-nav__link">Select your custom production specifications</a></p>
											<p>• <a href="https://www.2hex.com/summary" class="m-nav__link">See a summary of your order</a></p>
											<br>
											<br>
											<iframe width="560" height="315" src="https://www.youtube.com/embed/bbmKqR-MFkg" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
											<br>
											<br>
										</div>
                            </div>
                        </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection