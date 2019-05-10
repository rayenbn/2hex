<template>
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
                                        v-if="state" 
                                        @click="() => {state = !state; perdeck += 1}"
                                        class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"
                                    >
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a 
                                        v-else 
                                        @click="() => {state = !state; perdeck -= 1}"
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
                                <h3>European Maple Wood</h3>
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
                                        v-if="!state" 
                                        @click="() => {state = !state; perdeck -= 1}"   
                                        class="btn btn-success m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"
                                    >
                                        <i class="fa fa-check"></i>
                                    </a>
                                    <a 
                                        v-else 
                                        @click="() => {state = !state; perdeck += 1}"    class="btn btn-secondary m-btn m-btn--icon btn-lg m-btn--icon-only m-btn--pill">
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
                                <h3>American Maple Wood</h3>
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
</template>

<script>
    export default {
		name: 'skateboard-decks-step-3',
        data() {
            return {
                state: true
            }
        },
        watch: {
            state: _.debounce(function(newVal){
                this.$store.commit('configurator/changeState', { index: 2, data: newVal });
            }, 500)
        }
    }
</script>