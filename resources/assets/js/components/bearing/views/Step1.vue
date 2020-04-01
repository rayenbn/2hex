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
                            <input 
                            	id="quantity_bearing" 
                            	v-model.number="step_quantity" 
                            	type="number" 
                            	class="form-control bootstrap-touchspin-vertical-btn" 
                            	name="quantity" 
                            	placeholder="200" 
                            	@change.prevent="quantityChange"
                                @keydown.enter.prevent="quantityChange"
                                step="200"
                                min="0"
                        	>

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
                type: [Number, String],
                default: 0
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

                materials: [
                    {name: 'Carbon Balls', value: 1},
                    {name: 'Chrome Balls', value: 2},
                    {name: 'Stainless Steel Balls', value: 3},
                    {name: 'White Cerami', value: 4},
                    {name: 'Black Ceramic Balls', value: 5},
                    {name: 'Titanium Balls', value: 6},
                ],
			}
		},
		methods: {
			quantityChange(){
                if(this.step_quantity % 200 != 0){
                     swal({
                        title: "",
                        text: "Select Only quantities in steps of 200 (200, 400, ...)",
                        type: "warning",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    });
                    this.step_quantity = 0;
                }
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
                        case 'Titanium Balls': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
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
        },
        mounted() {
            setTimeout(() => {
                let inputQuantity = document.getElementById("quantity_bearing");
                // Fire event plus/minus quantity
                document.getElementsByClassName("input-group-btn-vertical")[0].addEventListener("click", () => {
                    this.step_quantity = parseInt(inputQuantity.value);
                    this.quantityChange();
                });
            }, 2000);

            let value = '';
            // Listen change material
            $('#material').select2();
            $('#material').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_material = this.materials.find(s => s.name == value);
                this.materialChange();
            });
        }

    }
</script>