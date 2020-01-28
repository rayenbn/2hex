<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_2">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Quantity</h3>
                            </div>
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
                                            class="step1-img1"
                                            alt="Quantity"
                                            title="Quantity"
                                        >
                                    </div>
                                </div>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                name="designName"
                                placeholder="Enter design name"
                                v-model="designName"
                                :disabled="! hasChange"
                            >
                            <div class="mt-4 mb-2 d-flex align-items-center justify-content-between">
                                <span class="text-uppercase">Transparencies</span>
                                <label class="switch">
                                    <input type="checkbox" name="transparencies" v-model="transparencies" :disabled="! hasChange">
                                    <span class="slider round"></span>
                                </label>
                            </div>

                            <select
                                :disabled="! hasChange"
                                class="form-control m-select2"
                                id="pantoneColor"
                                name="pantoneColor"
                                style="width:100%;"
                                v-model="pantoneColor"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option
                                    :value="index"
                                    v-for="(item, index) in pantoneColors"
                                    :key="'color' + index"
                                >
                                    {{ item.title }}
                                </option>
                            </select>

                            <template v-if="pantoneColor">
                                <input
                                    v-for="(count, index) in pantoneColor.countFields"
                                    type="text"
                                    class="form-control mt-2 mb-2"
                                    placeholder="Enter Pantone Color"
                                    v-model="pantoneColor.colors[index]"
                                    :disabled="! hasChange"
                                >
                            </template>

                            <div style="text-align: justify; color: #9699a4;" class="mt-4">
                                <h3>Number of Colors used</h3>
                                The standard in professional skateboarding.
                                Printing on back paper is the most common way to brand griptapes without directly
                                printing on the griptapes top.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <p class="h5 m-0">Upload small preview:</p>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">

                            <div class="form-group m-form__group">
                                <div class="custom-file">
                                    <input
                                        :disabled="! hasChange"
                                        type="file"
                                        data-type-upload="transfers-small-preview"
                                        id="sm-preview"
                                        class="custom-file-input"
                                        @change.prevent="uploadFile($event, 'sm')"
                                    >
                                    <label
                                        class="custom-file-label unchecked"
                                        for="sm-preview"
                                        :class="{checked: smPreview}"
                                    >
                                        Choose file
                                    </label>
                                </div>
                            </div>
                            <div class="progress mb-3" style="height: 2px;">
                                <div
                                    class="progress-bar m--bg-info"
                                    role="progressbar"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    :style="'width:' + smProgress + '%'"
                                >
                                </div>
                            </div>
                            <div class="dropdown">
                                <button
                                    :disabled="! hasChange"
                                    class="btn btn-secondary dropdown-toggle w-100"
                                    type="button"
                                    id="sm-recent"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    :class="[smPreview ? 'checked' : 'unchecked']"
                                >
                                    Recent file
                                </button>
                                <div class="dropdown-menu" aria-labelledby="sm-recent">

                                    <a
                                        v-for="file in recentFiles['transfers-small-preview']"
                                        class="dropdown-item file-dropdown"
                                        href="javascript:void(0);"
                                        @click.prevent="() => {smPreview = file.name; renderPreview(file.name, 'sm')}"
                                    >
                                        {{ file && file.name}}
                                    </a>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;" class="mt-4">
                                Left nose, right tail. Max 1MB.
                            </div>
                        </div>
                        <div class="m-portlet__head p-0">
                            <div class="m-portlet__head-caption">
                                <p class="h5 m-0">Upload full quality print file:</p>
                            </div>
                        </div>

                        <div class="m-widget17">
                            <div class="form-group m-form__group">
                                <div class="custom-file">
                                    <input
                                        :disabled="! hasChange"
                                        type="file"
                                        data-type-upload="transfers-full-preview"
                                        id="lg-preview"
                                        class="custom-file-input"
                                        @change.prevent="uploadFile($event, 'lg')"
                                    >
                                    <label
                                        class="custom-file-label unchecked"
                                        for="lg-preview"
                                        :class="{checked: lgPreview}"
                                    >
                                        Choose file
                                    </label>
                                </div>
                            </div>
                            <div class="progress mb-3" style="height: 2px;">
                                <div
                                    class="progress-bar m--bg-info"
                                    role="progressbar"
                                    aria-valuenow="0"
                                    aria-valuemin="0"
                                    aria-valuemax="100"
                                    :style="'width:' + lgProgress + '%'"
                                >
                                </div>
                            </div>
                            <div class="dropdown">
                                <button
                                    :disabled="! hasChange"
                                    class="btn btn-secondary dropdown-toggle w-100"
                                    type="button"
                                    id="lg-recent"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false"
                                    :class="[lgPreview ? 'checked' : 'unchecked']"
                                >
                                    Recent file
                                </button>
                                <div class="dropdown-menu" aria-labelledby="lg-recent">
                                    <a
                                        v-for="file in recentFiles['transfers-full-preview']"
                                        class="dropdown-item file-dropdown"
                                        href="javascript:void(0);"
                                        @click.prevent="() => {lgPreview = file.name; renderPreview(file.name, 'lg')}"
                                    >
                                        {{ file && file.name }}
                                    </a>
                                </div>
                            </div>

                            <div style="text-align: justify; color: #9699a4;" class="mt-4">
                                Read our design instructions here.
                            </div>
                            <div style="text-align: justify; color: #9699a4;" class="mt-4">
                                Download our Design Template (Drag and Drop):
                            </div>
                            <div
                                style="text-align: justify; color: #9699a4;"
                                class="mt-4"
                                id="design-wrap"
                                @drop.prevent="dropHandler($event)"
                                @dragstart.prevent
                            >
                                <label for="template-design" class="m-0">
                                    <img src="/img/transfers/skateboard-deck-template.jpg" alt="Design Template" title="Design Template" width="100%">
                                </label>
                                <input type="file" name="template-design" id="template-design" :disabled="! hasChange"/>
                            </div>
                            <div class="mt-4 mb-2 d-flex align-items-center justify-content-between">
                                <div class="d-flex flex-column">
                                    <span class="text-uppercase">Re-Order</span>
                                    <span>First order of this design.</span>
                                </div>
                                <label class="switch">
                                    <input type="checkbox" name="re-order" v-model="reOrder" :disabled="! hasChange">
                                    <span class="slider round"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>

