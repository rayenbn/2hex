<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_5">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">No Die Cut</h3>
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
                                <h3>Blank Die Cut</h3>
                                Aenean a ex nec lacus mollis finibus. Vivamus vitae semper urna, sit amet scelerisque justo. Sed at lectus eu nunc accumsan interdum. Pellentesque vehicula nisl urna, ac auctor sem posuere non. Sed tincidunt erat sit amet lacus varius maximus.
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
                                <h3 class="m-portlet__head-text">Die Cut</h3>
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
                                        data-type-upload="diecut"
                                        class="custom-file-input"
                                        id="diecutPrintFile"
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
                                    id="step-5-recent" 
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

                                <div class="dropdown-menu" aria-labelledby="step-5-recent">
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
                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Custom Die Cut Design</h3>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam mattis, diam nec ultrices blandit, est nisi condimentum libero, eu consectetur enim odio nec quam. Proin vel euismod nibh. Nam tellus ante, rutrum eget massa et, feugiat auctor diam. Ut a nunc dolor. Aliquam erat volutpat. Praesent a ipsum iaculis tortor cursus aliquet vel ullamcorper ipsum. Pellentesque sit amet dictum leo.
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

    export default {
        name: 'skateboard-decks-step-5',
        mixins: [upload]
    }
</script>