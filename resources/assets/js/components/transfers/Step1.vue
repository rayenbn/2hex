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
                                            src="http://via.placeholder.com/640x360"
                                            class="step1-img1"
                                            alt="Quantity"
                                            title="Quantity"
                                        >
                                    </div>
                                </div>
                            </div>
                            <input
                            	id="transfers_quantity"
                            	type="number"
                            	class="form-control bootstrap-touchspin-vertical-btn"
                            	name="transfers_quantity"
                            	placeholder="10"
                                step="10"
                                min="50"
                                v-model="quantity"
                        	>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Quantity</h3>
                                The standard in professional skateboarding.
                                Printing on back paper is the most common way to brand griptapes without directly
                                printing on the griptapes top.
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
                                <h3 class="m-portlet__head-text">Sizes</h3>
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
                                            src="http://via.placeholder.com/640x360"
                                            class="step1-img1"
                                            alt="Size"
                                            title="Size"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="transfers_size"
                                name="transfers_size"
                                style="width:100%;"
                                v-model="size"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option
                                    :value="index"
                                    v-for="(size, index) in sizeList"
                                    :key="index"
                                >
                                    {{ size.fullname }}
                                </option>

                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Sizes</h3>
                                The standard in professional skateboarding.
                                Printing on back paper is the most common way to brand griptapes without directly
                                printing on the griptapes top.
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
		name: 'transfers-step-1',
        data() {
            return {}
        },
        computed: {
            quantity: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getQuantity'];
                },
                set: _.debounce(function (newVal) {
                    this.$store.commit('TransfersConfigurator/setQuantity', newVal);
                }, 1000)
            },
            sizeList() {
                return this.$store.state.TransfersConfigurator.sizeList;
            },
            size: {
                get() {
                    var storeSize = this.$store.getters['TransfersConfigurator/getSize'];

                    if (this.sizeList && !storeSize) {
                        // Preselect 9" x 33"
                        this.size = this.sizeList[0];
                        return 0;
                    }
                    return storeSize;
                },
                set(newVal) {
                    this.$store.commit('TransfersConfigurator/setSize', newVal);
                }
            },
        },
		methods: {},
        mounted() {
		    // init select2
            let queryType = $("#transfers_size");

            queryType.select2();

            // Listen change select with color types
            queryType.on('select2:select', (e) => {
                this.size = this.sizeList[e.params.data.id];
            });

            let queryQuanity = $("#transfers_quantity");

            queryQuanity.TouchSpin({
                min: 0,
                max: 1000000000,
                step: 10,
                buttondown_class: 'btn btn-secondary',
                buttonup_class: 'btn btn-secondary',
                verticalbuttons: true,
                verticalupclass: 'la la-angle-up',
                verticaldownclass: 'la la-angle-down'
            });

            // Listen change quantity
            queryQuanity.on('touchspin.on.startspin', (e) => {
                this.quantity = parseInt(queryQuanity.val());
            });
        }
    }
</script>