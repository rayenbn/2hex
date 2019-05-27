<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_3">
        <div class="row">
            <div class="col-xl-6">

                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Unpunctured</h3>
                            </div>
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
                                        :class="[!status ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                    >
                                        <i class="fa" :class="[!status ? 'fa-check' : 'fa-times']"></i>
                                    </button>
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
                                <h3>Unpunctured</h3>
                                Unpunctured griptape has no perforation. None perforated griptape is preferred by amateur skateboarders to its lower cost.
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
                                <h3 class="m-portlet__head-text">Perforated</h3>
                            </div>
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
                                <h3>Perforated</h3>
                                Perforated griptape is the standard in professional skateboarding. It is being punctured with barely visible evenly distributed 0.4mm holes. These small holes prevent the creation of air bubbles between deck and griptape, which leads to better deck control.
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
            status: _.debounce(function(val){
                this.$emit('stateChange', val);
            }, 300)
        }
    }
</script>