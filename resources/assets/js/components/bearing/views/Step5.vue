<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_5">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Spacers Material</h3>
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
                                            alt="Spacers Material" 
                                            title="Spacers Material"
                                        >
                                    </div>
                                </div>
                            </div>

                            <select
                                class="form-control m-select2"
                                id="spamaterial"
                                name="spamaterial"
                                style="width:100%;"
                                v-model="step_spamaterial"
                                @change.prevent="spamaterialChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="spamaterial" 
                                    v-for="(spamaterial, index) in spamaterials" 
                                    :key="index"
                                >
                                    {{ spamaterial.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Spacers Material</h3>
                                Skateboard griptapes are produced in batches of 200. Select the required quantity of your first style of grip tapes. The final griptape price depends on your griptape specifications as well as your total order quantity. With every batch or product you add, your previous batches get cheaper.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 spacolor-div">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Spacers Color</h3>
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
                                            alt="Spacers Color" 
                                            title="Spacers Color"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="spacolor"
                                name="spacolor"
                                style="width:100%;"
                                v-model="step_spacolor"
                                @change.prevent="spacolorChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="spacolor" 
                                    v-for="(spacolor, index) in spacolors" 
                                    :key="index"
                                >
                                    {{ spacolor.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Spacers Color</h3>
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
    export default {
		name: 'skateboard-decks-step-5',
        props: {
            spamaterial: {
                type: [Object, String],
                default: ""
            },
            spacolor: {
                type: [Object, String],
                default: ""
            }
        },
		data() {
			return {
				step_spamaterial: this.spamaterial,
				step_spacolor: this.spacolor,
                spamaterials: [
                    {name: 'No Spacers', value: 0},
                    {name: 'Carbon Spacers', value: 0.4},
                    {name: 'Stainless Steel Spacers', value: 0.59}
                ],
                spacolors: [
                    {name: 'Silver Spacers', value: 0},
                    {name: 'Black Spacers', value: 0.15}
                ],
			}
		},
		methods: {
			spamaterialChange(){
                this.$store.commit('BearingConfigurator/setSpamaterial', this.step_spamaterial);
	            this.$emit('spamaterialChange', this.step_spamaterial);
                if(this.step_spamaterial.name == 'No Spacers' || !this.step_spamaterial.name){
                    $('.spacolor-div').hide();
                } else {
                    $('.spacolor-div').show();
                }

	        },
	        spacolorChange(event) {
                this.$store.commit('BearingConfigurator/setSpacolor', this.step_spacolor);
	            this.$emit('spacolorChange', this.step_spacolor);
	        },
		},
        computed: {
            images() {
                if (this.step_spacolor && typeof this.step_spacolor === 'object') {
                    switch(this.step_spacolor.name) {
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
            }
        },
        created() {
            if (typeof this.step_spacolor === 'string') {
                let spacolor = this.spacolors.find(s => s.name == this.step_spacolor);
                this.step_spacolor = spacolor;
                this.spacolorChange();                
            }
            if (typeof this.step_spamaterial === 'string') {
                let spamaterial = this.spamaterials.find(s => s.name == this.step_spamaterial);
                this.step_spamaterial = spamaterial;
                this.spamaterialChange();
            }   
        },
        mounted() {

            let value = '';
            
            $('#spamaterial').select2();
            $('#spacolor').select2();
            $('#spamaterial').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_spamaterial = this.spamaterials.find(s => s.name == value);
                this.spamaterialChange();
            });
            $('#spacolor').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_spacolor = this.spacolors.find(s => s.name == value);
                this.spacolorChange();
            });
        }

    }
</script>