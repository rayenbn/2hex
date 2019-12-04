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
                            	placeholder="6000" 
                            	@change.prevent="quantityChange"
                                @keydown.enter.prevent="quantityChange"
                                step="10"
                                min="50"
                        	>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Quantity</h3>
                                The standard in professional skateboarding. Printing on back paper is the most common way to brand griptapes without directly printing on the griptapes top.
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
                                The standard in professional skateboarding. Printing on back paper is the most common way to brand griptapes without directly printing on the griptapes top.
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
        name: "heat-transfer-step-1",
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
                    {name: '8" x 23"', value: 29},
                    {name: '12" x 42"', value: 2.45},
                    {name: '14" x 48"', value: 39},
                    {name: '23" x 45"', value: 19},
                ],
            }
        },
        computed: {
            images() {
                if (this.step_size && typeof this.step_size === 'object') {
                    switch(this.step_size.name) {
                        case '9" x 33"': return {q: '/img/heat-transfer/1.1.jpg', s: '/img/heat-transfer/2.1.jpg'};
                        case '8" x 23"': return {q: '/img/heat-transfer/1.1.jpg', s: '/img/heat-transfer/2.3.jpg'};
                        case '12" x 42"': return {q: '/img/heat-transfer/1.1.jpg', s: '/img/heat-transfer/2.2.jpg'};
                        case '14" x 48"': return {q: '/iimg/heat-transfer/1.1.jpg', s: '/img/heat-transfer/2.4.jpg'};
                        case '23" x 45"': return {q: '/img/heat-transfer/1.1.jpg', s: '/img/heat-transfer/2.5.jpg'};
                        default: return {q: '/img/heat-transfer/1.1.jpg', s: '/img/heat-transfer/2.1.jpg'};
                    }
                }
                return {q: '/img/heat-transfer/1.1.jpg', s: '/img/heat-transfer/2.1.jpg'};
            }
        },
        methods: {
            quantityChange(){
                if(this.step_quantity % 10 != 0) {
                     swal({
                        title: "",
                        text: "Select Only quantities in steps of 10 (210, 220, ...)",
                        type: "warning",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    });
                    this.step_quantity = 6000;
                }
                this.$store.commit('HeatTransferConfigurator/setQuantity', this.step_quantity);
	            this.$emit('quantityChange', this.step_quantity);
	        },
	        sizeChange(event) {
                this.$store.commit('HeatTransferConfigurator/setSize', this.step_size);
                this.$emit('sizeChange', this.step_size);
            }
        }
    }
</script>

<style scoped>

</style>