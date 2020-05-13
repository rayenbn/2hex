@extends('layouts.app')

@section('title', 'TRANSFERS FACTORY')

@push('head.meta')
    <meta name="description" content="2HEX skateboard heat transfers factory. A skateboard manufacturer of skateboard heat transfers.">

    <meta name="keywords" content="skateboard heat transfers factory, skateboard heat transfers supplier, skateboard heat transfers manufacturer, skateboard, heat transfers, longboard heat transfers manufacturer, manufacturer, heat transfers, factory, supplier, skateboard heat transfers manufacturer, skateboard decks supplier, 2hex, skateboard wheels manufacturer, skateboard wheels supplier, Germany, Australia, Europe, England, Great Britain, Board, Production.">
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