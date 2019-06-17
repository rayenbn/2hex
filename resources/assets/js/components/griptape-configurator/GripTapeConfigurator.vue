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
                                        @quantityChange="quantityChange"
                                        @sizeChange="sizeChange"
                                    />
                                    
                                    <!-- Step 2 -->
                                    <skateboard-decks-step-2 
                                        :state="steps.grit.state" 
                                        @stateChange="(val) => {
                                            steps.grit.state = val; 
                                            steps.grit.state ? price += prices.grit : price -= prices.grit; 
                                        }"
                                    />

                                    <!-- Step 3 -->
                                    <skateboard-decks-step-3
                                        :state="steps.perforation.state" 
                                        @stateChange="(val) => {
                                            steps.perforation.state = val;
                                            steps.perforation.state ? price += prices.perforation : price -= prices.perforation;
                                        }"
                                    />

                                    <!-- Step 4 -->
                                    <skateboard-decks-step-4
                                        :options="steps.topPrint"
                                        :files="filenames.top" 
                                        @stateChange="(val) => {
                                            steps.topPrint.state = val;
                                            steps.topPrint.state ? price += prices.topPrint : price -= prices.topPrint;
                                        }"
                                        @fileChange="(val) => {steps.topPrint.file = val}"
                                        @colorChange="(val) => {steps.topPrint.color = val}"
                                        @prepareFile="(e) => { prepareFile(e); stepUpload = 4; }"

                                    />

                                    <!-- Step 5 -->
                                    <skateboard-decks-step-5
                                        :options="steps.dieCut"
                                        :files="filenames.diecut" 
                                        @stateChange="(val) => {
                                            steps.dieCut.state = val;
                                            steps.dieCut.state ? price += prices.dieCut : price -= prices.dieCut;
                                        }"
                                        @fileChange="(val) => {steps.dieCut.file = val}"
                                        @prepareFile="(e) => { prepareFile(e); stepUpload = 5; }"
                                    />

                                    <!-- Step 6 -->
                                    <skateboard-decks-step-6
                                        :options="steps.coloredGriptape"
                                        @colorChange="(val) => {
                                            steps.coloredGriptape.color && steps.coloredGriptape.color.name !== 'black' 
                                                ? price -= prices.coloredGriptape
                                                : price -= 0;
                                            steps.coloredGriptape.color = val;
                                            steps.coloredGriptape.color && steps.coloredGriptape.color.name !== 'black' 
                                                ? price += prices.coloredGriptape
                                                : price += 0;
                                        }"
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
                                        @stateChange="(val) => {
                                            steps.backpaperPrint.state = val;
                                            steps.backpaperPrint.state ? price += prices.backpaperPrint : price -= prices.backpaperPrint;

                                        }"
                                        @fileChange="(val) => {steps.backpaperPrint.file = val}"
                                        @colorChange="(val) => {steps.backpaperPrint.color = val}"
                                        @prepareFile="(e) => { prepareFile(e); stepUpload = 8; }"
                                    />

                                    <!-- Step 9 -->
                                    <skateboard-decks-step-9
                                        :options="steps.cartonPrint"
                                        :files="filenames.carton" 
                                        @stateChange="(val) => {
                                            steps.cartonPrint.state = val;
                                            steps.cartonPrint.state ? price += prices.cartonPrint : price -= prices.cartonPrint;
                                        }"
                                        @fileChange="(val) => {steps.cartonPrint.file = val}"
                                        @colorChange="(val) => {steps.cartonPrint.color = val}"
                                        @prepareFile="(e) => { prepareFile(e); stepUpload = 9; }"
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
                                        <h3 class="m-widget1__title">{{ user ? 'Griptape' : 'Login' }}</h3>
                                        <span class="m-widget1__desc">{{ user ? 'Price per Grip' : 'To See Prices' }}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span
                                            class="m-widget1__number m--font-brand"
                                            v-if="quantity > 0 && size && user"
                                            id="price"
                                        >
                                            $ {{ price.toFixed(2) }}
                                        </span>
                                        <span class="m-widget1__number m--font-danger" id="price" v-else>
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
                                            class="m-widget1__number m--font-danger"
                                            v-if="quantity > 0 && size && user"
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
        <!-- Modal set name file -->
        <modal v-if="showModal" @close="clearFile">
            <h3 slot="header">Enter the file name</h3>
            <div slot="body">
                <input type="text" class="form-control" v-model="fileName" placeholder="Enter the file name"> 
            </div>
            <div slot="footer">
                <button 
                    type="button" 
                    class="btn btn-secondary" 
                    @click.prevent="clearFile"
                >
                    Cancell
                </button>
                <button
                    :disabled="!checkFileName(fileName)"
                    type="button" 
                    class="btn btn-primary"
                    @click.prevent="uploadFile"
                >
                    Upload
                </button>
            </div>
        </modal>
    </div>