<script>
    import checkAuth from '@/mixins/checkAuth';

    export default {
        name: 'transfers-step-2',
        mixins: [checkAuth],
        props: {
            upload_url: {
                type: String,
                required: true
            }
        },
        data() {
            return {
                pantoneColors: [
                    {
                        "title": "1 field to enter Pantone Color",
                        "countFields": 1,
                        "colors": [],
                    },
                    {
                        "title": "2 field to enter Pantone Color",
                        "countFields": 2,
                        "colors": [],
                    },
                    {
                        "title": "3 field to enter Pantone Color",
                        "countFields": 3,
                        "colors": [],
                    },
                    {
                        "title": "4 field to enter Pantone Color",
                        "countFields": 4,
                        "colors": [],
                    },
                    {
                        "title": "5 field to enter Pantone Color",
                        "countFields": 5,
                        "colors": [],
                    },
                    {
                        "title": "6 field to enter Pantone Color",
                        "countFields": 6,
                        "colors": [],
                    },
                    {
                        "title": "7 field to enter Pantone Color",
                        "countFields": 7,
                        "colors": [],
                    },
                    {
                        "title": "8 field to enter Pantone Color",
                        "countFields": 8,
                        "colors": [],
                    },
                    {
                        "title": "No field to enter Pantone Color",
                        "countFields": 0,
                        "colors": [],
                    }
                ],
                smProgress: 0,
                lgProgress: 0,
            }
        },
        watch: {
            pantoneColor(val) {
                if (val && val.colors.length === 0) {
                    // Init empty list of colors
                    val.colors = new Array(val.countFields).fill('');
                }
            }
        },
        methods: {
            uploadFile(event, type = 'lg') {
                // Check auth
                this.checkAuth();

                // Check empty file
                if (event.target.files.length === 0) {
                    this[type + 'Preview'] = null;

                    return false;
                }
                let formData = new FormData();
                let file = event.target.files[0];

                formData.append('typeUpload', event.target.dataset.typeUpload);
                formData.append('fileName', file ? file.name : '');
                formData.append('file', file);

                let options = {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    },
                    onUploadProgress:  progressEvent => {
                        this[type + 'Progress'] = parseInt(Math.round( (progressEvent.loaded * 100 ) / progressEvent.total));
                    }
                };

                axios.post(this.upload_url, formData, options)
                    .then(response => response.data)
                    .then(response => {
                        this[type + 'Preview'] = response;

                        this.$nextTick(() => {
                            this.renderPreview(response, type);
                        });

                        this.$notify({
                            group: 'main',
                            type: 'success',
                            title: 'Upload file',
                            text: "File uploaded successfully"
                        });
                    })
                    .catch(error => {
                        this.$nextTick(() => {
                            let choosenInput = document.getElementById(type + '-preview');
                            choosenInput.nextElementSibling.classList.add("unchecked");
                        });

                        this[type + 'Preview'] = null;

                        this.$notify({
                            group: 'main',
                            type: 'error',
                            title: 'Upload file',
                            text: "File upload error"
                        });
                    })
                    .finally(() => {
                        setTimeout(() => {
                            this[type + 'Progress'] = 0;
                        }, 1000)
                    });
            },
            renderPreview(content, type = 'lg') {
                let choosenInput = document.getElementById(type + '-preview');

                if (! choosenInput) {
                    return;
                }

                this.$nextTick(() => {
                    choosenInput.nextElementSibling.innerHTML = content;
                    choosenInput.nextElementSibling.classList.remove("unchecked");
                    choosenInput.nextElementSibling.classList.add("checked");
                    document.getElementById(type + '-recent').innerHTML = content;
                });
            },
            dropHandler(e) {
                // TODO upload file
                document.getElementById('design-wrap').classList.remove('highlight');

                if (! this.hasChange) return false;

                var dt = e.dataTransfer;
                var files = dt.files;

            },
        },
        computed: {
            designName: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getDesignName'];
                },
                set: _.debounce(function (newVal) {
                    this.$store.commit('TransfersConfigurator/setDesignName', newVal);
                }, 1000)
            },
            transparencies: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getTransparencies'];
                },
                set: _.debounce(function (newVal) {
                    this.$store.commit('TransfersConfigurator/setTransparencies', newVal);
                }, 1000)
            },
            pantoneColor: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getPantoneColor'];
                },
                set(newVal) {
                    this.$store.commit('TransfersConfigurator/setPantoneColor', newVal);
                }
            },
            smPreview: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getSmallPreview'];
                },
                set(newVal) {
                    this.$store.commit('TransfersConfigurator/setSmallPreview', newVal);
                }
            },
            lgPreview: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getLargePreview'];
                },
                set(newVal) {
                    this.$store.commit('TransfersConfigurator/setLargePreview', newVal);
                }
            },
            reOrder: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getReOrder'];
                },
                set(newVal) {
                    this.$store.commit('TransfersConfigurator/setReOrder', newVal);
                }
            },
            recentFiles() {
                return this.$store.getters['TransfersConfigurator/getRecentFiles'];
            },
            hasChange() {
                return this.$store.getters['TransfersConfigurator/hasChange'];
            }
        },
        mounted() {
            // init select2
            let queryPantoneColor = $("#pantoneColor");

            queryPantoneColor.select2();

            // Listen change select with color types
            queryPantoneColor.on('select2:select', (e) => {
                this.pantoneColor = this.pantoneColors[e.params.data.id];
            });

            if (! this.pantoneColor) {
                this.pantoneColor = this.pantoneColors[0];
                queryPantoneColor.val(0).trigger('change');
            }

            // Preselect small preview
            if (this.smPreview) {
                this.renderPreview(this.smPreview, 'sm');
            }

            // Preselect large preview
            if (this.lgPreview) {
                this.renderPreview(this.lgPreview, 'lg');
            }

            let dropArea = document.getElementById('design-wrap');

            dropArea.addEventListener("dragover", function( event ) {
                event.preventDefault();
                this.classList.add('highlight');
            }, false);

            dropArea.addEventListener("dragleave", function( event ) {
                event.preventDefault();
                this.classList.remove('highlight');
            }, false);
        }
    }
</script>

<style scoped>
    #design-wrap label {
        cursor: pointer;
    }

    #template-design {
        opacity: 0;
        position: absolute;
        z-index: -1;
    }
    .highlight {
        border: #5867dd 2px dashed;
    }
</style>