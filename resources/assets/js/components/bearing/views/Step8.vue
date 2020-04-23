<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_8">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
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
                                placeholder="Enter design name"
                                v-model="step_designName"
                                v-validate="'required'"
                                required
                                @input="onDesignNameChange"
                            >
                            <br/>

                            <select
                                class="form-control m-select2"
                                id="pantoneColor"
                                name="pantoneColor"
                                style="width:100%;"
                                v-model="step_pantoneColor"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option
                                    :value="index"
                                    v-for="(item, index) in pantoneColors"
                                    :key="'color' + index"
                                    v-validate="'required'"
                                >
                                    {{ item.title }}
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
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <p class="h5 m-0">Upload full quality print file:</p>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">

                            <div class="form-group m-form__group pantone-files">
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        data-type-upload="pantone"
                                        class="custom-file-input"
                                        data-step="pantonePrint"
                                        id="step-8-upload"
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
                                    id="step-8-recent" 
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
                                <div class="dropdown-menu" aria-labelledby="step-8-recent">
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
                            <template v-if="step_pantoneColor && step_pantoneColor.title != 'CMYK photo print on outer carton'">
                                <input
                                    v-for="(count, index) in step_pantoneColor.countFields"
                                    type="text"
                                    class="form-control mt-2 mb-2"
                                    placeholder="Enter Pantone Color"
                                    v-model="step_pantoneColor.colors[index]"
                                    :name="'color' + index"
                                    v-validate="'required'"
                                    @input="onChangePantoneColor"
                                >
                            </template>

                            <template v-if="step_pantoneColor && step_pantoneColor.title == 'CMYK photo print on outer carton'">
                                <input
                                    v-for="(count, index) in step_pantoneColor.countFields"
                                    type="text"
                                    class="form-control mt-2 mb-2"
                                    placeholder="Enter Pantone Color"
                                    v-model="step_pantoneColor.colors[index]"
                                    :name="'color' + index"
                                    v-validate="'required'"
                                    readonly
                                    @input="onChangePantoneColor"
                                >
                            </template>
                            
                            <div style="text-align: justify; color: #9699a4;" class="mt-4">
                                Download our Design Template:
                            </div>
                            <div style="text-align: justify; color: #9699a4;" class="mt-4">
                                <a href="/transfers/2HEX-skateboard-deck-design-template.pdf" class="m-0 d-block" target="_blank">
                                    <img src="/img/transfers/skateboard-deck-template.jpg" alt="Design Template" title="Design Template" width="100%">
                                </a>
                            </div>
                            <div class="mt-4 mb-2 d-flex align-items-center justify-content-start">
                                <label class="switch mb-0 mr-4">
                                    <input type="checkbox" name="re-order" v-model="step_reOrder">
                                    <span class="slider round"></span>
                                </label>
                                <div class="d-flex flex-column">
                                    <span>Re-Order</span>
                                    <small>First Made: 2019/10/16</small>
                                </div>
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
        name: 'skateboard-decks-step-8',
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
            pantoneColor: {
                type: [Object, String],
                default: ""
            },
            reorder: {
                type: Boolean,
                default: false
            }

        },
        components: {
            ColorBtn,
            BtnFileUpload,
        },
        data() {
            return {
                pantoneColors: [
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
                        "title": "CMYK photo print on outer carton",
                        "countFields": 4,
                        "colors": ['CMYK-Cyan', 'CMYK-Magenta', 'CMYK-Yellow', 'CMYK-Key Black'],
                        "value": 360
                    }
                ],
                smProgress: 0,
                lgProgress: 0,
                step_designName: this.designName,
                step_pantoneColor: this.pantoneColor,
                step_reOrder: this.reorder,


            }
        },

        methods: {
            onChangePantoneColor(event){
                this.$store.commit('BearingConfigurator/setPantoneColor', this.step_pantoneColor);
	            this.$emit('pantoneColorChange', this.step_pantoneColor);
            },
            onDesignNameChange(event){
                this.$store.commit('BearingConfigurator/setDesignName', this.step_designName);
	            this.$emit('designNameChange', this.step_designName);
            },
            onReorderChange(event){
                this.$store.commit('BearingConfigurator/setReorder', this.step_reOrder);
	            this.$emit('reorderChange', this.step_reOrder);
            }
        },
        computed: {
            totalCmykColors() {
                let colors = ['CMYK-Cyan', 'CMYK-Magenta', 'CMYK-Yellow', 'CMYK-Key Black'];

                this.cmykColors = colors.concat(new Array(this.pantoneColor.countFields).fill(null));

                return this.pantoneColor.countFields + 4;
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
            let queryPantoneColor = $("#pantoneColor");

            queryPantoneColor.select2();

            // Listen change select with color types
            queryPantoneColor.on('select2:select', (e) => {
                this.step_pantoneColor = this.pantoneColors[e.params.data.id];
                this.onChangePantoneColor();
            });

            // if (! this.step_pantoneColor) {
            //     this.step_pantoneColor = this.pantoneColors[0];
            //     queryPantoneColor.val(0).trigger('change');
            //     this.onChangePantoneColor();
            // }
        }
    }
</script>