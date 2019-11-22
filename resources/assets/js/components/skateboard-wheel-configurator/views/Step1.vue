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
                                            :src="quantityImage"
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
                                step="100"
                                min="0"
                        	>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Quantity</h3>
                                Select the quantity of your first batch of skateboard wheels. The final price per set of wheels depends on your total order size. Add more batches of wheels or any other product and all the prices will decrease. You can always go to the summary page to see the price of each batch.
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
                                            :src="typeImage"
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
                                    {{ type.name }}
                                </option>
                            </select>

                            <template v-if="type">
                                <input
                                    v-for="(color, index) in type.count_colors"
                                    type="text" 
                                    class="form-control mt-2 mb-2" 
                                    placeholder="Enter Pantone Color" 
                                    v-model="type.colors[index]"
                                    @input="onChangeColor" 
                                >
                            </template>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Types</h3>
                                While white wheels are the standard in professional skateboarding, there are many other great options to customize your skateboard wheels! The minimum quantity depends on your selected style.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    const quantityImages = [
        '/img/Wheels/2hex-skateboard-wheels-quantity/200-skateboard-wheels-bulk-2hex-skateboard-factory.jpg',
        '/img/Wheels/2hex-skateboard-wheels-quantity/400-skateboard-wheels-bulk-2hex.jpg',
        '/img/Wheels/2hex-skateboard-wheels-quantity/skateboard-wheels-bulk-2hex-4000.jpg',
        '/img/Wheels/2hex-skateboard-wheels-quantity/1200-skateboard-wheels-bulk-2hex-skateboard-factory.jpg',
    ];

    const typeImages = [
        '/img/Wheels/skateboard-wheel-types/white-skateboard-wheels-2hex-skateboard-supplier.jpg',
        '/img/Wheels/skateboard-wheel-types/2hex-custom-color-code-skateboard-wheels.jpg',
        '/img/Wheels/skateboard-wheel-types/custom-dual-durometer-skateboard-wheels-by-2hex.jpg',
        '/img/Wheels/skateboard-wheel-types/custom-sandwich-skateboard-wheels-by-2hex.jpg',
        '/img/Wheels/skateboard-wheel-types/glow-in-the-dark-skateboard-wheels-manufacturer-2hex.jpg.jpg',
        '/img/Wheels/skateboard-wheel-types/dual-mixed-wheels-2hex-skateboard-factory.jpg',
        '/img/Wheels/skateboard-wheel-types/custom-mixed-color-skateboard-wheels-by-2hex.jpg.jpg',
        '/img/Wheels/skateboard-wheel-types/core-skateboard-wheels-manufacturer-2hex.jpg.jpg',
        '/img/Wheels/skateboard-wheel-types/tansparent-skateboard-wheels-factory.jpg',
    ];

    export default {
		name: 'skateboard-wheel-step-1',
        data() {
            return {
                minPerBatch: 100,
            }
        },
        computed: {
            quantityImage() {
                if (this.quantity <= 300) {
                    return quantityImages[0];

                } else if (this.quantity > 300 && this.quantity <= 900) {
                    return quantityImages[1];

                } else if (this.quantity > 900 && this.quantity <= 2000) {
                    return quantityImages[2];

                } else if (this.quantity > 2000) {
                    return quantityImages[3];
                }
            },
            typeImage() {
                if (! this.type) {
                    // Basic White
                    return typeImages[0];
                }

                //Basic White
                if (this.type.type_id == 1) {
                    return typeImages[0];
                
                // Urethane Color Code
                } else if (this.type.type_id == 2) {
                    return typeImages[1];
                
                // Dual Durometer
                } else if (this.type.type_id == 3) {
                    return typeImages[2];
                
                // Sandwich
                } else if (this.type.type_id == 4) {
                    return typeImages[3];
                
                // Glow in the Dark
                } else if (this.type.type_id == 5) {
                    return typeImages[4];
                
                // Dual Mixed Colors
                } else if (this.type.type_id == 6) {
                    return typeImages[5];

                // Dual Fully Mixed Colors
                } else if (this.type.type_id == 7) {
                    return typeImages[6];
                
                // Core
                } else if (this.type.type_id == 8) {
                    return typeImages[7];
            
                // Transparent
                } else if (this.type.type_id == 9) {
                    return typeImages[8];
                }
            },
            types() {
                return this.$store.getters['SkateboardWheelConfigurator/getTypes'];
            },
            quantity: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getQuantity'];
                },
                set: _.debounce(function (newVal) {
                    if (newVal == this.quantity) return;

                    // check Basic White type
                    if (this.type && this.type.name != this.types[0]['name']) {
                        this.minPerBatch = 300;
                    } else {
                        this.minPerBatch = 100;
                    }

                    if(newVal % 100 != 0 || newVal < this.minPerBatch){
                        this.showAlert();
                        newVal = 300;
                    }

                    this.$store.commit('SkateboardWheelConfigurator/changeQuantity', newVal);

                }, 1000)
            },
            type: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getType'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeType', newVal);

                    // check Basic White type
                    if (newVal.name != this.types[0]['name']) {
                        this.minPerBatch = 300;
                    } else {
                        this.minPerBatch = 100;
                    }

                    if(this.quantity % 100 != 0 || this.quantity < this.minPerBatch){
                        this.showAlert();
                        this.quantity = 300;
                    }
                }
            }
        },
		methods: {
            showAlert(message) {
                swal({
                    title: "",
                    text: 'Select Only quantities in steps of 100 (100, 200, ...). If Type ≠ Basic White, then minimum for batch is 300',
                    type: "warning",
                    confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                });
            },
            onChangeColor: _.debounce(function (e) {
                this.$store.commit('SkateboardWheelConfigurator/changeType', this.type);
            }, 1000)
		},
        mounted() {
            let queryType = $("#type");

            queryType.select2();

            // Listen change select with color types
            queryType.on('select2:select', (e) => {
                this.type = this.types[e.params.data.id];
            });

            let quantityField = document.getElementById('quantity_wheel');
            let queryQuanity = $("#quantity_wheel");

            queryQuanity.TouchSpin({
                min: 0,
                max: 1000000000,
                step: 100,
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