<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_5">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__body">
                       <div class="m-widget17">
                            

                           <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div>
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
                                id="pack"
                                name="pack"
                                style="width:100%;"
                                v-model="step_pack"
                                @change.prevent="packChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="pack" 
                                    v-for="(pack, index) in packs" 
                                    :key="index"
                                >
                                    {{ pack.name }}
                                </option>
                       
                            </select>


                            <div style="text-align: justify; color: #9699a4;" class="mt-4">
                                <h3>Packing</h3>
                                The standard in professional skateboarding.
                                Printing on back paper is the most common way to brand griptapes without directly
                                printing on the griptapes top.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 custom-bag">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <p class="h5 m-0">Upload full quality print file:</p>
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

                            <input
                                type="text"
                                class="form-control"
                                name="designName"
                                placeholder="Enter design name for outer packing"
                                v-model="step_designName"
                                v-validate="'required'"
                                required
                                @input="onDesignNameChange"
                            >
                            <br/>

                            <select
                                class="form-control m-select2"
                                id="packColor"
                                name="packColor"
                                style="width:100%;"
                                v-model="step_packColor"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option
                                    :value="index"
                                    v-for="(item, index) in packColors"
                                    :key="'color' + index"
                                    v-validate="'required'"
                                >
                                    {{ item.title }}
                                </option>
                            </select>

                            <div class="form-group m-form__group pantone-files">
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        data-type-upload="pack"
                                        class="custom-file-input"
                                        data-step="packPrint"
                                        id="step-5-upload"
                                        v-validate="'required'"
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
                            <div class="progress mb-3 pantone-files" style="height: 2px;">
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
                            <div class="dropdown pantone-files">
                                <button 
                                    class="btn btn-secondary dropdown-toggle" 
                                    type="button" 
                                    id="step-5-recent" 
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
                                <div class="dropdown-menu" aria-labelledby="step-5-recent">
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
                        </div>

                        <div class="m-widget17">
                            <template v-if="step_packColor">
                                <input
                                    v-for="(count, index) in step_packColor.countFields"
                                    type="text"
                                    class="form-control mt-2 mb-2"
                                    placeholder="Enter Pantone Color"
                                    v-model="step_packColor.colors[index]"
                                    :name="'color' + index"
                                    v-validate="'required'"
                                    @input="onChangePackColor"
                                >
                            </template>
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
        name: 'skateboard-decks-step-5',
        mixins: [upload],
        props: {
            uploadProgress: {
                type: Number,
                default: 0
            },
            designName: {
                type: String,
                default: ""
            },
            packColor: {
                type: [Object, String],
                default: ""
            },
            reorder: {
                type: Boolean,
                default: false
            },
            pack: {
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
                packColors: [
                    {
                        "title": "No Print on outer cartons",
                        "countFields": 0,
                        "colors": new Array(0).fill(null),
                        "value": 0
                    },
                    {
                        "title": "1 Color on outer cartons",
                        "countFields": 1,
                        "colors": new Array(1).fill(null),
                        "value": 90
                    },
                    {
                        "title": "2 Color on outer cartons",
                        "countFields": 2,
                        "colors": new Array(2).fill(null),
                        "value": 180
                    },
                    {
                        "title": "3 Color on outer cartons",
                        "countFields": 3,
                        "colors": new Array(3).fill(null),
                        "value": 270
                    },
                    {
                        "title": "4 Color on outer cartons",
                        "countFields": 4,
                        "colors": new Array(4).fill(null),
                        "value": 360
                    },
                    {
                        "title": "5 Color on outer cartons",
                        "countFields": 5,
                        "colors": new Array(4).fill(null),
                        "value": 360
                    },
                    {
                        "title": "6 Color on outer cartons",
                        "countFields": 6,
                        "colors": new Array(4).fill(null),
                        "value": 360
                    }
                ],
                smProgress: 0,
                lgProgress: 0,
                step_designName: this.designName,
                step_packColor: this.packColor,
                step_reOrder: this.reorder,
                step_pack: this.pack,
                packs: [
                    {name: 'bulk(no separate packaging needed)', value: 0},
                    {name: 'transparent plastic bag for each set', value: 0.35},
                    {name: 'customized plastic bag for each set', value: 0.48},
                    {name: '5cm*8cm customized plastic bag for each', value: 0.68},
                    {name: 'set 5cm*10cm customized plastic bag for', value: 0.58},
                    {name: 'each set 6cm*10cm Hard transparent plastic', value: 0.79},
                    {name: 'fitting-mode shell(14*10cm)', value: 0.48},
                    {name: 'Hard white plastic fitting-mode', value: 0.68},
                    {name: 'shell(14*10cm)  ', value: 0.58}
                ],
            }
        },

        methods: {
            onChangePackColor(event){
                this.$store.commit('BoltConfigurator/setPackColor', this.step_packColor);
	            this.$emit('packColorChange', this.step_packColor);
            },
            onDesignNameChange(event){
                this.$store.commit('BoltConfigurator/setDesignName', this.step_designName);
	            this.$emit('designNameChange', this.step_designName);
            },
            onReorderChange(event){
                this.$store.commit('BoltConfigurator/setReorder', this.step_reOrder);
	            this.$emit('reorderChange', this.step_reOrder);
            },
            packChange(event){

                if(this.step_pack.name == "customized plastic bag for each set")
                    $('.custom-bag').show();
                else
                    $('.custom-bag').hide();

                this.$store.commit('BoltConfigurator/setPack', this.step_pack);
	            this.$emit('packChange', this.step_pack);
            }
        },
        computed: {
            totalCmykColors() {
                let colors = ['CMYK-Cyan', 'CMYK-Magenta', 'CMYK-Yellow', 'CMYK-Key Black'];

                this.cmykColors = colors.concat(new Array(this.packColor.countFields).fill(null));

                return this.packColor.countFields + 4;
            },
            CMYK: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getCMYK'];
                },
                set: _.debounce(function (newVal) {
                    this.$store.commit('TransfersConfigurator/setCMYK', newVal);
                }, 1000)
            },
            cmykColors: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getCMYKColors'];
                },
                set: _.debounce(function (newVal) {
                    this.$store.commit('TransfersConfigurator/setCMYKColors', newVal);
                }, 1000)
            }
        },
        mounted() {
            // init select2
            let queryPackColor = $("#packColor");

            queryPackColor.select2();

            // Listen change select with color types
            queryPackColor.on('select2:select', (e) => {
                this.step_packColor = this.packColors[e.params.data.id];
                this.onChangePackColor();
            });

            $('#pack').select2();
            $('#pack').on('select2:select', (e) => {
                let value = e.params.data.text.trim();
                this.step_pack = this.packs.find(s => s.name == value);
                this.packChange();
            });

            if(this.step_pack.name == "customized plastic bag for each set")
                $('.custom-bag').show();
            else
                $('.custom-bag').hide();

        }
    }
</script>