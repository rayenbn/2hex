<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_2">
        <div class="row">
            <div class="col-xl-6">

                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Color Preview</h3>
                            </div>
                        </div>
                    </div>
                    
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div>
                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                        <img
                                            src="/img/heat-transfer/3.1.jpg"
                                            alt="OS780 Technology"
                                            title="OS780 Technology"
                                            class="step1-img1"
                                        >
                                    </div>
                                </div>
                            </div>
                            <input
                                id="quantity_heater"
                                type="text"
                                class="form-control mt-4 mb-4"
                                name="quantity"
                                placeholder="Enter design name"
                            >
                            <div class="shr mt-2 mb-2">
                                <label class="switch">
                                    <input type="checkbox" name="srr" v-model="isSHR">
                                    <span class="slider round"></span>
                                </label>
                                <span>Transparencies</span>
                            </div>

                            <select
                                class="form-control m-select2"
                                id="color"
                                name="color"
                                style="width:100%;"
                            >
                                <option value="null">SELECT</option>
                            </select>
                            
                            <input
                                id="color1"
                                type="text"
                                class="form-control mt-4 mb-4"
                                name="color1"
                                placeholder="Enter Pantone name"
                            >
                            <input
                                id="color2"
                                type="text"
                                class="form-control mt-4 mb-4"
                                name="color2"
                                placeholder="Enter Pantone name"
                            >
                            <input
                                id="color3"
                                type="text"
                                class="form-control mt-4 mb-4"
                                name="color3"
                                placeholder="Enter Pantone name"
                            >
                            <input
                                id="color4"
                                type="text"
                                class="form-control mt-4 mb-4"
                                name="color4"
                                placeholder="Enter Pantone name"
                            >
                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Number of Colors used</h3>
                                The standard in professional skateboarding. Printing on back paper is the most common way to brand griptapes without directly printing on the griptapes top.
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--skin-light  m-portlet--rounded-force">
                    
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="m-widget17__visual m-widget17__visual--chart">
                                <div class="form-group m-form__group">
                                    <div style="text-align: justify; color: #9699a4; margin-top: 20px;margin-bottom: 20px;">
                                        <h4>Upload small preview:</h4>
                                    </div>
                                    <select
                                        class="form-control m-select2"
                                        id="select2"
                                        name="color"
                                        style="width:100%;"
                                    >
                                        <option value="null">SELECT</option>
                                    </select>
                                    <div class="custom-file mt-4">
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
                                        id="step-2-recent"
                                        data-toggle="dropdown"
                                        aria-haspopup="true"
                                        aria-expanded="false"
                                        style="width:100%;"
                                        :class="[isFrontPrint ? 'checked' : 'unchecked']"
                                        @click="isFrontPrint = true"
                                    >
                                        Recent file
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="step-4-recent">
                                        <a
                                            v-for="file in files"
                                            class="dropdown-item file-dropdown"
                                            href="javascript:void(0);"
                                            @click="selectCustomFile(file)"
                                        >
                                            {{ file }}
                                        </a>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <p>Left nose, right tail. Max 1MB</p>
                            <div class="form-group m-form__group">
                                <div style="text-align: justify; color: #9699a4; margin-top: 20px;margin-bottom: 20px;">
                                    <h4>Upload full quality print file:</h4>
                                </div>
                                <select
                                    class="form-control m-select2 mb-4"
                                    id="select3"
                                    name="color"
                                    style="width:100%;"
                                >
                                    <option value="null">SELECT</option>
                                </select>
                                <div class="custom-file mt-4">
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
                                    :class="[isFrontPrint ? 'checked' : 'unchecked']"
                                    @click="isFrontPrint = true"
                                >
                                    Recent file
                                </button>
                                <div class="dropdown-menu" aria-labelledby="step-4-recent">
                                    <a
                                        v-for="file in files"
                                        class="dropdown-item file-dropdown"
                                        href="javascript:void(0);"
                                        @click="selectCustomFile(file)"
                                    >
                                        {{ file }}
                                    </a>
                                </div>
                            </div>
                            <br>
                            <p>Read our instructions here</p>
                            <p>Download our Design Template:</p>
                            <div style="width: 100%;height: 100px;border: #575962 solid 1px;margin-bottom:50px;">
                                
                            </div>
                            <div class="shr mt-2 mb-2">
                                <label class="switch">
                                    <input type="checkbox" name="srr" v-model="isSHR">
                                    <span class="slider round"></span>
                                </label>
                                <span>Re-Order</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "heat-transfer-step-2",
        data() {
            return {

            }
        },
        mounted() {
            $('#color').select2();
            $('#select2').select2();
            $('#select3').select2();
        },
        computed: {},
        methods: {}
    }
</script>

<style scoped>
    .shr {
        display: -webkit-box;
        display: -ms-flexbox;
        display: flex;
        -webkit-box-align: center;
        -ms-flex-align: center;
        align-items: center;
        -webkit-box-pack: start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        margin-top: 30px;
    }

    .shr span {
        padding-left: 30px;
        font-size: 1.15em;
        font-weight: 500;
    }
</style>