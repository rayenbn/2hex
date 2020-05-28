<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_6">
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
                                id="packfirst"
                                name="packfirst"
                                style="width:100%;"
                                v-model="step_packfirst"
                                @change.prevent="packfirstChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="packfirst" 
                                    v-for="(packfirst, index) in packfirsts" 
                                    v-if="packfirst.name != 'Custom Cardboard Box' || prev_quantity >= 1000"
                                    :key="index"
                                >
                                    {{ packfirst.name }}
                                </option>
                       
                            </select>


                            <div class="form-group m-form__group upload-cardbox-div">
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        data-type-upload="packfirst"
                                        class="custom-file-input"
                                        data-step="packfirst"
                                        id="step-6-upload"
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
                            <div class="progress mb-3 upload-cardbox-div" style="height: 2px;">
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
                            <div class="dropdown upload-cardbox-div">
                                <button 
                                    class="btn btn-secondary dropdown-toggle" 
                                    type="button" 
                                    id="step-6-recent" 
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
                                id="brandfirst"
                                name="brandfirst"
                                style="width:100%;"
                                v-model="step_brandfirst"
                                @change.prevent="brandfirstChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="brandfirst" 
                                    v-for="(brandfirst, index) in brandfirsts" 
                                    :key="index"
                                >
                                    {{ brandfirst.name }}
                                </option>
                       
                            </select>

                            <div class="form-group m-form__group upload-files-div">
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        data-type-upload="brandfirst"
                                        class="custom-file-input"
                                        data-step="brandfirst"
                                        id="step-6-1-upload"
                                        @click="step_options2.state = true"
                                        @change.prevent="prepareFile2"
                                    >
                                    <label 
                                        class="custom-file-label unchecked" 
                                        :class="{checked: step_options2.state}" 
                                        for="customFile"
                                    >
                                        Choose file
                                    </label>
                                </div>
                            </div>
                            <div class="progress mb-3 upload-files-div" style="height: 2px;">
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
                            <div class="dropdown upload-files-div">
                                <button 
                                    class="btn btn-secondary dropdown-toggle" 
                                    type="button" 
                                    id="step-6-1-recent" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false" 
                                    style="width:100%;" 
                                    :class="[step_options2.state && step_options2.file 
                                        ? 'checked' : 'unchecked'
                                    ]" 
                                    @click="step_options2.state = true"
                                >
                                    {{ step_options2.file ? step_options2.file : 'Recent file' }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="step-4-recent">
                                    <a 
                                        v-for="file in files"
                                        class="dropdown-item file-dropdown" 
                                        @click="() => {step_options2.file = file['name']; step_options2.state = true; step_options2.selectpaid = file['paid']; step_options2.dropdisable = file['is_disable']; }"
                                        href="#"
                                    >
                                        <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
                                    </a>
                                </div>
                            </div>

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
    import upload from '../mixins/uploadFile2';
    import ColorBtn from './ColorBtn';
    import BtnFileUpload from '@/components/BtnFileUpload';
    export default {
		name: 'skateboard-decks-step-6',
        mixins: [upload],
        props: {
            packfirst: {
                type: [Object, String],
                default: ""
            },
            brandfirst: {
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
				step_packfirst: this.packfirst,
				step_brandfirst: this.brandfirst,
                packfirsts: [
                    {name: 'Transparent Softplastic Tube', value: 0},
                    {name: 'Transparent Hardplastic Case', value: 0.35},
                    {name: 'Silver Round Tin closed', value: 0.48},
                    {name: 'Black Round Tin closed', value: 0.68},
                    {name: 'Silver Round Tin with window', value: 0.58},
                    {name: 'Black Round Tin with window', value: 0.79},
                    {name: 'Silver Square Tin closed', value: 0.48},
                    {name: 'Black Square Tin closed', value: 0.68},
                    {name: 'Silver Square Tin with small window', value: 0.58},
                    {name: 'Black Square Tin with small window', value: 0.79},
                    {name: 'Silver Square Tin with full window', value: 0.58},
                    {name: 'Black Square Tin with full window', value: 0.79},
                    {name: 'Custom Cardboard Box', value: 0.68},
                ],
                brandfirsts: [
                    {name: 'No sticker', value: 0},
                    {name: 'Sticker on one side of packaging', value: 0.06},
                    {name: 'Sticker on two sides of packaging', value: 0.12},
                    {name: 'Sticker on three sides of packaging', value: 0.18},
                    {name: 'Sticker folded around packaging', value: 0.08},
                    {name: 'Sticker inside packaging', value: 0.06}
                ]
			}
		},
		methods: {
			packfirstChange(){

                let value = $('#packfirst').val();
                if(this.step_packfirst && typeof this.step_packfirst === 'object') {
                    switch(this.step_packfirst.name) {
                        case 'Custom Cardboard Box': this.step_options.state = true; break;
                        default: this.step_options.state = false; break;
                    }
                }
                if(this.step_options.state){
                    $('.upload-cardbox-div').show();
                }
                else
                    $('.upload-cardbox-div').hide();

                    
                this.$store.commit('BearingConfigurator/setPackfirst', this.step_packfirst);
	            this.$emit('packfirstChange', this.step_packfirst);


	        },
	        brandfirstChange(event) {

                let value = $('#brandfirst').val();
                if(this.step_brandfirst && typeof this.step_brandfirst === 'object') {
                    switch(this.step_brandfirst.name) {
                        case 'No sticker': this.step_options2.state = false; break;
                        default: this.step_options2.state = true; break;
                    }
                }
                if(this.step_options2.state){
                    $('.upload-files-div').show();
                }
                else
                    $('.upload-files-div').hide();

                
                this.$store.commit('BearingConfigurator/setBrandfirst', this.step_brandfirst);
	            this.$emit('brandfirstChange', this.step_brandfirst);
	        },
		},
        computed: {
            images() {
                if (this.step_brandfirst && typeof this.step_brandfirst === 'object') {
                    switch(this.step_brandfirst.name) {
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
            if (typeof this.step_brandfirst === 'string') {
                let brandfirst = this.brandfirsts.find(s => s.name == this.step_brandfirst);
                this.step_brandfirst = brandfirst;
                this.brandfirstChange();
            }
            if (typeof this.step_packfirst === 'string') {
                let packfirst = this.packfirsts.find(s => s.name == this.step_packfirst);
                this.step_packfirst = packfirst;
                this.packfirstChange();
            }   
        },
        mounted() {

            let value = '';
            // Listen change brandfirst
            $('#brandfirst').select2();
            $('#packfirst').select2();
            $('#brandfirst').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_brandfirst = this.brandfirsts.find(s => s.name == value);
                this.brandfirstChange();
            });
            $('#packfirst').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_packfirst = this.packfirsts.find(s => s.name == value);
                this.packfirstChange();
            });

            if(this.step_options.state){
                $('.upload-cardbox-div').show();
            }
            else
                $('.upload-cardbox-div').hide();
            if(this.step_options2.state){
                $('.upload-files-div').show();
            }
            else
                $('.upload-files-div').hide();
        }

    }
</script>