</template>

<script>
    import {SKATEBOARD_WEIGHT} from '@/constants';
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
    import Modal from '@/components/modals/Modal';

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
            quantityskateboards: {
                type: Number,
                default: 0
            },
            quantitygrips: {
                type: Number,
                default: 0
            },
            sumskateboards: {
                type: Number,
                default: 0
            },
            sumgrips: {
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
            HeadConfigurator,
            Modal
    	},
        data() {
            return {
                id: "",
	            quantity: 0,
	            size: null,
                additionalCost: 0,
                orderTotal: 0,
                price: 0,
                showModal: false,
                fileName: '',
                file: null,
                typeUpload: '',
                stepUpload: null,
                headLinks: [
                    {name: 'Home', href: '/'},
                    {name: 'Configurator', href: '/grip-tape-configurator'},
                ],
                steps: {
                    grit:            {state: false},
                    perforation:     {state: false},
                    topPrint:        {state: false, file: null, color: null},
                    dieCut:          {state: false, file: null},
                    coloredGriptape: {color: null},
                    backpaper:       {state: false},
                    backpaperPrint:  {state: false, file: null, color: null},
                    cartonPrint:     {state: false, file: null, color: null},
                }
            }
        },
        methods: {
            prepareFile(e) {
                this.showModal = true;
                this.file = e.target.files[0];
                this.fileName = this.file ? this.file.name : '';
                this.typeUpload = e.target.dataset.typeUpload;
            },
            checkFileName(name) {
                return (/[a-zA-Z0-9_-]{1,}\.[a-zA-Z0-9]{3,}$/i).test(name);
            },
            clearFile() {
                this.file = null;
                this.stepUpload = null;
                this.fileName = '';
                this.typeUpload = '';
                this.showModal = false;
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

                let formData = new FormData();

                formData.append('typeUpload', this.typeUpload);
                formData.append('fileName', this.fileName);
                formData.append('file', this.file);

                axios.post('/configurator-fileupload', formData)
                    .then(response => response.data)
                    .then(response => {
                        let step = null;
                        switch(this.stepUpload) {
                            case 4: step = 'topPrint'; break;
                            case 5: step = 'dieCut'; break;
                            case 8: step = 'backpaperPrint'; break;
                            case 9: step = 'cartonPrint'; break;
                        }

                        if (step) {
                            this.steps[step].file = response;
                        }

                        let input = document.getElementById('step-'+ this.stepUpload +'-upload');

                        if(response != 'failed' && input){
                            input.nextElementSibling.innerHTML = response;
                            input.nextElementSibling.classList.remove("unchecked");
                            document.getElementById('step-'+ this.stepUpload +'-recent').innerHTML = response;
                        } else {
                            console.error('Error upload file. Please check file.');
                        }
                        this.showModal = false;
                    })
                    .catch(error => {
                        this.showModal = false;
                        console.log(error);
                    });
            },
            calculateTotal() {
                this.orderTotal = this.sumskateboards 
                    + this.sumgrips
                    + (this.quantity * (this.size ? this.size.value : 0));
                    // + this.deliveryPrice;
            },
            calculatePrice() {
                if (this.size) {

                    this.price = this.size.value + this.additionalCost
                        + (this.steps.grit.state ? this.prices.grit : 0) // Grit
                        + (this.steps.perforation.state ? this.prices.perforation : 0) // Perforation
                        + (this.steps.topPrint.state ? this.prices.topPrint : 0) // Top Print
                        + (this.steps.dieCut.state ? this.prices.dieCut : 0) // Die Cut
                        + (this.steps.coloredGriptape.color && this.steps.coloredGriptape.color.name !== 'black' 
                            ? this.prices.coloredGriptape
                            : 0
                        ) // Colored Griptape
                        // + (this.steps.backpaper.state ? 0.0 : 0) // Backpaper
                         + (this.steps.backpaperPrint.state ? this.prices.backpaperPrint : 0) // Backpaper Print
                         + (this.steps.cartonPrint.state ? this.prices.cartonPrint : 0) // Carton Print
                } else {
                    this.price = 0;
                }
            },
            quantityChange(quantity) {
                // set new quantity
                this.quantity = quantity;
                // recalculate total
                this.calculateTotal();

                switch(true) {
                    case (this.orderTotal >= 1170  && this.orderTotal < 3000) : this.additionalCost = 1;   break;
                    case (this.orderTotal >= 3000  && this.orderTotal < 6000) : this.additionalCost = 0.8; break;
                    case (this.orderTotal >= 6000  && this.orderTotal < 8000) : this.additionalCost = 0.5; break;
                    case (this.orderTotal >= 8000  && this.orderTotal < 12000): this.additionalCost = 0.4; break;
                    case (this.orderTotal >= 12000 && this.orderTotal < 20000): this.additionalCost = 0.3; break;
                    // TODO  maybe 50000 instead 30000 ?
                    case (this.orderTotal >= 20000 && this.orderTotal < 50000): this.additionalCost = 0.25; break; 
                    case (this.orderTotal >= 50000): this.additionalCost = 0.2; break;
                    default: this.additionalCost = 1;
                }

                this.calculatePrice();
            },
            sizeChange(size) {
                this.size = size;
                // recalculate total
                this.calculateTotal();

                switch(true) {
                    case (this.orderTotal >= 1170  && this.orderTotal < 3000) : this.additionalCost = 1;   break;
                    case (this.orderTotal >= 3000  && this.orderTotal < 6000) : this.additionalCost = 0.8; break;
                    case (this.orderTotal >= 6000  && this.orderTotal < 8000) : this.additionalCost = 0.5; break;
                    case (this.orderTotal >= 8000  && this.orderTotal < 12000): this.additionalCost = 0.4; break;
                    case (this.orderTotal >= 12000 && this.orderTotal < 20000): this.additionalCost = 0.3; break;
                    // TODO  maybe 50000 instead 30000 ?
                    case (this.orderTotal >= 20000 && this.orderTotal < 50000): this.additionalCost = 0.25; break; 
                    case (this.orderTotal >= 50000): this.additionalCost = 0.2; break;
                    default: this.additionalCost = 1;
                }

                this.calculatePrice();
            },
            nextStep(){
                this.$store.commit('changeStep', ++this.currentStep);
            },
            prevStep(){
                this.$store.commit('changeStep', --this.currentStep);
            },
            save(event) {

                if (this.quantity <= 0) {
                    alert("Product quantity may not be 0. Please check your quantities.");
                    
                    return false;
                }

                var formData = new FormData();

                formData.append('id', this.id);
                formData.append('quantity',this.quantity);
                formData.append('size', this.size.name);
                formData.append('grit', this.steps.grit.state ? 'HS780': 'OS780');
                formData.append('perforation', this.steps.perforation.state ? 1 : 0);

                formData.append('top_print', this.steps.topPrint.state 
                    && this.steps.topPrint.file ? this.steps.topPrint.file : "");

                formData.append('top_print_color',this.steps.topPrint.state 
                    && this.steps.topPrint.color ? this.steps.topPrint.color : "");

                formData.append('die_cut',this.steps.dieCut.state ? this.steps.dieCut.file : "");
                formData.append('color', this.steps.coloredGriptape.color 
                    ? this.steps.coloredGriptape.color.name : 'black');

                formData.append('backpaper',this.steps.backpaper.state ? 'White' : 'Brown');
                formData.append('backpaper_print', this.steps.backpaperPrint.state 
                    && this.steps.backpaperPrint.file ? this.steps.backpaperPrint.file : "");

                formData.append('backpaper_print_color',this.steps.backpaperPrint.state 
                    && this.steps.backpaperPrint.color ? this.steps.backpaperPrint.color : "");

                formData.append('carton_print',this.steps.cartonPrint.state 
                    && this.steps.cartonPrint.file ? this.steps.cartonPrint.file : "");

                formData.append('carton_print_color',this.steps.cartonPrint.state 
                    && this.steps.cartonPrint.color ? this.steps.cartonPrint.color : "");

                formData.append('price', this.price);
                formData.append('total', this.total);
                
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

                    // Step 1
                    this.quantity = this.griptape.quantity;
                    this.size = this.griptape.size;
                    this.price = this.griptape.price;

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
            currentStep: {
                get() {
                    return this.$store.getters.getCurrentStep;
                },
                set(val) {}
            },
            progressWidth(){
                return {
                    width: 100 * this.currentStep / 9 + '%',
                }
            },
            prices() {
                if (this.size) {
                    switch(this.size.name) {
                        case '9" x 33"': return {
                            grit: 1.2,
                            perforation: 0.2,
                            topPrint: 0.6,
                            dieCut: 0.3,
                            coloredGriptape: 0.9,
                            backpaper: 0,
                            backpaperPrint: 0.35,
                            cartonPrint: 0.02,
                            weight: 0.155
                        };
                        case '9" x 720"': return {
                            grit: 26.18,
                            perforation: 4.36,
                            topPrint: 13.09,
                            dieCut: 6.55,
                            coloredGriptape: 19.64,
                            backpaper: 0,
                            backpaperPrint: 7.64,
                            cartonPrint: 0.02,
                            weight: 3.382
                        };
                        case '10" x 45"': return {
                            grit: 1.82,
                            perforation: 0.3,
                            topPrint: 0.91,
                            dieCut: 0.45,
                            coloredGriptape: 1.36,
                            backpaper: 0,
                            backpaperPrint: 0.53,
                            cartonPrint: 0.02,
                            weight: 0.235
                        };
                        case '11" x 720"': return {
                            grit: 32,
                            perforation: 5.33,
                            topPrint: 16,
                            dieCut: 8,
                            coloredGriptape: 24,
                            backpaper: 0,
                            backpaperPrint: 9.33,
                            cartonPrint: 0.02,
                            weight: 4.133
                        };
                    }
                }

                return {
                    grit: 1.2,
                    perforation: 0.2,
                    topPrint: 0.6,
                    dieCut: 0.3,
                    coloredGriptape: 0.9,
                    backpaper: 0,
                    backpaperPrint: 0.35,
                    cartonPrint: 0.02,
                    weight: 0.155
                };
            },
            deliveryWeight() {
                return (this.quantityskateboards * SKATEBOARD_WEIGHT) + (this.quantity * this.prices.weight);
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
            total() {
                return (this.price * this.quantity).toFixed(2);
            }
        },
        created() {
            this.$store.commit('changeStep', 1);
            this.initGripTape();
        }
    };
</script>