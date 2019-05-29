<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_7">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Brown Back Paper</h3>
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
                                            src="/img/griptape/6.1.jpg" 
                                            alt="Brown Back Paper" 
                                            title="Brown Back Paper" 
                                            class="step1-img1"
                                            height="250"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Brown Back Paper</h3>
                                Brown back paper is the standard in skateboarding. Brown back paper is not bleached. This makes it more environmentally friendly.
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
                                <h3 class="m-portlet__head-text">White Back Paper</h3>
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
                                    <div 
                                        class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" 
                                        style="min-height: 286px"
                                    >
                                        <img 
                                            src="/img/griptape/6.2.jpg" 
                                            alt="White Back Paper" 
                                            title="White Back Paper" 
                                            class="step1-img1"
                                            height="250"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>White Back Paper</h3>
                                White back paper is bleached for a better contrast to black back paper prints. White back paper is especially important if full color prints are being added to the back paper in the next configuration step.
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
        name: 'skateboard-decks-step-7',
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