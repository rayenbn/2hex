<template>
	<div class="m-content">
            <div class="row">
                <div class="col-xl-9">

                    <!--Begin::Main Portlet-->
                    <div class="m-portlet">

                        <!--begin: Portlet Head-->
                        <div class="m-portlet__head">
                            <div class="m-portlet__head-caption">
                                <div class="m-portlet__head-title">
                                    <h3 class="m-portlet__head-text">
                                        Skateboard Deck Factory
                                    </h3>
                                    <ul class="m-subheader__breadcrumbs m-nav m-nav--inline" id="breadcrumbs">

                                        <li class="m-nav__item">
                                            <a href="/" class="m-nav__link">
                                                <span class="m-nav__link-text">Home -</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="skateboard-deck-manufacturer" class="m-nav__link">
                                                <span class="m-nav__link-text">Configurator -</span>
                                            </a>
                                        </li>
                                        <li class="m-nav__item">
                                            <a href="skateboard-deck-configurator" class="m-nav__link">
                                                <span class="m-nav__link-text">SB Deck</span>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>

                            <div class="m-portlet__head-tools">
                                <ul class="m-portlet__nav">
                                    <li class="m-portlet__nav-item">

                                        <a   data-toggle="m-tooltip" class="m-portlet__nav-link m-portlet__nav-link--icon" data-direction="left" data-width="auto" title="Get help with filling up this form">
                                            <i class="flaticon-info m--icon-font-size-lg3"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <!--end: Portlet Head-->


                        <!--begin: Form Wizard-->
                        <div class="m-wizard m-wizard--1 m-wizard--success" id="m_wizard">

                            <!--begin: Message container -->
                            <div class="m-portlet__padding-x">

                                <!-- Here you can put a message or alert -->
                            </div>

                            <!--end: Message container -->

                            <!--begin: Form Wizard Head -->

                            <!--begin: Form Wizard Progress -->
                            <div class="m-wizard__progress">
                                <div class="progress" style="height: 2px;">
                                    <div class="progress-bar m--bg-info" role="progressbar" v-bind:style="progressWidth" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <!--end: Form Wizard Progress -->

                                <!--begin: Form Wizard Nav -->
                                <div class="m-wizard__nav">
                                    <div class="m-wizard__steps">

                                        <div class="m-wizard__step m-wizard__step--current" m-wizard-target="m_wizard_form_step_1">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_3">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_4">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_5">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_6">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_7">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_8">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_9">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_10">
                                        </div>
                                        <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_11">
                                        </div>

                                    </div>
                                </div>

                                <!--end: Form Wizard Nav -->
                            </div>

                            <!--end: Form Wizard Head -->

                            <!--begin: Form Wizard Form-->
                            <div class="m-wizard__form">

                                <!--
            1) Use m-form--label-align-left class to alight the form input lables to the right
            2) Use m-form--state class to highlight input control borders on form validation
        -->
            <form class="m-form m-form--label-align-left- m-form--state-" id="m_form" method="POST" action="/skateboard-deck-configurator">
                <!--begin: Form Body -->
                <input type="hidden" id="saved_order_id">
                <div class="m-portlet__body">
                    <skateboard-decks-step-1 @quantityChange="quantityChange" @sizeChange="sizeChange"/>
                    <skateboard-decks-step-2 />
                    <skateboard-decks-step-3 />
               
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_4">
                                            <div class="row">

                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        American Glue
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[3].state" @click=" steps[3].state=! steps[3].state, perdeck +=0.9"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[3].state=! steps[3].state, perdeck -=0.9"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/american-glue-for-skateboard-decks-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>American Glue Formula</h3>
                                                                    This water based glue was invented in
                                                                    America for the purpose of being exclusively
                                                                    used for the production of skateboard decks.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>


                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Epoxy Glue
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[3].state" @click=" steps[3].state=! steps[3].state, perdeck -=0.9"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[3].state=! steps[3].state, perdeck +=0.9"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/epoxy-glue-for-skateboard-decks-factory-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Epoxy Glue Formula</h3>
                                                                    Epoxy is a strong and hard glue, making skateboard decks more durable and stiff.
                                                                    This leads to more pop and improved deck control. (Epoxy must be selected if you plan on adding GFRP technology in step 9.)
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_5">
                                            <div class="row">

                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Bottom Print
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[4].state" @click=" steps[4].state=! steps[4].state, perdeck-=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[4].state=! steps[4].state, perdeck+=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/heat-transfer-print-skateboard-decks-manufacturer-2hex-com.jpg" alt=""  class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input
                                                                                onclick="() => {user ? true : false}"
                                                                                type="file"
                                                                                data-type-upload="bottom"
                                                                                class="custom-file-input"
                                                                                id="bottomPrintFile"
                                                                                @click=" perdeck += steps[4].state?0:0.75, steps[4].state = 1"
                                                                        >
                                                                        <label class="custom-file-label unchecked" v-bind:class="{checked: steps[4].state}" for="customFile">Upload artwork preview</label>
                                                                    </div>


                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle unchecked" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;" v-bind:class="{checked: steps[4].state}" @click=" perdeck += steps[4].state?0:0.75, steps[4].state = 1">
                                                                        Recent file
                                                                    </button>

                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <!-- @if(count($filenames['bottom']) || count($filenames['top'])) -->
                                                                            <!-- @foreach(array_merge($filenames['bottom'], $filenames['top']) as $filename) -->
                                                                                <a class="dropdown-item file-dropdown"  href="#" @click=" perdeck += steps[4].state?0:0.75, steps[4].state = 1">$filename</a>
                                                                            <!-- @endforeach -->
                                                                        <!-- @endif -->
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Custom Bottom Design</h3>
                                                                    Submit your artwork in 9" x 33" at 300 dpi or as a vector image. For images of up to 4 colors, please give each color layer its Pantone code.
                                                                    Photos or artworks of ≥5 colors are printed in CMYK.<br>
                                                                    <br>
                                                                    Optionally you can upload a preview of your artwork and send the full size file by email before the production.<br>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>


                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Blank Bottom
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[4].state" @click=" steps[4].state=! steps[4].state, perdeck+=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[4].state=! steps[4].state, perdeck-=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/blank-skateboard-decks-manufacturer-2hex.jpg" alt="" class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Blank Bottom</h3>
                                                                    Blank decks are commonly sold to print shops, artists or skateshops that need a reason to sell the same pro quality at a cheaper price.

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_6">
                                            <div class="row">

                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Top Print Upload
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[5].state" @click=" steps[5].state=! steps[5].state, perdeck-=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[5].state=! steps[5].state, perdeck+=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-deck-top-print-factory-2hex-com.jpg" alt=""  class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input
                                                                                onclick="() => { user ? true : false}"
                                                                                type="file"
                                                                                data-type-upload="top"
                                                                                class="custom-file-input"
                                                                                id="topPrintFile"
                                                                                @click=" perdeck += steps[5].state?0:0.75, steps[5].state = 1"
                                                                        >
                                                                        <label class="custom-file-label unchecked" v-bind:class="{checked: steps[5].state}" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle unchecked" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;" v-bind:class="{checked: steps[5].state}" @click=" perdeck += steps[5].state?0:0.75, steps[5].state = 1">
                                                                        Recent file
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <!-- @if(count($filenames['bottom']) || count($filenames['top'])) -->
                                                                            <!-- @foreach(array_merge($filenames['bottom'], $filenames['top']) as $filename) -->
                                                                                <a class="dropdown-item file-dropdown" @click=" perdeck += steps[5].state?0:0.75, steps[5].state = 1"  href="#">$filename</a>
                                                                            <!-- @endforeach -->
                                                                        <!-- @endif -->
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Top Print</h3>
                                                                    Submit your artwork in 9" x 33" at 300 dpi or as a vector image. For images of up to 4 colors, please give each color layer its Pantone code.
                                                                    Photos or artworks of ≥5 colors are printed in CMYK.<br>
                                                                    <br>
                                                                    Optionally you can upload a preview of your artwork and send the full size file by email before the production.<br>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>


                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        No Top Print
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[5].state" @click=" steps[5].state=! steps[5].state, perdeck+=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[5].state=! steps[5].state, perdeck-=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/blank-skateboard-deck-factory-2hex.jpg" alt="" class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Blank Top</h3>
                                                                    Not every deck needs a top print.
                                                                    However top prints are the cherry on top of the creme giving buyers the impression of holding a higher quality deck.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_7">
                                            <div class="row">

                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Top Engraving
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[6].state" @click=" steps[6].state=! steps[6].state, perdeck-=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[6].state=! steps[6].state, perdeck+=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-decks-laser-engravery-manufacturer-2hex.jpg" alt=""  class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input
                                                                                onclick="() => { user ? true : false}"
                                                                                type="file"
                                                                                data-type-upload="engravery"
                                                                                class="custom-file-input"
                                                                                id="engraveryFile"
                                                                                @click=" perdeck += steps[6].state?0:0.75, steps[6].state = 1"
                                                                        >
                                                                        <label class="custom-file-label unchecked" v-bind:class="{checked: steps[6].state}" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle unchecked" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;" v-bind:class="{checked: steps[6].state}" @click=" perdeck += steps[6].state?0:0.75, steps[6].state = 1">
                                                                        Recent file
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <!-- @if(count($filenames['engravery'])) -->
                                                                            <!-- @foreach($filenames['engravery'] as $filename) -->
                                                                                <a class="dropdown-item file-dropdown" @click=" perdeck += steps[6].state?0:0.75, steps[6].state = 1"  href="#">$filename</a>
                                                                            <!-- @endforeach -->
                                                                        <!-- @endif -->
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Top Engraving</h3>
                                                                    Submit artwork in one color 9" x 33" as vector image to show where the max 4" x 4" engraving should be placed. <br>
                                                                    <br>
                                                                    Optionally you can upload a preview of your engraving artwork and send the full size file by email before the production.<br>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>


                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Smooth Top
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[6].state" @click=" steps[6].state=! steps[6].state, perdeck+=0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[6].state=! steps[6].state, perdeck-=0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/blank-skateboard-deck-factory-2hex.jpg" alt="" class="step1-img2">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Smooth Top</h3>
                                                                    You already have a top print? In this case you don't need an engraved top.
                                                                    However if you do not have a top print either, remember that top prints and top engravings give buyers the impression of holding a higher quality deck.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_8">

                                            <!--Begin::Section-->
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="m-portlet m-portlet--bordered-semi configurator-color-panel ">
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget4">

                                                                <div v-for="partName in partNames" class="dropdown">
                                                                    <div class="btn btn-secondary  dropdown-toggle skate-color-dropdown-menu"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                        <label>{{partName.number}}. {{partName.name}}</label>
                                                                        <button class="btn m-btn btn-configurator-drop-btn" v-bind:style="{background: partName.bg}"></button>
                                                                    </div>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenu2" v-if="partName.number != 3 && partName.number != 5">
                                                                        <div
                                                                                v-for="(colorValue, colorName) in colorData"
                                                                                class="color-dropdown-item"
                                                                                @click="colorClicked"
                                                                                v-bind:data-part-id="partName.number - 1"
                                                                                v-bind:data-color-name="colorName"
                                                                                v-if="colorName != 'random'"
                                                                        >
                                                                            <label>{{colorName}}</label>
                                                                            <button class="btn m-btn btn-configurator-drop-btn" v-bind:style="{background: colorValue}"></button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="m-portlet m-portlet--bordered-semi product-panel ">
                                                        <div class="m-portlet__head m-portlet__head--fit product-panel-header">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-action" >
                                                                    <a
                                                                            @click="randomClicked"
                                                                            class="btn m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"
                                                                            :class="[steps[7].state ? 'btn-success' : 'btn-secondary']"
                                                                    >
                                                                        <i class="fa" :class="[steps[7].state ? 'fa-check' : 'fa-times']"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget4">
                                                                <div class="m-widget19__pic m-portlet-fit--sides">
                                                                    <img id="productCanvas">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="m-portlet m-portlet--bordered-semi configurator-color-panel ">
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget4">
                                                                <div class="btn random-button">
                                                                    <label>Random</label>
                                                                    <img src="/skateboard-deck-production/random-icon.png">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="m-portlet m-portlet--bordered-semi product-panel2 ">
                                                        <div class="m-portlet__head m-portlet__head--fit product-panel-header" style="position:absolute;">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-action">
                                                                    <a
                                                                            @click="randomClicked"
                                                                            class="btn m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"
                                                                            :class="[!steps[7].state ? 'btn-success' : 'btn-secondary']"
                                                                    >
                                                                        <i class="fa" :class="[!steps[7].state ? 'fa-check' : 'fa-times']"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <img src="/skateboard-deck-production/colored-maple-veneers-for-skateboard-deck-factory-2hex.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_9">
                                            <div class="row">
                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Fulldip
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].fulldip.state" @click="steps[8].fulldip.state=!steps[8].fulldip.state, perdeck-=1.5"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].fulldip.state=!steps[8].fulldip.state, perdeck+=1.5"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/blue-full-dip-skateboard-deck-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input onclick="() => { user ? true : false}" v-if="steps[8].fulldip.state" v-model="steps[8].fulldip.color" class="form-control m-input" type="text" value="" id="example-text-input" placeholder="Enter Pantone Color" style="margin-top:20px;">
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Fulldip</h3>
                                                                    Dye your decks in one opaque color of your choice.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Transparent Full Dip
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].transparent.state" @click="steps[8].transparent.state=!steps[8].transparent.state, perdeck-=1.5"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].transparent.state=!steps[8].transparent.state, perdeck+=1.5"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/transparent-full-dip-skateboard-deck-manufacturer-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input v-if="steps[8].transparent.state" v-model="steps[8].transparent.color" class="form-control m-input" type="text" value="" id="example-text-input" placeholder="Enter Pantone Color" style="margin-top:20px;">

                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Transparent Full Dip</h3>
                                                                    Dye your decks in one transparent color of your choice.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Metallic Full Dip
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].metallic.state" @click="steps[8].metallic.state=!steps[8].metallic.state, perdeck-=3.5"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].metallic.state=!steps[8].metallic.state, perdeck+=3.5"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/metallic-full-dip-skateboard-deck-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <input v-if="steps[8].metallic.state" v-model="steps[8].metallic.color" class="form-control m-input" type="text" value="" id="example-text-input" placeholder="Enter Pantone Color" style="margin-top:20px;">
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Metallic Full Dip</h3>
                                                                    Dye your decks in one opaque metallic color of your choice.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Black GFRP Top Layer
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].blacktop.state" @click="steps[8].blacktop.state=!steps[8].blacktop.state, perdeck-=1.9"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].blacktop.state=!steps[8].blacktop.state, perdeck+=1.9"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/fiberglass-skateboard-deck-manufacturer-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Black GFRP Top Layer</h3>
                                                                    Add a top layer of black GFRP glassfiber reinforced plastic for increased durability and an hardcore look.
                                                                    <br>
                                                                    Epoxy glue must be used for GFRP decks. Please double check your selection in step 3.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Black GFRP Mid Layer
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].blackmidlayer.state" @click="steps[8].blackmidlayer.state=!steps[8].blackmidlayer.state, perdeck-=1.9"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].blackmidlayer.state=!steps[8].blackmidlayer.state, perdeck+=1.9"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/fiberglas-skateboard-decks-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Black GFRP Midlayer</h3>
                                                                    Add a mid layer of black GFRP glassfiber reinforced plastic for increased durability.
                                                                    <br>
                                                                    Epoxy glue must be used for GFRP decks. Please double check your selection in step 3.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        HEX Pattern Press
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="steps[8].pattern.state" @click="steps[8].pattern.state=!steps[8].pattern.state, perdeck-=1.3"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click="steps[8].pattern.state=!steps[8].pattern.state, perdeck+=1.3"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/pattern-pressed-skateboard-decks-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>HEX Pattern Press</h3>
                                                                    Add the hexagon pattern to your decks bottom veneer, to give your decks a more high end feel and look.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_10">
                                            <div class="row">

                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Upload Cardboard Design
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[9].state" @click=" steps[9].state=! steps[9].state"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[9].state=! steps[9].state"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-deck-cardboards-factory-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input
                                                                                onclick="() => { user ? true : false}"
                                                                                type="file"
                                                                                data-type-upload="cardboard"
                                                                                class="custom-file-input"
                                                                                id="cardboardFile"
                                                                                @click=" steps[9].state = 1"
                                                                        >
                                                                        <label class="custom-file-label unchecked" v-bind:class="{checked: steps[9].state}" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle unchecked" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;" v-bind:class="{checked: steps[9].state}"  @click=" steps[9].state = 1">
                                                                        Recent file
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <!-- @if(count($filenames['cardboard'])) -->
                                                                            <!-- @foreach($filenames['cardboard'] as $filename) -->
                                                                                <a class="dropdown-item file-dropdown"  href="#" @click=" steps[9].state = 1">$filename</a>
                                                                            <!-- @endforeach -->
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Custom Cardboard Wrap</h3>
                                                                    Have a custom cardboard printed and folded around your deck, before the shrink wrap is added.
                                                                    Having a custom cardboard around your deck does not only make it stand out from all other decks when placed in a skate shop's deck rack,
                                                                    it also lets you communicate to your end users just before they make their purchasing decision.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>


                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        No Cardboard
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[9].state" @click=" steps[9].state=! steps[9].state"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[9].state=! steps[9].state"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-decks-manufacturer-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>No Cardboard</h3>
                                                                    Saves costs and cuts down on paper waste. Cardboards only improve the buying experience, not the ride.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>

                                            </div>
                                        </div>
                                        <div class="m-wizard__form-step" id="m_wizard_form_step_11">
                                            <div class="row">

                                                <div class="col-xl-6">

                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Custom Printed Cartons
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if=" steps[10].state" @click=" steps[10].state=! steps[10].state, perdeck-=0.15"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[10].state=! steps[10].state, perdeck+=0.15"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-decks-carton-manufacturer-2hex.jpg" alt=""  class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group m-form__group">
                                                                    <div></div>
                                                                    <div class="custom-file">
                                                                        <input
                                                                                onclick="() => { user ? true : false}"
                                                                                type="file"
                                                                                data-type-upload="box"
                                                                                class="custom-file-input"
                                                                                id="cartonFile"
                                                                                @click=" perdeck += steps[10].state?0:0.75, steps[10].state = 1"
                                                                        >
                                                                        <label class="custom-file-label unchecked" v-bind:class="{checked: steps[10].state}" for="customFile">Choose file</label>
                                                                    </div>
                                                                </div>
                                                                <div class="dropdown">
                                                                    <button class="btn btn-secondary dropdown-toggle unchecked" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;" v-bind:class="{checked: steps[10].state}" @click=" perdeck += steps[10].state?0:0.75, steps[10].state = 1">
                                                                        Recent file
                                                                    </button>
                                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                        <!-- @if(count($filenames['box'])) -->
                                                                            <!-- @foreach($filenames['box'] as $filename) -->
                                                                                <a class="dropdown-item file-dropdown"  href="#" @click=" perdeck += steps[10].state?0:0.75, steps[10].state = 1">$filename</a>
                                                                            <!-- @endforeach -->
                                                                        <!-- @endif -->
                                                                    </div>
                                                                </div>
                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Custom Printed Cartons</h3>
                                                                    Add your logo on both sides of the carton. Please submit the artwork in 40cm(width) x 15cm(height).
                                                                    Additionally we will print the content details on both ends of the carton showing your brand name, product description, deck name and size.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>


                                                <div class="col-xl-6">
                                                    <!--begin:: Widgets/Activity-->
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title">
                                                                    <h3 class="m-portlet__head-text">
                                                                        Basic Cartons
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <a v-if="! steps[10].state" @click=" steps[10].state=! steps[10].state, perdeck+=0.15"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                            <i class="fa fa-check"></i>
                                                                        </a>
                                                                        <a v-else @click=" steps[10].state=! steps[10].state, perdeck-=0.15"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
                                                                            <i class="fa fa-times"></i>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__body">
                                                            <div class="m-widget17">
                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                    <div >
                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                            <img src="/skateboard-deck-production/skateboard-decks-carton-factory-2hex.jpg" alt="" class="step1-img1">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                    <h3>Basic Cartons</h3>
                                                                    Choose our basic cartons to save cost.
                                                                    Basic Cartons come in blank or with the content details printed on both ends and two sides of the carton, showing your brand name, product description, deck name and size.
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--end:: Widgets/Activity-->
                                                </div>

                                            </div>
                                        </div>
                                      


                                        <!--end: Form Wizard Step 2-->
                                    </div>
                                    <!--end: Form Body -->
                                    <!--begin: Form Actions -->
                                    <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                        <div class="m-form__actions m-form__actions">
                                            <div class="row">

                                                <div class="col-lg-4 m--align-center">
                                                    <button class="btn btn-secondary m-btn m-btn--custom m-btn--icon" data-wizard-action="prev" @click="prevStep">
                                                        <span>
                                                            <i class="la la-arrow-left"></i>&nbsp;&nbsp;
                                                            <span>Back</span>
                                                        </span>
                                                    </button>
                                                </div>

                                                <!-- *No need for this button currently*
                                                <div class="col-lg-4 m--align-center">
                                                    <button v-if="currentStep == 10" class="btn btn-secondary m-btn m-btn--custom m-btn--icon" data-wizard-action="summary">
                                                        <span>
                                                            <span>Add Batch</span>
                                                        </span>
                                                    </button>
                                                </div>
                                                -->

                                                <div class="col-lg-4 m--align-center">
                                                    <button 
                                                    	class="btn btn-primary m-btn m-btn--custom m-btn--icon" 
                                                    	data-wizard-action="submit" 
                                                    	@click="save"
                                                	>
                                                        <span>
                                                            <i class="la la-check"></i>&nbsp;&nbsp;
                                                            <span>Summary</span>
                                                        </span>
                                                    </button>

                                                    <button 
                                                    	class="btn btn-warning m-btn m-btn--custom m-btn--icon" 
                                                    	data-wizard-action="next" 
                                                    	@click="nextStep"
                                                	>
                                                        <span>
                                                            <span>Continue</span>&nbsp;&nbsp;
                                                            <i class="la la-arrow-right"></i>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Form Actions -->
                                </form>
                            </div>
                            <!--end: Form Wizard Form-->
                        </div>
                        <!--end: Form Wizard-->
                    </div>
                    <!--End::Main Portlet-->
                </div>

                <div class="col-xl-3">
                    <div class="m-portlet">
                        <div class="m-portlet__body">
                            <div class="m-section">
                                <h2 class="m-section__heading">How to build the best skateboard deck?</h2>
                                <div class="m-section__content">
                                    <p>
                                        Know your target group! Do they skate vert or street? Are you users price sensitive
                                        or do they want the deck to be the most durable with the highest pop?
                                    </p>
                                    <p>
                                        Choose the specifications that best meet your target groups requirements. All of our decks
                                        have the highest quality within the selected specifications.
                                        Follow the deck price calculation below, to make sure you find the sweet spot
                                        between the highest quality and the best price.
                                    </p>
                                </div>
                            </div>
                            <div class="m-separator m-separator--fit"></div>

                            <div class="m-widget1 m-widget1--paddingless">
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">{{ user ? 'Deck' : 'Login' }}</h3>
                                            <span class="m-widget1__desc">{{ user ? 'Price per Deck' : 'To See Prices' }}</span>
                                        </div>
                                        <div class="col m--align-right">
                                                <span

                                                        class="m-widget1__number m--font-brand"
                                                        v-if="quantity > 0 && size != '' && user"
                                                        id="perdeck"
                                                >
                                                        $ {{ perdeck.toFixed(2) }}
                                                </span>
                                                <span class="m-widget1__number m--font-danger" id="perdeck" v-else>
                                                    $ ?.??
                                                </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-widget1__item">
                                    <div class="row m-row--no-padding align-items-center">
                                        <div class="col">
                                            <h3 class="m-widget1__title">{{ user ? 'Order' : 'Login' }}</h3>
                                            <span class="m-widget1__desc">{{ user ? 'Total of Order' : 'To See Prices' }}</span>
                                        </div>
                                        <div class="col m--align-right">
                                                <span

                                                        class="m-widget1__number m--font-danger"
                                                        v-if="quantity > 0 && size != '' && user"
                                                        id="total"
                                                >
                                                    $ {{(perdeck * quantity + fixedprice).toFixed(2)}}
                                                </span>
                                                <span class="m-widget1__number m--font-danger" id="total" v-else>
                                                    $ ?.??
                                                </span>

                                        </div>
                                    </div>
                                </div>

                                <br>
                                <button id="save_order" class="btn btn-secondary m-btn m-btn--custom m-btn--icon col m--align-right" @click="save">
                                    <span>
                                        <i class="la la-send"></i>
                                        <span>skip next steps</span>
                                    </span>
                                </button>
                                <!--end: Form Wizard Step 4-->
                            </div>
                            <!--end: Form Body -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
