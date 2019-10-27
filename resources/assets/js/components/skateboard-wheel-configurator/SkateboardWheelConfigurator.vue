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
                                <input type="hidden" v-model="id" name="id">

                                <div class="m-portlet__body">
                                    
                                    <skateboard-wheel-step-1 />
                                    <skateboard-wheel-step-2 />
                                    <skateboard-wheel-step-3 />
                                    <skateboard-wheel-step-4 />
                                    <skateboard-wheel-step-5 />
                                    <skateboard-wheel-step-6 />
                                    <skateboard-wheel-step-7 />
                                    <skateboard-wheel-step-8 />

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
                                                    @click="saveWheel"
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
                            <h2 class="m-section__heading">How to choose the best skateboard griptape?</h2>
                            <div class="m-section__content">
                                <p>
                                    Know your target group! Do they want a big print and colorful designs or do they ride plain black griptapes without any logo? Are you users price sensitive or do they require the highest quality?
                                </p>
                                <p>
                                    Choose the specifications that best meet your target groups requirements. All of our griptapes have the highest quality within the selected specifications. If you are not sure, what sells best: Go to the skatepark and ask your local skaters what they currently ride!
                                </p>
                            </div>
                        </div>
                        <div class="m-separator m-separator--fit"></div>

                        <div class="m-widget1 m-widget1--paddingless">
                            <div class="m-widget1__item">
                                <div class="row m-row--no-padding align-items-center">
                                    <div class="col">
                                        <h3 class="m-widget1__title">{{ auth ? 'Wheel' : 'Login' }}</h3>
                                        <span class="m-widget1__desc">{{ auth ? 'Price per set' : 'To See Prices' }}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span
                                            class="m-widget1__number m--font-brand"
                                            id="perSet"
                                            v-if="auth"
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
                                        <h3 class="m-widget1__title">{{ auth ? 'Batch' : 'Login' }}</h3>
                                        <span class="m-widget1__desc">{{ auth ? 'Total of Batch' : 'To See Prices' }}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span
                                            v-if="auth"
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
                                @click="saveWheel" 
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
    import HeadConfigurator from './views/HeadConfigurator.vue';
    import SkateboardWheelStep1 from './views/Step1.vue';
    import SkateboardWheelStep2 from './views/Step2.vue';
    import SkateboardWheelStep3 from './views/Step3.vue';
    import SkateboardWheelStep4 from './views/Step4.vue';
    import SkateboardWheelStep5 from './views/Step5.vue';
    import SkateboardWheelStep6 from './views/Step6.vue';
    import SkateboardWheelStep7 from './views/Step7.vue';
    import SkateboardWheelStep8 from './views/Step8.vue';

    const COUNT_STEPS = 8; 

    export default {
    	name: 'skateboard-wheel-configurator',
    	props: {
            total_sum: {
                type: Number,
                default: 0
            },
            total_quantity: {
                type: Number,
                default: 0
            },
            auth: {
                type: Number,
                default: 0
            },
            wheel: {
                type: Object,
                default: null
            },
            reirect_uri: {
                type: String,
                default: '/'
            },
            filenames: {
                type: Object,
                default: null
            }
    	},
    	components: {
            HeadConfigurator,
            SkateboardWheelStep1,
            SkateboardWheelStep2,
            SkateboardWheelStep3,
            SkateboardWheelStep4,
            SkateboardWheelStep5,
            SkateboardWheelStep6,
            SkateboardWheelStep7,
            SkateboardWheelStep8,
    	},
        data() {
            return {
                headLinks: [
                    {name: 'Home', href: '/'},
                    {name: 'Configurator', href: '/skateboard-wheel-manufacturer'},
                ],
                id: null
            }
        },
        computed: {
            currentStep: {
                get() {
                    return this.$store.getters.getCurrentStep;
                },
                set(val) {}
            },
            perSetPrice() {
                return this.$store.getters['SkateboardWheelConfigurator/getPerSetPrice'];
            },
            quantity() {
                return this.$store.getters['SkateboardWheelConfigurator/getQuantity'];
            },
            totalBatch() {
                return (this.perSetPrice * this.quantity).toFixed(2);
            },
            progressWidth(){
                return {
                    width: 100 * this.currentStep / COUNT_STEPS + '%',
                }
            },
        },
        methods: {
            nextStep(){
                this.$store.commit('changeStep', ++this.currentStep);
            },
            prevStep(){
                this.$store.commit('changeStep', --this.currentStep);
            },
            saveWheel() {
                this.$store.dispatch('SkateboardWheelConfigurator/saveWheel')
                    .then((response) => {
                        this.$notify({
                            group: 'main',
                            type: 'success',
                            title: 'Wheel Configurator',
                            text: "Wheel succesfully saved"
                        });

                        setTimeout(() => {
                            window.location = response.request.responseURL
                        }, 1500);
                    })
                    .catch(err => {
                        this.$notify({
                            group: 'main',
                            type: 'error',
                            title: 'Wheel Configurator',
                            text: "Wheel not saved. Please reload  page."
                        });
                    });
            }
        },
        created() {
            this.$store.dispatch('SkateboardWheelConfigurator/getHanbook')
                .then(() => {
                    this.$store.commit('SkateboardWheelConfigurator/setSessionInfo', {
                        totalSum: this.total_sum,
                        totalQuantity: this.total_quantity,
                        isAuth: this.auth
                    });
                    if (this.wheel != null) {
                        this.$store.commit('SkateboardWheelConfigurator/setWheel', this.wheel);
                    }

                });
        }
    };
</script>
<style scoped>
    ::v-deep .checked{
        border: 1px solid #36a3f7 !important;
    }
    ::v-deep .unchecked{
        border: 1px solid #ced4da !important;
    }
</style>