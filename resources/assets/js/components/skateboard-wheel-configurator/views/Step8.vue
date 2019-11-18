<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_8">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Print on back of wheels</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                    <button
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[isPrintCarton ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                        @click="isPrintCarton = !isPrintCarton"
                                    >
                                        <i class="fa" :class="[isPrintCarton ? 'fa-check' : 'fa-times']"></i>
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
                                            src="/img/Wheels/custom-skateboard-wheels-manufacturer-carton-2hex.jpg" 
                                            alt="Print on Carton" 
                                            title="Print on Carton"  
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
                                        data-type-upload="wheel-carton"
                                        class="custom-file-input"
                                        data-step="cartonPrint"
                                        id="step-8-upload"
                                        @click="isPrintCarton = true"
                                        @change.prevent="uploadFile($event, 8)"
                                    >
                                    <label 
                                        class="custom-file-label unchecked" 
                                        :class="{checked: isPrintCarton}" 
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
                                    id="step-8-recent" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false" 
                                    style="width:100%;" 
                                    :class="[isPrintCarton ? 'checked' : 'unchecked']" 
                                    @click="isPrintCarton = true"
                                >
                                     Recent file
                                </button>
                                <div class="dropdown-menu" aria-labelledby="step-8-recent">
                                    <a 
                                        v-for="file in files"
                                        class="dropdown-item file-dropdown" 
                                        href="javascript:void(0);"
                                        @click="() => {filePrint = file; isPrintCarton = true;}"
                                    >
                                        {{ file }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <color-btn
                                :color="countColors"
                                labelledby="step-8-colors"
                                @colorChange="(val) => countColors = val"
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
                                        @click="isPrintCarton = true"
                                        :class="[isPrintCarton && countColors ? 'checked' : 'unchecked']" 
                                    >
                                        {{ countColors ? countColors : 'How many colors are in your design?' }}
                                    </button>
                                </template>
                            </color-btn>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Print on Carton</h3>
                                Show that you have a professional company when delivering your wheels to skate shops! Professional skateboard companies use custom cartons to fulfill orders. The screens for the production of custom cartons are kept for one year.
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
                                <h3 class="m-portlet__head-text">No Print on Carton</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">

                                    <button
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[!isPrintCarton ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                        @click="isPrintCarton = !isPrintCarton"
                                    >
                                        <i class="fa" :class="[!isPrintCarton ? 'fa-check' : 'fa-times']"></i>
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
                                            src="/img/Wheels/custom-skateboard-wheels-manufacturer-carton-without-print-2hex-supplies.jpg"
                                            alt="No Print on Carton" 
                                            title="No Print on Carton"
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>No Print on Carton</h3>
                                For small orders of up to 1000 sets of wheels it is best to use cartons without print to keep the costs low. If you have already ordered custom printed cartons from 2HEX before, and your second order is placed within one year, you do not have to pay for the set up a second time.
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
        name: 'skateboard-wheel-step-8',
        mixins: [uploaFile],
        components: {
            ColorBtn
        },
        data() {
            return {
                uploadProgress: 0,
            }
        },
        computed: {
            isPrintCarton: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getPrintCarton'];
                },
                set(newVal) {
                    if (this.isPrintCarton == newVal) return;

                    this.$store.commit('SkateboardWheelConfigurator/changePrintCarton', newVal);
                }
            },
            countColors: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getPrintCartonColors'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changePrintCartonColors', newVal);
                }
            },
            filePrint: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getPrintCartonFile'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changePrintCartonFile', newVal);
                }
            },
            files() {
                return this.$store.getters['SkateboardWheelConfigurator/recentFilesByType']('wheel-carton'); 
            }
        }
    }
</script>