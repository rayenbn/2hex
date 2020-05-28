<template>
    <div class="m-content">
        <div class="row">
            <div class="col-xl-9">
                <div class="m-portlet">

                    <head-configurator
                        title="Bolt & Nut Factory"
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
                                        :color="color"
                                        :costset="costset"
                                        @quantityChange="quantityChange"
                                        @colorChange="colorChange"
                                        @costSetChange="costSetChange"
                                    />
                                    
                                    <!-- Step 2 -->
                                    <skateboard-decks-step-2
                                        :allocation="allocation"
                                        @allocationChange="allocationChange"
                                    />

                                    <!-- Step 3 -->
                                    

                                     <skateboard-decks-step-3
                                        :material="material"
                                        :size="size"
                                        @materialChange="materialChange"
                                        @sizeChange="sizeChange"
                                    />
                                    

                                    <skateboard-decks-step-4
                                        :phil_allen="phil_allen"
                                        :allen_type="allen_type"
                                        @phiAllenChange="phiAllenChange"
                                        @allenTypeChange="allenTypeChange"
                                    />

                                    <!-- Step 5 -->
                                    <skateboard-decks-step-5
                                        :options="steps.packPrint"
                                        :pack="pack"
                                        :files="filenames.pantone"
                                        :designName="designName"
                                        :reorder="reorder"
                                        :packColor="packColor"
                                        :uploadProgress="steps.packPrint.uploadProgress"
                                        :upload_url="upload_url"
                                        @packColorChange="packColorChange"
                                        @packChange="packChange"
                                        @designNameChange="designNameChange"
                                        @reorderChange="reorderChange"
                                        
                                        @stateChange="(val) => {
                                            steps.packPrint.state = val;
                                        }"
                                        @selectpaidChange="(val) => {
                                            steps.packPrint.selectpaid = val;
                                        }"
                                        @fileChange="(val) => {steps.packPrint.file = val}"
                                        @colorChange="(val) => {steps.packPrint.color = val}"
                                        @prepareFile="(e) => { stepUpload = 5; uploadFile(e); }"
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
                                                    class="btn btn-primary m-btn m-btn--custom m-btn--icon submit-button" 
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
                                        <h3 class="m-widget1__title">{{ user ? 'Bolt & Nut' : 'Login' }}</h3>
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
	import HeadConfigurator from './views/HeadConfigurator.vue';

    export default {
    	name: 'bolt-configurator',
    	props: {
    		user: {
                type: Object,
                default: null
            },
            upload_url: {
                type: String,
                default: ''
            },
            bolt: {
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
            },
            quantitybearing: {
                type: Number,
                default: 0,
            }
    	},
    	components: {
    		skateboardDecksStep1,
    		skateboardDecksStep2,
    		skateboardDecksStep3,
            skateboardDecksStep4,
            skateboardDecksStep5,
            HeadConfigurator,
    	},
        data() {
            return {
                id: "",
	            quantity: 10000,
                costset: {name: 'Cost 8 pcs', value: 0},
                color: null,
                allocation: new Array(20).fill(null),
	            material: {name: '22mm', value: 0},
                size: {name: 'Ordinary carbon steel', value: 0},
                allen_type: {name: 'No L Key', value: 0},
                phil_allen: {name: 'Phillips', value: 0},
                pack: {name: 'bulk(no separate packaging needed)', value: 0},
                additionalCost: 0,
                orderTotal: 0,
                price: 0,
                fileName: '',
                file: null,
                typeUpload: '',
                designName: '',
                reorder: false,
                packColor: null,
                
                stepUpload: null,
                headLinks: [
                    {name: 'Home', href: '/'},
                    {name: 'Configurator', href: '/bolt-configurator'},
                ],
                issummaring: 0,
                steps: {
                    packPrint:    {state: false, file: null, color: null, uploadProgress: 0, selectpaid: false, dropdisable: false},
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
                    case 5: step = 'packPrint'; break;
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
                            event.target.value = '';
                            event.target.file = '';
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
                        event.target.value = '';
                        event.target.file = '';
                        this.$notify({
                            group: 'main',
                            type: 'error',
                            title: 'Upload file',
                            text: "File upload error"
                        });
                    });
            },
            calculateTotal() {
                this.orderTotal = this.quantity + this.quantitybearing;
            },
            calculatePrice() {
                if (this.material) {
                    this.price = this.material.value + this.additionalCost
                        + (this.abec ? this.abec.value : 0)
                        + (this.race ? this.race.value : 0)
                        + (this.shield ? this.shield.value : 0)
                        + (this.racePrintValue ? this.racePrintValue.value : 0)                        
                        + (this.shieldBrand ? this.shieldBrand.value : 0)
                        + (this.retainer ? this.retainer.value : 0)
                        + (this.spamaterial ? this.spamaterial.value : 0)
                        + ((this.spacolor && this.spamaterial.name != 'No Spacers') ? this.spacolor.value : 0)
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
                this.quantity = quantity;
                // recalculate total
                this.calculateTotal();

                switch(true) {
                    case (this.orderTotal < 800) : this.additionalCost = 1.4;   break;
                    case (this.orderTotal < 1000) : this.additionalCost = 1.1;   break;
                    case (this.orderTotal < 1200) : this.additionalCost = 0.9;   break;
                    case (this.orderTotal < 1500) : this.additionalCost = 0.85;   break;
                    case (this.orderTotal < 2000) : this.additionalCost = 0.7;   break;
                    case (this.orderTotal < 2500) : this.additionalCost = 0.45;   break;
                    case (this.orderTotal < 3000) : this.additionalCost = 0.35;   break;
                    case (this.orderTotal < 4000) : this.additionalCost = 0.3;   break;
                    case (this.orderTotal < 5000) : this.additionalCost = 0.2;   break;
                    case (this.orderTotal < 8000) : this.additionalCost = 0.18;   break;
                    case (this.orderTotal < 10000) : this.additionalCost = 0.05;   break;
                    default: this.additionalCost = 0;
                }

                this.calculatePrice();
            },
            materialChange(material) {
                this.material = material;
                // recalculate total
                this.calculateTotal();
                this.calculatePrice();
            },
            allocationChange(allocation){
                this.allocation = allocation;
                this.calculateTotal();
                this.calculatePrice();
            },
            costSetChange(costset){
                this.costset = costset;
                this.calculateTotal();
                this.calculatePrice();
            },
            sizeChange(size) {
                this.size = size;
                // recalculate total
                this.calculateTotal();
                this.calculatePrice();
            },
            colorChange(color){
                this.color = color;
                this.calculateTotal();
                this.calculatePrice();
            },
            phiAllenChange(phil_allen) {
                this.phil_allen = phil_allen;
                this.calculateTotal();
                this.calculatePrice();
            },
            allenTypeChange(allen_type) {
                this.allen_type = allen_type;
                this.calculateTotal();
                this.calculatePrice();
            },
            packChange(pack) {
                this.pack = pack;
                this.calculateTotal();
                this.calculatePrice();
            },
            designNameChange(designName) {
                this.designName = designName;
            },
            reorderChange(reorder){
                this.reorder = reorder
            },
            packColorChange(packColor){
                this.packColor = packColor;
                this.calculateTotal();
                this.calculatePrice();
            },
            nextStep(){
                // if(this.currentStep == 4){
                //     if(this.shieldBrand.name == "1 Color Print" && this.shieldBrandColor1 == ''){
                //         return false;
                //     }
                //     if(this.shieldBrand.name == "2 Color Print" && (this.shieldBrandColor1 == '' || this.shieldBrandColor1 == '')){
                //         return false;
                //     }
                //     if(this.shield.name == "Custom Color Rubber Shield" && this.shieldColor == ''){
                //         return false;
                //     }
                // }
                this.$store.commit('changeStep', ++this.currentStep);
            },
            prevStep(){
                this.$store.commit('changeStep', --this.currentStep);
            },
            save(event) {
                debugger;
               var click_type = $(event.target).closest('button').attr('id');
                if(this.issummaring == 1)
                    return false;
                
                $('.submit-button').prop('disabled', true);

                if (this.quantity <= 0) {
                    alert("Product quantity may not be 0. Please check your quantities.");
                    
                    return false;
                }

                var formData = new FormData();

                formData.append('id', this.id);
                formData.append('quantity',this.quantity);
                formData.append('color',JSON.stringify(this.color));
                formData.append('costset',this.costset.name);
                formData.append('allocation',this.allocation);
                formData.append('size',this.size.name);
                formData.append('material', this.material.name);
                formData.append('phil_allen', this.phil_allen.name);
                if(this.phil_allen.name == 'Allen')
                    formData.append('allen_type', this.allen_type.name);
                formData.append('pack', this.pack.name);
                if(this.pack.name == 'customized plastic bag for each set'){
                    formData.append('designname', this.designName);
                    if(this.designName == '' && !click_type){
                        alert('Please input Design Name on Step 8');
                        $('.submit-button').prop('disabled', false);
                        return;
                    }
                    formData.append('pack_color', JSON.stringify(this.packColor));
                    if(!this.packColor && !click_type){
                        alert('Please select color type');
                        $('.submit-button').prop('disabled', false);
                        return;
                    }
                    if(this.packColor){
                        for(var i = 0; i < this.packColor.colors.length; i ++){
                            if(!this.packColor.colors[i] && !click_type){
                                alert('Please input Color on Step 8');
                                $('.submit-button').prop('disabled', false);
                                return;
                            }
                        }
                    }
                    

                    formData.append('pack_print',this.steps.packPrint.state 
                        && this.steps.packPrint.file ? this.steps.packPrint.file : "");
                }
                
                formData.append('price', this.price);
                formData.append('total', this.total);
                this.issummaring = 1;
                var self = this;
                if(this.id)
                    axios.post('/bolt-configurator/'+this.id, formData)
                        .then((response) => {
                            setTimeout(() => {
                                window.location.href = "/summary";
                            }, 1000);
                        })
                        .catch((error) => {
                            console.error(error);
                            self.issummaring = 0;
                            $('.submit-button').prop('disabled', false);
                        }); 
                else
                    axios.post('/bolt-configurator', formData)
                        .then((response) => {
                            setTimeout(() => {
                                window.location.href = "/summary";
                            }, 1000);
                        })
                        .catch((error) => {
                            console.error(error);
                            self.issummaring = 0;
                            $('.submit-button').prop('disabled', false);
                        }); 
            },
            initBolt() {
                if (this.bolt) {
                    this.id = this.bolt.id;

                    // Step 1
                    this.quantity = this.bolt.quality;
                    this.costset = this.bolt.costset;
                    this.color = JSON.parse(color);

                    // Step 2
                    this.allocation = this.bolt.allocation;


                    // Step 3
                    this.material = this.bolt.material;
                    this.size = this.bolt.size;

                    
                    // Step 4
                    this.phil_allen = this.bolt.phil_allen;
                    this.allen_type = this.bolt.allen_type;

                    // Step 5
                    this.pack = this.bearing.pack;
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
                    width: 100 * this.currentStep / 5 + '%',
                }
            },
            total() {
                return (this.price * this.quantity).toFixed(2);
            }
        },
        created() {
            this.$store.commit('changeStep', 1);
            this.initBolt();
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