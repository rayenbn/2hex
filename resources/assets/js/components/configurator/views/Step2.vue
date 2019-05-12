<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_2">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--head-overlay m-portlet--full-height  m-portlet--rounded-force">
                    <div class="m-portlet__body">
                        <div class="m-widget27 m-portlet-fit--sides">
                            <div class="m-widget27__container">

                                <ul class="m-widget27__nav-items nav nav-pills nav-fill" role="tablist">
                                    <li class="step2-tab-nav nav-item" >
                                        <a class="nav-link active" data-toggle="pill" href="#m_personal_income_quater_1">OS780</a>
                                    </li>
                                    <li class="step2-tab-nav nav-item" >
                                        <a class="nav-link" data-toggle="pill" href="#m_personal_income_quater_2">HS780</a>
                                    </li>
                                </ul>

                                <div class="m-widget27__tab tab-content m-widget27--no-padding">
                                    <div id="m_personal_income_quater_1" class="tab-pane active">
                                        <div class="row  align-items-center">
                                            <div class="col">
                                                <div class="col-xl-12">
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title"></div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                                                        <button
                                                                            @click="status = !status"    
                                                                            class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                                                            :class="[status ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                                                        >
                                                                            <i class="fa" :class="[status ? 'fa-check' : 'fa-times']"></i>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
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
                                                                <h3>Deep Concave</h3>
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
                                    <div id="m_personal_income_quater_2" class="tab-pane fade">
                                        <div class="row  align-items-center">
                                            <div class="col">
                                                <div class="col-xl-12">
                                                    <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                                                        <div class="m-portlet__head">
                                                            <div class="m-portlet__head-caption">
                                                                <div class="m-portlet__head-title"></div>
                                                            </div>
                                                            <div class="m-portlet__head-tools">
                                                                <ul class="m-portlet__nav">
                                                                    <li 
                                                                        class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" 
                                                                        m-dropdown-toggle="hover"
                                                                    >
                                                                        <button
                                                                            @click="status = !status"    
                                                                            class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                                                            :class="[status ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                                                        >
                                                                            <i class="fa" :class="[status ? 'fa-check' : 'fa-times']"></i>
                                                                        </button>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
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
                                                                <h3>Medium Concave</h3>
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
</template>

<script>
    export default {
		name: 'skateboard-decks-step-2',
        props: {
            state: {
                type: Boolean,
                default: false
            }
        },
        data() {
            return {
                status: this.state
            }
        },
        watch: {
            status(val){
                this.$emit('stateChange', val);
            }
        }
    }
</script>