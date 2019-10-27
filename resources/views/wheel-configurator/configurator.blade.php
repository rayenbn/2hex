@extends('layouts.app')

@section('title', 'SKATEBOARD WHEELS FACTORY')

@push('head.meta')
    <meta name="description" content="2HEX skateboard wheels factory. A skateboard manufacturer of wheels, decks, skateboard wheels and high quality complete skateboards">

    <meta name="keywords" content="skateboard griptape factory, skateboard griptape supplier, skateboard griptape manufacturer, skateboard, griptape, longboard griptape manufacturer, manufacturer, longboard, factory, supplier, skateboard decks manufacturer, skateboard decks supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
@endpush

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
    	<skateboard-wheel-configurator
    		:total_sum="{{ $orders->sum('total') + $grips->sum('total') + $wheels->sum('total')}}"
    		:total_quantity="{{ $orders->sum('quantity') + $grips->sum('quantity') + $wheels->sum('quantity') }}"
    		:auth="{{ auth()->check() ? 1 : 0 }}"
            :wheel="{{ json_encode($wheel ?? null) }}"
            :filenames="{{ json_encode($filenames) }}"
		>
    		
    	</skateboard-wheel-configurator>
    </div>
@endsection