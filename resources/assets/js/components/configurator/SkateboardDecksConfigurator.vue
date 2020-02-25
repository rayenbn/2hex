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
                                <h1 class="m-portlet__head-text">
                                    Skateboard Deck Factory
                                </h1>
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
                            <form
                                    class="m-form m-form--label-align-left- m-form--state-"
                                    id="m_form"
                                    method="POST"
                                    action="/skateboard-deck-configurator"
                                    enctype="multipart/form-data"
                            >
                                <!--begin: Form Body -->
                                <input type="hidden" id="saved_order_id" v-model="orderId">
                                <div class="m-portlet__body">
                                    <div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                    <div class="m-portlet__head">
                                                        <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">Batch Quantity</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-portlet__body">
                                                        <div class="m-widget17">
                                                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                <div>
                                                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                        <img
                                                                                src="/skateboard-deck-production/stacked-skateboard-decks-factory-2hex.jpg"
                                                                                alt=""
                                                                                class="step1-img1"
                                                                        >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input
                                                                    id="quantity"
                                                                    v-model.number="quantity"
                                                                    type="text"
                                                                    class="form-control bootstrap-touchspin-vertical-btn"
                                                                    name="quantity"
                                                                    placeholder="30"
                                                                    @change="quantityChange"
                                                            >

                                                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                <h3 style="color: #5867dd">
                                                                    <span data-toggle="m-tooltip" data-placement="top" title="One batch consists of one style and size. You can add multiple batches, to have multiple sizes or styles. The more batches you add, the lower the price.">
                                                                    <u>Batch</u>
                                                                </span>

                                                                    Quantity</h3>

                                                                Select the required quantity of your first
                                                                style of decks. Decks are packed and sold in
                                                                cartons of ten pieces. The final deck price
                                                                depends on your deck specifications as well as your
                                                                total order quantity of all batches together.
                                                                You can always go to the summary page to see the price of each batch.<br>
                                                                <a href="/skateboard-deck-production/2HEX-skateboard-deck-design-template.pdf" target="_blank">Design Template</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                    <div class="m-portlet__head">
                                                        <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">Size</h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="m-portlet__body">
                                                        <div class="m-widget17">
                                                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                <div>
                                                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                        <img
                                                                                src="/skateboard-deck-production/width-skateboard-decks-manufacturer-2hex.jpg"
                                                                                alt=""
                                                                                class="step1-img1"
                                                                        >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <select
                                                                    class="form-control m-select2"
                                                                    id="size"
                                                                    name="size"
                                                                    style="width:100%;"
                                                                    v-model="size"
                                                                    @change="sizeChange"
                                                            >
                                                                <option value="" disabled>SELECT</option>
                                                                <option v-for="(size, index) in sizes" :key="index">{{ size }}</option>

                                                            </select>

                                                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                <h3 style="color: #5867dd">Deck Size</h3>
                                                                Select the deck shape of this batch.
                                                                Shapes are shown by "Width x Length" as well
                                                                as "Wheelbase", "Nose" and "Tail". All dimensions
                                                                are given in inches.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="m-wizard__form-step" id="m_wizard_form_step_2">
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force">
                                                    <div class="m-portlet__body">
                                                        <div class="m-widget27 m-portlet-fit--sides">
                                                            <div class="m-widget27__container">

                                                                <ul class="m-widget27__nav-items nav nav-pills nav-fill" role="tablist">
                                                                    <li class="step2-tab-nav nav-item" @click="steps[1].state = !steps[1].state">
                                                                        <a
                                                                            :class="{'active' : steps[1].state}"
                                                                            class="nav-link"
                                                                            data-toggle="pill"
                                                                            href="#m_personal_income_quater_1"
                                                                        >
                                                                            Deep Concave
                                                                        </a>
                                                                    </li>
                                                                    <li class="step2-tab-nav nav-item" @click="steps[1].state = !steps[1].state">
                                                                        <a
                                                                            :class="{'active' : !steps[1].state}"
                                                                            class="nav-link"
                                                                            data-toggle="pill"
                                                                            href="#m_personal_income_quater_2"
                                                                        >
                                                                            Medium Concave
                                                                        </a>
                                                                    </li>
                                                                </ul>

                                                                <div class="m-widget27__tab tab-content m-widget27--no-padding">
                                                                    <div
                                                                            id="m_personal_income_quater_1"
                                                                            class="tab-pane"
                                                                            :class="[steps[1].state ? 'active' : 'fade']"
                                                                    >
                                                                        <div class="row  align-items-center">
                                                                            <div class="col">
                                                                                <div class="col-xl-12">
                                                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">

                                                                                        <div class="m-portlet__body">
                                                                                            <div class="m-widget17">
                                                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                                                                                    <div style="height:280px; background-color: white;">
                                                                                                        <div
                                                                                                                class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides"
                                                                                                                style="min-height: 286px"
                                                                                                        >
                                                                                                            <iframe
                                                                                                                    height="280"
                                                                                                                    width="90%"
                                                                                                                    style="margin-left:40px; margin-top:0px;"
                                                                                                                    src="https://sketchfab.com/models/0f583557d87a461e8e920741ad39575c/embed"
                                                                                                                    frameborder="0"
                                                                                                                    allow="autoplay; fullscreen; vr"
                                                                                                                    mozallowfullscreen="true"
                                                                                                                    webkitallowfullscreen="true"
                                                                                                            />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div style="padding-top:60px; padding-bottom:20px;" class="m-widget17">
                                                                                                <div class="m-widget17__stats">
                                                                                                    <div class="m-widget17__items m-widget17__items-col1">
                                                                                                        <div class="m-widget17__item">
                                                                                            <span class="m-widget17__icon">
                                                                                                <i class="flaticon-presentation-1 m--font-brand"></i>
                                                                                            </span>
                                                                                                            <span class="m-widget17__subtitle">Better Grip</span>
                                                                                                            <span class="m-widget17__desc">Sticks better to feet.</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="m-widget17__items m-widget17__items-col2">
                                                                                                        <div class="m-widget17__item">
                                                                                            <span class="m-widget17__icon">
                                                                                                <i class="flaticon-coins m--font-success"></i>
                                                                                            </span>
                                                                                                            <span class="m-widget17__subtitle">$ 0.00</span>
                                                                                                            <span class="m-widget17__desc">No added cost</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>

                                                                                            <div style="text-align: justify; color: #9699a4;">
                                                                                                <h3 style="color: #5867dd">Deep Concave</h3>
                                                                                                Deep concave decks are mostly used for vert skateboarding as well as large gaps, as the
                                                                                                deep concave makes it easier to keep the deck close to your feet.
                                                                                                Select your preferred concave by check marking the upper right corner.
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div
                                                                            id="m_personal_income_quater_2"
                                                                            class="tab-pane"
                                                                            :class="[!steps[1].state ? 'active' : 'fade']"
                                                                    >
                                                                        <div class="row  align-items-center">
                                                                            <div class="col">
                                                                                <div class="col-xl-12">
                                                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">

                                                                                        <div class="m-portlet__body">
                                                                                            <div class="m-widget17">
                                                                                                <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides m--bg-danger">
                                                                                                    <div style="height:280px; background-color: white;">
                                                                                                        <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                                                            <iframe
                                                                                                                    height="280"
                                                                                                                    width="90%"
                                                                                                                    style="margin-left:40px; margin-top:0px;"
                                                                                                                    src="https://sketchfab.com/models/6998edf0f00e43f09bb6047ebc0a56e5/embed"
                                                                                                                    frameborder="0"
                                                                                                                    allow="autoplay; fullscreen; vr"
                                                                                                                    mozallowfullscreen="true"
                                                                                                                    webkitallowfullscreen="true"
                                                                                                            />
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div style="padding-top:60px; padding-bottom:20px;" class="m-widget17">
                                                                                                <div class="m-widget17__stats">
                                                                                                    <div class="m-widget17__items m-widget17__items-col1">
                                                                                                        <div class="m-widget17__item">
                                                                                            <span class="m-widget17__icon">
                                                                                                <i class="flaticon-presentation-1 m--font-brand"></i>
                                                                                            </span>
                                                                                                            <span class="m-widget17__subtitle">
                                                                                                Flip Control
                                                                                            </span>
                                                                                                            <span class="m-widget17__desc">
                                                                                                More precise control.
                                                                                            </span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="m-widget17__items m-widget17__items-col2">
                                                                                                        <div class="m-widget17__item">
                                                                                            <span class="m-widget17__icon">
                                                                                                <i class="flaticon-coins m--font-success"></i>
                                                                                            </span>
                                                                                                            <span class="m-widget17__subtitle">$ 0.00</span>
                                                                                                            <span class="m-widget17__desc">No added cost</span>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                            <div style="text-align: justify; color: #9699a4;">
                                                                                                <h3 style="color: #5867dd">Medium Concave</h3>
                                                                                                Medium concave decks are mostly used for street and park skateboarding.
                                                                                                The medium concave makes it easier to accurately control the deck,
                                                                                                which is essential for flip tricks.
                                                                                                Select your preferred concave by check marking the upper right corner.
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="m-wizard__form-step" id="m_wizard_form_step_3">
                                        <div class="row">
                                            <div class="col-xl-6">

                                                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                    <div class="m-portlet__head">
                                                        <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">
                                                                    European Maple Wood
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__head-tools">
                                                            <ul class="m-portlet__nav">
                                                                <li
                                                                        class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                                                                        m-dropdown-toggle="hover"
                                                                >
                                                                    <a
                                                                            v-if="steps[2].state"
                                                                            @click="steps[2].state = !steps[2].state, perdeck += 1"
                                                                            class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"
                                                                    >
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a
                                                                            v-else
                                                                            @click="steps[2].state = !steps[2].state; perdeck -= 1"
                                                                            class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill"
                                                                    >
                                                                        <i class="fa fa-times"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="m-portlet__body">
                                                        <div class="m-widget17">
                                                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                                                <div>
                                                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                                        <img
                                                                                src="/skateboard-deck-production/european-maple-for-skateboard-deck-manufacturer-2hex.jpg"
                                                                                alt=""
                                                                                class="step1-img1"
                                                                        >
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                <h3 style="color: #5867dd">European Maple Wood</h3>
                                                                European maple is cheaper and lighter, but
                                                                slightly less durable than American maple.
                                                                Our European maple wood is sustainably grown in areas
                                                                of warm summers and ice cold winters - just like
                                                                our American maple.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xl-6">
                                                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                    <div class="m-portlet__head">
                                                        <div class="m-portlet__head-caption">
                                                            <div class="m-portlet__head-title">
                                                                <h3 class="m-portlet__head-text">
                                                                    American Maple Wood
                                                                </h3>
                                                            </div>
                                                        </div>
                                                        <div class="m-portlet__head-tools">
                                                            <ul class="m-portlet__nav">
                                                                <li
                                                                        class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push"
                                                                        m-dropdown-toggle="hover"
                                                                >
                                                                    <a
                                                                            v-if="!steps[2].state"
                                                                            @click="steps[2].state = !steps[2].state, perdeck -= 1"
                                                                            class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"
                                                                    >
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a
                                                                            v-else
                                                                            @click="steps[2].state  = !steps[2].state, perdeck += 1"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                                                        <img
                                                                                src="/skateboard-deck-production/american-maple-for-skateboard-decks-factory-2hex.jpg"
                                                                                alt=""
                                                                                class="step1-img1"
                                                                        >
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                <h3 style="color: #5867dd">American Maple Wood</h3>
                                                                American maple wood is the standard in professional
                                                                skateboarding. It is the most durable material and
                                                                has been used since the beginning of modern skateboarding.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                                                                <h3 style="color: #5867dd">American Glue Formula</h3>
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
                                                                <h3 style="color: #5867dd">Epoxy Glue Formula</h3>
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
                                                                    <a v-if=" steps[4].state" @click=" steps[4].state=! steps[4].state, perdeck+=steps[4].selectpaid?0:-0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[4].state=! steps[4].state, perdeck+=steps[4].selectpaid?0:0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                                                            data-step="4"
                                                                            class="custom-file-input"
                                                                            id="bottomPrintFile"
                                                                            @click=" perdeck += steps[4].state?steps[4].selectpaid?0.75:0:0.75, steps[4].state = 1"
                                                                            @change.prevent="uploadFile"
                                                                    >
                                                                    <label
                                                                            class="custom-file-label unchecked"
                                                                            v-bind:class="{checked: steps[4].state}"
                                                                            for="customFile"
                                                                    >
                                                                        Upload artwork preview
                                                                    </label>
                                                                </div>


                                                            </div>
                                                            <div class="progress mb-3" style="height: 2px;">
                                                                <div
                                                                        class="progress-bar m--bg-info"
                                                                        role="progressbar"
                                                                        :style="'width:' + steps[4].uploadProgress + '%'"
                                                                        aria-valuenow="65"
                                                                        aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                >
                                                                </div>
                                                            </div>
                                                            <div class="dropdown">
                                                                <button
                                                                        class="btn btn-secondary dropdown-toggle unchecked"
                                                                        type="button"
                                                                        id="step-5-recent"
                                                                        data-toggle="dropdown"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false"
                                                                        style="width:100%;"
                                                                        v-bind:class="{checked: steps[4].state}"
                                                                        @click=" perdeck += steps[4].state?0:steps[4].selectpaid?0:0.75, steps[4].state = 1"
                                                                >
                                                                    Recent file
                                                                </button>

                                                                <div class="dropdown-menu" aria-labelledby="step-5-recent">
                                                                    <a
                                                                            v-for="file in (filenames.bottom.concat(filenames.top))"
                                                                            class="dropdown-item file-dropdown"
                                                                            href="#"
                                                                            @click="perdeck += steps[4].state?steps[4].selectpaid?file['paid']?0:0.75:file['paid']?-0.75:0:0.75, steps[4].state = 1, steps[4].color = file['color_qty'], steps[4].dropdisable = file['is_disable'], steps[4].selectpaid = file['paid'], steps[4].name = file['name']"
                                                                            
                                                                    >
                                                                        <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <color-btn
                                                                    :color="steps[4].color"
                                                                    labelledby="step-5-colors"
                                                                    @colorChange="(val) => steps[4].color = val"
                                                                    v-if="!steps[4].dropdisable"
                                                                    
                                                            >
                                                                <template slot="btn">
                                                                    <button
                                                                            id="step-5-colors"
                                                                            class="btn btn-secondary dropdown-toggle"
                                                                            type="button"
                                                                            data-toggle="dropdown"
                                                                            aria-haspopup="true"
                                                                            aria-expanded="false"
                                                                            style="width:100%;"
                                                                            @click="perdeck += steps[4].state ? 0 : steps[4].selectpaid?0:0.75, steps[4].state = true"
                                                                            :class="[steps[4].state && steps[4].color ? 'checked' : 'unchecked']"
                                                                    >
                                                                        {{ steps[4].color ? steps[4].color : 'How many colors are in your design?' }}
                                                                    </button>
                                                                </template>
                                                            </color-btn>

                                                            <button v-else
                                                                    id="step-5-colors"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    type="button"
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    style="width:100%;"
                                                                    @click="perdeck += steps[4].state ? 0 : steps[4].selectpaid?0:0.75, steps[4].state = true"
                                                                    :class="[steps[4].state && steps[4].color ? 'checked' : 'unchecked']"
                                                            >
                                                                {{ steps[4].color ? steps[4].color : 'How many colors are in your design?' }}
                                                            </button>

                                                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                <h3 style="color: #5867dd">Custom Bottom Design</h3>
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
                                                                    <a v-if="! steps[4].state" @click=" steps[4].state=! steps[4].state, perdeck+=steps[4].selectpaid?0:0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[4].state=! steps[4].state, perdeck+=steps[4].selectpaid?0:-0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                                                <h3 style="color: #5867dd">Blank Bottom</h3>
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
                                                                    <a v-if=" steps[5].state" @click=" steps[5].state=! steps[5].state, perdeck+=steps[5].selectpaid?0:-0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[5].state=! steps[5].state, perdeck+=steps[5].selectpaid?0:0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                                                            data-step="5"
                                                                            class="custom-file-input"
                                                                            id="topPrintFile"
                                                                            @click=" perdeck += steps[5].state?steps[5].selectpaid?0.75:0:0.75, steps[5].state = 1"
                                                                            @change.prevent="uploadFile"
                                                                    >
                                                                    <label
                                                                            class="custom-file-label unchecked"
                                                                            v-bind:class="{checked: steps[5].state}"
                                                                            for="customFile"
                                                                    >
                                                                        Choose file
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="progress mb-3" style="height: 2px;">
                                                                <div
                                                                        class="progress-bar m--bg-info"
                                                                        role="progressbar"
                                                                        :style="'width:' + steps[5].uploadProgress + '%'"
                                                                        aria-valuenow="65"
                                                                        aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                >
                                                                </div>
                                                            </div>
                                                            <div class="dropdown">
                                                                <button
                                                                        class="btn btn-secondary dropdown-toggle unchecked"
                                                                        type="button"
                                                                        id="step-6-recent"
                                                                        data-toggle="dropdown"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false"
                                                                        style="width:100%;"
                                                                        v-bind:class="{checked: steps[5].state}"
                                                                        @click=" perdeck += steps[5].state?0:steps[5].selectpaid?0:0.75, steps[5].state = 1"
                                                                >
                                                                    Recent file
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="step-6-recent">
                                                                    <a
                                                                            v-for="file in (filenames.bottom.concat(filenames.top))"
                                                                            class="dropdown-item file-dropdown"
                                                                            @click="perdeck += steps[5].state?steps[5].selectpaid?file['paid']?0:0.75:file['paid']?-0.75:0:0.75, steps[5].state = 1, steps[5].color=file['color_qty'], steps[5].dropdisable = file['is_disable'], steps[5].selectpaid = file['paid'], steps[5].name = file['name']"
                                                                            href="#"
                                                                            v-bind:class="{'paid': file['paid'] == 0}" 
                                                                    >
                                                                        <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <color-btn
                                                                    :color="steps[5].color"
                                                                    labelledby="step-6-colors"
                                                                    @colorChange="(val) => steps[5].color = val"
                                                                    v-if="!steps[5].dropdisable"
                                                            >
                                                                <template slot="btn">
                                                                    <button
                                                                            id="step-6-colors"
                                                                            class="btn btn-secondary dropdown-toggle"
                                                                            type="button"
                                                                            data-toggle="dropdown"
                                                                            aria-haspopup="true"
                                                                            aria-expanded="false"
                                                                            style="width:100%;"
                                                                            @click="perdeck += steps[5].state ? 0 : steps[5].selectpaid?0:0.75, steps[5].state = true"
                                                                            :class="[steps[5].state && steps[5].color ? 'checked' : 'unchecked']"
                                                                    >
                                                                        {{ steps[5].color ? steps[5].color : 'How many colors are in your design?' }}
                                                                    </button>
                                                                </template>
                                                            </color-btn>
                                                            <button
                                                                    id="step-6-colors"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    type="button"
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    style="width:100%;"
                                                                    @click="perdeck += steps[5].state ? 0 : steps[5].selectpaid?0:0.75, steps[5].state = true"
                                                                    :class="[steps[5].state && steps[5].color ? 'checked' : 'unchecked']"
                                                                    v-else
                                                            >
                                                                {{ steps[5].color ? steps[5].color : 'How many colors are in your design?' }}
                                                            </button>
                                                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                <h3 style="color: #5867dd">Top Print</h3>
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
                                                                    <a v-if="! steps[5].state" @click=" steps[5].state=! steps[5].state, perdeck+=steps[5].selectpaid?0:0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[5].state=! steps[5].state, perdeck+=steps[5].selectpaid?0:-0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                                                <h3 style="color: #5867dd">Blank Top</h3>
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
                                                                    <a v-if=" steps[6].state" @click=" steps[6].state=! steps[6].state, perdeck+=steps[6].selectpaid?0:-0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[6].state=! steps[6].state, perdeck+=steps[6].selectpaid?0:0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                                                            data-step="6"
                                                                            class="custom-file-input"
                                                                            id="engraveryFile"
                                                                            @click=" perdeck += steps[6].state?steps[6].selectpaid?0.75:0:0.75, steps[6].state = 1"
                                                                            @change.prevent="uploadFile"
                                                                    >
                                                                    <label
                                                                            class="custom-file-label unchecked"
                                                                            v-bind:class="{checked: steps[6].state}"
                                                                            for="customFile"
                                                                    >
                                                                        Choose file
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="progress mb-3" style="height: 2px;">
                                                                <div
                                                                        class="progress-bar m--bg-info"
                                                                        role="progressbar"
                                                                        :style="'width:' + steps[6].uploadProgress + '%'"
                                                                        aria-valuenow="65"
                                                                        aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                >
                                                                </div>
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle unchecked" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;" v-bind:class="{checked: steps[6].state}" @click=" perdeck += steps[6].state?0:steps[6].selectpaid?0:0.75, steps[6].state = 1">
                                                                    Recent file
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a
                                                                            v-for="file in filenames.engravery"
                                                                            class="dropdown-item file-dropdown"
                                                                            @click="perdeck += steps[6].state?steps[6].selectpaid?file['paid']?0:0.75:file['paid']?-0.75:0:0.75, steps[6].state = 1, steps[6].selectpaid = file['paid'], steps[6].name = file['name']"
                                                                            href="#"
                                                                            v-bind:class="{'paid': file['paid'] == 0}"
                                                                    >
                                                                        <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                <h3 style="color: #5867dd">Top Engraving</h3>
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
                                                                    <a v-if="! steps[6].state" @click=" steps[6].state=! steps[6].state, perdeck+=steps[6].selectpaid?0:0.75"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[6].state=! steps[6].state, perdeck+=steps[6].selectpaid?0:-0.75"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                                                <h3 style="color: #5867dd">Smooth Top</h3>
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
                                                                <h3 style="color: #5867dd">Fulldip</h3>
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
                                                                <h3 style="color: #5867dd">Transparent Full Dip</h3>
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
                                                                <h3 style="color: #5867dd">Metallic Full Dip</h3>
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
                                                                <h3 style="color: #5867dd">Black GFRP Top Layer</h3>
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
                                                                <h3 style="color: #5867dd">Black GFRP Midlayer</h3>
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
                                                                <h3 style="color: #5867dd">HEX Pattern Press</h3>
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
                                                                            data-step="9"
                                                                            class="custom-file-input"
                                                                            id="cardboardFile"
                                                                            @click="steps[9].state = 1"
                                                                            @change.prevent="uploadFile"
                                                                    >
                                                                    <label
                                                                            class="custom-file-label unchecked"
                                                                            v-bind:class="{checked: steps[9].state}"
                                                                            for="customFile"
                                                                    >
                                                                        Choose file
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="progress mb-3" style="height: 2px;">
                                                                <div
                                                                        class="progress-bar m--bg-info"
                                                                        role="progressbar"
                                                                        :style="'width:' + steps[9].uploadProgress + '%'"
                                                                        aria-valuenow="65"
                                                                        aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                >
                                                                </div>
                                                            </div>
                                                            <div class="dropdown">
                                                                <button class="btn btn-secondary dropdown-toggle unchecked" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width:100%;" v-bind:class="{checked: steps[9].state}"  @click=" steps[9].state = 1">
                                                                    Recent file
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                    <a
                                                                            v-for="file in filenames.cardboard"
                                                                            class="dropdown-item file-dropdown"
                                                                            href="#"
                                                                            @click="steps[9].state = 1, steps[9].name = file['name']"
                                                                            v-bind:class="{'paid': file['paid'] == 0}"
                                                                    >
                                                                        <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                <h3 style="color: #5867dd">Custom Cardboard Wrap</h3>
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
                                                                <h3 style="color: #5867dd">No Cardboard</h3>
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
                                                                    <a v-if=" steps[10].state" @click=" steps[10].state=! steps[10].state, perdeck+=steps[10].selectpaid?0:-0.15"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[10].state=! steps[10].state, perdeck+=steps[10].selectpaid?0:0.15"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                                                            data-step="10"
                                                                            class="custom-file-input"
                                                                            id="cartonFile"
                                                                            @click=" perdeck += steps[10].state?steps[10].selectpaid?0.15:0:0.15, steps[10].state = 1, steps[10].name = file['name']"
                                                                            @change.prevent="uploadFile"
                                                                    >
                                                                    <label
                                                                            class="custom-file-label unchecked"
                                                                            v-bind:class="{checked: steps[10].state}"
                                                                            for="customFile"
                                                                    >
                                                                        Choose file
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="progress mb-3" style="height: 2px;">
                                                                <div
                                                                        class="progress-bar m--bg-info"
                                                                        role="progressbar"
                                                                        :style="'width:' + steps[10].uploadProgress + '%'"
                                                                        aria-valuenow="65"
                                                                        aria-valuemin="0"
                                                                        aria-valuemax="100"
                                                                >
                                                                </div>
                                                            </div>
                                                            <div class="dropdown">
                                                                <button
                                                                        class="btn btn-secondary dropdown-toggle unchecked"
                                                                        type="button"
                                                                        id="step-11-recent"
                                                                        data-toggle="dropdown"
                                                                        aria-haspopup="true"
                                                                        aria-expanded="false"
                                                                        style="width:100%;"
                                                                        v-bind:class="{checked: steps[10].state}"
                                                                        @click=" perdeck += steps[10].state?0:steps[10].selectpaid?0:0.15, steps[10].state = 1"
                                                                >
                                                                    Recent file
                                                                </button>
                                                                <div class="dropdown-menu" aria-labelledby="step-11-recent">
                                                                    <a
                                                                            v-for="file in filenames.box"
                                                                            class="dropdown-item file-dropdown"
                                                                            href="#"
                                                                            @click="perdeck += steps[10].state?steps[10].selectpaid?file['paid']?0:0.15:file['paid']?-0.15:0:0.15, steps[10].state = 1, steps[10].color=file['color_qty'], steps[10].dropdisable=file['is_disable'], steps[10].selectpaid = file['paid']"
                                                                            v-bind:class="{'paid': file['paid'] == 0}"
                                                                            
                                                                    >
                                                                         <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <color-btn
                                                                    :color="steps[10].color"
                                                                    labelledby="step-11-colors"
                                                                    @colorChange="(val) => steps[10].color = val"
                                                                    v-if="!steps[10].dropdisable"
                                                            >
                                                                <template slot="btn">
                                                                    <button
                                                                            id="step-11-colors"
                                                                            class="btn btn-secondary dropdown-toggle"
                                                                            type="button"
                                                                            data-toggle="dropdown"
                                                                            aria-haspopup="true"
                                                                            aria-expanded="false"
                                                                            style="width:100%;"
                                                                            @click="perdeck += steps[10].state ? 0 : steps[10].selectpaid?0:0.15, steps[10].state = true"
                                                                            :class="[steps[10].state && steps[10].color ? 'checked' : 'unchecked']"
                                                                    >
                                                                        {{ steps[10].color ? steps[10].color : 'How many colors are in your design?' }}
                                                                    </button>
                                                                </template>
                                                            </color-btn>
                                                            <button
                                                                    id="step-11-colors"
                                                                    class="btn btn-secondary dropdown-toggle"
                                                                    type="button"
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    style="width:100%;"
                                                                    @click="perdeck += steps[10].state ? 0 : steps[10].selectpaid?0:0.15, steps[10].state = true"
                                                                    :class="[steps[10].state && steps[10].color ? 'checked' : 'unchecked']"
                                                                    v-else
                                                            >
                                                                {{ steps[10].color ? steps[10].color : 'How many colors are in your design?' }}
                                                            </button>
                                                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                                                <h3 style="color: #5867dd">Custom Printed Cartons</h3>
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
                                                                    <a v-if="! steps[10].state" @click=" steps[10].state=! steps[10].state, perdeck+=steps[10].selectpaid?0:0.15"   class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill">
                                                                        <i class="fa fa-check"></i>
                                                                    </a>
                                                                    <a v-else @click=" steps[10].state=! steps[10].state, perdeck+=steps[10].selectpaid?0:-0.15"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                                                <h3 style="color: #5867dd">Basic Cartons</h3>
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



                            <span v-if="currentStep == 1">
                                <h2 class="m-section__heading" style="color: #5867dd">Get our low prices!</h2>


                                <div class="m-section__content">
                                    <p>
                                       Increase your quantity or add multiple batches to lower the price.
                                    </p>
                                    <p>
                                        A <b>batch</b> includes all products of one style.
                                        If you want to add the same deck design in multiple sizes, each size will be a separate batch.
                                        The more batches you add, the further the price drops. The price is not low enough? Increase your order size and the price of all products will drop.
                                    </p>

                                    <p>
                                       <b>See our decks:</b>
                                    </p>
                                     <p>
                                         <a href="https://www.youtube.com/watch?v=07nh3DRuUw0" target="_blank">
                                       <img src="/skateboard-deck-production/2hex-video-thumb.jpg" style="width: 100%;" alt="skateboard deck factory video">
                                             </a>
                                    </p>

                                    <p>
                                       <b>Finished?</b> Scroll down and press continue to select the concave!
                                    </p>
                                </div>
                             </span>

                            <span v-if="currentStep == 2">
                                <h2 class="m-section__heading" style="color: #5867dd">Good Job!</h2>
                                <div class="m-section__content">
                                    <p>
                                        <b>See our concaves in 3D.</b>
                                    </p>
                                    <p>
                                       You can choose between two skateboard deck moulds in deep and medium concave. The skateboard deck concave marked in purple, is your
                                        current selection. After selecting one concave, press play to see the concave in 3D. This 3D preview also gives you a good general understanding of the thickness of our veneers and a common shape of our custom street decks.
                                    </p>
                                    <p>
                                      Scroll down and press "continue" or "back".
                                    </p>
                                </div>
                            </span>



                            <span v-if="currentStep == 3">
                                <h2 class="m-section__heading" style="color: #5867dd">Jump between steps.</h2>
                                <div class="m-section__content">
                                    <p>
                                        You can see all skateboard deck configuration steps in the left side navigation. You can use this navigation to see how far you are in
                                        the process of planning your current custom skateboard decks batch. Each step is a link. Use these links to jump forwards or backwards
                                        while selecting your skateboard decks specifications.
                                    </p>
                                    <p>
                                       When selecting your preferred wood, note that the price per deck as well as the total price change.
                                    </p>
                                </div>
                            </span>



                            <span v-if="currentStep == 4">
                            <h2 class="m-section__heading" style="color: #5867dd">Now you've got it!</h2>
                                <div class="m-section__content">
                                    <p>
                                       Do you want to see the summary?
                                    </p>
                                    <p>
                                        Click "skip next steps" to jump directly to the summary chart. in the chart you can see all your selections of all batches,
                                        you can edit a batch, delete or add another batch. To come back to this selection, just click "edit".
                                    </p>
                                    <p>
                                        Ready to complete your selection? Choose your preferred glue and press continue.
                                    </p>
                                </div>
                            </span>



                            <span v-if="currentStep == 5">
                            <h2 class="m-section__heading" style="color: #5867dd">Skateboard Deck Design Template.</h2>
                                <div class="m-section__content">
                                    <p>
                                        <a href="/skateboard-deck-production/2HEX-skateboard-deck-design-template.pdf" target="_blank">
                                    <p>2HEX skateboard deck design template</p>
                                    <img src="/skateboard-deck-production/skateboard-deck-template-preview.png" alt="skateboard deck template" style="width: 100%">
                                        </a>
                                    </p>
                                    <p>
                                        Download our skateboard deck design template, fill in your skateboard deck design, upload the filled in PDF file and select your color quantity (or CMYK for multi color prints).
                                        If you have a special design which can not be selected in the skateboard deck configurator, enter CMYK and your skateboard deck order will be adjusted manually
                                        after submitting.
                                    </p>
                                </div>
                            </span>


                            <span v-if="currentStep == 6">
                            <h2 class="m-section__heading" style="color: #5867dd">Skateboard Deck Design Template.</h2>
                                <div class="m-section__content">
                                    <p>
                                        <a href="/skateboard-deck-production/2HEX-skateboard-deck-design-template.pdf" target="_blank">2HEX skateboard deck design template</a>
                                    </p>
                                    <p>
                                        Download our skateboard deck design template, fill in your skateboard deck design, upload the filled in PDF file and select your color quantity (or CMYK for multi color prints).
                                        If you have a special design which can not be selected in the skateboard deck configurator, enter CMYK and your skateboard deck order will be adjusted manually
                                        after submitting.
                                    </p>
                                </div>
                            </span>



                            <span v-if="currentStep == 7">
                            <h2 class="m-section__heading" style="color: #5867dd">Top Engraving.</h2>
                            <div class="m-section__content">
                                    <p>
                                        Select if you want your custom skateboard decks to have top engraving. If you choose to add a top engraving, upload a vector file (PDF or AI) in actual 1 to 1 size.
                                    </p>
                                </div>
                            </span>

                            <span v-if="currentStep == 8">
                            <h2 class="m-section__heading" style="color: #5867dd">Skateboard deck veneer colors.</h2>
                                <div class="m-section__content">
                                    <p>
                                        Select your skateboard deck veneer colors.
                                    </p>
                                    <p>
                                        Select your preferred custom skateboard deck veneer colors. The first three custom veneer colors are 0.40 USD. Every additional
                                        custom veneer color is 0.40 USD. To save costs select all natural veneers or 'random' for our production team to use randomly selected veneers.
                                    </p>
                                </div>
                            </span>


                            <span v-if="currentStep == 9">
                            <h2 class="m-section__heading" style="color: #5867dd">Special Customizations.</h2>
                                <div class="m-section__content">
                                    <p>
                                        These specials are customization options which are rarely offered in skate shops due to their difficulty of production. Select a special customization to differentiate from most other deck brands and to offer
                                        your customers a unique and highly professional ride experience.
                                    </p>
                                </div>
                            </span>

                            <span v-if="currentStep == 10">
                            <h2 class="m-section__heading" style="color: #5867dd">Cardboard.</h2>
                            <div class="m-section__content">
                                    <p>
                                        Select if you want to add a cardboard inside the shrink-wrap.
                                        You can wrap cardboards around decks or you can place cardboards on the top or the bottom of decks.<br>
                                <p>

                                <a href="/skateboard-deck-production/Deck-Cardboard(outlined).ai" target="_blank">
                                <p>2HEX skateboard deck cardboard template</p>
                                <img src="/skateboard-deck-production/skateboard-deck-cardboard-template.png" alt="skateboard deck cardboard template" style="width: 100%">
                                </a>
                                <br>
                                </p>
                                        Upload your cardboard artwork as vector file (PDF or AI) in actual size 1 to 1.
                                        When preparing your artwork, place your folding and cutting lines in separate layers marked "cutting line"
                                        and "folding line". Leave a 5mm bleed around all cutting edges.<br>
                                        To make sure your cardboard artwork has the right size, use a ruler to draw and cut an accurate sample. Wrap the sample around a deck and check if the size fits.
                                    </p>
                                </div>
                            </span>

                            <span v-if="currentStep == 11">
                            <h2 class="m-section__heading" style="color: #5867dd">Box Print.</h2>
                                <div class="m-section__content">
                                    <p>
                                        Add your logo on both sides of all skateboard deck cartons.<br>
                                    </p>
                                    <p>

                                <a href="/skateboard-deck-production/2HEX-10deck-carton-template-editable.ai" target="_blank">
                                <p>2HEX skateboard carton print template</p>
                                <img src="/skateboard-deck-production/skateboard-deck-carton-template.png" alt="skateboard deck carton print template" style="width: 100%">
                                    </a>
                                    <br>

                                        <br>
                                        Shipping decks in your company's own cartons is perceived as more professional by distributors and skate shops.
                                    </p>
                                </div>
                            </span>


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
                            <button
                                    id="save_order"
                                    class="btn btn-secondary m-btn m-btn--custom m-btn--icon col m--align-right"
                                    @click.prevent="save"
                            >
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
    import ColorBtn from '@/components/griptape-configurator/views/ColorBtn';

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
            },
            batchtotal: {
                type: Number,
                default: 0
            },
            filenames: {
                type: Object,
                default: null
            }
        },
        components: {
            ColorBtn
        },
        data() {
            return {
                sizes: [
                    '7.0" x 28" (A1: WB 11.73", N 6.06", T 6.0")',
                    '7.25" x 29" (B1: WB13.5": N5.87", T5.47")',
                    '7.375" x 30" (C1: WB12.81" : N6.81" , T6.18")',
                    '7.5" x 30.75" (D1: WB14.02": N6.40", T6.16")',
                    '7.5" x 31" (D2: WB14.02": N6.59", T6.20")',
                    '7.5" x 31.25" (D3: WB14.02": N6.73", T6.34")',
                    '7.5" x 31.5" (D4: WB14.02": N6.77", T6.54")',
                    '7.625" x 31.125" (E1: WB14.02": N6.57", T6.38")',
                    '7.625" x 31.25" (E2: WB14.02": N6.73", T6.34")',
                    '7.625" x 31.5" (E3: WB14.02": N6.83", T6.44")',
                    '7.75" x 31" (F1: WB 14.02", N 6.60", T 6.20")',
                    '7.75" x 31.125" (F2: WB14.02": N6.73", T6.22")',
                    '7.75" x 31.5" (F3: WB14.02": N6.85", T6.46")',
                    '7.75" x 31.75" (F4: WB14.02": N6.93", T6.65")',
                    '7.875" x 31.1875" (G1: WB14.02": N6.77", T6.22")',
                    '7.875" x 31.3" (G2: WB14.02": N6.75", T6.36")',
                    '7.875" x 31.625" (G3: WB 14.25", N 6.79", T 6.40")',
                    '7.875" x 31.875" (G4: WB14.25": N6.93", T6.54")',
                    '8.0" x 31" (H1: WB14.02": N6.59", T6.20")',
                    '8.0" x 31.375" (H2: WB14.02": N6.87", T6.32")',
                    '8.0" x 31.5" (H3: WB14.02": N6.93", T6.38")',
                    '8.0" x 31.75" (H4: WB14.25": N6.81", T6.50")',
                    '8.0" x 31.75" (H5: WB14.21" : N6.87", T6.47")',
                    '8.0" x 31.875" (H6: WB14.25": N6.85", T6.61")',
                    '8.0" x 32" (H7: WB14.02": N7.13", T6.65")',
                    '8.125" x 31.5" (I1: WB14.02": N6.75" , T6.55")',
                    '8.125" x 31.75" (I2: WB14.02": N6.97", T6.57")',
                    '8.125" x 31.875" (I3: WB14.25" : N6.8" , T6.625")',
                    '8.125" x 31.875" (I4: WB14.5": N6.85", T6.34")',
                    '8.125" x 32" (I5: WB14.25" : N6.9375" , T6.61")',
                    '8.25" x 31.625" (I6: WB14.25" : N6.75" , T6.425")',
                    '8.25" x 31.75" (J1: WB14.5": N6.65", T6.42")',
                    '8.25" x 32" (J2: WB14.25" : N7.0" , T6.55" )',
                    '8.25" x 32.56" (J3: WB15": N6.89", T6.50")',
                    '8.375" x 32.1875"  (K1: WB14.5": N7.01", T6.54")',
                    '8.375" x 32.125" (K2: WB14.5": N6.89", T6.58")',
                    '8.5" x 32" (L1: WB14.37": N6.95", T6.52")',
                    '8.5" x 32.125" (L2: WB14.56": N6.81", T6.57")',
                    '8.5" x 32.5" (L3: WB15": N6.79", T6.44")',
                    '8.5" x 32.875" (L4: WB15.04": N6.97", T6.69")',
                    '8.75" x 32.5" (M1: WB14.625" : N7.13", T6.55")',
                ],
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
                colorNames: ['natural', 'brown', 'orange', 'red', 'lime green', 'black', 'yellow', 'green', 'grey', 'purple', 'pink', 'blue', 'scarlet', 'dark blue', 'deep violet', 'wood red', 'royal purple', 'light blue', 'yellowish brown'],
                partNames: [],
                currentColors:['natural', 'natural', 'natural', 'natural', 'natural', 'natural', 'natural'],
                title: 'Skateboard Deck Configurator',
                randomColors: [],
                quantity: 2000,
                total_quantity: 0,
                orderId: '',
                total: 0,
                fixedprice: 0,
                perdeck: 0,
                size: "",
                pre_quantity: 0,
                pre_size: "",
                steps: [
                    {state: false},
                    {state: false},
                    {state: true},
                    {state: true},
                    {state: false, color: null, uploadProgress: 0, dropdisable: false, selectpaid: false},
                    {state: false, name: '', color: null, uploadProgress: 0, dropdisable: false, selectpaid: false},
                    {state: false, name: '', uploadProgress: 0, selectpaid: false},
                    {state: true, name: ''},
                    {
                        fulldip: {state: false,color: ""},
                        transparent: {state: false, color: ""},
                        metallic: {state: false, color: ""},
                        blacktop: {state: false},
                        blackmidlayer: {state: false},
                        pattern: {state: false},
                    },
                    {state: false, name: '', uploadProgress: 0, selectpaid: false},
                    {state: false, name: '', color: null, uploadProgress: 0, dropdisable: false, selectpaid: false},
                ],
            }
        },
        computed: {
            progressWidth: function(){
                return {
                    width: 100 * this.currentStep / 10 + '%',
                }
            },
            currentStep: {
                get() {
                    return this.$store.getters.getCurrentStep;
                },
                set(val) {}
            }
        },
        methods: {
            save(event) {

                if (this.quantity < 50 || !this.size.length) {
                    swal({
                        title: "",
                        text: "Please enter correct skateboard decks quantity. Minimum is 50 decks.",
                        type: "warning",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    });
                    this.quantity = 2000;

                    return false;
                }

                var formData = new FormData();
                let bottom = document.getElementById('bottomPrintFile');
                let top = document.getElementById('topPrintFile');
                let engravery = document.getElementById('engraveryFile');
                let cardboard = document.getElementById('cardboardFile');
                let carton = document.getElementById('cartonFile');


                formData.append('id', this.orderId);
                formData.append('quantity',this.quantity);
                formData.append('size', this.size);
                formData.append('concave',this.steps[1].state ? 'Deep Concave' : 'Medium Concave');
                formData.append('wood',this.steps[2].state ? 'European Maple Wood' : 'American Maple Wood');
                formData.append('glue',this.steps[3].state ? 'American Glue' : 'Epoxy Glue');
                formData.append('bottomprint', this.steps[4].state && this.steps[4].name ? this.steps[4].name : '');
                formData.append('topprint',this.steps[5].state && this.steps[5].name ? this.steps[5].name : '');
                formData.append('engravery',this.steps[6].state && this.steps[6].name ? this.steps[6].name : '');
                formData.append('veneer',JSON.stringify(this.currentColors));
                formData.append('extra',JSON.stringify(this.steps[8]));
                formData.append('cardboard',this.steps[9].state && this.steps[9].name ? this.steps[9].name : '');
                formData.append('carton',this.steps[10].state && this.steps[10].name ? this.steps[10].name : '');
                formData.append('perdeck',this.perdeck);
                formData.append('total',(this.quantity * this.perdeck + this.fixedprice).toFixed(2));
                formData.append('fixedprice',this.fixedprice);

                formData.append('bottomprint_color', this.steps[4].state
                && this.steps[4].color ? this.steps[4].color : "");

                formData.append('topprint_color', this.steps[5].state
                && this.steps[5].color ? this.steps[5].color : "");

                formData.append('carton_color', this.steps[10].state
                && this.steps[10].color ? this.steps[10].color : "");

                axios.post('/skateboard-deck-configurator', formData)
                    .then((response) => {
                        // event.target.innerHTML = '<span><i class="la la-check"></i> <span> Use standards</span></span>';
                        setTimeout(() => {
                            window.location.href = "/summary";
                        }, 1000);
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
                var part, color, org_c, c;

                if(event.target.getAttribute('data-part-id') == null){
                    part = parseInt(event.target.parentElement.getAttribute('data-part-id'))
                    color = event.target.parentElement.getAttribute('data-color-name')

                }else{
                    part = parseInt(event.target.getAttribute('data-part-id'))
                    color = event.target.getAttribute('data-color-name')
                }
                org_c = 0;
                for(i = 0; i < this.currentColors.length; i ++){
                    if(this.currentColors[i] != 'natural')
                        org_c ++;
                }
                this.currentColors[part] = color;
                c = 0;
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

                this.renderProduct();
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
                this.$store.commit('changeStep', ++this.currentStep);
            },
            prevStep(){
                this.$store.commit('changeStep', --this.currentStep);
            },
            sizeChange(event) {

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
            quantityChange(){
                if(this.quantity % 10 != 0){
                    swal({
                        title: "",
                        text: "Select Only quantities in steps of 10 (10, 20, ...)",
                        type: "warning",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
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
            },
            initOrder() {
                if (this.order) {
                    this.orderId = this.order.id;
                    this.quantity = this.order.quantity;
                    this.pre_quantity = this.order.quantity;
                    this.size = this.order.size;
                    this.pre_size = this.order.size;
                    if(this.order.concave == "Deep Concave")
                        this.steps[1].state = true;
                    else
                        this.steps[1].state = false;

                    if(this.order.wood == "European Maple Wood")
                        this.steps[2].state = true;
                    else
                        this.steps[2].state = false;

                    if(this.order.glue == "American Glue")
                        this.steps[3].state = true;
                    else
                        this.steps[3].state = false;

                    if(this.order.bottomprint){
                        this.steps[4].state = true;
                        let step5 = document.getElementById('step-5-recent');
                        step5.innerHTML = this.order.bottomprint;
                        step5.classList.remove('unchecked');
                        debugger;
                        for(let i = 0; i < this.filenames['bottom'].length; i ++){
                            if(this.filenames['bottom'][i]['name'] == this.order.bottomprint){
                                this.steps[4].dropdisable = this.filenames['bottom'][i]['is_disable']?true:false;
                            }
                        }

                        $('input',$('#m_wizard_form_step_5')).attr('fileName',this.order.bottomprint);
                    }

                    if(this.order.topprint){
                        this.steps[5].state = true;
                        let step6 = document.getElementById('step-6-recent');
                        step6.innerHTML = this.order.topprint;
                        step6.classList.remove('unchecked')
                        for(let i = 0; i < this.filenames['top'].length; i ++){
                            if(this.filenames['top'][i]['name'] == this.order.topprint){
                                this.steps[5].dropdisable = this.filenames['top'][i]['is_disable']?true:false;
                            }
                        }
                        $('input',$('#m_wizard_form_step_6')).attr('fileName',this.order.topprint);
                    }

                    if(this.order.engravery){
                        this.steps[6].state = true;
                        $('button',$('#m_wizard_form_step_7')).html(this.order.engravery);
                        setTimeout(function(){
                            $('button',$('#m_wizard_form_step_7')).removeClass('unchecked');
                        }, 1000);
                        $('input',$('#m_wizard_form_step_7')).attr('fileName',this.order.engravery);
                    } else
                        this.steps[6].state = false;

                    this.currentColors = JSON.parse(this.order.veneer);
                    if(this.currentColors.includes('random')) {
                        this.steps[7].state = false;
                    }

                    this.steps[8] =JSON.parse(this.order.extra);

                    if(this.order.cardboard){
                        this.steps[9].state = true;
                        $('button',$('#m_wizard_form_step_10')).html(this.order.cardboard);
                        setTimeout(function(){
                            $('button',$('#m_wizard_form_step_10')).removeClass('unchecked');
                        }, 1000);
                        $('input',$('#m_wizard_form_step_10')).attr('fileName',this.order.cardboard);
                    } else
                        this.steps[9].state = false;


                    if(this.order.carton){
                        this.steps[10].state = true;
                        let step11 = document.getElementById('step-11-recent');
                        step11.innerHTML = this.order.carton;
                        step11.classList.remove('unchecked');
                        for(let i = 0; i < this.filenames['box'].length; i ++){
                            if(this.filenames['box'][i]['name'] == this.order.carton){
                                this.steps[10].dropdisable = this.filenames['box'][i]['is_disable']?true:false;
                            }
                        }
                        $('input',$('#m_wizard_form_step_11')).attr('fileName',this.order.carton);
                    }

                    this.perdeck = +this.order.perdeck;
                    this.total = +this.order.total;
                    this.fixedprice = +this.order.fixedprice;
                }
            },
            uploadFile(event) {
                if(document.body.getAttribute('signed') == 0){
                    swal({
                        title: "",
                        text: "You need to login to upload file",
                        type: "warning",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    }).then((value) => {
                        window.location.href = "/login";
                    });
                    return;
                }

                let target = event.target;

                if (!Object.keys(target.dataset).length) {
                    return false;
                }

                let formData = new FormData();
                let filename = target.getAttribute('filename');
                let id = target.getAttribute('id');
                let numStep = target.dataset.step;

                formData.append('typeUpload', target.dataset.typeUpload);

                if(!filename && id != "engraveryFile" && id != "cardboardFile")
                    this.fixedprice += 120;
                else if(!filename && id == "engraveryFile")
                    this.fixedprice += 80;
                else if(!filename && id == "cardboardFile")
                    this.fixedprice += 500;

                formData.append('file', target.files[0]);

                let options = {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress:  progressEvent => {
                        this.steps[numStep].uploadProgress = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                    }
                };

                axios.post('/configurator-fileupload', formData, options)
                    .then(response => response.data)
                    .then(response => {
                        if(response != 'failed'){
                            target.setAttribute('fileName', response);
                            target.nextElementSibling.classList.remove("unchecked");
                            $('button', target.parentNode.parentNode.nextElementSibling).addClass("unchecked");
                            $('button', target.parentNode.parentNode.nextElementSibling).html(response);

                            this.$notify({
                                group: 'main',
                                type: 'success',
                                title: 'Upload file',
                                text: "File uploaded successfully"
                            });

                        } else {
                            this.$notify({
                                group: 'main',
                                type: 'error',
                                title: 'Upload file',
                                text: "File upload error"
                            });
                        }
                    })
                    .catch(error => {
                        this.steps[numStep].uploadProgress = 0;
                        this.$notify({
                            group: 'main',
                            type: 'error',
                            title: 'Upload file',
                            text: "File upload error"
                        });
                    })
            }
        },
        mounted() {
            this.initOrder();

            setTimeout(() => {
                let inputQuantity = document.getElementById("quantity");
                // Fire event plus/minus quantity
                document.getElementsByClassName("input-group-btn-vertical")[0].addEventListener("click", () => {
                    this.quantity = parseInt(inputQuantity.value);
                    this.quantityChange();
                });
            }, 2000);

            // Listen change size
            $('#size').on('select2:select', (e) => {
                this.size = e.params.data.text;
                this.sizeChange();
            });

            if (!this.order) {
                this.randomClicked();
            }
        },
        created() {
            if (this.order) {
                if(this.order.bottomprint_color){
                    this.steps[4].state = true;
                    this.steps[4].color = this.order.bottomprint_color;
                }

                if(this.order.topprint_color){
                    this.steps[5].state = true;
                    this.steps[5].color = this.order.topprint_color;
                }

                if(this.order.carton_color){
                    this.steps[10].state = true;
                    this.steps[10].color = this.order.carton_color;
                }
            } else {
                // 7.875" x 31.875" (G4: WB14.25": N6.93", T6.54")
                this.size = this.sizes[17];
                this.pre_size = this.sizes[17];
            }
            this.$store.commit('changeStep', 1);
            this.renderProduct();
            // Global quantity batches plus current total.
            this.total_quantity += this.batchtotal;

            let length = this.currentColors.length;

            for (let i = 0; i < length; i++) {
                this.$set(this.partNames, i, {});
                this.$set(this.partNames[i], 'number', i + 1);
                this.$set(this.partNames[i], 'name', this.currentColor(i));
                this.$set(this.partNames[i], 'bg', this.colorData[this.currentColors[i]]);
            }
        }
    };
</script>
<style scoped>
    .checked {
        border: 1px solid #36a3f7 !important;
    }
    .unchecked {
        border: 1px solid #ced4da !important;
    }
</style>
