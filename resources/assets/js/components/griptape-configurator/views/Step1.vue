<template>
	<div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Quantity</h3>
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
                            	id="quantity_grip" 
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
                                <h3 class="m-portlet__head-text">Size</h3>
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
                                            alt="Size" 
                                            title="Size"
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
                                <h3>Size</h3>
                                Select the griptape size of this batch. Griptape sizes are shown by "width x length". Dimensions are given in inches. Griptapes with a length of 720" are sold in rolls, all other griptapes are sold in stacked sheets.
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
            size: {
                type: [Object, String],
                default: ""
            }
        },
		data() {
			return {
				step_quantity: this.quantity,
				step_size: this.size,
                sizes: [
                    {name: '9" x 33"', value: 1.45},
                    {name: '9" x 720"', value: 29},
                    {name: '10" x 45"', value: 2.45},
                    {name: '11" x 720"', value: 39},
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
                this.$store.commit('gripTapeConfigurator/setQuantity', this.step_quantity);
	            this.$emit('quantityChange', this.step_quantity);
	        },
	        sizeChange(event) {
                this.$store.commit('gripTapeConfigurator/setSize', this.step_size);
	            this.$emit('sizeChange', this.step_size);
	        },
		},
        computed: {
            images() {
                if (this.step_size && typeof this.step_size === 'object') {
                    switch(this.step_size.name) {
                        case '9" x 33"': return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                        case '9" x 720"': return {q: '/img/griptape/1.3.jpg', s: '/img/griptape/2.3.jpg'};
                        case '10" x 45"': return {q: '/img/griptape/1.2.jpg', s: '/img/griptape/2.2.jpg'};
                        case '11" x 720"': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
                        default: return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                    }
                }
                return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
            }
        },
        created() {
            if (typeof this.step_size === 'string') {
                let size = this.sizes.find(s => s.name == this.step_size);
                this.step_size = size;
                this.sizeChange();
            }   
        },
        mounted() {
            setTimeout(() => {
                let inputQuantity = document.getElementById("quantity_grip");
                // Fire event plus/minus quantity
                document.getElementsByClassName("input-group-btn-vertical")[0].addEventListener("click", () => {
                    this.step_quantity = parseInt(inputQuantity.value);
                    this.quantityChange();
                });
            }, 2000);

            let value = '';
            // Listen change size
            $('#size').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_size = this.sizes.find(s => s.name == value);
                this.sizeChange();
            });
        }

    }
</script>