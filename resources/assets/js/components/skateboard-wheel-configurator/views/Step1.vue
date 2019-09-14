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
                                            class="step1-img1" 
                                            alt="Quantity" 
                                            title="Quantity"
                                        >
                                    </div>
                                </div>
                            </div>
                            <input 
                            	id="quantity_wheel" 
                            	v-model.number="quantity" 
                            	type="number" 
                            	class="form-control bootstrap-touchspin-vertical-btn" 
                            	name="quantity" 
                            	placeholder="200" 
                                step="200"
                                min="0"
                            	@change.prevent="validateQuantity"
                        	>
                                <!-- @keydown.enter.prevent="changeQuantity" -->

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
                                <h3 class="m-portlet__head-text">Types</h3>
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
                                            src=""
                                            class="step1-img1" 
                                            alt="Size" 
                                            title="Size"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="type"
                                name="type"
                                style="width:100%;"
                                v-model="type"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="index" 
                                    v-for="(type, index) in types" 
                                    :key="index"
                                >
                                    {{ type.title }}
                                </option>
                            </select>
                            
                            <template v-if="type">
                                <input
                                    v-for="(color, index) in type.colorsCount"
                                    type="text" 
                                    class="form-control mt-2 mb-2" 
                                    placeholder="Enter Pantone Color" 
                                    v-model="type.pantoneColors[index]"
                                    @input="onChangePantone" 
                                >
                            </template>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Types</h3>
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
    import TypeColor from '../Classes/TypeColor.js';

    export default {
		name: 'skateboard-wheel-step-1',
        props: {

        },
		data() {
			return {
                quantity: 0,
				type: null,
                types: [
                    new TypeColor('Basic White', 0),
                    new TypeColor('Urethane Color Code', 1, 0.25),
                    new TypeColor('Dual Durometer', 2, 1.25),
                    new TypeColor('Sandwich', 3, 1.35),
                    new TypeColor('Glow in the Dark', 1, 1.04),
                    new TypeColor('Dual Mixed Colors', 2, 0.95),
                    new TypeColor('Dual Fully Mixed Colors', 2, 0.93),
                    new TypeColor('Core', 2, 1.25),
                    new TypeColor('Transparent', 2, 0.23),
                ],
			}
		},
        watch: {
            quantity: _.debounce(function(newVal, oldVal){
                if (newVal % 200 != 0) {
                    this.quantity = 2000;
                }

                this.changeQuantity();
            }, 2000)
        },
		methods: {
            validateQuantity() {
                if(this.quantity % 200 != 0){
                     swal({
                        title: "",
                        text: "Select Only quantities in steps of 200 (200, 400, ...)",
                        type: "warning",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    });
                    this.quantity = 2000;
                }
            },

            changeQuantity: _.debounce(function (e) {
                this.$store.commit('SkateboardWheelConfigurator/changeQuantity', this.quantity);
            }, 2000),

            onChangePantone: _.debounce(function (e) {
                this.$store.commit('SkateboardWheelConfigurator/changeType', this.type);
            }, 2000)
		},
        computed: {
        },
        created() {
            this.quantity = this.$store.state.SkateboardWheelConfigurator.quantity;
            this.type = this.$store.state.SkateboardWheelConfigurator.type;
        },
        mounted() {

            let queryType = $("#type");

            queryType.select2({
                placeholder: "Select a type"
            });

            // Listen change select with color types
            queryType.on('select2:select', (e) => {
                this.type = this.types[e.params.data.id];
                this.$store.commit('SkateboardWheelConfigurator/changeType', this.type);
            });

            let quantityField = document.getElementById('quantity_wheel');
            let queryQuanity = $("#quantity_wheel");

            queryQuanity.TouchSpin({
                min: 0,
                max: 1000000000,
                step: 200,
                buttondown_class: 'btn btn-secondary',
                buttonup_class: 'btn btn-secondary',
                verticalbuttons: true,
                verticalupclass: 'la la-angle-up',
                verticaldownclass: 'la la-angle-down'
            });

            // Listen change quantity
            queryQuanity.on('touchspin.on.startspin', (e) => {
                this.quantity = parseInt(quantityField.value);
            });
        }
    }
</script>