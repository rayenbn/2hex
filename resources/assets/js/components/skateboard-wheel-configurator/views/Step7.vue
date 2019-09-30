<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_7">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Print on Cardboard</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                    <button
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[isPrintCardboard ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                        @click="isPrintCardboard = !isPrintCardboard"
                                    >
                                        <i class="fa" :class="[isPrintCardboard ? 'fa-check' : 'fa-times']"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div >
                                    <div 
                                        class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" 
                                        style="min-height: 286px"
                                    >
                                        <img 
                                            src="/img/griptape/custom-griptape-print-2hex-skateboard-manufacturer.jpg" 
                                            alt="Top Print on Griptape" 
                                            title="Top Print on Griptape"  
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
                                        data-type-upload="cardboard"
                                        class="custom-file-input"
                                        data-step="cardboard"
                                        id="step-7-upload"
                                        @click="isPrintCardboard = true"
                                        @change.prevent="uploadFile($event, 7)"
                                    >
                                    <label 
                                        class="custom-file-label unchecked" 
                                        :class="{checked: isPrintCardboard}" 
                                        for="customFile"
                                    >
                                        Choose file
                                    </label>
                                </div>
                            </div>
                            <div class="progress mb-3" style="height: 2px;">
                                <div 
                                    class="progress-bar m--bg-info" 
                                    role="progressbar" 
                                    aria-valuenow="65" 
                                    aria-valuemin="0" 
                                    aria-valuemax="100"
                                    :style="'width:' + uploadProgress + '%'" 
                                >
                                </div>
                            </div>
                            <div class="dropdown">
                                <button 
                                    class="btn btn-secondary dropdown-toggle" 
                                    type="button" 
                                    id="step-7-recent" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false" 
                                    style="width:100%;" 
                                    :class="[isPrintCardboard ? 'checked' : 'unchecked']" 
                                    @click="isPrintCardboard = true"
                                >
                                     Recent file
                                </button>
                                <div class="dropdown-menu" aria-labelledby="step-7-recent">
                                    <a 
                                        v-for="file in 0"
                                        class="dropdown-item file-dropdown" 
                                        href="#"
                                    >
                                        {{ file }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <color-btn
                                :color="countColors"
                                labelledby="step-7-colors"
                                @colorChange="(val) => countColors = val"
                            >
                                <template slot="btn">
                                    <button 
                                        id="step-7-colors"
                                        class="btn btn-secondary dropdown-toggle" 
                                        type="button" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false" 
                                        style="width:100%;" 
                                        @click="isPrintCardboard = true"
                                        :class="[isPrintCardboard && countColors ? 'checked' : 'unchecked']" 
                                    >
                                        {{ countColors ? countColors : 'How many colors are in your design?' }}
                                    </button>
                                </template>
                            </color-btn>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Print on Cardboard</h3>
                                The standard in professional skateboarding. Printing on back paper is the most common way to brand griptapes without directly printing on the griptapes top.
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
                                <h3 class="m-portlet__head-text">No Cardboard</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">

                                    <button
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[!isPrintCardboard ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                        @click="isPrintCardboard = !isPrintCardboard"
                                    >
                                        <i class="fa" :class="[!isPrintCardboard ? 'fa-check' : 'fa-times']"></i>
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div >
                                    <div 
                                        class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" 
                                        style="min-height: 286px"
                                    >
                                        <img 
                                            src="/img/griptape/4.1.jpg"
                                            alt="Blank Grip Tape" 
                                            title="Blank Grip Tape"
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>No Cardboard</h3>
                                The standard in professional skateboarding. Printing on back paper is the most common way to brand griptapes without directly printing on the griptapes top.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</template>

<script>
    import ColorBtn from '@/components/ColorBtn';
    import uploaFile from '../mixins/uploadFile';

    export default {
        name: 'skateboard-wheel-step-7',
        components: {
            ColorBtn
        },
        mixins: [uploaFile],
        data() {
            return {
                uploadProgress: 0
            }
        },
        computed: {
            isPrintCardboard: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getPrintCardboard'];
                },
                set(newVal) {
                    if (this.isPrintCardboard == newVal) return;

                    this.$store.commit('SkateboardWheelConfigurator/changePrintCardboard', newVal);
                }
            },
            countColors: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getPrintCardboardColors'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changePrintCardboardColors', newVal);
                }
            },
            filePrint: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getPrintCardboardFile'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changePrintCardboardFile', newVal);
                }
            },
        }
    }
</script>