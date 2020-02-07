<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_4">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Print on Wheels</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
                                    <button
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[isFrontPrint ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                        @click="isFrontPrint = !isFrontPrint"
                                    >
                                        <i class="fa" :class="[isFrontPrint ? 'fa-check' : 'fa-times']"></i>
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
                                            src="/img/Wheels/skateboard-wheels-print/custom-printed-skateboard-wheels-by-2HEX.jpg" 
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
                                        data-type-upload="wheel-front"
                                        class="custom-file-input"
                                        data-step="front-wheels"
                                        id="step-4-upload"
                                        @change.prevent="uploadFile($event, 4)"
                                        @click="isFrontPrint = true"
                                    >
                                    <label 
                                        class="custom-file-label unchecked" 
                                        :class="{checked: isFrontPrint}" 
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
                                    id="step-4-recent" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false" 
                                    style="width:100%;" 
                                    :class="[isFrontPrint ? 'checked' : 'unchecked', isFrontEndFree ? 'paid' : '']" 
                                    @click="isFrontPrint = true"
                                >
                                     Recent file
                                </button>
                                <div class="dropdown-menu" aria-labelledby="step-4-recent">
                                    <a 
                                        v-for="file in files"
                                        class="dropdown-item file-dropdown" 
                                        href="javascript:void(0);"
                                        @click="selectCustomFile(file['name']); isFrontEndFree = file['paid']; countColors = file['color_qty']; isDisableDrop = file['is_disable'];"
                                    >
                                        <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
                                    </a>
                                </div>
                            </div>
                            <br>
                            <color-btn
                                :color="countColors"
                                labelledby="step-4-colors"
                                @colorChange="(val) => countColors = val"
                                v-if="!isDisableDrop"
                            >
                                <template slot="btn">
                                    <button 
                                        id="step-4-colors"
                                        class="btn btn-secondary dropdown-toggle" 
                                        type="button" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false" 
                                        style="width:100%;" 
                                        :class="[isFrontPrint && countColors ? 'checked' : 'unchecked']" 
                                        @click="isFrontPrint = true"
                                    >
                                        {{ countColors ? countColors : 'How many colors are in your design?' }}
                                    </button>
                                </template>
                            </color-btn>

                            <button 
                                id="step-4-colors"
                                class="btn btn-secondary dropdown-toggle" 
                                type="button" 
                                data-toggle="dropdown" 
                                aria-haspopup="true" 
                                aria-expanded="false" 
                                style="width:100%;" 
                                :class="[isFrontPrint && countColors ? 'checked' : 'unchecked']" 
                                @click="isFrontPrint = true"
                                v-else
                            >
                                {{ countColors ? countColors : 'How many colors are in your design?' }}
                            </button>
                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Print on Wheels</h3>
                                Upload your custom artwork and select the number of colors used in your design. If you have used more than 3 colors, select "CMYK".
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
                                <h3 class="m-portlet__head-text">No Print on Wheels</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">

                                    <button
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[!isFrontPrint ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                        @click="isFrontPrint = !isFrontPrint"
                                    >
                                        <i class="fa" :class="[!isFrontPrint ? 'fa-check' : 'fa-times']"></i>
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
                                            src="/img/Wheels/skateboard-wheels-print/blank-skateboard-wheels-by-2hex-skateboard-factory.jpg"
                                            alt="Blank Grip Tape" 
                                            title="Blank Grip Tape"
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>No Print on Wheels</h3>
                                Wheels can be ordered without print. This is often the case for custom moulded wheels which have the logo inside the mould.
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
        name: 'skateboard-wheel-step-4',
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
            isFrontPrint: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getFrontPrint'];
                },
                set(newVal) {
                    if (this.isFrontPrint == newVal) return;
                    
                    this.$store.commit('SkateboardWheelConfigurator/changeFrontPrint', newVal);
                }
            },
            isDisableDrop: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getFrontDropDisable'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeFrontDropDisable', newVal);
                }
            },
            countColors: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getFrontPrintColors'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeFrontPrintColors', newVal);
                }
            },
            filePrint: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getFrontPrintFile'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeFrontPrintFile', newVal);
                }
            },
            isFrontEndFree: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getFrontPrintFree'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeFrontPrintFree', newVal);
                }
            },
            files() {
                return this.$store.getters['SkateboardWheelConfigurator/recentFilesByType']('wheel-front'); 
            }
        },
        methods: {
            selectCustomFile(file) {
                this.filePrint = file;
                this.isFrontPrint = true;

                this.$nextTick(() => {
                    document.getElementById('step-4-recent').innerHTML = file;

                    let uploadInput = document.getElementById('step-4-upload');
                    uploadInput.nextElementSibling.innerHTML = file;
                    // uploadInput.nextElementSibling.classList.remove("unchecked");
                    
                });
            },
        }
    }
</script>