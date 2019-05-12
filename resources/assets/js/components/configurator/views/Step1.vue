<template>
	<div class="m-wizard__form-step m-wizard__form-step--current" id="m_wizard_form_step_1">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Batch Quantity</h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div>
                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
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
                            	v-model.number="quantity" 
                            	type="text" 
                            	class="form-control bootstrap-touchspin-vertical-btn" 
                            	name="quantity" 
                            	placeholder="30" 
                            	@change="quantityChange"
                        	>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Batch Quantity</h3>
                                Select the required quantity of your first
                                style of decks. Decks are packed and sold in
                                cartons of ten pieces. The final deck price
                                depends on your deck specifications as well as your
                                total order quantity of all batches together.
                                With every batch you add, your previous batched get cheaper as well.
                                You can always go to the summary page to see the price of each batch.
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
                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
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
                                v-model="size"
                                @change="sizeChange"
                            >
                                <option value="" disabled>SELECT</option>
                                <option v-for="(size, index) in sizes" :key="index">{{ size }}</option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Deck Size</h3>
                                Select the deck shape of this batch.
                                Shapes are shown by "Width x Length" as well
                                as "Wheelbase", "Nose" and "Tail". All dimensions
                                are given in inches.
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
		data() {
			return {
				quantity: 0,
				size: "",
				sizes: [
					'7.0" x 28" (A1: WB 11.73", N 6.06", T 6.0")',
					'7.25" x 29" (B1: WB13.5": N5.87", T5.47")',
					'7.375" x 30" (C1: WB12.81" : N6.81" , T6.18")',
					'7.5" x 30.75" (D1: WB14.02": N6.40", T6.16")',
					'7.5" x 31" (D2: WB14.02": N6.59", T6.20")',
					'7.5" x 31.25" (D3: WB14.02": N6.73", T6.34")',
					'7.5" x 31.5" (D4: WB14.02": N6.77", T6.54")',
					'7.625" x 31.125" (E1: WB14.02": N6.57", T6.38")',
					'7.625" x 31.25" (E2: WB14.02": N6.73", T6.34")',
					'7.625" x 31.5" (E3: WB14.02": N6.83", T6.44")',
					'7.75" x 31" (F1: WB 14.02", N 6.60", T 6.20")',
					'7.75" x 31.125" (F2: WB14.02": N6.73", T6.22")',
					'7.75" x 31.5" (F3: WB14.02": N6.85", T6.46")',
					'7.75" x 31.75" (F4: WB14.02": N6.93", T6.65")',
					'7.875" x 31.1875" (G1: WB14.02": N6.77", T6.22")',
					'7.875" x 31.3" (G2: WB14.02": N6.75", T6.36")',
					'7.875" x 31.625" (G3: WB 14.25", N 6.79", T 6.40")',
					'7.875" x 31.875" (G4: WB14.25": N6.93", T6.54")',
					'8.0" x 31" (H1: WB14.02": N6.59", T6.20")',
					'8.0" x 31.375" (H2: WB14.02": N6.87", T6.32")',
					'8.0" x 31.5" (H3: WB14.02": N6.93", T6.38")',
					'8.0" x 31.75" (H4: WB14.25": N6.81", T6.50")',
					'8.0" x 31.75" (H5: WB14.21" : N6.87", T6.47")',
					'8.0" x 31.875" (H6: WB14.25": N6.85", T6.61")',
					'8.0" x 32" (H7: WB14.02": N7.13", T6.65")',
					'8.125" x 31.5" (I1: WB14.02": N6.75" , T6.55")',
					'8.125" x 31.75" (I2: WB14.02": N6.97", T6.57")',
					'8.125" x 31.875" (I3: WB14.25" : N6.8" , T6.625")',
					'8.125" x 31.875" (I4: WB14.5": N6.85", T6.34")',
					'8.125" x 32" (I5: WB14.25" : N6.9375" , T6.61")',
					'8.25" x 31.625" (I6: WB14.25" : N6.75" , T6.425")',
					'8.25" x 31.75" (J1: WB14.5": N6.65", T6.42")',
					'8.25" x 32" (J2: WB14.25" : N7.0" , T6.55" )',
					'8.25" x 32.56" (J3: WB15": N6.89", T6.50")',
					'8.375" x 32.1875"  (K1: WB14.5": N7.01", T6.54")',
					'8.375" x 32.125" (K2: WB14.5": N6.89", T6.58")',
					'8.5" x 32" (L1: WB14.37": N6.95", T6.52")',
					'8.5" x 32.125" (L2: WB14.56": N6.81", T6.57")',
					'8.5" x 32.5" (L3: WB15": N6.79", T6.44")',
					'8.5" x 32.875" (L4: WB15.04": N6.97", T6.69")',
					'8.75" x 32.5" (M1: WB14.625" : N7.13", T6.55")',
				]
			}
		},
		methods: {
			quantityChange(){
                if(this.quantity % 10 != 0){
                     swal({
                        title: "",
                        text: "Select Only quantities in steps of 10 (10, 20, ...)",
                        type: "warning",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    }).then((value) => {
                    });
                    this.quantity = 0;
                    return;
                }

	            this.$emit('quantityChange', this.quantity)
	        },
	        sizeChange(event) {
	            this.$emit('sizeChange', this.size)
	        },
		}

    }
</script>