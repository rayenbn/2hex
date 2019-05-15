@extends('layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <grip-tape-configurator
            :user="{{ json_encode(auth()->user()) }}"
            :griptape="{{ json_encode($griptape ?? null) }}"
            :quantityorders="{{ $orders->sum('quantity') }}"
            :sumorders="{{ $orders->sum('total') }}"
            :filenames="{{ json_encode($filenames) }}"
        />
    </div>
@endsection