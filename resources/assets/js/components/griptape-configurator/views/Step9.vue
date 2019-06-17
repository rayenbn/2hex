<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_9">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Blank Carton</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li 
                                    class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" 
                                    m-dropdown-toggle="hover"
                                >
                                    <button
                                        @click="step_options.state = !step_options.state"    
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[!step_options.state ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                    >
                                        <i class="fa" :class="[!step_options.state ? 'fa-check' : 'fa-times']"></i>
                                    </button>
                                </li>
                            </ul>
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
                                            src="/img/griptape/8.1.jpg" 
                                            alt="Blank Carton" 
                                            title="Blank Carton" 
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Blank Carton</h3>
                                The standard for most skateboard productions. Most skateboard griptapes come in blank cartons to keep production costs low while not compromising on griptape quality. 
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
                                <h3 class="m-portlet__head-text">Carton Print</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                    <button
                                        @click="step_options.state = !step_options.state"    
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[step_options.state ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                    >
                                        <i class="fa" :class="[step_options.state ? 'fa-check' : 'fa-times']"></i>
                                    </button>
                                </li>
                            </ul>
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
                                            src="/img/griptape/8.2.jpg" 
                                            alt="Carton Print" 
                                            title="Carton Print" 
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <div></div>
                                <div class="custom-file">
                                    <input
                                        type="file"
                                        data-type-upload="carton"
                                        class="custom-file-input"
                                        id="step-9-upload"
                                        @click="step_options.state = true"
                                        @change.prevent="prepareFile"
                                    >
                                    <label 
                                        class="custom-file-label unchecked" 
                                        :class="{checked: step_options.state}" 
                                        for="customFile"
                                    >
                                        Upload artwork preview
                                    </label>
                                </div>


                            </div>
                            <div class="dropdown">
                                <button 
                                    class="btn btn-secondary dropdown-toggle" 
                                    type="button" 
                                    id="step-9-recent" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false" 
                                    style="width:100%;" 
                                    @click="step_options.state = true"
                                    :class="[step_options.state && step_options.file 
                                        ? 'checked' : 'unchecked'
                                    ]"
                                >
                                    {{ step_options.file ? step_options.file : 'Recent file' }}
                                </button>

                                <div class="dropdown-menu" aria-labelledby="step-9-recent">
                                    <a 
                                        v-for="file in files"
                                        class="dropdown-item file-dropdown"  
                                        href="javascript:void(0);" 
                                        @click="() => {step_options.file = file; step_options.state = true;}"
                                    >
                                        {{ file }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <color-btn 
                                :color="step_color"
                                labelledby="step-8-colors" 
                                @colorChange="(val) => step_color = val"
                            >
                                <template slot="btn">
                                    <button
                                        id="step-8-colors" 
                                        class="btn btn-secondary dropdown-toggle" 
                                        type="button" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false" 
                                        style="width:100%;" 
                                        @click="step_options.state = true"
                                        :class="[step_options.state && step_color ? 'checked' : 'unchecked']"
                                    >
                                        {{ step_color ? step_color : 'How many colors are in your design?' }}
                                    </button>
                                </template>
                            </color-btn>
                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Carton Print</h3>
                                Adding a custom print to your griptape cartons is the best way to communicate your brand image and product specifications to skateboard distributors and skate shops. Adding a professional carton print is the cherry on top of the cream, it is what sets the best brands apart from the rest.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import upload from '../mixins/uploadFile';
    import ColorBtn from './ColorBtn';
    
    export default {
        name: 'skateboard-decks-step-9',
        mixins: [upload],
        components: {
            ColorBtn
        },
        data() {
            return {
                step_color: null
            }
        },
        watch: {
            step_color: _.debounce(function(val){
                this.$emit('colorChange', val);
            }, 300)
        },
        created() {
            this.step_color = this.options.color;
        }
    }
</script>