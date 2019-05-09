<li 
    class="m-menu__item  m-menu__item--submenu  m-menu__item--closed m-menu__item--open m-menu__item--active" 
    aria-haspopup="true" 
    m-menu-submenu-toggle="hover"
>
    <a href="javascript:;" class="m-menu__link m-menu__toggle">
        <i class="m-menu__link-bullet m-menu__link-bullet--dot">
            <span></span>
        </i>
        <span class="m-menu__link-text">S.B. Deck Batch </span>
        <i class="m-menu__ver-arrow la la-angle-right"></i>
    </a>
    <div class="m-menu__submenu ">
        <span class="m-menu__arrow"></span>
        <ul class="m-menu__subnav">
            @php $orderPath = null; @endphp
            <li class="m-menu__item" v-bind:class="currentStep == 0 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(1, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text" >1. Quantity and Size</span></a></li>
            <li class="m-menu__item " v-bind:class="currentStep == 1 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(2, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">2. Wood</span></a></li>
            <li class="m-menu__item " v-bind:class="currentStep == 2 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(3, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">3. Glue</span></a></li>
            <li class="m-menu__item " v-bind:class="currentStep == 3 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(4, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">4. Concave</span></a></li>
            <li class="m-menu__item" v-bind:class="currentStep == 4 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(5, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">5. Bottom Print</span></a></li>
            <li class="m-menu__item " v-bind:class="currentStep == 5 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(6, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">6. Top Print</span></a></li>
            <li class="m-menu__item " v-bind:class="currentStep == 6 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(7, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">7. Engravery</span></a></li>
            <li class="m-menu__item " v-bind:class="currentStep == 7 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(8, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">8. Veneer Colors</span></a></li>
            <li class="m-menu__item" v-bind:class="currentStep == 8 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(9, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">9. Special</span></a></li>
            <li class="m-menu__item " v-bind:class="currentStep == 9 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(10, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">10. Cardboard</span></a></li>
            <li class="m-menu__item " v-bind:class="currentStep == 10 ? 'm-menu__item--active' : ''" aria-haspopup="true" onclick="gotoStep(11, '{{ $orderPath }}')"><a class="m-menu__link "><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">11. Box</span></a></li>
        </ul>
    </div>
</li>