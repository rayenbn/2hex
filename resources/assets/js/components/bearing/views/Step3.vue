<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_3">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Races</h3>
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
                                id="raceprint"
                                name="raceprint"
                                style="width:100%;"
                                v-model="step_raceprint"
                                @change.prevent="step_options.state = !step_options.state;"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="raceprint" 
                                    v-for="(raceprint, index) in racePrints" 
                                    :key="index"
                                >
                                    {{ raceprint.name }}
                                </option>
                        
                            </select>
                            <div class="form-group m-form__group raceprint-files">
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        data-type-upload="race"
                                        class="custom-file-input"
                                        data-step="racePrint"
                                        id="step-3-upload"
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
                            <div class="progress mb-3 raceprint-files" style="height: 2px;">
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
                            <div class="dropdown raceprint-files">
                                <button 
                                    class="btn btn-secondary dropdown-toggle" 
                                    type="button" 
                                    id="step-3-recent" 
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
                                <div class="dropdown-menu" aria-labelledby="step-3-recent">
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
                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Race Print</h3>
                                2HEX uses thin but opaque ink to print on griptapes. This keeps the grip while not compromising on print quality. The top of a griptape is the most visible part of a skateboard. If you want your brand name seen, this is the spot to print it!
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
                                <h3 class="m-portlet__head-text">Retainers</h3>
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
                                            alt="Retainers" 
                                            title="Retainers"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="retainer"
                                name="retainer"
                                style="width:100%;"
                                v-model="step_retainer"
                                @change.prevent="retainerChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="retainer" 
                                    v-for="(retainer, index) in retainers" 
                                    :key="index"
                                >
                                    {{ retainer.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>SB Flex Retainer Color</h3>
                                Select the Bearing material of this batch. Griptape sizes are shown by "width x length". Dimensions are given in inches. Griptapes with a length of 720" are sold in rolls, all other griptapes are sold in stacked sheets.
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
        name: 'skateboard-decks-step-3',
        mixins: [upload],
        props: {
            uploadProgress: {
                type: Number,
                default: 0
            },
            retainer: {
                type: [Object, String],
                default: ""
            },
            race: {
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
                step_retainer: null,
                step_raceprint: null,
                retainers: [
                    {name: 'Brown SB-Flex Retainer', value: 0},
                    {name: 'Black SB-Flex Retainer', value: 0.15},
                    {name: 'White SB-Flex Retainer', value: 0.15},
                    {name: 'Neon Green SB-Flex Retainer', value: 0.15},
                ],
                racePrints: [
                    {name: 'Blank Races', value: 0},
                    {name: 'Engraved Races', value: 0.29},
                ]
            }
        },
        watch: {
            step_color: _.debounce(function(val){
                this.$emit('colorChange', val);
            }, 300)
        },
        methods: {
	        retainerChange(event) {
                this.$store.commit('BearingConfigurator/setRetainer', this.step_retainer);
	            this.$emit('retainerChange', this.step_retainer);
	        },
            raceprintChange(event) {
                this.step_options.state = !this.step_options.state;

                if(this.step_raceprint && typeof this.step_raceprint === 'object') {
                    switch(this.step_raceprint.name) {
                        case 'Blank Races': this.step_options.state = false; break;
                        default: this.step_options.state = true; break;
                    }
                }

                if(this.step_options.state){
                    $('.raceprint-files').show();
                }
                else
                    $('.raceprint-files').hide();
            }
		},
        created() {
            this.step_color = this.options.color;
        },
        mounted() {

            let value = '';
            // Listen change race
            $('#retainer').select2();
            $('#retainer').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_retainer = this.retainers.find(s => s.name == value);
                this.retainerChange();
            });

            $('#raceprint').select2();
            $('#raceprint').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_raceprint = this.racePrints.find(s => s.name == value);
                this.raceprintChange();
            });
            if(this.step_options.state)
                $('.raceprint-files').show();
            
            else
                $('.raceprint-files').hide();
        },
        computed: {
            images() {
                if (this.step_retainer && typeof this.step_retainer === 'object') {
                    switch(this.step_retainer.name) {
                        case 'Black SB-Flex Retainer': return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                        case 'White SB-Flex Retainer': return {q: '/img/griptape/1.3.jpg', s: '/img/griptape/2.3.jpg'};
                        case 'Neon Green SB-Flex Retainer': return {q: '/img/griptape/1.2.jpg', s: '/img/griptape/2.2.jpg'};
                        default: return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                    }
                }
                return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
            }
        },
    }
</script>