</template>

<script>
	import skateboardDecksStep1 from './views/Step1.vue';
	import skateboardDecksStep2 from './views/Step2.vue';
	import skateboardDecksStep3 from './views/Step3.vue';

    export default {
    	name: 'skateboard-decks-configurator',
    	props: {
    		user: {
                type: Object,
                default: null
            },
            order: {
                type: Object,
                default: null
            }
                
    	},
    	components: {
    		skateboardDecksStep1,
    		skateboardDecksStep2,
    		skateboardDecksStep3
    	},
        data() {
            return {
            	colorData: {
	                'natural'        : '#FFE4C4', 
	                'brown'          : '#A52A2A',
	                'orange'         : '#FFA500',
	                'red'            : 'red',
	                'lime green'     : '#32CD32',
	                'black'          : 'black',
	                'yellow'         : 'yellow',
	                'green'          : 'green',
	                'grey'           : 'grey',
	                'purple'         : '#800080',
	                'pink'           : '#FFC0CB',
	                'blue'           : 'blue',
	                'scarlet'        : '#ff2400',
	                'dark blue'      : '#00008B',
	                'deep violet'    : '#9400D3',
	                'wood red'       : '#65000b',
	                'royal purple'   : '#9370DB',
	                'light blue'     : '#87CEFA',
	                'yellowish brown': '#F4A460',
	                'random'         : '#FFE4C4',
	            },
	            colorNames: [
                    'natural', 'brown', 
                    'orange', 'red', 
                    'lime green', 'black', 
                    'yellow', 'green', 
                    'grey', 'purple', 
                    'pink', 'blue', 
                    'scarlet', 'dark blue', 
                    'deep violet', 'wood red', 
                    'royal purple', 'light blue', 
                    'yellowish brown'
                ],
	            partNames: [],
	            currentColors:['natural', 'natural', 'natural', 'natural', 'natural', 'natural', 'natural'],
	            title: 'Skateboard Deck Configurator',
	            randomColors: [],
	            currentStep: 0,
	            quantity: 0,
	            total_quantity: 0,
	            batchTotal: 0,
	            total: 0,
	            fixedprice: 0,
	            perdeck: 0,
	            size: "",
	            pre_quantity: 0,
	            pre_size: "",
	            // steps: [ 
	            //     {state: false}, 
	            //     {state: true}, 
	            //     {state: true}, 
	            //     {state: true}, 
	            //     {state: false},                      
	            //     {state: false, name: ''}, 
	            //     {state: false, name: ''}, 
	            //     {state: true, name: ''}, 
	            //     {
	            //         fulldip: {state: false,color: ""}, 
	            //         transparent: {state: false, color: ""}, 
	            //         metallic: {state: false, color: ""}, 
	            //         blacktop: {state: false}, 
	            //         blackmidlayer: {state: false}, 
	            //         pattern: {state: false}, 
	            //     },                     
	            //     {state: false, name: ''}, 
	            //     {state: false, name: ''}, 
	            // ],
            };
        },
        computed: {
        	steps() {
        		return this.$store.getters['configurator/skateboardSteps'];
        	},
	        progressWidth(){
	            return {
	                width: 100 * this.currentStep / 10 + '%',
	            }
	        },
	        sizePrice() {
	            let match = this.size.match(/[0-9.]{3}/) || [];
	            if (!match.length) return 0;

	            let value = parseFloat(match[0]);

	            if(value < 7.0) {
	                return 0;
	            }else if(value >= 7.0 && value < 8.0) {
	                return 8.5;
	            } else if(value >= 8.0 && value < 8.5) {
	                return 9.5;
	            } else if(value >= 8.5)
	                return 10.0;
	        },
	        quantityPrice() {
	            if(this.total_quantity < 20) {
	                return 50;
	            } else if (this.total_quantity >= 20 && this.total_quantity < 30) {
	                return 40;
	            } else if (this.total_quantity >= 30 && this.total_quantity < 40) {
	                return 30;
	            } else if (this.total_quantity >= 40 && this.total_quantity < 50) {
	                return 10;
	            } else if (this.total_quantity >= 50 && this.total_quantity < 100) {
	                return 6;
	            } else if (this.total_quantity >= 100 && this.total_quantity < 200) {
	                return 4;
	            } else if (this.total_quantity >= 200 && this.total_quantity < 300) {
	                return 3;
	            } else if (this.total_quantity >= 300 && this.total_quantity < 500) {
	                return 2.5;
	            } else if (this.total_quantity >= 500 && this.total_quantity < 1000) {
	                return 1.5;
	            } else if (this.total_quantity >= 1000 && this.total_quantity < 2000) {
	                return 1;
	            } else if (this.total_quantity >= 2000 && this.total_quantity < 5000) {
	                return 0.5;
	            } else if (this.total_quantity >= 5000) {
	                return 0;
	            }
	        },
	        deckPrice() {
	            return this.sizePrice + this.quantityPrice;
	        } 
	    },
        methods: {
        	save(event) {
                var formData = new FormData();
                formData.append('id',$('#saved_order_id').val());
                formData.append('quantity',this.quantity);
                formData.append('size',$('#size').val());
                formData.append('concave',this.steps[1].state?'Deep Concave':'Mediumn Concave');
                formData.append('wood',this.steps[2].state?'European Maple Wood':'American Maple Wood');
                formData.append('glue',this.steps[3].state?'American Glue':'Epoxy Glue');
                formData.append('bottomprint',this.steps[4].state?$('#bottomPrintFile').attr('fileName'):'');
                formData.append('topprint',this.steps[5].state?$('#topPrintFile').attr('fileName'):'');
                formData.append('engravery',this.steps[6].state?$('#engraveryFile').attr('fileName'):'');
                formData.append('veneer',JSON.stringify(this.currentColors));
                formData.append('extra',JSON.stringify(this.steps[8]));
                formData.append('cardboard',this.steps[9].state?$('#cardboardFile').attr('fileName'):'');
                formData.append('carton',this.steps[10].state?$('#cartonFile').attr('fileName'):'');
                formData.append('perdeck',this.perdeck);
                formData.append('total',(this.quantity*app.perdeck + this.fixedprice).toFixed(2));
                formData.append('fixedprice',this.fixedprice);
                axios.post('/skateboard-deck-configurator', formData)
                    .then((response) => {
                        // document.getElementById('demo').innerHTML = 'Hey There';
                        console.log(event.target.tagName);
                        // document.getElementById('demo').innerHTML = 'Hey There';
                        // event.target.innerHTML = '<span><i class="la la-check"></i> <span> Use standards</span></span>';
                        // setTimeout(() => {
                        //     window.location.href = "/summary";
                        // }, 1000);

                    })
                    .catch((error) => {
                        console.error(error);
                    });               
        	},
	        color(index){
	            if(index < 20)
	                return this.colorNames[index]
	            else
	                return 'white';
	        },
	        currentColor(index){
	            if(index < 7)
	                return this.currentColors[index]
	            else
	                return 'white';
	        },
	        colorClicked(event){  
	            // check active random colors
	            if (!this.steps[7].state) {
	                this.steps[7].state = true; 
	                this.currentColors.fill('natural');    
	            }   
	            var part, color
	            if(event.target.getAttribute('data-part-id') == null){
	                part = parseInt(event.target.parentElement.getAttribute('data-part-id'))
	                color = event.target.parentElement.getAttribute('data-color-name')

	            }else{
	                part = parseInt(event.target.getAttribute('data-part-id'))
	                color = event.target.getAttribute('data-color-name')
	            }                
	            let org_c = 0;   
	            for(i = 0; i < this.currentColors.length; i ++){
	                if(this.currentColors[i] != 'natural')
	                    org_c ++;
	            }
	            this.currentColors[part] = color;         
	            let c = 0;   
	            for(i = 0; i < this.currentColors.length; i ++){
	                if(this.currentColors[i] != 'natural')
	                    c ++;
	            }

	            if(org_c == 0 && c > 0)
	              this.perdeck += 0.4;
	            else if(org_c < c && c > 3)
	              this.perdeck += 0.4;
	            else if(org_c > c && c > 2)
	              this.perdeck -= 0.4;
	            else if(c == 0 && org_c > 0)
	              this.perdeck -= 0.4;
	           this.renderProduct()
	        },
	        randomClicked(event){
	            this.steps[7].state = !this.steps[7].state;

	            if (this.steps[7].state) {
	                this.currentColors.fill('natural');   
	            } else {
	                // Selected colors when don`t 'natural'
	                let selectedColors = this.currentColors.filter(c => c != 'natural').length;

	                if (selectedColors >= 1 && selectedColors < 4) {
	                    this.perdeck -= 0.4;
	                } else if (selectedColors >= 4 && selectedColors < 5) {
	                    this.perdeck -= 0.8;
	                } else if (selectedColors >= 5) {
	                    this.perdeck -= 1.2;
	                }

	                this.currentColors.fill('random');
	            }

	            this.renderProduct();
	        },
	        nextStep(){
	            if(this.currentStep < 10)
	                this.currentStep++;
	        },
	        prevStep(){
	            if(this.currentStep > 0)
	                this.currentStep--;
	            
	        },
	        sizeChange(size) {
	            this.size = size;

	            if(this.pre_size != ""){
	                if(this.pre_size < '8')
	                    this.perdeck -= 8.5;
	                else if(this.pre_size < '8.5')
	                    this.perdeck -= 9.5;
	                else
	                    this.perdeck -= 10;                      
	            }

	            if(this.size < '8')
	                this.perdeck += 8.5;
	            else if(this.size < '8.5')
	                this.perdeck += 9.5;
	            else
	                this.perdeck += 10;

	            this.pre_size = this.size;
	        },
	        quantityChange(quantity){
	        	this.quantity = quantity;

	            if(this.quantity % 10 != 0){
	                 swal({
	                    title: "",
	                    text: "Select Only quantities in steps of 10 (10, 20, ...)",
	                    type: "alert",
	                    confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
	                }).then((value) => {
	                });
	                this.quantity = this.pre_quantity;
	                return false;
	            }
	            
	            if(this.pre_quantity > 0){
	                if(this.total_quantity < 20) {
	                    this.perdeck -= 50;
	                } else if (this.total_quantity >= 20 && this.total_quantity < 30) {
	                    this.perdeck -= 40;
	                } else if (this.total_quantity >= 30 && this.total_quantity < 40) {
	                    this.perdeck -= 30;
	                } else if (this.total_quantity >= 40 && this.total_quantity < 50) {
	                    this.perdeck -= 10;
	                } else if (this.total_quantity >= 50 && this.total_quantity < 100) {
	                    this.perdeck -= 6;
	                } else if (this.total_quantity >= 100 && this.total_quantity < 200) {
	                    this.perdeck -= 4;
	                } else if (this.total_quantity >= 200 && this.total_quantity < 300) {
	                    this.perdeck -= 3;
	                } else if (this.total_quantity >= 300 && this.total_quantity < 500) {
	                    this.perdeck -= 2.5;
	                } else if (this.total_quantity >= 500 && this.total_quantity < 1000) {
	                    this.perdeck -= 1.5;
	                } else if (this.total_quantity >= 1000 && this.total_quantity < 2000) {
	                    this.perdeck -= 1;
	                } else if (this.total_quantity >= 2000 && this.total_quantity < 5000) {
	                    this.perdeck -= 0.5;
	                } else if (this.total_quantity >= 5000) {
	                    this.perdeck -= 0;
	                }                
	            }
	            this.total_quantity -= (this.pre_quantity * 1);
	            this.total_quantity += (this.quantity * 1);
	            this.pre_quantity = this.quantity;

	            if(this.total_quantity < 20) {
	                this.perdeck += 50;
	            } else if (this.total_quantity >= 20 && this.total_quantity < 30) {
	                this.perdeck += 40;
	            } else if (this.total_quantity >= 30 && this.total_quantity < 40) {
	                this.perdeck += 30;
	            } else if (this.total_quantity >= 40 && this.total_quantity < 50) {
	                this.perdeck += 10;
	            } else if (this.total_quantity >= 50 && this.total_quantity < 100) {
	                this.perdeck += 6;
	            } else if (this.total_quantity >= 100 && this.total_quantity < 200) {
	                this.perdeck += 4;
	            } else if (this.total_quantity >= 200 && this.total_quantity < 300) {
	                this.perdeck += 3;
	            } else if (this.total_quantity >= 300 && this.total_quantity < 500) {
	                this.perdeck += 2.5;
	            } else if (this.total_quantity >= 500 && this.total_quantity < 1000) {
	                this.perdeck += 1.5;
	            } else if (this.total_quantity >= 1000 && this.total_quantity < 2000) {
	                this.perdeck += 1;
	            } else if (this.total_quantity >= 2000 && this.total_quantity < 5000) {
	                this.perdeck += 0.5;
	            } else if (this.total_quantity >= 5000) {
	                this.perdeck += 0;
	            }
	        },
			renderProduct(){
			    this.validateColorPanel();
			    var imgArr = []
			    for(var i = 0; i < this.currentColors.length; i++){
			        if (this.currentColors[i] == 'random') {
			            imgArr.push('/skateboard-deck-production/8.1 veneers/' + 'natural/000' + (i + 1) + ".png");
			            continue;
			        }
			        imgArr.push('/skateboard-deck-production/8.1 veneers/' + this.currentColors[i] + '/000' + (i + 1) + ".png")
			    }
			    mergeImages(imgArr)
			    .then(b64 => {
			        let product = document.getElementById('productCanvas');
			        if (product != null) {
			            product.src = b64;
			        }
			    });
			},
			validateColorPanel(){
			    var dropdownMenus = document.getElementsByClassName('skate-color-dropdown-menu');
			    for(var i = 0; i < dropdownMenus.length; i++){
			        dropdownMenus[i].firstElementChild.innerHTML = (i + 1) + ". " + this.currentColors[i]
			        dropdownMenus[i].lastElementChild.style.setProperty('background', this.colorData[this.currentColors[i]])
			    }
			}
        },
        created() {
	        // Global quantity batches plus current total.
	        this.total_quantity += this.batchTotal;
	        
	        setTimeout(() => {
	            let length = this.currentColors.length;

	            for (let i = 0; i < length; i++) {
	                this.$set(this.partNames, i, {});
	                this.$set(this.partNames[i], 'number', i + 1);
	                this.$set(this.partNames[i], 'name', this.currentColor(i));
	                this.$set(this.partNames[i], 'bg', this.colorData[this.currentColors[i]]);
	            }
	        }, 2000);
	    }
    };
</script>