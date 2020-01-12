<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_2">
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
                                type="text"
                                class="form-control"
                                name="designName"
                                placeholder="Enter design name"
                                v-model="designName"
                            >
                            <div class="mt-4 mb-2">
                                <span>Transparencies</span>
                                <label class="switch">
                                    <input type="checkbox" name="transparencies" v-model="transparencies">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                            <select
                                class="form-control m-select2"
                                id="pantoneColor"
                                name="pantoneColor"
                                style="width:100%;"
                                v-model="pantoneColor"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option
                                    :value="item"
                                    v-for="(item, index) in pantoneColors"
                                    :key="index"
                                >
                                    {{ item.title }}
                                </option>
                            </select>

                            <template v-if="pantoneColor">
                                <input
                                    v-for="(count, index) in pantoneColor.countFields"
                                    type="text"
                                    class="form-control mt-2 mb-2"
                                    placeholder="Enter Pantone Color"
                                    v-model="pantoneColor.colors[index]"
                                >
                            </template>

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
                            >
                                <option value="null" disabled>SELECT</option>
                            </select>

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
        name: 'transfers-step-2',
        data() {
            return {
                pantoneColor: {
                    colors: []
                },
                pantoneColors: [
                    {
                        "title": "1 field to enter Pantone Color",
                        "countFields": 1,
                    },
                    {
                        "title": "2 field to enter Pantone Color",
                        "countFields": 2,
                    },
                    {
                        "title": "3 field to enter Pantone Color",
                        "countFields": 3,
                    },
                    {
                        "title": "4 field to enter Pantone Color",
                        "countFields": 4
                    },
                    {
                        "title": "5 field to enter Pantone Color",
                        "countFields": 5,
                    },
                    {
                        "title": "6 field to enter Pantone Color",
                        "countFields": 6,
                    },
                    {
                        "title": "7 field to enter Pantone Color",
                        "countFields": 7,
                    },
                    {
                        "title": "8 field to enter Pantone Color",
                        "countFields": 8,
                    },
                    {
                        "title": "No field to enter Pantone Color",
                        "countFields": 0,
                    }
                ]
            }
        },
        computed: {
            designName: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getDesignName'];
                },
                set: _.debounce(function (newVal) {
                    this.$store.commit('TransfersConfigurator/setDesignName', newVal);
                }, 1000)
            },
            transparencies: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getTransparencies'];
                },
                set: _.debounce(function (newVal) {
                    this.$store.commit('TransfersConfigurator/setTransparencies', newVal);
                }, 1000)
            },
        },
        mounted() {
            // init select2
            let queryPantoneColor = $("#pantoneColor");

            queryPantoneColor.select2();

            // Listen change select with color types
            queryPantoneColor.on('select2:select', (e) => {
                console.log(e);
                // this.pantoneColor = this.pantoneColors[e.params.data.id];
            });
        }
    }
</script>