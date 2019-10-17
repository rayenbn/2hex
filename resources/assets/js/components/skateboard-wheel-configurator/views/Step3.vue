<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_3">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__body step-img">
                    </div>
                    <div class="d-flex m-portlet__body" style="padding-bottom: 0;">
                        <div class="m-widget17 col-xl-4">
                            <input
                                disabled
                                type="text" 
                                class="form-control mt-2 mb-2" 
                                placeholder="" 
                                :value="hardness"
                            >
                        </div>
                        <div class="m-widget17 col-xl-8 hardness-rule">
                            <vue-slider 
                                v-model="hardness" 
                                :data="hardnessList"
                                @change="onChangeSlider"
                                ref="slider"
                                :processStyle="{ backgroundColor: 'inherit' }"
                                :railStyle="{backgroundColor: 'inherit'}"
                            >
                            </vue-slider>
                        </div>
                    </div>
                    <div class="d-flex m-portlet__body" style="padding-top: 0;">
                        <div class="m-widget17 col-xl-4">
                            <div class="shr">
                                <span class="text-uppercase">SHR</span>
                                <label class="switch">
                                    <input type="checkbox" name="srr" v-model="isSHR">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body row">
                        <div class="m-widget17 col-xl-6">
                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>SHR</h3>
                                SHR stands for super high rebound. Standard "HR" wheels are commonly used on beginner skateboards. SHR Super high rebound wheels are sold separatelly and mostly used by competitive skateboarders. 
                            </div>
                        </div>
                        <div class="m-widget17 col-xl-6">
                             <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Hardness</h3>
                                99A is the average hardness for skateboard wheels. 100A to 102A are often used for street or pool skateboarding. 83B and 84B are the hardest wheels and most flat spot resistant. Softer wheels are easier to ride, while harder wheels enable skateboarders to slide into the right position.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    import VueSlider from 'vue-slider-component'
    import 'vue-slider-component/theme/default.css'

    export default {
		name: 'skateboard-wheel-step-3',
        components: {
            VueSlider
        },
        data() {
            return {
            }
        },
        computed: {
            hardness: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getHardness'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeHardness', newVal);
                }
            },
            isSHR: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getSHR'];
                },
                set(newVal) {
                    if (this.$refs.slider.getIndex() >= 15 && newVal == false) {
                        newVal = true;
                    }

                    this.$store.commit('SkateboardWheelConfigurator/changeSHR', newVal);
                }
            },
            hardnessList() {
                return this.$store.state.SkateboardWheelConfigurator.hardnessList;
            }
        },
        methods: {
            onChangeSlider() {
                if (this.$refs.slider.getIndex() >= 15) {
                    this.isSHR = true;
                } else {
                    this.isSHR = false;
                }
            }
        }
    }
</script>
<style scoped>

@media (min-width: 1025px) {
    .m-portlet.m-portlet--full-height .m-portlet__body {
        height: auto;
    }
}

.shr {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    -webkit-box-pack: start;
    -ms-flex-pack: start;
    justify-content: flex-start;
    margin-top: 30px;
}

.shr span {
    padding-right: 30px;
}
.m-portlet.m-portlet--full-height .m-portlet__body.step-img {
    background-image: url(/img/Wheels/custom-skateboard-wheels-manufacturer-hardness-2hex-factory.jpg);
    background-size: cover;
    background-repeat: no-repeat;
    height: 370px;
    background-position: center;
}
#m_wizard_form_step_3 .hardness-rule {
    background-image: url(/img/Wheels/hardnessRule.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    height: 70px;
}

>>> .vue-slider.vue-slider-ltr {
    top: 34%;
    margin-left: 42px;
}
</style>