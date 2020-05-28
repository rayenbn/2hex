<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_2">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light   m-portlet--rounded-force d-flex justify-content-between">
                    <div class="col-md-2"> 
                        <div v-for="index in 10" class="mt-2 mb-2" v-bind:style="(index > 8 && prev_costset.name == 'Cost 8 pcs') ? 'display: none' : ''">
                            <select
                                type="text"
                                class="form-control color-types mt-2 mb-2"
                                :name="'color' + index"
                                style="width: 100%; margin-top: 20px; margin-bottom: 20px;"
                                v-model="step_allocation[index - 1]"
                                v-validate="'required'"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option value="Silver">Silver</option>
                                <option value="Black">Black</option>
                                <option value="Gold">Gold</option>
                                <option value="Custom Color">Custom Color</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-7 d-flex align-items-center">
                        <img 
                            :src="images.q" 
                            class="step2-img1 w-100" 
                            alt="Color" 
                            title="Color"
                        >
                    </div>
                    <div class="col-md-2">
                        <div v-for="index in 10" class="mt-2 mb-2" v-bind:style="(index > 8 && prev_costset.name == 'Cost 8 pcs') ? 'display: none' : ''">
                            <select
                                type="text"
                                class="form-control color-types mt-2 mb-2"
                                :name="'color' + (index+10)"
                                style="width: 100%; margin-top: 20px; margin-bottom: 20px;"
                                v-model="step_allocation[index+10 - 1]"
                                
                                v-validate="'required'"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option value="Silver">Silver</option>
                                <option value="Black">Black</option>
                                <option value="Gold">Gold</option>
                                <option value="Custom Color">Custom Color</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
		name: 'skateboard-decks-step-2',
        props: {
            allocation: {
                type: Array,
                default: []
            }
        },
		data() {
			return {
                step_allocation: this.allocation
			}
		},
		methods: {
            allocationChange(event) {
	            this.$emit('allocationChange', this.step_allocation);
	        },
		},
        computed: {
            images() {
                return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
            },
            prev_costset: {
                get() {
                    return this.$store.getters['BoltConfigurator/getCostSet'];
                }
            }
        },
        watch: {
            prev_material: {
                handler (val){
                },
                deep: true,
            }
        },
        created() {
           
        },
        mounted() {

            let value = '';
            
            $('.color-types').select2();
            $('.color-types').on('select2:select', (e) => {
                let index = e.currentTarget.name.replace('color','') - 1;
                this.step_allocation[index] = e.params.data.text.trim();
                this.allocationChange();
            });
        }

    }
</script>