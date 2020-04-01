<template>
    <div class="m-content">
        <div class="row">
            <div class="col-xl-9">
                <div class="m-portlet">

                    <head-configurator
                        title="Bearing Factory"
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
                                </div>
                            </div>
                        </div>

                        <div class="m-wizard__form">

                            <form 
                                class="m-form m-form--label-align-left- m-form--state-" 
                                id="m_form" 
                                method="POST" 
                            >
                                <input type="hidden" v-model="id" name="id">

                                <div class="m-portlet__body">
                                    
                                    <!-- Step 1 -->
                                    <skateboard-decks-step-1
                                        :quantity="quantity"
                                        :material="material"
                                        @quantityChange="quantityChange"
                                        @materialChange="materialChange"
                                    />
                                    
                                    <!-- Step 2 -->
                                    <skateboard-decks-step-2
                                        :abec="abec"
                                        :race="race"
                                        @abecChange="abecChange"
                                        @raceChange="raceChange"
                                    />

                                    <!-- Step 3 -->
                                    

                                     <skateboard-decks-step-3
                                        :options="steps.racePrint"
                                        :retainer="steps.retainer"
                                        @retainerChange="retainerChange"
                                        :files="filenames.race"
                                        :uploadProgress="steps.racePrint.uploadProgress"
                                        @stateChange="(val) => {
                                            steps.racePrint.state = val;
                                            steps.racePrint.state ? steps.racePrint.selectpaid ? price = price : price += prices.racePrint : steps.racePrint.selectpaid ? price = price : price -= prices.racePrint ;
                                        }"
                                        @selectpaidChange="(val) => {
                                            steps.racePrint.selectpaid = val;
                                            steps.racePrint.state ? steps.racePrint.selectpaid ? price -= prices.racePrint : price += prices.racePrint : price = price;
                                        }"
                                        @fileChange="(val) => {steps.racePrint.file = val}"
                                        @colorChange="(val) => {steps.racePrint.color = val}"
                                        @prepareFile="(e) => { stepUpload = 3; uploadFile(e); }"

                                    />

                                    <!-- Step 4 -->
                                    <skateboard-decks-step-4
                                        :shield="steps.shield"
                                        :options="steps.shieldBrand"
                                        @shieldChange="shieldChange"
                                        @shieldBrandChange="shieldBrandChange"
                                        :files="filenames.top"
                                        :uploadProgress="steps.shieldBrand.uploadProgress"
                                        @stateChange="(val) => {
                                            steps.shieldBrand.state = val;
                                            steps.shieldBrand.state ? steps.shieldBrand.selectpaid ? price = price : price += prices.shieldBrand : steps.shieldBrand.selectpaid ? price = price : price -= prices.shieldBrand ;
                                        }"
                                        @selectpaidChange="(val) => {
                                            steps.shieldBrand.selectpaid = val;
                                            steps.shieldBrand.state ? steps.shieldBrand.selectpaid ? price -= prices.shieldBrand : price += prices.shieldBrand : price = price;
                                        }"
                                        @fileChange="(val) => {steps.shieldBrand.file = val}"
                                        @colorChange="(val) => {steps.shieldBrand.color = val}"
                                        @prepareFile="(e) => { stepUpload = 4; uploadFile(e); }"

                                    />

                                    <!-- Step 5 -->
                                    <skateboard-decks-step-5
                                        :spamaterial="spamaterial"
                                        :spacolor="spacolor"
                                        @spamaterialChange="spamaterialChange"
                                        @spacolorChange="spacolorChange"
                                    />

                                    <!-- Step 6 -->
                                    <skateboard-decks-step-6
                                        :packfirst="packfirst"
                                        :brandfirst="brandfirst"
                                        @packfirstChange="packfirstChange"
                                        @brandfirstChange="brandfirstChange"
                                    />

                                    <!-- Step 7 -->
                                    <skateboard-decks-step-7
                                        :packsecond="packsecond"
                                        :brandsecond="brandsecond"
                                        @packsecondChange="packsecondChange"
                                        @brandsecondChange="brandsecondChange"
                                    />

                                    <!-- Step 8 -->
                                    <skateboard-decks-step-8
                                        :options="steps.backpaperPrint"
                                        :files="filenames.backpaper" 
                                        :uploadProgress="steps.backpaperPrint.uploadProgress"
                                        :upload_url="upload_url"
                                        @stateChange="(val) => {
                                            steps.backpaperPrint.state = val;
                                            steps.backpaperPrint.state ? steps.backpaperPrint.selectpaid ? price = price : price += prices.backpaperPrint : steps.backpaperPrint.selectpaid ? price = price : price -= prices.backpaperPrint ;
                                        }"
                                        @selectpaidChange="(val) => {
                                            steps.backpaperPrint.selectpaid = val;
                                            steps.backpaperPrint.state ? steps.backpaperPrint.selectpaid ? price -= prices.backpaperPrint : price += prices.backpaperPrint : price = price;
                                        }"
                                        @fileChange="(val) => {steps.backpaperPrint.file = val}"
                                        @colorChange="(val) => {steps.backpaperPrint.color = val}"
                                        @prepareFile="(e) => { stepUpload = 8; uploadFile(e); }"
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
                                        <h3 class="m-widget1__title">{{ user ? 'Bearing' : 'Login' }}</h3>
                                        <span class="m-widget1__desc">{{ user ? 'Price per Set' : 'To See Prices' }}</span>
                                    </div>
                                    <div class="col m--align-right">
                                        <span
                                            class="m-widget1__number m--font-brand"
                                            v-if="quantity > 0 && material && user"
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
                                            v-if="quantity > 0 && material && user"
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
    import {SKATEBOARD_WEIGHT} from '@/constants';
	import skateboardDecksStep1 from './views/Step1.vue';
	import skateboardDecksStep2 from './views/Step2.vue';
    import skateboardDecksStep3 from './views/Step3.vue';
    import skateboardDecksStep4 from './views/Step4.vue';
    import skateboardDecksStep5 from './views/Step5.vue';
    import skateboardDecksStep6 from './views/Step6.vue';
    import skateboardDecksStep7 from './views/Step7.vue';
    import skateboardDecksStep8 from './views/Step8.vue';
	import HeadConfigurator from './views/HeadConfigurator.vue';

    export default {
    	name: 'bearing-configurator',
    	props: {
    		user: {
                type: Object,
                default: null
            },
            upload_url: {
                type: String,
                default: ''
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
            HeadConfigurator,
    	},
        data() {
            return {
                id: "",
	            quantity: 0,
	            material: null,
                abec: null,
                race: null,
                retainer: null,
                shield: null,
                spamaterial: null,
                spacolor: null,
                packfirst: null,
                brandfirst: null,
                packsecond: null,
                brandsecond: null,
                additionalCost: 0,
                orderTotal: 0,
                price: 0,
                fileName: '',
                file: null,
                typeUpload: '',
                stepUpload: null,
                headLinks: [
                    {name: 'Home', href: '/'},
                    {name: 'Configurator', href: '/bearing-configurator'},
                ],
                steps: {
                    grit:            {state: false},
                    perforation:     {state: false},
                    racePrint:       {state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                    shieldBrand:     {state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                    dieCut:          {state: false, file: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                    coloredGriptape: {color: null},
                    backpaper:       {state: false},
                    backpaperPrint:  {state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                    cartonPrint:     {state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                }
            }
        },
        methods: {
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

                this.file = event.target.files[0];
                this.fileName = this.file ? this.file.name : '';
                this.typeUpload = event.target.dataset.typeUpload;


                formData.append('typeUpload', this.typeUpload);
                formData.append('fileName', this.fileName);
                formData.append('file', this.file);

                let step = null;
                switch(this.stepUpload) {
                    case 3: step = 'racePrint'; break;
                    case 4: step = 'shieldBrand'; break;
                    case 5: step = 'dieCut'; break;
                    case 8: step = 'backpaperPrint'; break;
                    case 9: step = 'cartonPrint'; break;
                }

                let input = document.getElementById('step-'+ this.stepUpload +'-upload');
                let options = {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress:  progressEvent => {
                        this.steps[step].uploadProgress = parseInt( Math.round( ( progressEvent.loaded * 100 ) / progressEvent.total ) );
                    }
                };

                axios.post('/configurator-fileupload', formData, options)
                    .then(response => response.data)
                    .then(response => {
                        if (step) {
                            this.steps[step].file = response;
                        }

                        if(response != 'failed' && input){
                            input.nextElementSibling.innerHTML = response;
                            input.nextElementSibling.classList.remove("unchecked");
                            document.getElementById('step-'+ this.stepUpload +'-recent').innerHTML = response;
                            this.$notify({
                                group: 'main',
                                type: 'success',
                                title: 'Upload file',
                                text: "File uploaded successfully"
                            });
                        } else {
                            input.nextElementSibling.classList.add("unchecked");
                            this.steps[step].uploadProgress = 0;
                            this.$notify({
                                group: 'main',
                                type: 'error',
                                title: 'Upload file',
                                text: "File upload error"
                            });

                        }
                    })
                    .catch(error => {
                        input.nextElementSibling.classList.add("unchecked");
                        this.steps[step].uploadProgress = 0;
                        this.$notify({
                            group: 'main',
                            type: 'error',
                            title: 'Upload file',
                            text: "File upload error"
                        });
                    });
            },
            calculateTotal() {
                this.orderTotal = this.sumskateboards 
                    + this.sumgrips
                    + (this.quantity * (this.material ? this.material.value : 0));
                    // + this.deliveryPrice;
            },
            calculatePrice() {
                if (this.material) {

                    this.price = this.material.value + this.additionalCost
                        + (this.steps.grit.state ? this.prices.grit : 0) // Grit
                        + (this.steps.perforation.state ? this.prices.perforation : 0) // Perforation
                        + (this.steps.racePrint.state ? this.prices.racePrint : 0) // Top Print
                        + (this.steps.shieldBrand.state ? this.prices.shieldBrand : 0) // Die Cut
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
            materialChange(material) {
                this.material = material;
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
            abecChange(abec) {
                this.abec = abec;
            },
            raceChange(race) {
                this.race = race;
            },
            shieldChange(shield) {
                this.shield = shield;
            },
            shieldBrandChange(shieldbrand) {
                this.shieldbrand = shieldbrand;
            },
            retainerChange(retainer) {
                this.retainer = retainer;
            },
            spamaterialChange(spamaterial) {
                this.spamaterial = spamaterial;
            },
            spacolorChange(spacolor) {
                this.spacolor = spacolor;
            },
            brandfirstChange(brandfirst) {
                this.brandfirst = brandfirst;
            },
            packfirstChange(packfirst) {
                this.packfirst = packfirst;
            },
            packsecondChange(packsecond) {
                this.packsecond = packsecond;
            },
            brandsecondChange(brandsecond) {
                this.brandsecond = brandsecond;
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
                formData.append('material', this.material.name);
                formData.append('abec', this.abec.name);
                formData.append('race', this.race.name);
                formData.append('retainer', this.retainer.name);
                formData.append('spamaterial', this.spamaterial.name);
                formData.append('spacolor', this.spacolor.name);
                formData.append('packfirst', this.packfirst.name);
                formData.append('brandfirst', this.brandfirst.name);
                formData.append('packsecond', this.packsecond.name);
                formData.append('brandsecond', this.brandsecond.name);
                formData.append('grit', this.steps.grit.state ? 'HS780': 'OS780');
                formData.append('perforation', this.steps.perforation.state ? 1 : 0);

                formData.append('race_print', this.steps.racePrint.state 
                    && this.steps.racePrint.file ? this.steps.racePrint.file : "");

                formData.append('race_print_color',this.steps.racePrint.state 
                    && this.steps.racePrint.color ? this.steps.racePrint.color : "");


                formData.append('shield_print', this.steps.shieldBrand.state 
                    && this.steps.shieldBrand.file ? this.steps.shieldBrand.file : "");

                formData.append('shield_print_color',this.steps.shieldBrand.state 
                    && this.steps.shieldBrand.color ? this.steps.shieldBrand.color : "");

                

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
                    this.material = this.griptape.material;
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
                        this.steps.racePrint.state = true;
                        this.steps.racePrint.file = this.griptape.top_print;
                        this.steps.racePrint.color = this.griptape.top_print_color;
                        for(let i = 0; i < this.filenames['top'].length; i ++){
                            if(this.filenames['top'][i]['name'] == this.griptape.top_print){
                                this.steps.racePrint.dropdisable = this.filenames['top'][i]['is_disable']?true:false;
                            }
                        }
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
                        for(let i = 0; i < this.filenames['backpaper'].length; i ++){
                            if(this.filenames['backpaper'][i]['name'] == this.griptape.backpaper_print_color){
                                this.steps.backpaperPrint.dropdisable = this.filenames['backpaper'][i]['is_disable']?true:false;
                            }
                        }
                    }

                    // Step 9
                    if(this.griptape.carton_print || this.griptape.carton_print_color){
                        this.steps.cartonPrint.state = true;
                        this.steps.cartonPrint.file = this.griptape.carton_print;
                        this.steps.cartonPrint.color = this.griptape.carton_print_color;
                        for(let i = 0; i < this.filenames['carton'].length; i ++){
                            if(this.filenames['carton'][i]['name'] == this.griptape.carton_print_color){
                                this.steps.cartonPrint.dropdisable = this.filenames['carton'][i]['is_disable']?true:false;
                            }
                        }
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
                    width: 100 * this.currentStep / 8 + '%',
                }
            },
            prices() {
                if (this.material) {
                    switch(this.material.name) {
                        case '9" x 33"': return {
                            grit: 1.2,
                            perforation: 0.2,
                            racePrint: 0.6,
                            shieldBrand: 0.3,
                            coloredGriptape: 0.9,
                            backpaper: 0,
                            backpaperPrint: 0.35,
                            cartonPrint: 0.02,
                            weight: 0.155
                        };
                        case '9" x 720"': return {
                            grit: 26.18,
                            perforation: 4.36,
                            racePrint: 13.09,
                            shieldBrand: 6.55,
                            coloredGriptape: 19.64,
                            backpaper: 0,
                            backpaperPrint: 7.64,
                            cartonPrint: 0.02,
                            weight: 3.382
                        };
                        case '10" x 45"': return {
                            grit: 1.82,
                            perforation: 0.3,
                            racePrint: 0.91,
                            shieldBrand: 0.45,
                            coloredGriptape: 1.36,
                            backpaper: 0,
                            backpaperPrint: 0.53,
                            cartonPrint: 0.02,
                            weight: 0.235
                        };
                        case '11" x 720"': return {
                            grit: 32,
                            perforation: 5.33,
                            racePrint: 16,
                            shieldBrand: 8,
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
                    racePrint: 0.6,
                    shieldBrand: 0.3,
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
<style scoped>
    ::v-deep .checked{
        border: 1px solid #36a3f7 !important;
    }
    ::v-deep .unchecked{
        border: 1px solid #ced4da !important;
    }
</style>