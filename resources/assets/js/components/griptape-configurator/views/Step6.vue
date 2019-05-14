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
                                    @click="() => {step_options.color = color; step_options.state = true;}"
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
                    <div class="m-portlet__head m-portlet__head--fit product-panel-header">
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
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget4">
                            <div class="m-widget19__pic m-portlet-fit--sides">
                                <img 
                                    id="productCanvas" 
                                    :src="step_options.color.image" 
                                    width="500"
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
                    state: this.options.state || false,
                    color: this.options.color || null,
                },
                colors: [
                    {name: 'black'     , value : 'black', image: 'https://dummyimage.com/500x400/000000/000000'},
                    {name: 'purple'    , value : '#800080', image: 'https://dummyimage.com/500x400/800080/000000'},
                    {name: 'dark blue' , value : '#00008B', image: 'https://dummyimage.com/500x400/00008b/000000'},
                    {name: 'light blue', value : '#87CEFA', image: 'https://dummyimage.com/500x400/87cefa/000000'},
                    {name: 'dark green', value : '#32CD32', image: 'https://dummyimage.com/500x400/32cd32/000000'}, // TODO what this color?
                    {name: 'green'     , value : 'green', image: 'https://dummyimage.com/500x400/008000/000000'},
                    {name: 'yellow'    , value : 'yellow', image: 'https://dummyimage.com/500x400/ffff00/000000'},
                    {name: 'orange'    , value : '#FFA500', image: 'https://dummyimage.com/500x400/ffa600/000000'},
                    {name: 'pink'      , value : '#FFC0CB', image: 'https://dummyimage.com/500x400/ffc0cb/000000'},
                    {name: 'red'       , value : 'red', image: 'https://dummyimage.com/500x400/ff0000/000000'},
                ]
            }
        },
        watch: {
            'step_options.state'(val){
                this.$emit('stateChange', val);
            },
            'step_options.color'(val){
                this.$emit('colorChange', val);
            }
        },
        created() {
            if (!this.step_options.state) {
                this.step_options.color = this.colors[0];
            }
        }
    }
</script>