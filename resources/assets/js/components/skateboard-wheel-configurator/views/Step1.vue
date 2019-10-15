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
    export default {
		name: 'skateboard-wheel-step-1',
        data() {
            return {
                minPerBatch: 100
            }
        },
        computed: {
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