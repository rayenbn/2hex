<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_6">
        <div class="row">
            <div class="col-xl-4">
                <div class="m-portlet m-portlet--bordered-semi configurator-color-panel">
                    <div class="m-portlet__body">
                        <div class="m-widget4">
                            <div 
                                class="btn btn-secondary dropdown-toggle skate-color-dropdown-menu"  
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false"
                            >
                                <label>1. {{ step_options.color.name }}</label>
                                <button 
                                    class="btn m-btn btn-configurator-drop-btn" 
                                    :style="{background: step_options.color.value}"
                                />
                            </div>
                            <div 
                                class="dropdown-menu" 
                                aria-labelledby="dropdownMenu2" 
                            >
                                <div
                                    v-for="(color, index) in colors"
                                    class="color-dropdown-item"
                                    :data-part-id="index"
                                    :data-color-name="color.name"
                                    @click="() => {step_options.color = color;}"
                                >
                                    <label>{{ color.name }}</label>
                                    <button 
                                        class="btn m-btn btn-configurator-drop-btn" 
                                        :style="{background: color.value}"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <div class="m-portlet m-portlet--bordered-semi product-panel ">
                    <!-- <div class="m-portlet__head m-portlet__head--fit product-panel-header">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-action" >
                                <a
                                    @click="step_options.state = !step_options.state"
                                    class="btn m-btn m-btn--icon m-btn--icon-only m-btn--custom m-btn--pill"
                                    :class="[step_options.state ? 'btn-success' : 'btn-secondary']"
                                >
                                    <i class="fa" :class="[step_options.state ? 'fa-check' : 'fa-times']"></i>
                                </a>
                            </div>
                        </div>
                    </div> -->
                    <div class="m-portlet__body">
                        <div class="m-widget4">
                            <div class="m-widget19__pic m-portlet-fit--sides">
                                <img 
                                    id="productCanvas" 
                                    width="500"
                                    :src="step_options.color.image" 
                                    :title="step_options.color.name" 
                                    :alt="step_options.color.name" 
                                >
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
        name: 'skateboard-decks-step-6',
        props: {
            options: {
                type: Object,
                default: false
            },
        },
        data() {
            return {
                step_options: {
                    color: this.options.color || null,
                },
                colors: [
                    {name: 'black'     , value : 'black',   image: '/img/griptape/colors/Color-Grips---Black.jpg'},
                    {name: 'purple'    , value : '#800080', image: '/img/griptape/colors/Color-Grips---Purple.jpg'},
                    {name: 'dark blue' , value : '#00008B', image: '/img/griptape/colors/Color-Grips---Dark-Blue.jpg'},
                    {name: 'light blue', value : '#87CEFA', image: '/img/griptape/colors/Color-Grips---Light-Blue.jpg'},
                    {name: 'dark green', value : '#32CD32', image: '/img/griptape/colors/Color-Grips---Dark-Green.jpg'},
                    {name: 'green'     , value : 'green',   image: '/img/griptape/colors/Color-Grips---Green.jpg'},
                    {name: 'yellow'    , value : 'yellow',  image: '/img/griptape/colors/Color-Grips---Yellow.jpg'},
                    {name: 'orange'    , value : '#FFA500', image: '/img/griptape/colors/Color-Grips---Orange.jpg'},
                    {name: 'pink'      , value : '#FFC0CB', image: '/img/griptape/colors/Color-Grips---Pink.jpg'},
                    {name: 'red'       , value : 'red',     image: '/img/griptape/colors/Color-Grips---Red.jpg'},
                ]
            }
        },
        watch: {
            'step_options.color'(val){
                this.$emit('colorChange', val);
            }
        },
        created() {
            if (!this.step_options.color) {
                this.step_options.color = this.colors[0]; // black color
            }
            if (typeof this.step_options.color === 'string') {
                let color = this.colors.find(c => c.name == this.step_options.color);
                if (color) {
                    this.step_options.color = color;
                }
            }
        }
    }
</script>