<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_5">
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
                                        :class="[isBackPrint ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                        @click="isBackPrint = !isBackPrint"
                                    >
                                        <i class="fa" :class="[isBackPrint ? 'fa-check' : 'fa-times']"></i>
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
                                            src="/img/Wheels/skateboard-wheels-print/custom-printed-skateboard-wheels-2hex-skateboard-factory.jpg" 
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
                                        data-type-upload="wheel-back"
                                        class="custom-file-input"
                                        data-step="wheel-back"
                                        id="step-5-upload"
                                        @click="isBackPrint = true"
                                        @change.prevent="uploadFile($event, 5)"
                                    >
                                    <label 
                                        class="custom-file-label unchecked" 
                                        :class="{checked: isBackPrint}" 
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
                                    id="step-5-recent" 
                                    data-toggle="dropdown" 
                                    aria-haspopup="true" 
                                    aria-expanded="false" 
                                    style="width:100%;" 
                                    :class="[isBackPrint ? 'checked' : 'unchecked']" 
                                    @click="isBackPrint = true"
                                >
                                     Recent file
                                </button>
                                <div class="dropdown-menu" aria-labelledby="step-5-recent">
                                    <a 
                                        v-for="file in files"
                                        class="dropdown-item file-dropdown" 
                                        href="javascript:void(0);"
                                        @click="selectCustomFile(file['name'])"
                                    >
                                        {{ file['name'] }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <color-btn
                                :color="countColors"
                                labelledby="step-5-colors"
                                @colorChange="(val) => countColors = val"
                                v-if="isSameFile == false"
                            >
                                <template slot="btn">
                                    <button 
                                        id="step-5-colors"
                                        class="btn btn-secondary dropdown-toggle" 
                                        type="button" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false" 
                                        style="width:100%;" 
                                        @click="isBackPrint = true"
                                        :class="[isBackPrint && countColors ? 'checked' : 'unchecked']" 
                                    >
                                        {{ countColors ? countColors : 'How many colors are in your design?' }}
                                    </button>
                                </template>
                            </color-btn>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Print on back of wheels</h3>
                                Wheels can be printed on from both sides. Either select the same image as used on the front of the wheel or upload another design and add the number of colors used.
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
                                <h3 class="m-portlet__head-text">No Print on back of Wheels</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">

                                    <button
                                        class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill"
                                        :class="[!isBackPrint ? 'btn-success m-btn--custom' : 'btn-secondary btn-lg']"
                                        @click="isBackPrint = !isBackPrint"
                                    >
                                        <i class="fa" :class="[!isBackPrint ? 'fa-check' : 'fa-times']"></i>
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
                                            src="/img/Wheels/skateboard-wheels-print/custom-printed-skateboard-wheels-2HEX-skateboard-manufacturer.jpg"
                                            alt="Blank Grip Tape" 
                                            title="Blank Grip Tape"
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>No Print on back of Wheels</h3>
                                The standard in professional skateboarding is to only print on one side of the wheels. Skateboaders often prefer to let the white side face the outside of the skateboard.
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
        name: 'skateboard-wheel-step-5',
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
            isBackPrint: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getBackPrint'];
                },
                set(newVal) {
                    if (this.isBackPrint == newVal) return;
                    
                    this.$store.commit('SkateboardWheelConfigurator/changeBackPrint', newVal);
                }
            },
            countColors: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getBackPrintColors'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeBackPrintColors', newVal);
                }
            },
            filePrint: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getBackPrintFile'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeBackPrintFile', newVal);
                }
            },
            isSameFile() {
                return this.$store.getters['SkateboardWheelConfigurator/getFrontPrintFile'] == this.filePrint && this.filePrint != null;
            },
            files() {
                return this.$store.getters['SkateboardWheelConfigurator/recentFilesByType']('wheel-back');
            }
        },
        methods: {
            selectCustomFile(file) {
                this.filePrint = file;
                this.isBackPrint = true;

                this.$nextTick(() => {
                    document.getElementById('step-5-recent').innerHTML = file;

                    let uploadInput = document.getElementById('step-5-upload');
                    uploadInput.nextElementSibling.innerHTML = file;
                    // uploadInput.nextElementSibling.classList.remove("unchecked");
                    
                });
            },
        }
    }
</script>