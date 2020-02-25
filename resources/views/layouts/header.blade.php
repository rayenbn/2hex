<!-- BEGIN: Header -->
<header id="m_header" class="m-grid__item    m-header " m-minimize-offset="200" m-minimize-mobile-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">

            <!-- BEGIN: Brand Logo -->
            <div class="m-stack__item m-brand  m-brand--skin-dark ">
                <div class="m-stack m-stack--ver m-stack--general">


                    <div class="m-stack__item m-stack__item--middle m-brand__logo">
                        <a href="/" class="m-brand__logo-wrapper">
                            <img alt="" src="{{asset('img/2HEXlogo.png')}}"/>
                        </a>
                    </div>



                    <div class="m-stack__item m-stack__item--middle m-brand__tools">

                        <!-- BEGIN: Left Aside Minimize Toggle -->
                        <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                            <span></span>
                        </a>

                        <!-- END -->

                        <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                        <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                            <span></span>
                        </a>

                        <!-- END -->

                        <!-- BEGIN: Topbar Toggler -->
                        <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                            <i class="flaticon-more"></i>
                        </a>

                        <!-- BEGIN: Topbar Toggler -->
                    </div>
                </div>
            </div>

            <!-- END: Brand -->
            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">

                <!-- BEGIN: Horizontal Menu -->
                <button class="m-aside-header-menu-mobile-close  m-aside-header-menu-mobile-close--skin-dark " id="m_aside_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
                <div id="m_header_menu" class="m-header-menu m-aside-header-menu-mobile m-aside-header-menu-mobile--offcanvas  m-header-menu--skin-light m-header-menu--submenu-skin-light m-aside-header-menu-mobile--skin-dark m-aside-header-menu-mobile--submenu-skin-dark ">


                    <ul class="m-menu__nav  m-menu__nav--submenu-arrow ">
                        <li class="m-menu__item  m-menu__item--submenu m-menu__item--rel">
                            <span class="m-menu__link-text">
                                    <h1><p style="font-size:50%; color:#686c7a; padding-top: 15px;">2HEX Skateboard Manufacturer</p></h1>
                            </span>
                        </li>

                        <li class="m-menu__item m-menu__item--rel {{ request()->routeIs('contact') ? 'm-menu__item--expanded m-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="/contact" class="m-menu__link ">
                                <i class="m-menu__link-icon flaticon-email"></i>
                                <span class="m-menu__link-text">Contact</span>
                            </a>
                        </li>

                        <li class="m-menu__item m-menu__item--rel {{ request()->routeIs('samplesets') ? 'm-menu__item--expanded m-menu__item--active' : '' }}" aria-haspopup="true">
                            <a href="/samplesets" class="m-menu__link ">
                                <i class="m-menu__link-icon flaticon-box"></i>
                                <span class="m-menu__link-text">Samples</span>
                            </a>
                        </li>


                    </ul>


                </div>



                <!-- END: Horizontal Menu -->

                <!-- BEGIN: Topbar -->
                <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                    <div class="m-stack__item m-topbar__nav-wrapper">
                        <ul class="m-topbar__nav m-nav m-nav--inline">
                            <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
                                m-dropdown-toggle="click">
                                @if (Auth::user())
                                <a href="#" class="m-nav__link m-dropdown__toggle">
                                                                                             
                                     <span class="m-topbar__userpic">
                                         <span class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">{{Auth::user()->name}}</span>
                                     </span>
                                                                                     
                                 </a>

                                <div class="m-dropdown__wrapper">
                                    <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                    <div class="m-dropdown__inner">
                                        <div class="m-dropdown__header m--align-center" style="background: url(img/back.jpg); background-size: cover;">
                                            <div class="m-card-user m-card-user--skin-dark">
                                                <div class="m-card-user__pic">


                                                </div>
                                                <div class="m-card-user__details">
                                                    <span class="m-card-user__name m--font-weight-500">{{Auth::user()->name}}</span>
                                                    <a href="/inquiries" class="m-card-user__email m--font-weight-300 m-link">{{Auth::user()->email}}</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-dropdown__body">
                                            <div class="m-dropdown__content">
                                                <ul class="m-nav m-nav--skin-light">
                                                    <li class="m-nav__section m--hide">
                                                        <span class="m-nav__section-text">Section</span>
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="/profile#my_detail" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                                                            <span class="m-nav__link-title">
                                                                         <span class="m-nav__link-wrap">
                                                                             <span class="m-nav__link-text">My Profile</span>
                                                                         </span>
                                                                     </span>
                                                        </a>
                                                    </li>

                                                    <li class="m-nav__item">
                                                        <a href="/profile#invoice_address" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-map-location"></i>
                                                            <span class="m-nav__link-title">
                                                                         <span class="m-nav__link-wrap">
                                                                             <span class="m-nav__link-text">Address</span>
                                                                         </span>
                                                                     </span>
                                                        </a>
                                                    </li>

                                                    <li class="m-nav__item">
                                                        <a href="/profile#saved_orders" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-symbol"></i>
                                                            <span class="m-nav__link-title">
                                                                         <span class="m-nav__link-wrap">
                                                                             <span class="m-nav__link-text">Saved Orders</span>
                                                                         </span>
                                                                     </span>
                                                        </a>
                                                    </li>

                                                    <li class="m-nav__item">
                                                        <a href="/profile#submitted_orders" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-file"></i>
                                                            <span class="m-nav__link-title">
                                                                         <span class="m-nav__link-wrap">
                                                                             <span class="m-nav__link-text">Submitted Orders</span>
                                                                         </span>
                                                                     </span>
                                                        </a>
                                                    </li>

                                                    <li class="m-nav__item">
                                                        <a href="/profile" class="m-nav__link">
                                                            <i class="m-nav__link-icon flaticon-delete"></i>
                                                            <span class="m-nav__link-title">
                                                                         <span class="m-nav__link-wrap">
                                                                             <span class="m-nav__link-text">Delete Current Order</span>
                                                                         </span>
                                                                     </span>
                                                        </a>
                                                    </li>

                                                    <li class="m-nav__separator m-nav__separator--fit">
                                                    </li>
                                                    <li class="m-nav__item">
                                                        <a href="{{route('logout')}}" class="btn m-btn--pill    btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                <li class="m-nav__item">
                                <a href="/register" class="m-nav__link"> <!-- class="m-nav__link m-dropdown__toggle"> -->

                                             <span class="m-topbar__userpic">
                                                 <span class="btn m-btn--pill btn-danger m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Register</span>
                                             </span>
                                </a>
                                </li>

                                <li class="m-nav__item">
                                    <a href="/login" class="m-nav__link"> <!-- class="m-nav__link m-dropdown__toggle"> -->

                                        <span class="m-topbar__userpic">
                                                 <span class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Login</span>
                                             </span>
                                    </a>
                                </li>


                                @endif 
                            </li>
                            <li id="m_quick_sidebar_toggle" class="m-nav__item">
                                <a   class="m-nav__link m-dropdown__toggle">
                                    <span class="m-nav__link-icon"><i class="flaticon-chat"></i></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- END: Topbar -->
            </div>
        </div>
    </div>
</header>

<!-- END: Header -->