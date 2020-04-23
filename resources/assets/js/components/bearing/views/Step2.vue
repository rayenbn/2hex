<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_2">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Abec</h3>
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
                                            alt="Abec" 
                                            title="Abec"
                                        >
                                    </div>
                                </div>
                            </div>

                            <select
                                class="form-control m-select2"
                                id="abec"
                                name="abec"
                                style="width:100%;"
                                v-model="step_abec"
                                @change.prevent="abecChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="abec" 
                                    v-for="(abec, index) in abecs" 
                                    v-if="abec.name =='Abec7' || (prev_material.name != 'White Ceramic Balls' && prev_material.name != 'Black Ceramic Balls')"
                                    :key="index"
                                >
                                    {{ abec.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Abec</h3>
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
                                <h3 class="m-portlet__head-text">Races</h3>
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
                                            alt="Races" 
                                            title="Races"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="race"
                                name="race"
                                style="width:100%;"
                                v-model="step_race"
                                @change.prevent="raceChange"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="race" 
                                    v-for="(race, index) in races" 
                                    :key="index"
                                >
                                    {{ race.name }}
                                </option>
                       
                            </select>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Races</h3>
                                Select the Bearing material of this batch. Griptape sizes are shown by "width x length". Dimensions are given in inches. Griptapes with a length of 720" are sold in rolls, all other griptapes are sold in stacked sheets.
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
		name: 'skateboard-decks-step-2',
        props: {
            abec: {
                type: [Object, String],
                default: ""
            },
            race: {
                type: [Object, String],
                default: ""
            }
        },
		data() {
			return {
				step_abec: this.abec,
				step_race: this.race,
                abecs: [
                    {name: 'Abec3', value: 0},
                    {name: 'Abec5', value: 0.04},
                    {name: 'Abec7', value: 0.08},
                    {name: 'Abec9', value: 0.32}
                ],
                races: [
                    {name: 'Silver Races', value: 0},
                    {name: 'Black Races', value: 0.21},
                    {name: 'Matte Gery Races', value: 0.43},
                    {name: 'Gold Races', value: 1.25},
                    {name: 'Rainbow Races', value: 2.79}
                ],
			}
		},
		methods: {
			abecChange(){
                this.$store.commit('BearingConfigurator/setAbec', this.step_abec);
	            this.$emit('abecChange', this.step_abec);
	        },
	        raceChange(event) {
                this.$store.commit('BearingConfigurator/setRace', this.step_race);
	            this.$emit('raceChange', this.step_race);
	        },
		},
        computed: {
            images() {
                if (this.step_race && typeof this.step_race === 'object') {
                    switch(this.step_race.name) {
                        case 'Carbon Balls': return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                        case 'Chrome Balls': return {q: '/img/griptape/1.3.jpg', s: '/img/griptape/2.3.jpg'};
                        case 'Stainless Steel Balls': return {q: '/img/griptape/1.2.jpg', s: '/img/griptape/2.2.jpg'};
                        case 'White Cerami': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
                        case 'Black Ceramic Balls': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
                        case 'Titanium Balls': return {q: '/img/griptape/1.4.jpg', s: '/img/griptape/2.4.jpg'};
                        default: return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
                    }
                }
                return {q: '/img/griptape/1.1.jpg', s: '/img/griptape/2.1.jpg'};
            },
            prev_material: {
                get() {
                    return this.$store.getters['BearingConfigurator/getBearingMaterial'];
                }
            }
        },
        watch: {
            prev_material: function(val){
                if(val.name == 'White Ceramic Balls' || val.name == 'Black Ceramic Balls')
                    this.step_abec = {name: 'Abec7', value: 0.08};
            }
        },
        created() {
            if (typeof this.step_race === 'string') {
                let race = this.races.find(s => s.name == this.step_race);
                this.step_race = race;
                this.raceChange();
            }
            if (typeof this.step_abec === 'string') {
                let abec = this.abecs.find(s => s.name == this.step_abec);
                this.step_abec = abec;
                this.abecChange();
            }   
        },
        mounted() {

            let value = '';
            // Listen change race
            $('#race').select2();
            $('#abec').select2();
            $('#race').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_race = this.races.find(s => s.name == value);
                this.raceChange();
            });
            $('#abec').on('select2:select', (e) => {
                value = e.params.data.text.trim();
                this.step_abec = this.abecs.find(s => s.name == value);
                this.abecChange();
            });
        }

    }
</script>