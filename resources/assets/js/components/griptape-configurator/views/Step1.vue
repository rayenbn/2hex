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
                                        	src="/skateboard-deck-production/stacked-skateboard-decks-factory-2hex.jpg" 
                                        	alt="" 
                                        	class="step1-img1"
                                    	>
                                    </div>
                                </div>
                            </div>
                            <input 
                            	id="quantity" 
                            	v-model.number="step_quantity" 
                            	type="number" 
                            	class="form-control bootstrap-touchspin-vertical-btn" 
                            	name="quantity" 
                            	placeholder="30" 
                            	@change.prevent="quantityChange"
                                step="200"
                                min="0"
                        	>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Quantity</h3>
                                Quisque hendrerit sapien nisl, in placerat leo tempor vel. In sagittis laoreet venenatis. Nulla interdum dui et sem malesuada, at dictum metus sagittis. Aliquam erat volutpat. Duis accumsan dictum lorem, ac cursus nunc vulputate id. Suspendisse potenti. Nulla mattis posuere nisl. Duis iaculis varius vehicula.
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
                                        	src="/skateboard-deck-production/width-skateboard-decks-manufacturer-2hex.jpg" 
                                        	alt="" 
                                        	class="step1-img1"
                                    	>
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control"
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
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dignissim nisl venenatis, sodales velit non, bibendum dui. Suspendisse sit amet dolor ut ante blandit ullamcorper. Aliquam et ante odio. Praesent a augue non lectus pharetra molestie et at turpis. Vestibulum auctor ipsum eu velit ultrices, a dapibus odio feugiat. Phasellus gravida mollis nunc, quis rutrum magna aliquam et. Sed porttitor sollicitudin ante.
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
	            this.$emit('quantityChange', this.step_quantity);
	        },
	        sizeChange(event) {
                this.$store.commit('griptapeConfigurator/setSize', this.step_size);
	            this.$emit('sizeChange', this.step_size);
	        },
		},
        created() {
            if (typeof this.step_size === 'string') {
                let size = this.sizes.find(s => s.name == this.step_size);
                this.step_size = size;
                this.sizeChange();
            }   
        }

    }
</script>