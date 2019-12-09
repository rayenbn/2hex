<template>
    <div class="m-content">
        <div class="row">
            <div class="col-xl-9">
                <div class="m-portlet">
                    <head-configurator
                        title="Heat Transfer Factory"
                        :links="headLinks"
                    />
                    <div class="m-wizard m-wizard--1 m-wizard--success" id="m_wizard">
                        <div class="m-portlet__padding-x"></div>
                        <div class="m-wizard__progress">
                            <div class="progress" style="height: 2px;">
                                <div
                                    :style="progressWidth"
                                    class="progress-bar m--bg-info"
                                    role="progressbar"
                                    aria-valuenow="65"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                >
                                </div>
                            </div>

                            <div class="m-wizard__nav">
                                <div class="m-wizard__steps">
                                    <div class="m-wizard__step m-wizard__step--current" m-wizard-target="m_wizard_form_step_1">
                                    </div>
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="m-wizard__form">

                            <form
                                class="m-form m-form--label-align-left- m-form--state-"
                                id="m_form"
                                method="POST"
                                action="#"
                            >
                                <div class="m-portlet__body">

                                    <heat-transfer-step-1 />
                                    <heat-transfer-step-2 />

                                </div>

                                <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                    <div class="m-form__actions m-form__actions">
                                        <div class="row">

                                            <div class="col-lg-4 m--align-center">
                                                <button
                                                    @click="prevStep"
                                                    class="btn btn-secondary m-btn m-btn--custom m-btn--icon"
                                                    data-wizard-action="prev"
                                                >
                                                    <span>
                                                        <i class="la la-arrow-left"></i>
                                                        &nbsp;&nbsp;
                                                        <span>Back</span>
                                                    </span>
                                                </button>
                                            </div>


                                            <div class="col-lg-4 m--align-center">
                                                <button
                                                    @click="save"
                                                    class="btn btn-primary m-btn m-btn--custom m-btn--icon"
                                                    data-wizard-action="submit"
                                                >
                                                    <span>
                                                        <i class="la la-check"></i>
                                                        &nbsp;&nbsp;
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
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3">
                <div class="m-portlet">
                    <div class="m-portlet__body">
                        <div class="m-section" style="background-image: url('/img/heat-transfer/heat-transfer.jpg'); height: 400px;">

                        </div>
                        <div class="m-separator m-separator--fit"></div>

                        <div class="m-widget1 m-widget1--paddingless">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{ user ? 'Heat Transfer' : 'Login' }}</h3>
                                        <span class="m-widget1__desc">{{ user ? 'Price per sheet' : 'To See Prices' }}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span
                                            class="m-widget1__number m--font-brand"
                                            id="perSet"
                                            v-if="quantity > 0 && size && user"
                                        >
                                            ${{ perSetPrice && perSetPrice.toFixed(2) }}
                                        </span>
                                        <span v-else class="m-widget1__number m--font-danger" id="perSetPrice" >
                                            $ ?.??
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{ user ? 'Batch' : 'Login' }}</h3>
                                        <span class="m-widget1__desc">{{ user ? 'Total of Batch' : 'To See Prices' }}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span
                                            v-if="quantity > 0 && size && user"
                                            class="m-widget1__number m--font-danger"
                                            id="total"
                                        >
                                            $ {{ totalBatch }}
                                        </span>
                                        <span v-else class="m-widget1__number m--font-danger" id="total" >
                                            $ ?.??
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <button
                                @click="save"
                                id="save_order"
                                class="btn btn-secondary m-btn m-btn--custom m-btn--icon col m--align-right"
                            >
                                <span>
                                    <i class="la la-send"></i>
                                    <span>skip next steps</span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    import HeadConfigurator from "./views/HeadConfigurator";
    import HeatTransferStep1 from './views/Step1';
    import HeatTransferStep2 from './views/Step2';
    import { mapActions, mapGetters } from 'vuex';

    const COUNT_STEPS = 2;

    export default {
        name: "HeatTransferConfigurator",
        props: {
            user: {
                type: Object,
                default: null
            }
        },
        data() {
            return {
                id: "",
                quantity: 0,
                size: null,
                headLinks: [
                    {name: 'Home', href: '/'},
                    {name: 'Configurator', href: '/skateboard-heat-transfer-configurator'},
                ],
                stepInfo: {
                    head: '',
                    content: ''
                }
            }
        },
        components: {
            HeadConfigurator,
            HeatTransferStep1,
            HeatTransferStep2
        },
        computed: {
            ...mapGetters([
                'getCurrentStep'
            ]),
            currentStep: {
                get() {
                    return this.getCurrentStep;
                },
                set(val) {}
            },
            progressWidth(){
                return {
                    width: 100 * this.currentStep / 2 + '%',
                }
            },
        },
        methods: {
            nextStep() {
                this.$store.commit('changeStep', ++this.currentStep);
            },
            prevStep() {
                this.$store.commit('changeStep', --this.currentStep);
            },
            save(event) {
            },
        }
    }
</script>

<style scoped>

</style>