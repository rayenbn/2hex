
<button class="m-aside-left-close  m-aside-left-close--skin-dark " id="m_aside_left_close_btn">
    <i class="la la-close"></i>
</button>
<div id="m_aside_left" class="m-grid__item  m-aside-left  m-aside-left--skin-dark">
    <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-dark m-aside-menu--submenu-skin-dark " data-menu-vertical="true" data-menu-scrollable="true" data-menu-dropdown-timeout="500">
        <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
            <!-- <li class="m-menu__item {{ Request::is('admin') ? 'm-menu__item--active' : null }}" aria-haspopup="true">
                <a href="/admin" class="m-menu__link ">
                    <i class="m-menu__link-icon fa fa-home"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Dashboard
                            </span>
                    </span>
                    </span>
                </a>
            </li> -->
            <li class="submenu-title">
                User
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/users" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Users
                                    </span>
                </a>
            </li>
            <li class="submenu-title">
                Platform Analystics
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/analystic" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Analystics
                                    </span>
                </a>
            </li>
            
            <li class="submenu-title">
                User Analystics
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/userdata" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Users Data
                                    </span>
                </a>
            </li>
            <br/>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/submitorder" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Submitted Orders
                                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/savedorder" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Saved Orders
                                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/savedbatch" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Saved Batches
                                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/uploadfile" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Uploads
                                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/action" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Actions
                                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/production" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Productions
                                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true" data-menu-submenu-toggle="hover">
                <a href="/admin/summary" class="m-menu__link m-menu__toggle">
                    <span class="m-menu__link-text">
                                        Summary
                                    </span>
                </a>
            </li>
            <li class="m-menu__item  m-menu__item" aria-haspopup="true">
                <a href="/logout" class="m-menu__link ">
                    <i class="m-menu__link-icon fa fa-sign-out"></i>
                    <span class="m-menu__link-title">
                        <span class="m-menu__link-wrap">
                            <span class="m-menu__link-text">
                                Logout
                            </span>
                    </span>
                    </span>
                </a>
            </li>
        </ul>
    </div>
    <!-- END: Aside Menu -->
</div>
<!-- END: Left Aside -->