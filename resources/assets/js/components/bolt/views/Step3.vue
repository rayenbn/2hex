<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_3">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">material</h3>
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
                                            alt="material" 
                                            title="material"
                                        >
                                    </div>
                                </div>
                            </div>

                            <select
                                class="form-control m-select2"
                                id="material"
                                name="material"
                                style="width:100%;"
                                v-model="step_material"
                                @change.prevent="materialChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="material" 
                                    v-for="(material, index) in materials" 
                                    :key="index"
                                >
                                    {{ material.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>material</h3>
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
                                <h3 class="m-portlet__head-text">sizes</h3>
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
                                            alt="sizes" 
                                            title="sizes"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="size"
                                name="size"
                                style="width:100%;"
                                v-model="step_size"
                                @change.prevent="sizeChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="size" 
                                    v-for="(size, index) in sizes" 
                                    :key="index"
                                >
                                    {{ size.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>sizes</h3>
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
		name: 'skateboard-decks-step-3',
        props: {
            material: {
                type: [Object, String],
                default: ""
            },
            size: {
                type: [Object, String],
                default: ""
            },
            
        },
		data() {
			return {
				step_material: this.material,
				step_size: this.size,
                materials: [
                    {name: '22mm', value: 0},
                    {name: '23mm', value: 0},
                    {name: '24mm', value: 0},
                    {name: '25mm', value: 0},
                    {name: '26mm', value: 0},
                    {name: '28mm', value: 0},
                    {name: '30mm', value: 0},
                    {name: '35mm', value: 0}

                ],
                sizes: [
                    {name: 'Ordinary carbon steel', value: 0},
                    {name: 'Extra hard carbon steel', value: 0},
                ],
			}
		},
		methods: {
			materialChange(){
                this.$store.commit('BoltConfigurator/setMaterial', this.step_material);
	            this.$emit('materialChange', this.step_material);
	        },
	        sizeChange(event) {
                this.$store.commit('BoltConfigurator/setSize', this.step_size);
	            this.$emit('sizeChange', this.step_size);
	        },
		},
        computed: {
            images() {
                if (this.step_size && typeof this.step_size === 'object') {
                    switch(this.step_size.name) {
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
                        this.step_material = {name: 'material7', value: 0.08};
                        this.materialChange();
                    }
                },
                deep: true,
            }
        },
        created() {
            if (typeof this.step_size === 'string') {
                let size = this.sizes.find(s => s.name == this.step_size);
                this.step_size = size;
                this.sizeChange();
            }
            if (typeof this.step_material === 'string') {
                let material = this.materials.find(s => s.name == this.step_material);
                this.step_material = material;
                this.materialChange();
            }   
        },
        mounted() {

            let value = '';
            // Listen change size
            $('#size').select2();
            $('#material').select2();
            $('#size').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_size = this.sizes.find(s => s.name == value);
                this.sizeChange();
            });
            $('#material').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_material = this.materials.find(s => s.name == value);
                this.materialChange();
            });
        }

    }
</script>