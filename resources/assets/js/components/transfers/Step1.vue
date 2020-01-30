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
                                v-validate="'required|digits'"
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
                            <div class="mb-4 m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div>
                                    <div
                                        class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides"
                                        style="min-height: 286px"
                                    >
                                        <img
                                            :src="size && size.image"
                                            class="step1-img1"
                                            alt="Size"
                                            title="Size"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                :disabled="! hasChange"
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
                                    :key="'size-' + index"
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
            return {
                sizeList: [
                    {
                        "fullname": "9\" x 33\" Transfer-paper on Skateboard Deck",
                        "size": 33,
                        "name": "Transfer-paper on Skateboard Deck",
                        "image": '/img/transfers/9x33-skateboard-deck-heat-transfers.jpg',
                        "percent": 100
                    },
                    {
                        "fullname": "8\" x 23\"  Transfer-paper on Mini Cruiser Deck",
                        "size": 23,
                        "name": "Transfer-paper on Mini Cruiser Deck",
                        "image": '/img/transfers/8x23-mini-cruiser-heat-transfers.jpg',
                        "percent": 100
                    },
                    {
                        "fullname": "12\" x 42\" Transfer-paper on  Longboard 1 Deck",
                        "size": 42,
                        "name": "Transfer-paper on  Longboard 1 Deck",
                        "image": '/img/transfers/12x42-longboard-deck-heat-transfers.jpg',
                        "percent": 140
                    },
                    {
                        "fullname": "14\" x 48\"  Transfer-paper on Longboard 2 Deck",
                        "size": 42,
                        "name": "Transfer-paper on Longboard 2 Deck",
                        "image": '/img/transfers/14x48-longboard-deck-heat-transfers.jpg',
                        "percent": 150
                    },
                    {
                        "fullname": "23\" x 45\"  Transfer-paper on Skimboard Deck",
                        "size": 45,
                        "name": "Transfer-paper on Skimboard Deck",
                        "image": '/img/transfers/Skimboard-Transferpapers.jpg',
                        "percent": 200
                    },
                ],
            }
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
            size: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getSize'];
                },
                set(newVal) {
                    this.$store.commit('TransfersConfigurator/setSize', newVal);
                }
            },
            hasChange() {
                return this.$store.getters['TransfersConfigurator/hasChange'];
            }
        },
        mounted() {
		    // init select2
            let querySize = $("#transfers_size");

            querySize.select2();

            // Listen change select with color types
            querySize.on('select2:select', (e) => {
                this.size = this.sizeList[e.params.data.id];
            });

            // Preselect 9" x 33"
            if (! this.size) {
                this.size = this.sizeList[0];
                querySize.val(0).trigger('change');
            }

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