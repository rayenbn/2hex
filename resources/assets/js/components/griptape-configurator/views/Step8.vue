<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_8">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">No Backpaper Print</h3>
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
                                            src="/skateboard-deck-production/blank-skateboard-decks-manufacturer-2hex.jpg" 
                                            alt="" 
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Blank Backpaper Print</h3>
                                Duis in lobortis risus, vel auctor ex. Ut ac cursus massa. Maecenas ultricies ac quam ac tempus. Nunc ac ligula non sapien efficitur rutrum et eget lorem. In elementum mi eu diam cursus faucibus. Suspendisse efficitur tortor tincidunt, aliquam tellus ac, ullamcorper sem. Aenean in tellus in lorem venenatis porta ac ac quam. 
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
                                <h3 class="m-portlet__head-text">Backpaper Print</h3>
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
                                            src="/skateboard-deck-production/heat-transfer-print-skateboard-decks-manufacturer-2hex-com.jpg" 
                                            alt=""  
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
                                        data-type-upload="backpaper"
                                        class="custom-file-input"
                                        id="backpaperPrintFile"
                                        @click="step_options.state = true"
                                        @change.prevent="uploadFile"
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
                                    id="step-8-recent" 
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

                                <div class="dropdown-menu" aria-labelledby="step-8-recent">
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
                                <h3>Custom Backpaper Design</h3>
                                Nulla odio felis, vulputate in quam ac, sodales volutpat ipsum. Quisque in nisl urna. Vestibulum placerat tincidunt est ut posuere. Donec id diam lacinia, gravida odio nec, ultricies ante.
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
        name: 'skateboard-decks-step-8',
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
            step_color(val) {
                this.$emit('colorChange', val);
            }
        },
        created() {
            this.step_color = this.options.color;
        }
    }
</script>