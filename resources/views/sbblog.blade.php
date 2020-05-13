@extends('layouts.app')

@section('title', 'SKATEBOARD MANUFACTURER BOOK')

@push('head.meta')
    <meta name="description" content="2HEX skateboard manufacturer book lets skateboard company founders learn from a skateboard factory’s experience working with hundreds of skateboard brands.">

    <meta name="keywords" content="skateboard manufacturer book, skateboard company founder book, skateboard factory book,  skateboard manufacturer, skateboard supplier, skateboard factory">
@endpush

@section('content')
    <div class="m-grid__item m-grid__item--fluid m-wrapper">

        <div class="m-content">

            <div class="row">
                <div class="col-xl-12">
                    <div class="m-portlet m-portlet--full-height ">
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h2 class="m-portlet__head-text">The Skateboard Manufacturer Blog</h2>
                                </div>
                            </div>

                            @php
                                /** @var \Request $request */
                                $request = app('request');
                            @endphp

                            <div class="m-portlet__head-caption">
                                <div class="d-flex justify-content-between mr-4">
                                    <!--
                                    <a
                                        href="{{route('sbblog', ['gap' => 'last_month', '#blog'])}}"
                                        class="btn btn-sm m-btn--pill {{$request->get('gap') == 'last_month' ? 'btn-brand' : ''}}"
                                    >
                                        Last Month
                                    </a>
                                    <a
                                        href="{{route('sbblog', ['gap' => 'last_year', '#blog'])}}"
                                        class="btn btn-sm m-btn--pill {{$request->get('gap') == 'last_year' ? 'btn-brand' : ''}}"
                                    >
                                        Last Year
                                    </a>
                                    <a
                                        href="{{route('sbblog', ['gap' => 'all', '#blog'])}}"
                                        class="btn btn-sm m-btn--pill {{$request->get('gap') == 'all' || empty($request->get('gap')) ? 'btn-brand' : ''}}"
                                    >
                                        All time
                                    </a>
                                    -->
                                </div>

                                @if ($posts->count())
                                    {{ $posts->fragment('sbblog')->appends($request->input())->links() }}
                                @endif
                            </div>


                            @if (auth()->check() && auth()->user()->isAdmin())
                                <div class="m-portlet__head-caption">
                                    <a href="{{ route('blog.create') }}" class="btn btn-outline-success">New Post</a>
                                </div>
                            @endif
                        </div>
                        <div class="m-portlet__body">

                            <div class="tab-content">
                                <div class="tab-pane active" id="m_widget5_tab1_content" aria-expanded="true">
                                    <div class="m-widget5">
                                        @forelse ($posts as $article)
                                            @include('blog.partials.article', ['article' => $article])
                                        @empty
                                            <p>We haven't published anything yet, but soon there will be something to read here.</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30" style="width: 100%;" role="alert">
                <div class="m-alert__text">
                    <a href="{{route('inquirieschoice')}}">
                        <button type="button" class="btn btn-secondary">
                            <i class="m-menu__link-icon flaticon-email"> </i>
                            &nbsp Questions or Comments? Message us!
                        </button>
                    </a>
                </div>
            </div>

        </div>
    </div>
@endsection
