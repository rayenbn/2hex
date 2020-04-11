@extends('layouts.app')

@section('title', 'TRANSFERS FACTORY')

@push('head.meta')
    <meta name="description" content="2HEX skateboard wheels factory. A skateboard manufacturer of wheels, decks, skateboard wheels and high quality complete skateboards">

    <meta name="keywords" content="skateboard griptape factory, skateboard griptape supplier, skateboard griptape manufacturer, skateboard, griptape, longboard griptape manufacturer, manufacturer, longboard, factory, supplier, skateboard decks manufacturer, skateboard decks supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
@endpush

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <transfers-configurator
            manufacturer_url="{{route('transfers.manufacturer')}}"
            upload_url="{{route('transfers.upload', [], false)}}"
            :filenames="{{ json_encode($filenames) }}"
            :total-quantity="{{$totalQuantity}}"
            :total-colors="{{$totalColors}}"
            :transfer="{{ json_encode($transfer ?? null) }}"
            :paid-file="{{ json_encode($paidFile ?? null) }}"
            :user="{{ json_encode(auth()->user()) }}"
        >
        </transfers-configurator>
    </div>
@endsection