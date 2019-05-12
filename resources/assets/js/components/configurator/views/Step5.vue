<template>
	<div class="m-wizard__form-step" id="m_wizard_form_step_5">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Bottom Print</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                    <button
                                        @click="status = !status"    
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[status ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                    >
                                        <i class="fa" :class="[status ? 'fa-check' : 'fa-times']"></i>
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
                                        data-type-upload="bottom"
                                        class="custom-file-input"
                                        id="bottomPrintFile"
                                        @click="status = true"
                                        @change.prevent="uploadFile"
                                    >
                                    <label 
                                        class="custom-file-label unchecked" 
                                        :class="{checked: status}" 
                                        for="customFile"
                                    >
                                        Upload artwork preview
                                    </label>
                                </div>


                            </div>
                            <div class="dropdown">
                                <button 
                                    class="btn btn-secondary dropdown-toggle unchecked" 
                                    type="button" 
                                    id="dropdownMenuButton" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false" 
                                    style="width:100%;" 
                                    :class="{checked: status}" 
                                    @click="status = true"
                                >
                                    Recent file
                                </button>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a 
                                        v-for="file in files"
                                        class="dropdown-item file-dropdown"  
                                        href="javascript:void(0);" 
                                        @click="status = true"
                                    >
                                        {{ file }}
                                    </a>
                                </div>
                            </div>
                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Custom Bottom Design</h3>
                                Submit your artwork in 9" x 33" at 300 dpi or as a vector image. For images of up to 4 colors, please give each color layer its Pantone code.
                                Photos or artworks of ≥5 colors are printed in CMYK.<br>
                                <br>
                                Optionally you can upload a preview of your artwork and send the full size file by email before the production.<br>

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
                                <h3 class="m-portlet__head-text"> Blank Bottom</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li 
                                    class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" 
                                    m-dropdown-toggle="hover"
                                >
                                    <button
                                        @click="status = !status"    
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[!status ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                    >
                                        <i class="fa" :class="[!status ? 'fa-check' : 'fa-times']"></i>
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
                                <h3>Blank Bottom</h3>
                                Blank decks are commonly sold to print shops, artists or skateshops that need a reason to sell the same pro quality at a cheaper price.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import upload from '@/mixins/uploadFile';

    export default {
        name: 'skateboard-decks-step-5',
        mixins: [upload],
        props: {
            state: {
                type: Boolean,
                default: false
            },
            files: {
                type: Array,
                default: () => []
            }
        },
        data() {
            return {
                status: this.state
            }
        },
        watch: {
            status(val){
                this.$emit('stateChange', val);
            }
        }
    }
</script>