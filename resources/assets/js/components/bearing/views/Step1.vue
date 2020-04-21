<template>
	<div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Stacked Bearing</h3>
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
                                            alt="Quantity" 
                                            title="Quantity"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="quantity"
                                name="quantity"
                                style="width:100%;"
                                v-model="step_quantity"
                                @change.prevent="quantityChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="quantity" 
                                    v-for="(quantity, index) in quantities" 
                                    :key="index"
                                >
                                    {{ quantity.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Quantity</h3>
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
                                <h3 class="m-portlet__head-text">Material</h3>
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
                                            alt="Material" 
                                            title="Material"
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
                                <h3>Material</h3>
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
		name: 'skateboard-decks-step-1',
        props: {
            quantity: {
                type: [Object, String],
                default: ""
            },
            material: {
                type: [Object, String],
                default: ""
            }
        },
		data() {
			return {
				step_quantity: this.quantity,
				step_material: this.material,
                quantities: [
                    {name: '625 Set', value: 625},
                    {name: '800 Set', value: 800},
                    {name: '1000 Set', value: 1000},
                    {name: '1200 Set', value: 1200},
                    {name: '1500 Set', value: 1500},
                    {name: '2000 Set', value: 2000},
                    {name: '2500 Set', value: 2500},
                    {name: '3000 Set', value: 3000},
                    {name: '4000 Set', value: 4000},
                    {name: '5000 Set', value: 5000},
                    {name: '8000 Set', value: 8000},
                    {name: '10000 Set', value: 10000}
                ],
                materials: [
                    {name: 'Carbon Balls', value: 0.82},
                    {name: 'Chrome Balls', value: 1.11},
                    {name: 'Stainless Steel Balls', value: 2.57},
                    {name: 'White Cerami', value: 5.65},
                    {name: 'Black Ceramic Balls', value: 8.07},
                ],
			}
		},
		methods: {
			quantityChange(){
                this.$store.commit('BearingConfigurator/setQuantity', this.step_quantity);
	            this.$emit('quantityChange', this.step_quantity);
	        },
	        materialChange(event) {
                this.$store.commit('BearingConfigurator/setMaterial', this.step_material);
	            this.$emit('materialChange', this.step_material);
	        },
		},
        computed: {
            images() {
                if (this.step_material && typeof this.step_material === 'object') {
                    switch(this.step_material.name) {
                        case 'Carbon Balls': return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                        case 'Chrome Balls': return {q: '/img/griptape/1.3.jpg', s: '/img/griptape/2.3.jpg'};
                        case 'Stainless Steel Balls': return {q: '/img/griptape/1.2.jpg', s: '/img/griptape/2.2.jpg'};
                        case 'White Cerami': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
                        case 'Black Ceramic Balls': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
                        default: return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                    }
                }
                return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
            }
        },
        created() {
            if (typeof this.step_material === 'string') {
                let material = this.materials.find(s => s.name == this.step_material);
                this.step_material = material;
                this.materialChange();
            }
            if (typeof this.step_quantity === 'string') {
                let quantity = this.quantities.find(s => s.value == this.step_quantity);
                this.step_quantity = quantity;
                this.quantityChange();
            }   
        },
        mounted() {
            // setTimeout(() => {
            //     let inputQuantity = document.getElementById("quantity_bearing");
            //     // Fire event plus/minus quantity
            //     document.getElementsByClassName("input-group-btn-vertical")[0].addEventListener("click", () => {
            //         this.step_quantity = parseInt(inputQuantity.value);
            //         this.quantityChange();
            //     });
            // }, 2000);

            let value = '';
            // Listen change material
            $('#quantity').select2();
            $('#quantity').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_quantity = this.quantities.find(s => s.name == value);
                this.quantityChange();
            });
            $('#material').select2();
            $('#material').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_material = this.materials.find(s => s.name == value);
                this.materialChange();
            });
        }

    }
</script>