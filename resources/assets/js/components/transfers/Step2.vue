<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_2">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="mb-4 m-widget17__visual m-widget17__visual--chart m-portlet-fit--sides">
                                <div class="m-widget19__pic m-portlet-fit--sides preview-bg">
                                    <img
                                        src="/img/transfers/skateboard-heat-transfer-example.jpg"
                                        class="step1-img1"
                                        alt="Design Preview"
                                        title="Design Preview"
                                        id="designPreview"
                                    >
                                </div>
                            </div>
                            <input
                                type="text"
                                class="form-control"
                                name="designName"
                                placeholder="Enter design name"
                                v-model="designName"
                                v-validate="'required'"
                            >

                            <div class="heat-transfers d-flex justify-content-between mt-4 mb-4">
                                <span
                                    class="btn btn-sm m-btn--pill"
                                    v-for="heatTransfer in heatTransfers"
                                    :class="{'btn-brand': heatTransfer.active}"
                                    @click="toggleHeatTransfer(heatTransfer)"
                                >
                                    {{heatTransfer.name}}
                                </span>
                            </div>

                            <div class="d-flex justify-content-between mt-3 mb-3">
                                <div class="d-flex align-items-center justify-content-start">
                                    <label class="switch mr-2 mb-0">
                                        <input type="checkbox" name="cmyk" v-model="CMYK" :disabled="! hasChange">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>CMYK</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-start">
                                    <label class="switch mr-2 mb-0">
                                        <input type="checkbox" name="transparency" v-model="transparency" :disabled="! hasChange">
                                        <span class="slider round"></span>
                                    </label>
                                    <span>Transparencies</span>
                                </div>
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
                                    :name="'pantoneColor-' + index"
                                    v-validate="'required'"
                                >
                                    {{ item.title }}
                                </option>
                            </select>

                            <template v-if="pantoneColor && !CMYK">
                                <input
                                    v-for="(count, index) in pantoneColor.countFields"
                                    type="text"
                                    class="form-control mt-2 mb-2"
                                    placeholder="Enter Pantone Color"
                                    v-model="pantoneColor.colors[index]"
                                    :disabled="! hasChange"
                                    :name="'color' + index"
                                    @input="onChangePantoneColor"
                                >
                            </template>
                            <template v-if="CMYK">
                                <input
                                    v-for="(color, index) in cmykColors"
                                    type="text"
                                    :disabled="index < 4 + +transparency"
                                    class="form-control mt-2 mb-2"
                                    placeholder="Enter Pantone Color"
                                    v-model="cmykColors[index]"
                                    :name="'cmyk-color' + index"
                                    @input="onChangeCMYKColor"
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
                                        type="file"
                                        name="smallPreview"
                                        data-type-upload="transfers-small-preview"
                                        id="sm-preview"
                                        class="custom-file-input"
                                        @change.prevent="uploadFile($event, 'sm')"
                                        v-validate="'required'"
                                        accept=".jpg,.jpeg,.jfif,.pjpeg,.pjp,.png"
                                        data-max-size="1000000"
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
                                        @click.prevent="clickRecentSmallPreview(file.name)"
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
                                        name="fullPreview"
                                        data-type-upload="transfers-full-preview"
                                        id="lg-preview"
                                        class="custom-file-input"
                                        @change.prevent="uploadFile($event, 'lg')"
                                        v-validate="'required'"
                                        accept=".jpg,.jpeg,.jfif,.pjpeg,.pjp,.png,.ai,.pdf,.tif,.tiff,.psd"
                                        data-max-size="10000000"
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

                            <div style="white-space: nowrap; color: #9699a4;" class="mt-4 mb-5">
                                Max 10 MB; Read our design instructions <a href="/blog/how-to-design-skateboard-decks" target="_blank">here</a>.
                            </div>
                            <div style="text-align: justify; color: #9699a4;" class="mt-4">
                                Download our Design Template:
                            </div>
                            <div style="text-align: justify; color: #9699a4;" class="mt-4">
                                <a href="/transfers/2HEX-skateboard-deck-design-template.pdf" class="m-0 d-block" target="_blank">
                                    <img src="/img/transfers/skateboard-deck-template.jpg" alt="Design Template" title="Design Template" width="100%">
                                </a>
                            </div>
                            <div class="mt-4 mb-2 d-flex align-items-center justify-content-start">
                                <label class="switch mb-0 mr-4">
                                    <input type="checkbox" name="re-order" disabled :checked="!hasChange">
                                    <span class="slider round"></span>
                                </label>
                                <div class="d-flex flex-column">
                                    <span>This print is a re-order.</span>
                                    <small v-if="!hasChange">{{paidFile.date}}</small>
                                    <small v-else>First order of this design.</small>
                                </div>
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
    import {HEAT_TRANSFERS} from '@/constants';

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
                heatTransfers: [
                    {
                        "name": HEAT_TRANSFERS.GLOSSY,
                        "active": true
                    },
                    {
                        "name": HEAT_TRANSFERS.MATTE,
                        "active": false
                    },
                    {
                        "name": HEAT_TRANSFERS.GLOSSY_MATTE,
                        "active": false
                    },
                ],
                pantoneColors: [
                    {
                        "title": "0 field to enter Pantone Color",
                        "countFields": 0,
                        "colors": new Array(),
                    },
                    {
                        "title": "1 field to enter Pantone Color",
                        "countFields": 1,
                        "colors": new Array(1).fill(null),
                    },
                    {
                        "title": "2 field to enter Pantone Color",
                        "countFields": 2,
                        "colors": new Array(2).fill(null),
                    },
                    {
                        "title": "3 field to enter Pantone Color",
                        "countFields": 3,
                        "colors": new Array(3).fill(null),
                    },
                    {
                        "title": "4 field to enter Pantone Color",
                        "countFields": 4,
                        "colors": new Array(4).fill(null),
                    },
                    {
                        "title": "5 field to enter Pantone Color",
                        "countFields": 5,
                        "colors": new Array(5).fill(null),
                    },
                    {
                        "title": "6 field to enter Pantone Color",
                        "countFields": 6,
                        "colors": new Array(6).fill(null),
                    },
                    {
                        "title": "7 field to enter Pantone Color",
                        "countFields": 7,
                        "colors": new Array(7).fill(null),
                    },
                    {
                        "title": "8 field to enter Pantone Color",
                        "countFields": 8,
                        "colors": new Array(8).fill(null),
                    }
                ],
                smProgress: 0,
                lgProgress: 0,
            }
        },
        methods: {
            clickRecentSmallPreview(fileName) {
                this.smPreview = fileName;
                this.renderPreview(fileName, 'sm');

                let options = {
                    headers: {
                        'Content-Type': 'multipart/form-data'
                    }
                };

                axios.get(`/recent-file?fileName=${fileName}&folder=transfers-small-preview`, {}, options)
                    .then(response => response.data)
                    .then(response => {
                        document.getElementById('designPreview').setAttribute('src', response)
                    })
                    .catch(error => {
                        this.$notify({
                            group: 'main',
                            type: 'error',
                            title: 'Render preview is fail',
                            text: error.response && error.response.data.message
                        });
                    });
            },
            toggleHeatTransfer(heatTransfer) {
                if (this.heatTransfer.name === heatTransfer.name || !this.hasChange) return;

                this.heatTransfers.map(transfer => {
                    transfer.active = transfer.name === heatTransfer.name;
                });

                this.$store.commit('TransfersConfigurator/setHeatTransfer', heatTransfer)
            },
            readURL(input) {
                if (input.files.length === 0) { return; }

                let elMaxSize = input.dataset.maxSize;

                if (elMaxSize) {
                    elMaxSize = parseInt(elMaxSize);
                    if (input.files[0].size > elMaxSize) {
                        alert(`File must be less than ${(elMaxSize / 1000000)}mb.`);

                        return false;
                    }
                }

                let reader = new FileReader();

                reader.onload = function(e) {
                    document.getElementById('designPreview').setAttribute('src', e.target.result)
                };

                reader.readAsDataURL(input.files[0]);

                return true;
            },
            validFileType(file, fileTypes) {
                return fileTypes.some(type => type === file.name.match(/\.[0-9a-z]+$/i)[0]);
            },
            uploadFile(event, type = 'lg') {
                // Check auth
                this.checkAuth();

                let formData = new FormData();
                let file = event.target.files[0];

                // Validate file type
                if (! this.validFileType(file, event.target.accept.split(','))) {
                    this.$notify({
                        group: 'main',
                        type: 'error',
                        title: 'Unsupported type',
                        text: "Supported types: " + event.target.accept
                    });

                    return false;
                }

                if (type === 'sm') {
                    if (! this.readURL(event.target)) {
                        return false;
                    }
                }

                // Check empty file
                if (event.target.files.length === 0) {
                    this[type + 'Preview'] = null;

                    return false;
                }

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
            onChangePantoneColor: _.debounce(function (e) {
                this.$store.commit('TransfersConfigurator/setPantoneColor', this.pantoneColor);
            }, 1000),
            onChangeCMYKColor: _.debounce(function (e) {
                // this.$store.commit('TransfersConfigurator/setCMYKColors', this.cmykColors);
            }, 1000),
            recalculateCmykColors() {
                this.$nextTick(() => {
                    let colors = ['CMYK-Cyan', 'CMYK-Magenta', 'CMYK-Yellow', 'CMYK-Key Black'];

                    if (this.transparency) {
                        colors.push('Transparency');
                    }

                    this.cmykColors = colors.concat(new Array(this.pantoneColor.countFields).fill(null));
                });
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
            CMYK: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getCMYK'];
                },
                set: _.debounce(function (newVal) {
                    this.recalculateCmykColors();

                    this.$store.commit('TransfersConfigurator/setCMYK', newVal);
                }, 500)
            },
            cmykColors: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getCMYKColors'];
                },
                set: _.debounce(function (newVal) {

                    this.$store.commit('TransfersConfigurator/setCMYKColors', newVal);
                }, 500)
            },
            transparency: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getTransparency'];
                },
                set: _.debounce(function (newVal) {
                    if (this.CMYK) {
                        this.recalculateCmykColors();
                    }
                    this.$store.commit('TransfersConfigurator/setTransparency', newVal);
                }, 500)
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
            },
            paidFile() {
                return this.$store.getters['TransfersConfigurator/getPaidFile'];
            },
            heatTransfer: {
                get() {
                    return this.$store.getters['TransfersConfigurator/getHeatTransfer'];
                },
                set(newVal) {
                    this.$store.commit('TransfersConfigurator/setHeatTransfer', newVal);
                }
            }
        },
        mounted() {
            // init select2
            let queryPantoneColor = $("#pantoneColor");

            queryPantoneColor.select2();

            // Listen change select with color types
            queryPantoneColor.on('select2:select', (e) => {
                if (this.CMYK) {
                    this.recalculateCmykColors();
                }
                this.pantoneColor = this.pantoneColors[e.params.data.id];
            });

            let parentComponent= this.$parent;

            if (parentComponent.transfer) {

                // Set heat transfer
                this.heatTransfer = this.heatTransfers.find(t => t.name === parentComponent.transfer.heat_transfer);
                this.heatTransfers.map(transfer => {
                    transfer.active = transfer.name === this.heatTransfer.name;
                });

                this.$nextTick(() => {
                    this.renderPreview(parentComponent.transfer.small_preview, 'sm');
                    this.clickRecentSmallPreview(parentComponent.transfer.small_preview);

                    if (parentComponent.transfer.large_preview) {
                        this.renderPreview(parentComponent.transfer.large_preview, 'lg');
                    }

                    let index = this.pantoneColors.findIndex(c => c.countFields === this.pantoneColor.countFields) || 0;

                    if (this.CMYK) {
                        this.pantoneColor = this.pantoneColors[index];
                    }
                    queryPantoneColor.val(index).trigger('change');
                });
            }

            if (! this.pantoneColor) {
                this.pantoneColor = this.pantoneColors[0];
                queryPantoneColor.val(0).trigger('change');
            }

            if (! this.heatTransfer) {
                this.heatTransfer = this.heatTransfers[0];
            }

            // Preselect small preview
            if (this.smPreview) {
                this.renderPreview(this.smPreview, 'sm');
            }

            // Preselect large preview
            if (this.lgPreview) {
                this.renderPreview(this.lgPreview, 'lg');
            }
        }
    }
</script>

<style scoped>
    .preview-bg {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-orient: vertical;
        -webkit-box-direction: normal;
        -ms-flex-direction: column;
        flex-direction: column;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: center;
        -ms-flex-pack: center;
        justify-content: center;
    }
    .heat-transfer-btn:nth-child(even) {
        margin: 0 2px;
    }
    .heat-transfer-btn {
        padding: 7px 12px;
        font-size: 11px;
        cursor: pointer;
        border-radius: 15px;
    }
    .active {
        color: #ffffff;
        background-color: #5867dd;
    }
</style>