<template>
    <div class="m-wizard__form-step" id="m_wizard_form_step_2">
        <div class="row">
            <div class="col-xl-6">
                <div class="m-portlet m-portlet--bordered-semi m-portlet--widget-fit m-portlet--full-height m-portlet--skin-light  m-portlet--rounded-force">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">Shapes</h3>
                            </div>
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
                                            src="#" 
                                            alt="Top Print on Griptape" 
                                            title="Top Print on Griptape"  
                                            class="step1-img2"
                                        >
                                    </div>
                                </div>
                            </div>
                            <select
                                class="form-control m-select2"
                                id="shape"
                                name="shape"
                                v-model="shape"
                                style="width:100%;"
                            >
                                <option value="null" disabled>SELECT</option>
                                <option 
                                    :value="index" 
                                    v-for="(shape, index) in shapes" 
                                    :key="'shape-' + index"
                                >
                                    {{ shape.name }}
                                </option>
                            </select>
                            
                            <template v-if="shape && shape.is_custom">
                                
                                <div class="form-group m-form__group">
                                    <div></div>
                                    <div class="custom-file">
                                        <input
                                            type="file"
                                            data-type-upload="shapes"
                                            class="custom-file-input"
                                            data-step="shape-wheels"
                                            id="step-2-upload"
                                            @change.prevent="uploadFile($event, 2)"
                                        >
                                        <label 
                                            class="custom-file-label unchecked" 
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
                                        class="btn btn-secondary dropdown-toggle checked" 
                                        type="button" 
                                        id="step-2-recent" 
                                        data-toggle="dropdown" 
                                        aria-haspopup="true" 
                                        aria-expanded="false" 
                                        style="width:100%;" 
                                    >
                                        <!-- @click="step_options.state = true" -->
                                        Recent file
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="step-2-recent">
                                        <a 
                                            v-for="file in 0"
                                            class="dropdown-item file-dropdown" 
                                            href="#"
                                        >
                                            <!-- @click="() => {step_options.file = file; step_options.state = true;}" -->
                                            {{ file }}
                                        </a>
                                    </div>
                                </div>

                            </template>


                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Shapes</h3>
                                2HEX offers a wide variety of skateboard wheel shapes. Still not satisfied? Get your own wheels mould!
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
                                <h3 class="m-portlet__head-text">Sizes</h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="m-widget17">
                            <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                <div >
                                    <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                        <img 
                                            src="#" 
                                            alt="" 
                                            title=""
                                            class="step1-img1"
                                        >
                                    </div>
                                </div>
                            </div>

                            <select
                                class="form-control m-select2"
                                id="shape_size"
                                name="shape_size"
                                v-model="size"
                                style="width:100%;"
                            >
                                <option value="null" disabled>SELECT</option>

                                <template v-if="shape">
                                    <option 
                                        :value="index" 
                                        v-for="(size, index) in shape.sizes" 
                                        :key="'size' + index"
                                    >
                                        {{ size.size }}
                                    </option>
                                </template>
                                
                            </select>

                            <template v-if="shape && size">
                                <input
                                    disabled
                                    type="text" 
                                    class="form-control mt-2 mb-2" 
                                    placeholder="Contact patch" 
                                    :value="size.contact_patch"
                                >
                            </template>

                            <div style="text-align: justify; color: #9699a4;margin-top: 20px;">
                                <h3>Sizes</h3>
                                Choose your custom skateboard wheels size for this batch. If you want multiple sizes, you will need to add one batch per size. Each shape comes with different proportions of height, width and contact patch.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import uploaFile from '../mixins/uploadFile';

    export default {
		name: 'skateboard-wheel-step-2',
        mixins: [uploaFile],
        data() {
            return {
                uploadProgress: 0
            }
        },
        computed: {
            shapes() {
                return this.$store.getters['SkateboardWheelConfigurator/getShapes'];
            },
            shape: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getShape'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeShape', newVal);
                }
            },
            size: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getSize'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/changeSize', newVal);
                }
            }
        },
        watch: {
            shape() {
                $("#shape_size").select2({ placeholder: "SELECT" });
            },
        },
        mounted() {
            let queryShape = $("#shape");

            queryShape.select2();

            queryShape.on('select2:select', (e) => {
                this.shape = this.shapes[e.params.data.id];
            });

            let queryShapeSize = $("#shape_size");

            queryShapeSize.select2();

            queryShapeSize.on('select2:select', (e) => {
                this.size = this.shape.sizes[e.params.data.id];
            });
        }
    }
</script>