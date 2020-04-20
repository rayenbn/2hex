<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_4">
        <div class="row">


            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Shields Material</h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div>
                                    <div 
                                        class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" 
                                        style="min-height: 286px"
                                    >
                                        <img 
                                            :src="images.s" 
                                            class="step1-img1" 
                                            alt="Shields Material" 
                                            title="Shields Material"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="shield"
                                name="shield"
                                style="width:100%;"
                                v-model="step_shield"
                                @change.prevent="shieldChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="shield" 
                                    v-for="(shield, index) in shields" 
                                    v-if="shield.name != 'Custom Color Rubber Shield' || prev_quantity >= 2500"
                                    :key="index"
                                >
                                    {{ shield.name }}
                                </option>
                       
                            </select>
                            <br/>
                            <br/>
                            <input
                                type="text"
                                class="form-control"
                                name="shieldColor"
                                placeholder="Enter Panthone Color"
                                v-if="step_shield && step_shield.name == 'Custom Color Rubber Shield'"
                                v-validate="'required'"
                                @input="onShieldColorChange"
                            >

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Shields Material</h3>
                                Select the Bearing material of this batch. Griptape sizes are shown by "width x length". Dimensions are given in inches. Griptapes with a length of 720" are sold in rolls, all other griptapes are sold in stacked sheets.
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
                                <h3 class="m-portlet__head-text">Shield Branding</h3>
                            </div>
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
                                            src="/img/griptape/custom-griptape-print-2hex-skateboard-manufacturer.jpg" 
                                            alt="Top Print on Griptape" 
                                            title="Top Print on Griptape"  
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>

                            <select
                                class="form-control m-select2"
                                id="shieldbrand"
                                name="shieldbrand"
                                style="width:100%;"
                                v-model="step_shieldbrand"
                                @change.prevent="step_options.state = !step_options.state;"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="shieldbrand" 
                                    v-for="(shieldbrand, index) in shieldBrands" 
                                    v-if="shieldbrand.name != 'Metal Shields' || shieldbrand.name == 'No Shield Branding'"
                                    :key="index"
                                >
                                    {{ shieldbrand.name }}
                                </option>
                        
                            </select>

                            <div class="form-group m-form__group shieldbrand-files">
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        data-type-upload="shieldbrand"
                                        class="custom-file-input"
                                        data-step="shieldBrand"
                                        id="step-4-upload"
                                        @click="step_options.state = true"
                                        @change.prevent="prepareFile"
                                    >
                                    <label 
                                        class="custom-file-label unchecked" 
                                        :class="{checked: step_options.state}" 
                                        for="customFile"
                                    >
                                        Choose file
                                    </label>
                                </div>
                            </div>
                            <div class="progress mb-3 shieldbrand-files" style="height: 2px;">
                                <div 
                                    class="progress-bar m--bg-info" 
                                    role="progressbar" 
                                    :style="'width:' + uploadProgress + '%'" 
                                    aria-valuenow="65" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100"
                                >
                                </div>
                            </div>
                            <div class="dropdown shieldbrand-files">
                                <button 
                                    class="btn btn-secondary dropdown-toggle" 
                                    type="button" 
                                    id="step-4-recent" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false" 
                                    style="width:100%;" 
                                    :class="[step_options.state && step_options.file 
                                        ? 'checked' : 'unchecked'
                                    ]" 
                                    @click="step_options.state = true"
                                >
                                    {{ step_options.file ? step_options.file : 'Recent file' }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="step-4-recent">
                                    <a 
                                        v-for="file in files"
                                        class="dropdown-item file-dropdown" 
                                        @click="() => {step_options.file = file['name']; step_options.state = true; step_options.selectpaid = file['paid']; step_options.dropdisable = file['is_disable'];  step_color = file['color_qty']; }"
                                        href="#"
                                    >
                                        <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <color-btn 
                                :color="step_color" 
                                labelledby="step- 4-colors"
                                @colorChange="(val) => step_color = val"
                                v-if="!step_options.dropdisable"
                            >
                                <template slot="btn">
                                    <button 
                                        id="step-4-colors"
                                        class="btn btn-secondary dropdown-toggle shieldbrand-files"  
                                        type="button" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false" 
                                        style="width:100%;" 
                                        @click="step_options.state = true"
                                        :class="[step_options.state && step_color ? 'checked' : 'unchecked']" 
                                    >
                                        {{ step_color ? step_color : 'How many colors are in your design?' }}
                                    </button>
                                </template>
                            </color-btn>
                            <button 
                                id="step-4-colors"
                                class="btn btn-secondary dropdown-toggle shieldbrand-files" 
                                type="button" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false" 
                                style="width:100%;" 
                                @click="step_options.state = true"
                                :class="[step_options.state && step_color ? 'checked' : 'unchecked']" 
                                v-else
                            >
                                {{ step_color ? step_color : 'How many colors are in your design?' }}
                            </button>
                            <br/>
                            <input
                                type="text"
                                class="form-control"
                                name="shieldBrandColor1"
                                placeholder="Enter Panthone Color"
                                v-if="step_shieldbrand && (step_shieldbrand.name == '1 Color Print' || step_shieldbrand.name == '2 Color Print')"
                                v-validate="'required'"
                                @input="onShieldColorChange"
                            >
                            <br/>
                            <input
                                type="text"
                                class="form-control"
                                name="shieldBrandColor2"
                                placeholder="Enter Panthone Color"
                                v-if="step_shieldbrand && step_shieldbrand.name == '2 Color Print'"
                                v-validate="'required'"
                                @input="onShieldColorChange"
                            >


                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Shield Branding</h3>
                                2HEX uses thin but opaque ink to print on griptapes. This keeps the grip while not compromising on print quality. The top of a griptape is the most visible part of a skateboard. If you want your brand name seen, this is the spot to print it!
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            
        </div>
    </div>
</template>

<script>
    import upload from '../mixins/uploadFile';
    import ColorBtn from './ColorBtn';
    import BtnFileUpload from '@/components/BtnFileUpload';

    export default {
        name: 'skateboard-decks-step-4',
        mixins: [upload],
        props: {
            uploadProgress: {
                type: Number,
                default: 0
            },
            shield: {
                type: [Object, String],
                default: ""
            },
            shieldbrand: {
                type: [Object, String],
                default: ""
            },
            quantity: {
                type: [Object, String],
                default: ""
            }
        },
        components: {
            ColorBtn,
            BtnFileUpload,
        },
        data() {
            return {
                step_color: null,
                step_shield: this.shield,
                step_shieldbrand: this.shieldbrand,
                step_quantity: this.quantity,
                shields: [
                    {name: 'Metal Shield', value: 0},
                    {name: 'Black Rubber Shield', value: 0.05},
                    {name: 'Red Rubber Shield', value: 0.19},
                    {name: 'Custom Color Rubber Shield', value: 0.24},
                ],
                shieldBrands: [
                    {name: 'No Shield Branding', value: 0},
                    {name: 'Emboss', value: 0.18},
                    {name: '1 Color Print', value: 0.18},
                    {name: '2 Color Print', value: 0.32},

                ]
            }
        },
        watch: {
            step_color: _.debounce(function(val){
                this.$emit('colorChange', val);
            }, 300)
        },
        methods: {
	        shieldChange(event) {
                this.$store.commit('BearingConfigurator/setShield', this.step_shield);
	            this.$emit('shieldChange', this.step_shield);
	        },
            shieldBrandChange(event) {
                let value = $('#shieldbrand').val();
                if(this.step_shieldbrand && typeof this.step_shieldbrand === 'object') {
                    switch(this.step_shieldbrand.name) {
                        case 'No Shield Branding': this.step_options.state = false; break;
                        default: this.step_options.state = true; break;
                    }
                }
                if(this.step_options.state){
                    $('.shieldbrand-files').show();
                }
                else
                    $('.shieldbrand-files').hide();
                
                this.$store.commit('BearingConfigurator/setShieldBrand', this.step_shieldbrand);
	            this.$emit('shieldBrandChange', this.step_shieldbrand);
            },
            onShieldColorChange(event) {

            }
		},
        created() {
            this.step_color = this.options.color;
        },
        mounted() {

            let value = '';
            // Listen change race
            $('#shield').select2();
            $('#shield').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_shield = this.shields.find(s => s.name == value);
                this.shieldChange();
            });

            $('#shieldbrand').select2();
            $('#shieldbrand').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_shieldbrand = this.shieldBrands.find(s => s.name == value);
                this.shieldBrandChange();
            });
            if(this.step_options.state)
                $('.shieldbrand-files').show();

            else
                $('.shieldbrand-files').hide();
        },
        computed: {
            images() {
                if (this.step_shield && typeof this.step_shield === 'object') {
                    switch(this.step_shield.name) {
                        case 'Black SB-Flex shield': return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                        case 'White SB-Flex shield': return {q: '/img/griptape/1.3.jpg', s: '/img/griptape/2.3.jpg'};
                        case 'Neon Green SB-Flex shield': return {q: '/img/griptape/1.2.jpg', s: '/img/griptape/2.2.jpg'};
                        default: return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                    }
                }
                return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
            },
            prev_quantity: {
                get() {
                    return this.$store.getters['BearingConfigurator/getBearingQuantity'];
                }
            }
        },
    }
</script>