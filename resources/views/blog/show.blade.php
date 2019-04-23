@extends('layouts.app')

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
										The Skateboard Company Founder's Blog
									</h3>
								</div>
							</div>
						</div>
                                    
						<div class="m-wizard m-wizard--1 m-wizard--success" id="m_wizard">
							<div class="m-portlet__padding-x"></div>
							<div class="m-form m-form--label-align-left- m-form--state-">
								<div class="m-form__actions m-form__actions">
                                    <img 
                                    	src="{{ $post->image }}" 
                                    	style="width: 100%"
                                	>
									<br>
                                    <h2 class="m-portlet__head-text" id="imprint">
                                         {{$post->title}}
                                    </h2>
									<p>{!! $post->content !!}</p>                                          
                                </div>
                            </div>
                        </div>
					</div>
				</div>   
			</div>
		</div>
	</div>
@endsection