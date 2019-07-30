@extends('layouts.app')

@section('title', 'SKATEBOARD DECKS FACTORY')

@push('head.meta')
    <meta name="description" content="2HEX skateboard decks factory. A skateboard manufacturer of decks, grip tapes, skateboard wheels and high quality complete skateboards">

	<meta name="keywords" content="skateboard decks factory, skateboard decks supplier, skateboard decks manufacturer, skateboard, decks, manufacturer, factory, supplier, skateboard griptape manufacturer, skateboard griptape supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
@endpush

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <skateboard-decks-configurator
            :user="{{ json_encode(auth()->user()) }}"
            :order="{{ json_encode($saved_order ?? null) }}"
            :batchtotal="{{ $orders->sum('quantity') }}"
            :filenames="{{ json_encode($filenames) }}"
        />
    </div>
@endsection