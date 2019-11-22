<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_3">
        <div class="row">
            <div class="col-xl-12">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__body step-img">
                    </div>
                    <div class="d-flex m-portlet__body mt-4" style="padding-bottom: 0;">
                        <div class="m-widget17 col-xl-12 hardness-rule">
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
                        <div class="m-widget17 col-xl-3">
                            <div class="shr mt-2 mb-2">
                                <span class="text-uppercase">SHR</span>
                                <label class="switch">
                                    <input type="checkbox" name="srr" v-model="isSHR">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                        <div class="m-widget17 col-xl-4">
                            <input
                                disabled
                                type="text" 
                                class="form-control mt-2 mb-2" 
                                placeholder="" 
                                :value="hardness"
                            >
                        </div>
                    </div>
                    <div class="m-portlet__body d-flex">
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
                    this.$store.commit('SkateboardWheelConfigurator/changeSHR', newVal);
                }
            },
            hardnessList() {
                return this.$store.state.SkateboardWheelConfigurator.hardnessList;
            },
            size() {
                return this.$store.getters['SkateboardWheelConfigurator/getSize'];
            },
        },
        watch: {
            hardness: _.debounce(function() {
                if (!this.size) {
                    return;
                }

                let meta = this.size.size.match(/\d{2}/);
                let hardnessMatch = this.hardness.match(/(\d{2})(\w){1}/);

                meta = parseInt(meta[0]);

                // wheels size =< 53mm, only enable 90A to 84B
                if (meta <= 53 && parseInt(hardnessMatch[1]) < 90 && hardnessMatch[2] == 'A') {
                    this.$refs.slider.setValue('90A');

                // wheels size 54 - 56mm, enable 85A to 84B
                } else if (meta > 53 && meta <= 56 && parseInt(hardnessMatch[1]) < 85 && hardnessMatch[2] == 'A') {
                    this.$refs.slider.setValue('85A');
                
                } 
                // wheels size >= 57mm, enable 78A to 84B
                // else if (meta > 56 && parseInt(hardnessMatch[1]) < 78 && hardnessMatch[2] == 'A') {
                //     this.$refs.slider.setValue('78A');
                // }

                this.$refs.slider.blur();
            }, 1000)
        },
        methods: {
            onChangeSlider() {

                // enable SHR if more or equals 102A SHR
                if (this.$refs.slider.getValue() === '102A') {
                    this.isSHR = true;
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
    background-image: url(/img/Wheels/rule.png);
    background-repeat: no-repeat;
    background-size: cover;
    height: 77px;
}

>>> .vue-slider.vue-slider-ltr {
    top: 34%;
    margin-left: 57px;
}
</style>