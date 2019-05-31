<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_4">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Blank Grip Tape</h3>
                            </div>
                        </div>
                        <div class="m-portlet__head-tools">
                            <ul class="m-portlet__nav">
                                <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover">
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
                                <h3>Blank Grip Tape</h3>
                                Griptape without top print is the standard in professional skateboarding. Most skateboarders prefer this classic black look.
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
                                <h3 class="m-portlet__head-text">Top Print on Griptape</h3>
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
                                <div >
                                    <div 
                                        class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" 
                                        style="min-height: 286px"
                                    >
                                        <img 
                                            src="/img/griptape/topprint.jpg" 
                                            alt="Top Print on Griptape" 
                                            title="Top Print on Griptape"  
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>
                            <div class="form-group m-form__group">
                                <div></div>
                                <btn-file-upload
                                    data-type-upload="top"
                                    id="topPrintFile"
                                    @btnClick="step_options.state = true"
                                    @btnChange="prepareFile"
                                />
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
                                    :class="[step_options.state && step_options.file 
                                        ? 'checked' : 'unchecked'
                                    ]" 
                                    @click="step_options.state = true"
                                >
                                    {{ step_options.file ? step_options.file : 'Recent file' }}
                                </button>
                                <div class="dropdown-menu" aria-labelledby="step-4-recent">
                                    <a 
                                        v-for="file in files"
                                        class="dropdown-item file-dropdown" 
                                        @click="() => {step_options.file = file; step_options.state = true;}"
                                        href="#"
                                    >
                                        {{ file }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <color-btn 
                                :color="step_color" 
                                labelledby="step-4-colors"
                                @colorChange="(val) => step_color = val"
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
                                        @click="step_options.state = true"
                                        :class="[step_options.state && step_color ? 'checked' : 'unchecked']" 
                                    >
                                        {{ step_color ? step_color : 'How many colors are in your design?' }}
                                    </button>
                                </template>
                            </color-btn>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Top Print</h3>
                                2HEX uses thin but opaque ink to print on griptapes. This keeps the grip while not compromising on print quality. The top of a griptape is the most visible part of a skateboard. If you want your brand name seen, this is the spot to print it!
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal set name file -->
        <modal v-if="showModal" @close="clearFile">
            <h3 slot="header">Enter the file name</h3>
            <div slot="body">
                <input type="text" class="form-control" v-model="fileName" placeholder="Enter the file name"> 
            </div>
            <div slot="footer">
                <button 
                    type="button" 
                    class="btn btn-secondary" 
                    @click.prevent="clearFile"
                >
                    Cancell
                </button>
                <button
                    :disabled="!checkFileName(fileName)"
                    type="button" 
                    class="btn btn-primary"
                    @click.prevent="uploadFile"
                >
                    Upload
                </button>
            </div>
        </modal>
    </div>
</template>

<script>
    import upload from '../mixins/uploadFile';
    import ColorBtn from './ColorBtn';
    import BtnFileUpload from '@/components/BtnFileUpload';
    import Modal from '@/components/modals/Modal';

    export default {
        name: 'skateboard-decks-step-4',
        mixins: [upload],
        components: {
            ColorBtn,
            BtnFileUpload,
            Modal
        },
        data() {
            return {
                file: null,
                fileName: '',
                typeUpload: '',
                showModal: false,
                step_color: null
            }
        },
        watch: {
            step_color: _.debounce(function(val){
                this.$emit('colorChange', val);
            }, 300)
        },
        methods: {
            checkFileName(name) {
                return (/[a-zA-Z0-9_-]{2,}\.[a-zA-Z0-9]{3,}$/i).test(name);
            },
            prepareFile(event) {
                if (event.target.files.length === 0) {
                    this.clearFile();

                    return false;
                }
                this.showModal = true;
                this.file = event.target.files[0];
                this.fileName = this.file.name;
                this.typeUpload = event.target.dataset.typeUpload;
            },
            clearFile() {
                this.file = null;
                this.fileName = '';
                this.typeUpload = '';
                this.showModal = false;
            },
            uploadFile() {
                let formData = new FormData();

                formData.append('file', this.file);
                formData.append('typeUpload', this.typeUpload);
                formData.append('fileName', this.fileName);

                axios.post('/configurator-fileupload', formData, {
                    headers: {'Content-Type': 'multipart/form-data'}
                })
                    .then(response => response.data)
                    .then(response => {
                        this.showModal = false;
                        this.step_options.file = response;
                    })
                    .catch(error => {
                        this.showModal = false;
                    });
            }
        },
        created() {
            this.step_color = this.options.color;
        }
    }
</script>