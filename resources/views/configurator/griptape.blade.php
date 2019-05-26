@extends('layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <grip-tape-configurator
            :user="{{ json_encode(auth()->user()) }}"
            :griptape="{{ json_encode($griptape ?? null) }}"
            :quantityskateboards="{{ $orders->sum('quantity') }}"
            :sumskateboards="{{ $orders->sum('total') }}"
            :sumgrips="{{ $grips->sum('total') }}"
            :quantitygrips="{{ $grips->sum('quantity') }}"
            :filenames="{{ json_encode($filenames) }}"
        />
    </div>
@endsection