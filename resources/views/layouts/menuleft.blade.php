<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>

<div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">

            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Our Products</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>


            <li class="m-menu__item  {{ request()->routeIs('skateboard.manufacturer') ? 'm-menu__item--expanded m-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('skateboard.manufacturer') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-box"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">add Skateboard Decks</span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item  {{ request()->routeIs('griptape.manufacturer') ? 'm-menu__item--expanded m-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('griptape.manufacturer') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-box"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">add Griptapes</span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item  {{ request()->routeIs('wheels.manufacturer') ? 'm-menu__item--expanded m-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('wheels.manufacturer') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-box"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">add Wheels</span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item  {{ request()->routeIs('heat-transfer.manufacturer') ? 'm-menu__item--expanded m-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('heat-transfer.manufacturer') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-box"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">add Heat Transfers</span>
                        </span>
                    </span>
                </a>
            </li>


            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Your Production</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li 
                class="m-menu__item  m-menu__item--submenu  m-menu__item--closed 
                    {{ (request()->is('skateboard-deck-configurator*') 
                        || request()->is('grip-tape-configurator*')
                        || request()->is('skateboard-wheels-configurator*')
                        || request()->is('skateboard-heat-transfer-configurator*'))
                        ? 'm-menu__item--active m-menu__item--expanded m-menu__item--open' 
                        : '' 
                    }}" 
                aria-haspopup="true" 
                m-menu-submenu-toggle="hover"
            >
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-truck"></i>
                    <span class="m-menu__link-text">Your Products</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>

                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        @foreach ($orders as $key => $order)
                        
                        <li 
                            class="m-menu__item  m-menu__item--submenu  m-menu__item--closed 
                            {{ (route('show.skateboard.configurator', $order->id) == url()->current()) ? 'm-menu__item--open m-menu__item--active' : '' }}" 
                            aria-haspopup="true" 
                            m-menu-submenu-toggle="hover"
                        >
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">S.B. Deck Batch {{++$key}}</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <!-- Steps vue -->
                                <steps 
                                    :path="{{ json_encode(route('show.skateboard.configurator', $order->id)) }}"
                                    type="skateboard"
                                />
                            </div>
                        </li>

                        @endforeach

                        @foreach ($grips as $key => $grip)
                        
                        <li 
                            class="m-menu__item  m-menu__item--submenu  m-menu__item--closed 
                            {{ (route('griptape.show', $grip->id) == url()->current()) ? 'm-menu__item--open m-menu__item--active' : '' }}" 
                            aria-haspopup="true" 
                            m-menu-submenu-toggle="hover"
                        >
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Grip Tape Batch {{++$key}}</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <!-- Steps vue -->
                                <steps 
                                    :path="{{ json_encode(route('griptape.show', $grip->id)) }}"
                                    type="griptape"
                                />
                            </div>
                        </li>

                        @endforeach

                        @foreach($wheels as $key => $wheel)
                        
                        <li 

                            class="m-menu__item  m-menu__item--submenu  m-menu__item--closed 
                            {{ (route('wheels.configurator.show', $wheel->wheel_id) == url()->current()) ? 'm-menu__item--open m-menu__item--active' : '' }}" 

                            aria-haspopup="true" 
                            m-menu-submenu-toggle="hover"
                        >
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Wheel Batch {{++$key}}</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <!-- Steps vue -->
                                <steps
                                    :path="{{ json_encode(route('wheels.configurator.show', $wheel->wheel_id)) }}"
                                    type="wheel"
                                />
                            </div>
                        </li>
                        @endforeach

                        @foreach($transfers as $key => $transfer)

                        <li
                            class="m-menu__item  m-menu__item--submenu  m-menu__item--closed
                            {{ (route('wheels.configurator.show', $wheel->wheel_id) == url()->current()) ? 'm-menu__item--open m-menu__item--active' : '' }}"
                            aria-haspopup="true"
                            m-menu-submenu-toggle="hover"
                        >
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Heat Transfer Batch {{++$key}}</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>
                                <!-- Steps vue -->
                                <steps
                                    :path="{{ json_encode(route('heat-transfer.configurator.show', $wheel->wheel_id)) }}"
                                    type="transfer"
                                />
                            </div>
                        </li>
                        @endforeach


                        @if ($orders->count() == 0 && $grips->count() == 0 && $wheels->count() == 0 && $transfers->count() == 0)
                        <li class="m-menu__item">
                            <div class="m-menu__link ">
                                <span class="m-menu__link-text" style="text-transform: uppercase;">List Empty</span>
                            </div>
                        </li>
                        @endif


                        @if (request()->routeIs('get.skateboard.configurator'))

                        <li 
                            class="m-menu__item  m-menu__item--submenu  m-menu__item--closed m-menu__item--open m-menu__item--active" 
                            aria-haspopup="true" 
                            m-menu-submenu-toggle="hover"
                        >
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    S.B. Deck Batch {{ $orders->count() ? $orders->count() + 1 : 1}}
                                </span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>

                                <!-- Steps vue -->
                                <steps type="skateboard"/>
                            </div>
                        </li>

                        @endif

                        @if (request()->routeIs('griptape.index'))

                        <li 
                            class="m-menu__item  m-menu__item--submenu  m-menu__item--closed m-menu__item--open m-menu__item--active" 
                            aria-haspopup="true" 
                            m-menu-submenu-toggle="hover"
                        >
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Grip Tape Batch {{ $grips->count() ? $grips->count() + 1 : 1}}
                                </span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>

                                <!-- Steps vue -->
                                <steps type="griptape"/>
                            </div>
                        </li>

                        @endif

                        @if (request()->routeIs('wheels.configurator'))

                        <li 
                            class="m-menu__item  m-menu__item--submenu  m-menu__item--closed m-menu__item--open m-menu__item--active" 
                            aria-haspopup="true" 
                            m-menu-submenu-toggle="hover"
                        >
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Wheel Batch {{ $wheels->count() ? $wheels->count() + 1 : 1}}
                                </span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>

                                <!-- Steps vue -->
                                <steps type="wheel"/>
                            </div>
                        </li>

                        @endif

                        @if (request()->routeIs('heat-transfer.configurator'))

                        <li
                            class="m-menu__item  m-menu__item--submenu  m-menu__item--closed m-menu__item--open m-menu__item--active"
                            aria-haspopup="true"
                            m-menu-submenu-toggle="hover"
                        >
                            <a href="javascript:;" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">
                                    Heat Transfer Batch {{ $wheels->count() ? $wheels->count() + 1 : 1}}
                                </span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>

                                <!-- Steps vue -->
                                <steps type="transfer"/>
                            </div>
                        </li>

                        @endif
                        
                        <li id="btn-add-batch" class="m-menu__item  m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                            <a href="{{ route('skateboard.manufacturer') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <i class="m-menu__link-icon flaticon-add-circular-button"></i>
                                <span class="m-menu__link-text">Add Batch</span>
                                <i class="m-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li 
                class="m-menu__item 
                    {{ 
                        request()->routeIs('summary') 
                            ? 'm-menu__item--expanded m-menu__item--active' 
                            : ''
                    }}" 
                aria-haspopup="true"
            >

                <a href="{{route('summary')}}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-list-1">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">Your Summary</span>
                </a>
            </li>


            <li class="m-menu__item " aria-haspopup="true">
                <a class="m-menu__link ">
                    <span></span>
                    @php 
                        $total = \Cookie::get('orderTotal') ?? ($orders->sum('total') + $grips->sum('total'));
                    @endphp
                    <span class="m-menu__link-text" id = "totalconprice">
                        USD TOTAL: $ {{ auth()->check() ? number_format($total, 2, '.', '') : '(unregistered)' }}
                    </span>
                </a>
            </li>


            <hr>


            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Other</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>


            <li
                    class="m-menu__item
                    {{
                        request()->routeIs('about')
                            ? 'm-menu__item--expanded m-menu__item--active'
                            : ''
                    }}"
                    aria-haspopup="true"
            >

                <a href="{{route('about')}}" class="m-menu__link ">
                    <img src="/img/skatefactory2.svg" style=width:25px;height:25px">
                    <i class="m-menu__link-icon flaticon-list-3w">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">About Us</span>
                </a>
            </li>

            <li class="m-menu__item  {{ request()->routeIs('samples') ? 'm-menu__item--expanded m-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('samples') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-box"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">Get Samples</span>
                        </span>
                    </span>
                </a>
            </li>

            <li class="m-menu__item  {{ request()->routeIs('inquiries') ? 'm-menu__item--expanded m-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="/inquiries" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-multimedia"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">Message Us</span>
                        </span>
                    </span>
                </a>
            </li>

        </ul>
    </div>

</div><!-- END: Aside Menu