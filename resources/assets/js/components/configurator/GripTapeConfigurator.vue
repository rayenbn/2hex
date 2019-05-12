<template>
    <div class="m-content">
        <div class="row">
            <div class="col-xl-9">
                <div class="m-portlet">

                    <head-configurator
                        title="Grip Tape Factory"
                        :links="headLinks"
                    />

                    <div class="m-wizard m-wizard--1 m-wizard--success" id="m_wizard">
                        <div class="m-portlet__padding-x"></div>
                        <div class="m-wizard__progress">
                            <div class="progress" style="height: 2px;">
                                <div class="progress-bar m--bg-info" role="progressbar" v-bind:style="progressWidth" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
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
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_9">
                                    </div>
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_10">
                                    </div>
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_11">
                                    </div>

                                </div>
                            </div>
                        </div>

                        <div class="m-wizard__form">

                            <form 
                                class="m-form m-form--label-align-left- m-form--state-" 
                                id="m_form" 
                                method="POST" 
                                action="/skateboard-deck-configurator"
                            >

                                <input type="hidden" id="saved_order_id">

                                <div class="m-portlet__body">
                                    
                                    <!-- Step 1 -->
                                    <skateboard-decks-step-1 
                                        :quantity="quantity"
                                        :size="size"
                                        :sizes="sizes"
                                        @quantityChange="(val) => {quantity = val}"
                                        @sizeChange="(val) => {size = val}"
                                    />
                                    
                                    <!-- Step 2 -->
                                    <skateboard-decks-step-2 
                                        :state="steps[1].state" 
                                        @stateChange="(val) => {steps[1].state = val}"
                                    />

                                    <!-- Step 3 -->
                                    <skateboard-decks-step-3
                                        :state="steps[2].state" 
                                        @stateChange="(val) => {steps[2].state = val}"
                                    />

                                    <!-- Step 4 -->
                                    <skateboard-decks-step-4
                                        :state="steps[3].state" 
                                        @stateChange="(val) => {steps[3].state = val}"
                                    />

                                    <!-- Step 5 -->
                                    <skateboard-decks-step-5
                                        :state="steps[4].state"
                                        :files="filenames.bottom.concat(filenames.top)" 
                                        @stateChange="(val) => {steps[4].state = val}"
                                    />

                                    <!-- Step 6 -->
                                    <skateboard-decks-step-6
                                        :state="steps[5].state"
                                        :files="filenames.bottom.concat(filenames.top)" 
                                        @stateChange="(val) => {steps[5].state = val}"
                                    />

                                    <!-- Step 7 -->
                                    <skateboard-decks-step-7
                                        :state="steps[6].state"
                                        :files="filenames.engravery" 
                                        @stateChange="(val) => {steps[6].state = val}"
                                    />

                                </div>

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


                                            <div class="col-lg-4 m--align-center">
                                                <button 
                                                    v-if="additionalCost > 0"
                                                    class="btn btn-primary m-btn m-btn--custom m-btn--icon" 
                                                    data-wizard-action="submit" 
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
                            </form>
                        </div>
                    </div>
                </div>
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
                                            $ {{ basePrice.toFixed(2) }}
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
                                            $ {{(basePrice * quantity + fixedprice).toFixed(2)}}
                                        </span>
                                        <span class="m-widget1__number m--font-danger" id="total" v-else>
                                            $ ?.??
                                        </span>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <button 
                                v-if="additionalCost > 0"
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
    import {SKATEBOARD_WEIGHT, GRIPTAPE_WEIGHT} from '@/constants';
	import skateboardDecksStep1 from './views/Step1.vue';
	import skateboardDecksStep2 from './views/Step2.vue';
    import skateboardDecksStep3 from './views/Step3.vue';
    import skateboardDecksStep4 from './views/Step4.vue';
    import skateboardDecksStep5 from './views/Step5.vue';
    import skateboardDecksStep6 from './views/Step6.vue';
    import skateboardDecksStep7 from './views/Step7.vue';
	import HeadConfigurator from './views/HeadConfigurator.vue';

    export default {
    	name: 'grip-tape-configurator',
    	props: {
    		user: {
                type: Object,
                default: null
            },
            order: {
                type: Object,
                default: null
            },
            quantityorders: {
                type: Number,
                default: 0
            },
            sumorders: {
                type: Number,
                default: 0
            },
            filenames: {
                type: Object,
                default: null
            }
    	},
    	components: {
    		skateboardDecksStep1,
    		skateboardDecksStep2,
    		skateboardDecksStep3,
            skateboardDecksStep4,
            skateboardDecksStep5,
            skateboardDecksStep6,
            skateboardDecksStep7,
            HeadConfigurator
    	},
        data() {
            return {
                headLinks: [
                    {name: 'Home', href: '/'},
                    {name: 'Configurator', href: '/grip-tape-configurator'},
                ],
                sizes: [
                    {name: '9" x 33"', value: 1.45},
                    {name: '9" x 720"', value: 29},
                    {name: '10" x 45"', value: 2.45},
                    {name: '11" x 720"', value: 39},
                ],
	            quantity: 0,
	            size: "",
                currentStep: 1,
                fixedprice: 0,
                steps: [ 
                    {state: false}, 
                    {state: false}, 
                    {state: false}, 
                    {state: false}, 
                    {state: false},                      
                    {state: false, name: ''}, 
                    {state: false, name: ''}, 
                    {state: true, name: ''}, 
                    {
                        fulldip: {state: false,color: ""}, 
                        transparent: {state: false, color: ""}, 
                        metallic: {state: false, color: ""}, 
                        blacktop: {state: false}, 
                        blackmidlayer: {state: false}, 
                        pattern: {state: false}, 
                    },                     
                    {state: false, name: ''}, 
                    {state: false, name: ''}, 
                ]
            }
        },
        methods: {
            nextStep(){
                if(this.currentStep < 10)
                    this.currentStep++;
            },
            prevStep(){
                if(this.currentStep > 0)
                    this.currentStep--;
            },
            quantityChange(quantity){

                this.quantity = quantity;

                // if(this.pre_quantity > 0){
                //     if(this.total_quantity < 1170) {

                //     } else if (this.total_quantity >= 1170 && this.total_quantity < 3000) {
                //         this.perdeck -= 1;
                //     } else if (this.total_quantity >= 3000 && this.total_quantity < 6000) {
                //         this.perdeck -= 0.8;
                //     } else if (this.total_quantity >= 6000 && this.total_quantity < 8000) {
                //         this.perdeck -= 0.5;
                //     } else if (this.total_quantity >= 8000 && this.total_quantity < 12000) {
                //         this.perdeck -= 0.4;
                //     } else if (this.total_quantity >= 12000 && this.total_quantity < 20000) {
                //         this.perdeck -= 0.3;
                //     } else if (this.total_quantity >= 20000 && this.total_quantity < 30000) {
                //         this.perdeck -= 0.25;
                //     } else if (this.total_quantity >= 30000) {
                //         this.perdeck -= 0.20;
                // }

                // this.total_quantity -= (this.pre_quantity * 1);
                // this.total_quantity += (this.quantity * 1);
                // this.pre_quantity = this.quantity;

                // if(this.total_quantity < 20) {
                //     this.perdeck += 50;
                // } else if (this.total_quantity >= 20 && this.total_quantity < 30) {
                //     this.perdeck += 40;
                // } else if (this.total_quantity >= 30 && this.total_quantity < 40) {
                //     this.perdeck += 30;
                // } else if (this.total_quantity >= 40 && this.total_quantity < 50) {
                //     this.perdeck += 10;
                // } else if (this.total_quantity >= 50 && this.total_quantity < 100) {
                //     this.perdeck += 6;
                // } else if (this.total_quantity >= 100 && this.total_quantity < 200) {
                //     this.perdeck += 4;
                // } else if (this.total_quantity >= 200 && this.total_quantity < 300) {
                //     this.perdeck += 3;
                // } else if (this.total_quantity >= 300 && this.total_quantity < 500) {
                //     this.perdeck += 2.5;
                // } else if (this.total_quantity >= 500 && this.total_quantity < 1000) {
                //     this.perdeck += 1.5;
                // } else if (this.total_quantity >= 1000 && this.total_quantity < 2000) {
                //     this.perdeck += 1;
                // } else if (this.total_quantity >= 2000 && this.total_quantity < 5000) {
                //     this.perdeck += 0.5;
                // } else if (this.total_quantity >= 5000) {
                //     this.perdeck += 0;
                // }
            },
            sizeChange(size) {

                if(this.pre_size){
                    this.perdeck -= this.size.value;                      
                }

                this.size = size;

                this.perdeck += this.size.value;
                this.pre_size = this.size;     
            },
        },
        computed: {
            progressWidth(){
                return {
                    width: 100 * this.currentStep / 10 + '%',
                }
            },
            deliveryWeight() {
                return (this.quantityorders * SKATEBOARD_WEIGHT) + (this.quantity * GRIPTAPE_WEIGHT);
            },
            deliveryPrice() {
                switch(true) {
                    case (this.deliveryWeight <= 13): return 38;
                    case (this.deliveryWeight > 13 && this.deliveryWeight <= 26): return 52;
                    case (this.deliveryWeight > 26 && this.deliveryWeight <= 39): return 90;
                    case (this.deliveryWeight > 39 && this.deliveryWeight <= 65): return 450;
                    case (this.deliveryWeight > 65 && this.deliveryWeight <= 130): return 650;
                    case (this.deliveryWeight > 130 && this.deliveryWeight <= 260): return 800;
                    case (this.deliveryWeight > 260 && this.deliveryWeight <= 390): return 900;
                    case (this.deliveryWeight > 390 && this.deliveryWeight <= 650): return 1100;
                    case (this.deliveryWeight > 650 && this.deliveryWeight <= 975): return 1200;
                    case (this.deliveryWeight > 975 && this.deliveryWeight <= 1300): return 1300;
                    case (this.deliveryWeight > 1300 && this.deliveryWeight <= 1950): return 1500;
                    case (this.deliveryWeight > 1950 && this.deliveryWeight <= 2600): return 1700;
                    case (this.deliveryWeight > 2600 && this.deliveryWeight <= 3900): return 1980;
                    case (this.deliveryWeight > 3900 && this.deliveryWeight <= 6500): return 2250;
                    case (this.deliveryWeight > 6500 && this.deliveryWeight <= 9100): return 2720;
                    case (this.deliveryWeight > 9100 && this.deliveryWeight <= 11700): return 3200;
                    case (this.deliveryWeight > 11700): return 3600;
                    default: return 0;
                }
            },
            orderTotal() {
                if (this.size) {
                    return this.sumorders + (this.quantity * this.size.value) + this.deliveryPrice;
                }

                return 0;
            },
            additionalCost() {
                switch(true) {
                    case (this.orderTotal >= 1170 && this.orderTotal < 3000): return 1;
                    case (this.orderTotal >= 3000 && this.orderTotal < 6000): return 0.8;
                    case (this.orderTotal >= 6000 && this.orderTotal < 8000): return 0.5;
                    case (this.orderTotal >= 8000 && this.orderTotal < 12000): return 0.4;
                    case (this.orderTotal >= 20000 && this.orderTotal < 30000): return 0.25;
                    case (this.orderTotal >= 50000): return 0.2;
                    default: return 0;
                }
            },
            basePrice() {
                if (this.size) {
                    return this.size.value + this.additionalCost
                        + (this.steps[1].state ? 1.2 : 0)
                        + (this.steps[2].state ? 0.2 : 0) // Wood
                        + (this.steps[3].state ? 0.6 : 0) // Glue
                        + (this.steps[4].state ? 0.3 : 0) // Bottom Print
                        + (this.steps[5].state ? 0.9 : 0) // Top Print
                        //+ (this.steps[6].state ? 0.0 : 0) // Top Engraving


                }

                return 0;
            }
        },
        created() {
            // this.total_quantity += this.sumquantity;
	    }
    };
</script>