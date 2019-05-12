<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>

<div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark">
    <!-- BEGIN: Aside Menu -->
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <li class="m-menu__item  {{ request()->routeIs('index') ? 'm-menu__item--expanded m-menu__item--active' : '' }}" aria-haspopup="true">
                <a href="{{ route('index') }}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-home-2"></i>
                    <span class="m-menu__link-title"> 
                        <span class="m-menu__link-wrap"> 
                            <span class="m-menu__link-text">Home</span>
                        </span>
                    </span>
                </a>
            </li>
            <li 
                class="m-menu__item  m-menu__item--submenu 
                    {{ request()->routeIs('skateboard.manufacturer') ? 'm-menu__item--expanded m-menu__item--open m-menu__item--active' : '' }}" 
                aria-haspopup="true" 
                m-menu-submenu-toggle="hover"
            >

                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-squares-1"></i>
                    <span class="m-menu__link-text">All Products</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>
                <div class="m-menu__submenu ">
                    <span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">
                        <li 
                            class="m-menu__item  m-menu__item--submenu" 
                            aria-haspopup="true" 
                            m-menu-submenu-toggle="hover"
                        >
                            <a href="{{ route('skateboard.manufacturer') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Skateboard Decks</span>
                                <i class="m-menu__ver-arrow"></i>
                            </a>
                            <a href="{{ route('griptape.index') }}" class="m-menu__link m-menu__toggle">
                                <i class="m-menu__link-bullet m-menu__link-bullet--dot">
                                    <span></span>
                                </i>
                                <span class="m-menu__link-text">Grip Tape</span>
                                <i class="m-menu__ver-arrow"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <li class="m-menu__section ">
                <h4 class="m-menu__section-text">Your Production</h4>
                <i class="m-menu__section-icon flaticon-more-v2"></i>
            </li>
            <li 
                class="m-menu__item  m-menu__item--submenu  m-menu__item--closed 
                    {{ (request()->is('skateboard-deck-configurator*')) ? 'm-menu__item--active m-menu__item--expanded m-menu__item--open' : '' }}" 
                aria-haspopup="true" 
                m-menu-submenu-toggle="hover"
            >
                <a href="javascript:;" class="m-menu__link m-menu__toggle">
                    <i class="m-menu__link-icon flaticon-box"></i>
                    <span class="m-menu__link-text">Your Products</span>
                    <i class="m-menu__ver-arrow la la-angle-right"></i>
                </a>

                <div class="m-menu__submenu "><span class="m-menu__arrow"></span>
                    <ul class="m-menu__subnav">

                        @forelse ($orders as $key => $order)

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
                                <steps :path="{{ json_encode(route('show.skateboard.configurator', $order->id)) }}"/>
                            </div>
                        </li>

                        @empty

                        <li class="m-menu__item">
                            <div class="m-menu__link ">
                                <span class="m-menu__link-text" style="text-transform: uppercase;">List Empty</span>
                            </div>
                        </li>

                        @endforelse

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
                                <span class="m-menu__link-text">S.B. Deck Batch {{ $orders->count() ? $orders->count() + 1 : 1}}</span>
                                <i class="m-menu__ver-arrow la la-angle-right"></i>
                            </a>
                            <div class="m-menu__submenu ">
                                <span class="m-menu__arrow"></span>

                                <!-- Steps vue -->
                                <steps/>
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
            
            <li class="m-menu__item {{ request()->routeIs('summary') ? 'm-menu__item--expanded m-menu__item--active' : ''}}" aria-haspopup="true">
                <a href="{{route('summary')}}" class="m-menu__link ">
                    <i class="m-menu__link-icon flaticon-truck">
                        <span></span>
                    </i>
                    <span class="m-menu__link-text">Your Order</span>
                </a>
            </li>
                
            <li class="m-menu__item " aria-haspopup="true">
                <a class="m-menu__link ">
                    <span></span>
                    <span class="m-menu__link-text" id = "totalconprice">TOTAL: $ {{ number_format($orders->sum('total'), 2, '.', '')  }}</span>
                </a>
            </li>
            
            <hr>
        </ul>
    </div>

</div><!-- END: Aside Menu