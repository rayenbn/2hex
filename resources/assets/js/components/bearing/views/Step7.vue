<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_7">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Packing</h3>
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
                                            :src="images.q" 
                                            class="step1-img1" 
                                            alt="Packing" 
                                            title="Packing"
                                        >
                                    </div>
                                </div>
                            </div>

                            <select
                                class="form-control m-select2"
                                id="packsecond"
                                name="packsecond"
                                style="width:100%;"
                                v-model="step_packsecond"
                                @change.prevent="packsecondChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="packsecond" 
                                    v-for="(packsecond, index) in packseconds" 
                                    v-if="packsecond.name == 'No added cardboard' || prev_quantity >= 1000"
                                    :key="index"
                                >
                                    {{ packsecond.name }}
                                </option>
                       
                            </select>


                            <div class="form-group m-form__group upload-files-divsec">
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        data-type-upload="packsecond"
                                        class="custom-file-input"
                                        data-step="packSecond"
                                        id="step-7-upload"
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
                            <div class="progress mb-3 upload-files-divsec" style="height: 2px;">
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
                            <div class="dropdown upload-files-divsec">
                                <button 
                                    class="btn btn-secondary dropdown-toggle" 
                                    type="button" 
                                    id="step-7-recent" 
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
                                        @click="() => {step_options.file = file['name']; step_options.state = true; step_options.selectpaid = file['paid']; step_options.dropdisable = file['is_disable']; }"
                                        href="#"
                                    >
                                        <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
                                    </a>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Packing</h3>
                                Skateboard griptapes are produced in batches of 200. Select the required quantity of your first style of grip tapes. The final griptape price depends on your griptape specifications as well as your total order quantity. With every batch or product you add, your previous batches get cheaper.
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
                                <div>
                                    <div 
                                        class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" 
                                        style="min-height: 286px"
                                    >
                                        <img 
                                            :src="images.s" 
                                            class="step1-img1" 
                                            alt="Shield Branding" 
                                            title="Shield Branding"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="brandsecond"
                                name="brandsecond"
                                style="width:100%;"
                                v-model="step_brandsecond"
                                @change.prevent="brandsecondChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="brandsecond" 
                                    v-for="(brandsecond, index) in brandseconds" 
                                    :key="index"
                                >
                                    {{ brandsecond.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Shield Branding</h3>
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
		name: 'skateboard-decks-step-7',
        mixins: [upload],
        props: {
            packsecond: {
                type: [Object, String],
                default: ""
            },
            brandsecond: {
                type: [Object, String],
                default: ""
            },
            uploadProgress: {
                type: Number,
                default: 0
            }
        },
		data() {
			return {
				step_packsecond: this.packsecond,
				step_brandsecond: this.brandsecond,
                packseconds: [
                    {name: 'No added cardboard', value: 0},
                    {name: 'Cardboard sleeve around Tin packaging', value: 0.45},
                    {name: 'Cardboard box around Tin packaging', value: 0.69}
                ],
                brandseconds: [
                    {name: 'No shrink wrap', value: 0},
                    {name: 'Shrink wrap', value: 0.15}
                ],
			}
		},
		methods: {
			packsecondChange(){
                let value = $('#brandfirst').val();
                if(this.step_packsecond && typeof this.step_packsecond === 'object') {
                    switch(this.step_packsecond.name) {
                        case 'No added cardboard': this.step_options.state = false; break;
                        default: this.step_options.state = true; break;
                    }
                }
                if(this.step_options.state){
                    $('.upload-files-divsec').show();
                }
                else
                    $('.upload-files-divsec').hide();


                this.$store.commit('BearingConfigurator/setPacksecond', this.step_packsecond);
	            this.$emit('packsecondChange', this.step_packsecond);
	        },
	        brandsecondChange(event) {
                this.$store.commit('BearingConfigurator/setBrandsecond', this.step_brandsecond);
	            this.$emit('brandsecondChange', this.step_brandsecond);
	        },
		},
        computed: {
            images() {
                if (this.step_brandsecond && typeof this.step_brandsecond === 'object') {
                    switch(this.step_brandsecond.name) {
                        case 'Carbon Balls': return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                        case 'Chrome Balls': return {q: '/img/griptape/1.3.jpg', s: '/img/griptape/2.3.jpg'};
                        case 'Stainless Steel Balls': return {q: '/img/griptape/1.2.jpg', s: '/img/griptape/2.2.jpg'};
                        case 'White Cerami': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
                        case 'Black Ceramic Balls': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
                        case 'Titanium Balls': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
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
        created() {
            if (typeof this.step_brandsecond === 'string') {
                let brandsecond = this.brandseconds.find(s => s.name == this.step_brandsecond);
                this.step_brandsecond = brandsecond;
                this.brandsecondChange();
            }
            if (typeof this.step_packsecond === 'string') {
                let packsecond = this.packseconds.find(s => s.name == this.step_packsecond);
                this.step_packsecond = packsecond;
                this.packsecondChange();
            }   
        },
        mounted() {

            let value = '';
            // Listen change brandsecond
            $('#brandsecond').select2();
            $('#packsecond').select2();
            $('#brandsecond').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_brandsecond = this.brandseconds.find(s => s.name == value);
                this.brandsecondChange();
            });
            $('#packsecond').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_packsecond = this.packseconds.find(s => s.name == value);
                this.packsecondChange();
            });

            if(this.step_options.state){
                $('.upload-files-divsec').show();
            }
            else
                $('.upload-files-divsec').hide();
        }

    }
</script>