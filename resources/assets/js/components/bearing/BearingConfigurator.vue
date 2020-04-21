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
                                        :quantity="quantityob"
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
                                        :retainer="retainer"
                                        @retainerChange="retainerChange"
                                        :files="filenames.race"
                                        :uploadProgress="steps.racePrint.uploadProgress"
                                        @stateChange="(val) => {
                                            steps.racePrint.state = val;
                                        }"
                                        @selectpaidChange="(val) => {
                                            steps.racePrint.selectpaid = val;
                                        }"
                                        @fileChange="(val) => {steps.racePrint.file = val}"
                                        @colorChange="(val) => {steps.racePrint.color = val}"
                                        @prepareFile="(e) => { stepUpload = 3; uploadFile(e); }"

                                    />

                                    <!-- Step 4 -->
                                    <skateboard-decks-step-4
                                        :shield="shield"
                                        :shieldbrand="shieldBrand"
                                        :shieldColor="shieldColor"
                                        :shieldBrandColor1="shieldBrandColor1"
                                        :shieldBrandColor2="shieldBrandColor2"
                                        :options="steps.shieldBrandPrint"
                                        @shieldChange="shieldChange"
                                        @shieldColorChange="shieldColorChange"
                                        @shieldBrandChange="shieldBrandChange"
                                        @shieldBrandColor1Change="shieldBrandColor1Change"
                                        @shieldBrandColor2Change="shieldBrandColor2Change"
                                        :files="filenames.top"
                                        :uploadProgress="steps.shieldBrandPrint.uploadProgress"
                                        @stateChange="(val) => {
                                            steps.shieldBrandPrint.state = val;
                                        }"
                                        @selectpaidChange="(val) => {
                                            steps.shieldBrandPrint.selectpaid = val;
                                        }"
                                        @fileChange="(val) => {steps.shieldBrandPrint.file = val}"
                                        @colorChange="(val) => {steps.shieldBrandPrint.color = val}"
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
                                        :options="steps.pantonePrint"
                                        :files="filenames.pantone"
                                        :designName="designName"
                                        :reorder="reorder"
                                        :pantoneColor="pantoneColor"
                                        :uploadProgress="steps.pantonePrint.uploadProgress"
                                        :upload_url="upload_url"
                                        @pantoneColorChange="pantoneColorChange"
                                        @designNameChange="designNameChange"
                                        @reorderChange="reorderChange"
                                        
                                        @stateChange="(val) => {
                                            steps.pantonePrint.state = val;
                                        }"
                                        @selectpaidChange="(val) => {
                                            steps.pantonePrint.selectpaid = val;
                                        }"
                                        @fileChange="(val) => {steps.pantonePrint.file = val}"
                                        @colorChange="(val) => {steps.pantonePrint.color = val}"
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
            bearing: {
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
	            quantity: 10000,
                quantityob: {name: '10000 Set', value: 10000},
	            material: {name: 'Carbon Balls', value: 0.82},
                abec: {name: 'Abec3', value: 0},
                race: {name: 'Silver Races', value: 0},
                retainer: {name: 'Brown SB-Flex Retainer', value: 0},
                shield: {name: 'Metal Shield', value: 0},
                shieldColor: '',
                shieldBrand: {name: 'No Shield Branding', value: 0},
                shieldBrandColor1: '',
                shieldBrandColor2: '',
                spamaterial: {name: 'No Spacers', value: 0},
                spacolor: {name: 'Silver Spacers', value: 0},
                packfirst: {name: 'Transparent Softplastic Tube', value: 0},
                brandfirst: {name: 'No sticker', value: 0},
                packsecond: {name: 'No added cardboard', value: 0},
                brandsecond: {name: 'No shrink wrap', value: 0},
                additionalCost: 0,
                orderTotal: 0,
                price: 0,
                fileName: '',
                file: null,
                typeUpload: '',
                designName: '',
                reorder: false,
                pantoneColor: null,
                stepUpload: null,
                headLinks: [
                    {name: 'Home', href: '/'},
                    {name: 'Configurator', href: '/bearing-configurator'},
                ],
                steps: {
                    grit:            {state: false},
                    perforation:     {state: false},
                    racePrint:       {state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                    shieldBrandPrint:{state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                    dieCut:          {state: false, file: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                    coloredGriptape: {color: null},
                    backpaper:       {state: false},
                    backpaperPrint:  {state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                    cartonPrint:     {state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
                    pantonePrint:    {state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
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
                    case 4: step = 'shieldBrandPrint'; break;
                    case 8: step = 'pantonePrint'; break;
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
                this.orderTotal = this.quantity;
                    // + this.deliveryPrice;
            },
            calculatePrice() {
                if (this.material) {
                    this.price = this.material.value + this.additionalCost
                        + (this.abec ? this.abec.value : 0)
                        + (this.race ? this.race.value : 0)
                        + (this.shield ? this.shield.value : 0)
                        + (this.shieldBrand ? this.shieldBrand.value : 0)
                        + (this.retainer ? this.retainer.value : 0)
                        + (this.spamaterial ? this.spamaterial.value : 0)
                        + (this.spacolor ? this.spacolor.value : 0)
                        + (this.brandfirst ? this.brandfirst.value : 0)
                        + (this.packfirst ? this.packfirst.value : 0)
                        + (this.packsecond ? this.packsecond.value : 0)
                        + (this.brandsecond ? this.brandsecond.value : 0)
                } else {
                    this.price = 0;
                }
            },
            quantityChange(quantity) {
                // set new quantity
                this.quantity = quantity.value;
                this.quantityob = quantity;
                // recalculate total
                this.calculateTotal();

                switch(true) {
                    case (this.orderTotal == 625) : this.additionalCost = 1.4;   break;
                    case (this.orderTotal == 800) : this.additionalCost = 1.1;   break;
                    case (this.orderTotal == 1000) : this.additionalCost = 0.9;   break;
                    case (this.orderTotal == 1200) : this.additionalCost = 0.85;   break;
                    case (this.orderTotal == 1500) : this.additionalCost = 0.7;   break;
                    case (this.orderTotal == 2000) : this.additionalCost = 0.45;   break;
                    case (this.orderTotal == 2500) : this.additionalCost = 0.35;   break;
                    case (this.orderTotal == 3000) : this.additionalCost = 0.3;   break;
                    case (this.orderTotal == 4000) : this.additionalCost = 0.2;   break;
                    case (this.orderTotal == 5000) : this.additionalCost = 0.18;   break;
                    case (this.orderTotal == 8000) : this.additionalCost = 0.05;   break;
                    case (this.orderTotal == 10000) : this.additionalCost = 0;   break;
                    default: this.additionalCost = 1.4;
                }

                this.calculatePrice();
            },
            materialChange(material) {
                this.material = material;
                // recalculate total
                this.calculateTotal();

                // switch(true) {
                //     case (this.orderTotal >= 1170  && this.orderTotal < 3000) : this.additionalCost = 1;   break;
                //     case (this.orderTotal >= 3000  && this.orderTotal < 6000) : this.additionalCost = 0.8; break;
                //     case (this.orderTotal >= 6000  && this.orderTotal < 8000) : this.additionalCost = 0.5; break;
                //     case (this.orderTotal >= 8000  && this.orderTotal < 12000): this.additionalCost = 0.4; break;
                //     case (this.orderTotal >= 12000 && this.orderTotal < 20000): this.additionalCost = 0.3; break;
                //     // TODO  maybe 50000 instead 30000 ?
                //     case (this.orderTotal >= 20000 && this.orderTotal < 50000): this.additionalCost = 0.25; break; 
                //     case (this.orderTotal >= 50000): this.additionalCost = 0.2; break;
                //     default: this.additionalCost = 1;
                // }

                this.calculatePrice();
            },
            abecChange(abec) {
                this.abec = abec;
                this.calculateTotal();
                this.calculatePrice();
            },
            raceChange(race) {
                this.race = race;
                this.calculateTotal();
                this.calculatePrice();
            },
            shieldChange(shield) {
                this.shield = shield;
                this.calculateTotal();
                this.calculatePrice();
            },
            shieldColorChange(color) {
                this.shieldColor = color;
            },
            shieldBrandChange(shieldbrand) {
                this.shieldBrand = shieldbrand;
                this.calculateTotal();
                this.calculatePrice();
            },
            shieldBrandColor1Change(color) {
                this.shieldBrandColor1 = color;
            },
            shieldBrandColor2Change(color) {
                this.shieldBrandColor2 = color;
            },
            retainerChange(retainer) {
                this.retainer = retainer;
                this.calculateTotal();
                this.calculatePrice();
            },
            spamaterialChange(spamaterial) {
                this.spamaterial = spamaterial;
                this.calculateTotal();
                this.calculatePrice();
            },
            spacolorChange(spacolor) {
                this.spacolor = spacolor;
                this.calculateTotal();
                this.calculatePrice();
            },
            brandfirstChange(brandfirst) {
                this.brandfirst = brandfirst;
                this.calculateTotal();
                this.calculatePrice();
            },
            packfirstChange(packfirst) {
                this.packfirst = packfirst;
                this.calculateTotal();
                this.calculatePrice();
            },
            packsecondChange(packsecond) {
                this.packsecond = packsecond;
                this.calculateTotal();
                this.calculatePrice();
            },
            brandsecondChange(brandsecond) {
                this.brandsecond = brandsecond;
                this.calculateTotal();
                this.calculatePrice();
            },
            designNameChange(designName) {
                this.designName = designName;
            },
            reorderChange(reorder){
                this.reorder = reorder
            },
            pantoneColorChange(pantoneColor){
                this.pantoneColor = pantoneColor;
                this.calculateTotal();
                this.calculatePrice();
            },
            nextStep(){
                this.$store.commit('changeStep', ++this.currentStep);
            },
            prevStep(){
                this.$store.commit('changeStep', --this.currentStep);
            },
            save(event) {

                debugger;

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
                formData.append('shield', this.shield.name);
                formData.append('shieldcolor', this.shieldColor);
                formData.append('shield_brand', this.shieldBrand.name);
                formData.append('firstbrandcolor', this.shieldBrandColor1);
                formData.append('secondbrandcolor', this.shieldBrandColor2);
                formData.append('spamaterial', this.spamaterial.name);
                formData.append('spacolor', this.spacolor.name);
                formData.append('packfirst', this.packfirst.name);
                formData.append('brandfirst', this.brandfirst.name);
                formData.append('packsecond', this.packsecond.name);
                formData.append('brandsecond', this.brandsecond.name);
                formData.append('designname', this.designName);
                formData.append('pantone_color', JSON.stringify(this.pantoneColor));
                formData.append('designname', this.designName);
                formData.append('race_print', this.steps.racePrint.state 
                    && this.steps.racePrint.file ? this.steps.racePrint.file : "");
                formData.append('shield_brand_print', this.steps.shieldBrandPrint.state 
                    && this.steps.shieldBrandPrint.file ? this.steps.shieldBrandPrint.file : "");
                formData.append('pantone_print',this.steps.pantonePrint.state 
                    && this.steps.pantonePrint.file ? this.steps.pantonePrint.file : "");
                formData.append('price', this.price);
                formData.append('total', this.total);
                
                axios.post('/bearing-configurator', formData)
                    .then((response) => {
                        setTimeout(() => {
                            window.location.href = "/summary";
                        }, 1000);
                    })
                    .catch((error) => {
                        console.error(error);
                    }); 
            },
            initBearing() {
                if (this.bearing) {
                    this.id = this.bearing.id;

                    // Step 1
                    this.quantityob = this.bearing.quantity+"";
                    this.material = this.bearing.material;
                    this.price = this.bearing.price;

                    // Step 2
                    this.abec = this.bearing.abec;
                    this.race = this.bearing.race;

                    // Step 3
                    this.retainer = this.bearing.retainer;
                    if(this.bearing.race_print){
                        this.steps.racePrint.state = true;
                        this.steps.racePrint.file = this.bearing.race_print;
                    }

                    
                    // Step 4
                    this.shield = this.bearing.shield;
                    this.shieldColor = this.bearing.shieldcolor;
                    this.shieldBrand = this.bearing.shield_brand;
                    this.shieldBrandColor1 = this.bearing.firstbrandcolor;
                    this.shieldBrandColor2 = this.bearing.secondbrandcolor;
                    if(this.bearing.shield_brand_print){
                        this.steps.shieldBrandPrint.state = true;
                        this.steps.shieldBrandPrint.file = this.bearing.shield_brand_print;
                    }

                    // Step 5
                    this.spacolor = this.bearing.spacolor;
                    this.spamaterial = this.bearing.spamaterial;

                    // Step 6
                    this.packfirst = this.bearing.packfirst;
                    this.brandfirst = this.bearing.brandfirst;

                    // Step 7
                    this.packsecond = this.bearing.packsecond;
                    this.brandsecond = this.bearing.brandsecond;

                    // Step 8
                    this.designName = this.bearing.designname;
                    this.pantoneColor = JSON.parse(this.bearing.pantone_color);
                    if(this.bearing.pantone_print){
                        this.steps.pantonePrint.state = true;
                        this.steps.pantonePrint.file = this.bearing.pantone_print;
                    }

                    // // Step 9
                    // if(this.griptape.carton_print || this.griptape.carton_print_color){
                    //     this.steps.cartonPrint.state = true;
                    //     this.steps.cartonPrint.file = this.griptape.carton_print;
                    //     this.steps.cartonPrint.color = this.griptape.carton_print_color;
                    //     for(let i = 0; i < this.filenames['carton'].length; i ++){
                    //         if(this.filenames['carton'][i]['name'] == this.griptape.carton_print_color){
                    //             this.steps.cartonPrint.dropdisable = this.filenames['carton'][i]['is_disable']?true:false;
                    //         }
                    //     }
                    // }
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
            this.initBearing();
            this.calculatePrice();
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