<template>
    <div class="m-content">
        <div class="row">
            <div class="col-xl-9">
                <div class="m-portlet">

                    <head-configurator
                        title="Skateboard Wheel Factory"
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
                                    <div class="m-wizard__step m-wizard__step--current" m-wizard-target="m_wizard_form_step_1"></div>
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_2"></div>
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

                                    <transfers-step1 />
                                    <transfers-step2 :upload_url="upload_url" />

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
                                                        <span>Back</span>
                                                    </span>
                                                </button>
                                            </div>


                                            <div class="col-lg-4 m--align-center">
                                                <button
                                                    @click="saveBatch"
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
                        <div class="m-section">
                            <h2 class="m-section__heading" v-html="stepInfo.head"></h2>
                            <div class="m-section__content" v-html="stepInfo.content"></div>
                        </div>
                        <div class="m-separator m-separator--fit"></div>

                        <div class="m-widget1 m-widget1--paddingless">

                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{ hasAuthUser ? 'Heat Transfer' : 'Login' }}</h3>
                                        <span class="m-widget1__desc">{{ hasAuthUser ? 'Price per transfer' : 'To See Prices' }}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-brand" v-if="hasAuthUser">
                                            $ {{costPerTransfer && costPerTransfer.toFixed(2)}}
                                        </span>
                                        <span v-else class="m-widget1__number m--font-danger">
                                            $ ?.??
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{ hasAuthUser ? 'Screens' : 'Login' }}</h3>
                                        <span class="m-widget1__desc">{{ hasAuthUser ? 'Price per screen' : 'To See Prices' }}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span class="m-widget1__number m--font-brand" v-if="hasAuthUser">
                                            $ {{costPerScreen && costPerScreen.toFixed(2)}}
                                        </span>
                                        <span v-else class="m-widget1__number m--font-danger">
                                            $ ?.??
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{ hasAuthUser ? 'Batch' : 'Login' }}</h3>
                                        <span class="m-widget1__desc">{{ hasAuthUser ? 'Total of Batch' : 'To See Prices' }}</span>
                                    </div>

                                    <div class="col m--align-right">
                                        <span
                                            v-if="hasAuthUser"
                                            class="m-widget1__number m--font-danger"
                                        >
                                            $ {{ pricePerSheet }}
                                        </span>
                                        <span v-else class="m-widget1__number m--font-danger">
                                            $ ?.??
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <br>
                            <slot name="default">
                                <button
                                    @click="saveBatch"
                                    class="btn btn-secondary m-btn m-btn--custom m-btn--icon col m--align-right"
                                >
                                <span>
                                    <i class="la la-send"></i>
                                    <span>skip next steps</span>
                                </span>
                                </button>
                            </slot>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import HeadConfigurator from '@/components/HeadConfigurator.vue';
    import TransfersStep1 from "./Step1";
    import TransfersStep2 from "./Step2";

    const COUNT_STEPS = 2;

    export default {
        name: 'transfers-configurator',
        props: {
            manufacturer_url: {
                type: String,
                default: ''
            },
            upload_url: {
                type: String,
                default: ''
            },
            filenames: {
                type: Object,
                default: () => {
                    return null;
                }
            },
            totalQuantity: {
                type: Number,
                default: 0
            },
            totalColors: {
                type: Number,
                default: 0
            },
            transfer: {
                type: Object,
                default: null
            },
            user: {
                type: Object,
                default: () => {
                    return null;
                }
            },
            paidFile: {
                type: Object,
                default: () => {
                    return null;
                }
            },
        },
        components: {
            TransfersStep1,
            TransfersStep2,
            HeadConfigurator,
        },
        data() {
            return {
                headLinks: [
                    {name: 'Home', href: '/'},
                    {name: 'Configurator', href: this.manufacturer_url},
                ],
                stepInfo: {
                    head: '',
                    content: ''
                }
            }
        },
        watch: {
            currentStep(newVal) {
                this.changeStepInfo(newVal);
            }
        },
        computed: {
            hasAuthUser() {
                if (! this.user) {
                    return false;
                }

                return Object.keys(this.user).length > 0;
            },
            currentStep: {
                get() {
                    return this.$store.getters.getCurrentStep;
                },
                set(val) {}
            },
            progressWidth(){
                return {
                    width: 100 * this.currentStep / COUNT_STEPS + '%',
                }
            },
            pricePerSheet() {
                return this.$store.getters['TransfersConfigurator/pricePerSheet'];
            },
            costPerTransfer() {
                return this.$store.getters['TransfersConfigurator/costPerTransfer'];
            },
            costPerScreen() {
                return this.$store.getters['TransfersConfigurator/costPerScreen'];
            },
        },
        methods: {
            changeStepInfo(step) {
                switch(step) {
                    case 1:
                        this.stepInfo.head = 'Your first batch of transfers!';
                        this.stepInfo.content = 'A batch consists of all heat transfers in one size and style. Each batch must have at least 50 heat transfers. The more batches you add to your total order, the cheaper each batch will get! (You will see this on the summary page)';
                        break;
                    case 2:
                        this.stepInfo.head = 'Give your design a name!';
                        this.stepInfo.content = 'And to make sure the print looks perfect, select the finish, the number of colors and add the Pantone color codes.';
                        break;
                    default:
                        this.stepInfo.head = '';
                        this.stepInfo.content = '';
                }
            },
            nextStep(){
                this.$store.commit('changeStep', ++this.currentStep);
            },
            prevStep(){
                this.$store.commit('changeStep', --this.currentStep);
            },
            saveBatch() {
                this.$store.dispatch('TransfersConfigurator/saveBatch')
                    .then((response) => {
                        this.$notify({
                            group: 'main',
                            type: 'success',
                            title: 'Heat Transfer Configurator',
                            text: "Heat Transfer succesfully saved"
                        });

                        setTimeout(() => {
                            window.location = response.request.responseURL
                        }, 1500);
                    })
                    .catch(err => {
                        this.$notify({
                            group: 'main',
                            type: 'error',
                            title: 'Heat Transfer Configurator',
                            text: "Heat Transfer not saved. Please reload  page."
                        });
                    });
            }
        },
        created() {
            this.$store.commit('TransfersConfigurator/setRecentFiles', this.filenames);
            this.$store.commit('TransfersConfigurator/setTransfersQuantity', this.totalQuantity);
            this.$store.commit('TransfersConfigurator/setTransfersColorsQuantity', this.totalColors);
            this.$store.commit('TransfersConfigurator/setPaidFile', this.paidFile);

            if (this.transfer != null) {
                this.$store.commit('TransfersConfigurator/setTransfer', this.transfer);
            }
        }
    };
</script>
