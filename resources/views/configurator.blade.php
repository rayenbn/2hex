@extends('layouts.app')

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">
        <skateboard-decks-configurator
            :user="{{ auth()->user() }}"
        />
    </div>
@endsection