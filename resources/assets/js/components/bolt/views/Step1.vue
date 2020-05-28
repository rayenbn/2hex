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
                            	id="quantity_bolt" 
                            	v-model.number="step_quantity" 
                            	type="number" 
                            	class="form-control bootstrap-touchspin-vertical-btn" 
                            	name="quantity" 
                            	placeholder="10" 
                            	@change.prevent="quantityChange"
                                @keydown.enter.prevent="quantityChange"
                                step="10"
                                min="500"
                        	>
                            <br>
                            <select
                                class="form-control m-select2 "
                                id="costset"
                                name="costset"
                                style="width:100%;"
                                v-model="step_costset"
                                @change.prevent="costSetChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="costset" 
                                    v-for="(costset, index) in costsets" 
                                    :key="index"
                                >
                                    {{ costset.name }}
                                </option>
                       
                            </select>

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
                                <h3 class="m-portlet__head-text">Color</h3>
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
                                            alt="Color" 
                                            title="Color"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="color"
                                name="color"
                                style="width:100%;"
                                v-model="step_color"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="index" 
                                    v-for="(color, index) in colors" 
                                    :key="index"
                                >
                                    {{ color.title }}
                                </option>
                       
                            </select>

                             <template v-if="step_color">
                                <div v-for="(count, index) in step_color.countFields" class="d-flex mt-2 mb-2 justify-content-between" >
                                    <select
                                        type="text"
                                        class="form-control col-md-6 color-types"
                                        v-model="step_color.colors[index]"
                                        :name="'color' + index"
                                        v-validate="'required'"
                                        @input="colorChange"
                                    >
                                        <option value="null" disabled>SELECT</option>
                                        <option value="Silver">Silver</option>
                                        <option value="Black">Black</option>
                                        <option value="Gold">Gold</option>
                                        <option value="Custom Color">Custom Color</option>
                                    </select>
                                    <input v-if="step_color.colors[index] == 'Custom Color'"
                                        class="form-control bootstrap-touchspin-vertical-btn col-md-5"
                                        v-model="step_color.customcolors[index]"
                                        placeholder="Enter Panthone Color"
                                    >
                                </div>
                            </template>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Color</h3>
                                Select the Bolt & Nuts color of this batch. Griptape sizes are shown by "width x length". Dimensions are given in inches. Griptapes with a length of 720" are sold in rolls, all other griptapes are sold in stacked sheets.
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
                default: ""
            },
            color: {
                type: [Object, String],
                default: ""
            },
            costset: {
                type: [Object, String],
                default: ""
            }
        },
		data() {
			return {
				step_quantity: this.quantity,
                step_color: this.color,
                step_costset: this.costset,
                quantities: [
                    {name: '625 Set', value: 625},
                    {name: '800 Set', value: 800},
                    {name: '1000 Set', value: 1000},
                    {name: '1200 Set', value: 1200},
                    {name: '1500 Set', value: 1500},
                    {name: '2000 Set', value: 2000},
                    {name: '2500 Set', value: 2500},
                    {name: '3000 Set', value: 3000},
                    {name: '4000 Set', value: 4000},
                    {name: '5000 Set', value: 5000},
                    {name: '8000 Set', value: 8000},
                    {name: '10000 Set', value: 10000}
                ],
                costsets: [
                    {name: 'Cost 8 pcs', value: 0},
                    {name: 'Cost 10 pcs', value: 0}
                ],
                colors: [
                    {
                        "title": "1 Color",
                        "countFields": 1,
                        "colors": new Array(1).fill(null),
                        "customcolors": new Array(1).fill(null),
                        "value": 90
                    },
                    {
                        "title": "2 Colors",
                        "countFields": 2,
                        "colors": new Array(2).fill(null),
                        "customcolors": new Array(2).fill(null),
                        "value": 180
                    },
                    {
                        "title": "3 Colors",
                        "countFields": 3,
                        "colors": new Array(3).fill(null),
                        "customcolors": new Array(3).fill(null),
                        "value": 270
                    },
                    {
                        "title": "4 Colors",
                        "countFields": 4,
                        "colors": new Array(4).fill(null),
                        "customcolors": new Array(4).fill(null),
                        "value": 360
                    }
                ]
			}
		},
		methods: {
			quantityChange(){
                if(this.step_quantity % 10 != 0){
                     swal({
                        title: "",
                        text: "Select Only quantities in steps of 10 (500, 510, 520, ...)",
                        type: "warning",
                        confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    });
                    this.step_quantity = 10000;
                }
                this.$store.commit('BoltConfigurator/setQuantity', this.step_quantity);
	            this.$emit('quantityChange', this.step_quantity);
	        },
            colorChange(event) {
                // debugger;
                // let save_color = this.step_color;
                this.$store.commit('BoltConfigurator/setColor', this.step_color);
	            this.$emit('colorChange', this.step_color);
	        },
            costSetChange(event) {
                this.$store.commit('BoltConfigurator/setCostSet', this.step_costset);
	            this.$emit('costSetChange', this.step_costset);
            }
		},
        computed: {
            images() {
                return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
            }
        },
        created() {
            
            if (typeof this.step_quantity === 'string') {
                let quantity = this.quantities.find(s => s.value == this.step_quantity);
                this.step_quantity = quantity;
                this.quantityChange();
            }   

            if (typeof this.step_costset === 'string') {
                let costset = this.costsets.find(s => s.value == this.step_costset);
                this.step_costset = costset;
                this.costSetChange();
            } 
        },
        mounted() {
            setTimeout(() => {
                let inputQuantity = document.getElementById("quantity_bolt");
                // Fire event plus/minus quantity
                document.getElementsByClassName("input-group-btn-vertical")[0].addEventListener("click", () => {
                   this.step_quantity = parseInt(inputQuantity.value);
                    this.quantityChange();
                });
            }, 2000);

            let value = '';
            
            

            $('#color').select2();
            let self = this;
            $('#color').on('select2:select', (e) => {
                this.step_color = this.colors[e.params.data.id];
                this.colorChange();
                // setTimeout(() => {
                //     $('.color-types').select2();
                //     $('.color-types').on('select2:select', (e) => {

                //         let index = e.target.name.replace('color','');
                //         let color_value = e.params.data.text.trim();
                //         this.step_color['colors'][index] = color_value;
                        
                //         this.colorChange();
                //     });
                // }, 200);
                
            });
            
            $('#costset').select2();
            $('#costset').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_costset = this.costsets.find(s => s.name == value);
                this.costSetChange();
            });

        }

    }
</script>