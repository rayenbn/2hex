@extends('layouts.app')

@section('title', 'SKATEBOARD HEAT TRANSFER FACTORY')

@push('head.meta')
    <meta name="description" content="2HEX skateboard heat transfer factory. A skateboard manufacturer of wheels, decks, skateboard wheels, heat transfers and high quality complete skateboards">

    <meta name="keywords" content="skateboard heat transfer factory, skateboard heat transfer supplier, skateboard heat transfer manufacturer, skateboard, heat transfer, manufacturer, factory, supplier, skateboard decks manufacturer, skateboard decks supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
@endpush

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <heat-transfer-configurator
            :user="{{ json_encode(auth()->user()) }}"
        >

        </heat-transfer-configurator>
    </div>
@endsection