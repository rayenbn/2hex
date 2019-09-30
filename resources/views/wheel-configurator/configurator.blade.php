@extends('layouts.app')

@section('title', 'SKATEBOARD WHEELS FACTORY')

@push('head.meta')
    <meta name="description" content="2HEX skateboard wheels factory. A skateboard manufacturer of wheels, decks, skateboard wheels and high quality complete skateboards">

    <meta name="keywords" content="skateboard griptape factory, skateboard griptape supplier, skateboard griptape manufacturer, skateboard, griptape, longboard griptape manufacturer, manufacturer, longboard, factory, supplier, skateboard decks manufacturer, skateboard decks supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
@endpush

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
    	<skateboard-wheel-configurator
    		:total_sum="{{ $totalSum }}"
    		:total_quantity="{{ $quantityTotal }}"
    		:auth="{{ $authUser ? 1 : 0 }}"
		>
    		
    	</skateboard-wheel-configurator>
    </div>
@endsection