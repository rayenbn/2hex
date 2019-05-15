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
                                <div 
                                    class="progress-bar m--bg-info" 
                                    role="progressbar" 
                                    :style="progressWidth" 
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
                                    <div class="m-wizard__step" m-wizard-target="m_wizard_form_step_9">
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
                                <input type="hidden" v-model="id" name="id">

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
                                        :state="steps.grit.state" 
                                        @stateChange="(val) => {steps.grit.state = val}"
                                    />

                                    <!-- Step 3 -->
                                    <skateboard-decks-step-3
                                        :state="steps.perforation.state" 
                                        @stateChange="(val) => {steps.perforation.state = val}"
                                    />

                                    <!-- Step 4 -->
                                    <skateboard-decks-step-4
                                        :options="steps.topPrint"
                                        :files="filenames.top" 
                                        @stateChange="(val) => {steps.topPrint.state = val}"
                                        @fileChange="(val) => {steps.topPrint.file = val}"
                                        @colorChange="(val) => {steps.topPrint.color = val}"
                                    />

                                    <!-- Step 5 -->
                                    <skateboard-decks-step-5
                                        :options="steps.dieCut"
                                        :files="filenames.diecut" 
                                        @stateChange="(val) => {steps.dieCut.state = val}"
                                        @fileChange="(val) => {steps.dieCut.file = val}"
                                    />

                                    <!-- Step 6 -->
                                    <skateboard-decks-step-6
                                        :options="steps.coloredGriptape"
                                        @stateChange="(val) => {steps.coloredGriptape.state = val}"
                                        @colorChange="(val) => {steps.coloredGriptape.color = val}"
                                    />

                                    <!-- Step 7 -->
                                    <skateboard-decks-step-7
                                        :state="steps.backpaper.state"
                                        @stateChange="(val) => {steps.backpaper.state = val}"
                                    />

                                    <!-- Step 8 -->
                                    <skateboard-decks-step-8
                                        :options="steps.backpaperPrint"
                                        :files="filenames.backpaper" 
                                        @stateChange="(val) => {steps.backpaperPrint.state = val}"
                                        @fileChange="(val) => {steps.backpaperPrint.file = val}"
                                        @colorChange="(val) => {steps.backpaperPrint.color = val}"
                                    />

                                    <!-- Step 9 -->
                                    <skateboard-decks-step-9
                                        :options="steps.cartonPrint"
                                        :files="filenames.carton" 
                                        @stateChange="(val) => {steps.cartonPrint.state = val}"
                                        @fileChange="(val) => {steps.cartonPrint.file = val}"
                                        @colorChange="(val) => {steps.cartonPrint.color = val}"
                                    />

                                </div>

                                <div class="m-portlet__foot m-portlet__foot--fit m--margin-top-40">
                                    <div class="m-form__actions m-form__actions">
                                        <div class="row">

                                            <div class="col-lg-4 m--align-center">
                                                <button 
                                                    class="btn btn-secondary m-btn m-btn--custom m-btn--icon" 
                                                    data-wizard-action="prev" 
                                                    @click="prevStep"
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
                                            id="baseprice"
                                        >
                                            $ {{ basePrice.toFixed(2) }}
                                        </span>
                                        <span class="m-widget1__number m--font-danger" id="baseprice" v-else>
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
                                            $ {{ total }}
                                        </span>
                                        <span class="m-widget1__number m--font-danger" id="total" v-else>
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
    import {SKATEBOARD_WEIGHT, GRIPTAPE_WEIGHT} from '@/constants';
	import skateboardDecksStep1 from './views/Step1.vue';
	import skateboardDecksStep2 from './views/Step2.vue';
    import skateboardDecksStep3 from './views/Step3.vue';
    import skateboardDecksStep4 from './views/Step4.vue';
    import skateboardDecksStep5 from './views/Step5.vue';
    import skateboardDecksStep6 from './views/Step6.vue';
    import skateboardDecksStep7 from './views/Step7.vue';
    import skateboardDecksStep8 from './views/Step8.vue';
    import skateboardDecksStep9 from './views/Step9.vue';
	import HeadConfigurator from './views/HeadConfigurator.vue';

    export default {
    	name: 'grip-tape-configurator',
    	props: {
    		user: {
                type: Object,
                default: null
            },
            griptape: {
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
            skateboardDecksStep8,
            skateboardDecksStep9,
            HeadConfigurator
    	},
        data() {
            return {
                id: "",
	            quantity: 0,
	            size: "",
                currentStep: 1,
                fixedprice: 0,
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
                steps: {
                    grit:            {state: false},
                    perforation:     {state: false},
                    topPrint:        {state: false, file: null, color: null},
                    dieCut:          {state: false, file: null},
                    coloredGriptape: {state: false, color: null},
                    backpaper:       {state: false},
                    backpaperPrint:  {state: false, file: null, color: null},
                    cartonPrint:     {state: false, file: null, color: null},
                }
            }
        },
        methods: {
            nextStep(){
                if(this.currentStep < 9){
                    this.currentStep++;
                }
            },
            prevStep(){
                if(this.currentStep > 0){
                    this.currentStep--;
                }
            },
            save(event) {
                var formData = new FormData();

                formData.append('id', this.id);
                formData.append('quantity',this.quantity);
                formData.append('size', JSON.stringify(this.size));
                formData.append('grit', this.steps.grit.state ? 'HS780': 'OS780');
                formData.append('perforation', this.steps.perforation.state ? 1 : 0);

                formData.append('top_print', this.steps.topPrint.state 
                    && this.steps.topPrint.file ? this.steps.topPrint.file : "");

                formData.append('top_print_color',this.steps.topPrint.state 
                    && this.steps.topPrint.color ? this.steps.topPrint.color : "");

                formData.append('die_cut',this.steps.dieCut.state ? this.steps.dieCut.file : "");
                formData.append('color',this.steps.coloredGriptape.state 
                    ? this.steps.coloredGriptape.color.name : "");

                formData.append('backpaper',this.steps.backpaper.state ? 'White' : 'Brown');
                formData.append('backpaper_print', this.steps.backpaperPrint.state 
                    && this.steps.backpaperPrint.file ? this.steps.backpaperPrint.file : "");

                formData.append('backpaper_print_color',this.steps.backpaperPrint.state 
                    && this.steps.backpaperPrint.color ? this.steps.backpaperPrint.color : "");

                formData.append('carton_print',this.steps.cartonPrint.state 
                    && this.steps.cartonPrint.file ? this.steps.cartonPrint.file : "");

                formData.append('carton_print_color',this.steps.cartonPrint.state 
                    && this.steps.cartonPrint.color ? this.steps.cartonPrint.color : "");

                formData.append('price', this.basePrice.toFixed(2));
                formData.append('total', this.total);
                formData.append('fixed_cost',this.fixedprice.toFixed(2));
                
                axios.post('/grip-tape-configurator', formData)
                    .then((response) => {
                        setTimeout(() => {
                            window.location.href = "/summary";
                        }, 1000);
                    })
                    .catch((error) => {
                        console.error(error);
                    }); 
            },
            initGripTape() {
                if (this.griptape) {
                    this.id = this.griptape.id;
                    this.fixedprice = +this.griptape.fixed_cost;

                    // Step 1
                    this.quantity = this.griptape.quantity;
                    this.size = JSON.parse(this.griptape.size);

                    // Step 2
                    if(this.griptape.grit == "HS780"){
                        this.steps.grit.state = true;
                    }

                    // Step 3
                    if(this.griptape.perforation){
                        this.steps.perforation.state = true;
                    }

                    // Step 4
                    if(this.griptape.top_print || this.griptape.top_print_color){
                        this.steps.topPrint.state = true;
                        this.steps.topPrint.file = this.griptape.top_print;
                        this.steps.topPrint.color = this.griptape.top_print_color;
                    }

                    // Step 5
                    if(this.griptape.die_cut){
                        this.steps.dieCut.state = true;
                        this.steps.dieCut.file = this.griptape.die_cut;
                    }

                    // Step 6
                    if(this.griptape.color){
                        this.steps.coloredGriptape.state = true;
                        this.steps.coloredGriptape.color = this.griptape.color;
                    }

                    // Step 7
                    if(this.griptape.backpaper == 'White'){
                        this.steps.backpaper.state = true;
                    }

                    // Step 8
                    if(this.griptape.backpaper_print || this.griptape.backpaper_print_color){
                        this.steps.backpaperPrint.state = true;
                        this.steps.backpaperPrint.file = this.griptape.backpaper_print;
                        this.steps.backpaperPrint.color = this.griptape.backpaper_print_color;
                    }

                    // Step 9
                    if(this.griptape.carton_print || this.griptape.carton_print_color){
                        this.steps.cartonPrint.state = true;
                        this.steps.cartonPrint.file = this.griptape.carton_print;
                        this.steps.cartonPrint.color = this.griptape.carton_print_color;
                    }
                }
            },
        },
        computed: {
            progressWidth(){
                return {
                    width: 100 * this.currentStep / 9 + '%',
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
                    default: return 1;
                }
            },
            basePrice() {
                if (this.size) {
                    return this.size.value + this.additionalCost
                        + (this.steps.grit.state ? 1.2 : 0) // Grit
                        + (this.steps.perforation.state ? 0.2 : 0) // Perforation
                        + (this.steps.topPrint.state ? 0.6 : 0) // Top Print
                        + (this.steps.dieCut.state ? 0.3 : 0) // Die Cut
                        + (this.steps.coloredGriptape.state ? 0.9 : 0) // Colored Griptape
                        // + (this.steps.backpaper.state ? 0.0 : 0) // Backpaper
                         + (this.steps.backpaperPrint.state ? 0.35 : 0) // Backpaper Print
                         + (this.steps.cartonPrint.state ? 0.02 : 0) // Carton Print
                }

                return 0;
            },
            total() {
                return (this.basePrice * this.quantity + this.fixedprice).toFixed(2);
            }
        },
        created() {
            this.initGripTape();
        }
    };
</script>