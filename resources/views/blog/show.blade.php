@extends('layouts.app')

@section('title', 'SKATEBOARD MANUFACTURER BLOG')

@push('head.meta')
    <meta name="description" content="2HEX skateboard manufacturer blog. {{$post->title}}">

	<meta name="keywords" content="{{$post->title}}, skateboard manufacturer blog, skateboard factory blog, skateboard supplier blog, skateboard company blog, skateboard company founder, how to start a skateboard company, how to build a skateboard company, how to found a skateboard company, skateboard decks manufacturer, skateboard decks supplier, skateboard decks factory, skateboard, decks, manufacturer, factory, supplier, skateboard griptape manufacturer, skateboard griptape supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
@endpush

@push('head.styles')
	<style>
		.r-side-flex {
		    display: -webkit-box;
		    display: -ms-flexbox;
		    display: flex;
		    -webkit-box-orient: vertical;
		    -webkit-box-direction: normal;
		        -ms-flex-direction: column;
		            flex-direction: column;
		    position: fixed;
		}
		.r-side-flex .btn {
		    margin: 5px;
		}
	</style>
@endpush
@section('content')
	<div class="m-grid__item m-grid__item--fluid m-wrapper">
		<div class="m-content">
			<div class="row">
				<div class="col-md-9">
					<div class="m-portlet">
						<div class="m-portlet__head">
							<div class="m-portlet__head-caption">
								<div class="m-portlet__head-title">
									<h1 class="m-portlet__head-text" id="imprint">
										The Skateboard Manufacturer Blog
									</h1>
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
                                    <h2 class="m-portlet__head-text mt-5" id="imprint">
                                         {{$post->title}}
                                    </h2>
									<p>{!! html_entity_decode($post->content) !!}</p>                                          
                                </div>
                            </div>
                        </div>
					</div>
				</div>   
				@if(auth()->check() && auth()->user()->isAdmin())
					<div class="col-md-3">
						<form action="{{ route('sbblog.destroy', $post->id) }}" method="POST" class="r-side-flex">
			                {{ csrf_field() }}
			                {{ method_field('DELETE') }}
							<a href="{{ route('sbblog.create') }}" class="btn btn-outline-success">New Post</a>
							<a href="{{ route('sbblog.edit', $post->id) }}" class="btn btn-outline-warning">Edit</a>
			                <button type="submit" class="btn btn-outline-danger">Remove</button>
			            </form>
					</div>
				@endif
			</div>
		</div>
	</div>
@endsection
