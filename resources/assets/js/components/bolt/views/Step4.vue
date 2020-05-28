<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_4">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">phil_allen</h3>
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
                                            alt="phil_allen" 
                                            title="phil_allen"
                                        >
                                    </div>
                                </div>
                            </div>

                            <select
                                class="form-control m-select2"
                                id="phil_allen"
                                name="phil_allen"
                                style="width:100%;"
                                v-model="step_phil_allen"
                                @change.prevent="phil_allenChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="phil_allen" 
                                    v-for="(phil_allen, index) in phil_allens" 
                                    :key="index"
                                >
                                    {{ phil_allen.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>phil_allen</h3>
                                Skateboard griptapes are produced in batches of 200. Select the required quantity of your first style of grip tapes. The final griptape price depends on your griptape specifications as well as your total order quantity. With every batch or product you add, your previous batches get cheaper.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 allen-type">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">allen_types</h3>
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
                                            alt="allen_types" 
                                            title="allen_types"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="allen_type"
                                name="allen_type"
                                style="width:100%;"
                                v-model="step_allen_type"
                                @change.prevent="allen_typeChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="allen_type" 
                                    v-for="(allen_type, index) in allen_types" 
                                    :key="index"
                                >
                                    {{ allen_type.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>allen_types</h3>
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
		name: 'skateboard-decks-step-4',
        props: {
            phil_allen: {
                type: [Object, String],
                default: ""
            },
            allen_type: {
                type: [Object, String],
                default: ""
            }
        },
		data() {
			return {
				step_phil_allen: this.phil_allen,
				step_allen_type: this.allen_type,
                phil_allens: [
                    {name: 'Phillips', value: 0},
                    {name: 'Allen', value: 0}
                ],
                allen_types: [
                    {name: 'No L Key', value: 0},
                    {name: 'Add one L Key for each set', value: 0.21},
                ],
			}
		},
		methods: {
			phiAllenChange(){

                if(this.step_phil_allen.name == 'Allen')
                    $('.allen-type').show();
                else
                    $('.allen-type').hide();

                this.$store.commit('BoltConfigurator/setPhilAllen', this.step_phil_allen);
	            this.$emit('phiAllenChange', this.step_phil_allen);
	        },
	        allenTypeChange(event) {
                this.$store.commit('BoltConfigurator/setAllenType', this.step_allen_type);
	            this.$emit('allenTypeChange', this.step_allen_type);
	        },
		},
        computed: {
            images() {
                if (this.step_allen_type && typeof this.step_allen_type === 'object') {
                    switch(this.step_allen_type.name) {
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
            prev_material: {
                get() {
                    return this.$store.getters['BoltConfigurator/getBearingMaterial'];
                }
            }
        },
        watch: {
            prev_material: {
                handler (val){
                    if(val.name == 'White Ceramic Balls' || val.name == 'Black Ceramic Balls'){
                        this.step_phil_allen = {name: 'phil_allen7', value: 0.08};
                        this.phiAllenChange();
                    }
                },
                deep: true,
            }
        },
        created() {
            if (typeof this.step_allen_type === 'string') {
                let allen_type = this.allen_types.find(s => s.name == this.step_allen_type);
                this.step_allen_type = allen_type;
                this.allenTypeChange();
            }
            if (typeof this.step_phil_allen === 'string') {
                let phil_allen = this.phil_allens.find(s => s.name == this.step_phil_allen);
                this.step_phil_allen = phil_allen;
                this.phiAllenChange();
            }   
        },
        mounted() {

            let value = '';
            // Listen change allen_type
            $('#allen_type').select2();
            $('#phil_allen').select2();
            $('#allen_type').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_allen_type = this.allen_types.find(s => s.name == value);
                this.allenTypeChange();
            });
            $('#phil_allen').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_phil_allen = this.phil_allens.find(s => s.name == value);
                this.phiAllenChange();
            });

             if(this.step_phil_allen.name == 'Allen')
                $('.allen-type').show();
            else
                $('.allen-type').hide();
        }

    }
</script>