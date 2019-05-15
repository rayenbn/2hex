@extends('layouts.app')

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