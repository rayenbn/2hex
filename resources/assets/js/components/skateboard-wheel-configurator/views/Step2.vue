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
                                <div 
                                    v-show="objView"
                                    class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides"
                                >
                                    <div 
                                        class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" 
                                        style="min-height: 286px; position: relative;"
                                    >
                                        <keep-alive>
                                            <model-obj
                                                :key="'obj-' + shape3d"
                                                v-if="objView" 
                                                :src="shape3d"
                                                :width="300"
                                                :height="300"
                                                @on-progress="onProgress"
                                                ref="shapeModel"
                                                :scale="{ x: 0.7, y: 0.7, z: 0.7}"
                                            />
                                        </keep-alive>
                                    </div>
                                </div>

                                <div v-show="!objView">
                                    <div class="m-widget17__visual m-widget17__visual--chart m-portlet-fit--top m-portlet-fit--sides">
                                        <div>
                                            <div class="m-widget19__pic m-portlet-fit--top m-portlet-fit--sides" style="min-height: 286px">
                                                <img 
                                                    :src="shapeImage" 
                                                    alt="Shapes" 
                                                    title="Shapes"
                                                    class="step1-img1"
                                                >
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            <ul class="m-widget27__nav-items nav nav-pills nav-fill" role="tablist">
                                <li class="step2-tab-nav nav-item">
                                    <button
                                        :class="{'active' : !objView}"
                                        class="nav-link toggle-view"
                                        @click="objView = !objView"
                                    >
                                        Photo
                                    </button>
                                </li>
                                <li class="step2-tab-nav nav-item">
                                    <button
                                        :class="{'active' : objView}"
                                        class="nav-link toggle-view"
                                        @click="objView = !objView"
                                    >
                                        3D Preview
                                    </button>
                                </li>
                            </ul>
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
                                            data-type-upload="wheel-shape"
                                            class="custom-file-input"
                                            data-step="shape-wheels"
                                            id="step-2-upload"
                                            @change.prevent="uploadFile($event, 2)"
                                        >
                                        <label 
                                            class="custom-file-label unchecked"
                                            :class="{checked: filePrint}" 
                                            for="step-2-upload"
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
                                        :class="[filePrint ? 'checked' : 'unchecked', isFrontEndFree ? 'paid' : '']" 
                                    >
                                         Recent file
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="step-2-recent">
                                        <a 
                                            v-for="file in files"
                                            class="dropdown-item file-dropdown" 
                                            href="javascript:void(0);"
                                            @click="selectCustomFile(file['name']); isShpaeFree = file['paid']"
                                        >
                                            <span v-bind:class="{'paid': file['paid'] == 1}" > {{ file['name'] }} {{file['paid']==1?'paid on '+file['paid_date']:''}} </span>
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
                                            src="/img/Wheels/wheels-size-and-width-measurement-2hex.jpg" 
                                            alt="Choose your custom skateboard wheels size for this batch." 
                                            title="Choose your custom skateboard wheels size for this batch."
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
    import { ModelObj } from 'vue-3d-model';

    const shapeImages = [
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/N-shape-custom-skateboard-wheels-2HEX-skateboard-manufacturer.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/R-shape-custom-skateboard-wheels-2HEX-skateboard-manufacturer.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/V1-shape-custom-skateboard-wheels-2HEX-skateboard-manufacturer.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/V2-custom-skateboard-wheels-2HEX-skateboard-manufacturer.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/V3-customskateboard-wheels-2HEX-skateboardmanufacturer.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/V4_customskateboard-wheels-2HEX-skateboardmanufacturer.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/V5_2HEX-custom-skateboard-wheels.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/V6_2HEX-custom-skateboard-wheels.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/V7_2HEX-custom-skateboard-wheels.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/X_2HEX-custom-skateboard-wheels.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/XB_2HEX-custom-skateboard-wheels.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/S-Shapecustomskateboard-wheels-2HEX-skateboardmanufacturer.jpg',
        '/img/Wheels/2hex-skateboard-wheels-factory-shapes/custom-shape-custom-skateboard-wheels-2HEX-skateboard-manufacturer.jpg',
    ];

    const shape3dObjects = [
        '/img/Wheels/3D/V15331.obj',
        '/img/Wheels/3D/V25230.obj',
        '/img/Wheels/3D/V35331.obj',
        '/img/Wheels/3D/V45230.obj',
        '/img/Wheels/3D/V55333.obj',
        '/img/Wheels/3D/V55334.obj',
        '/img/Wheels/3D/V65233.obj',
        '/img/Wheels/3D/V75233.obj',
        '/img/Wheels/3D/X.obj',
        '/img/Wheels/3D/XB.obj',
        '/img/Wheels/3D/SS5233.obj',
        '/img/Wheels/3D/RS5230.obj',
        '/img/Wheels/3D/NS5332.obj',
    ];

    export default {
		name: 'skateboard-wheel-step-2',
        mixins: [uploaFile],
        components: { ModelObj },
        data() {
            return {
                uploadProgress: 0,
                objView: false,
                shape3d: null,
            }
        },
        computed: {
            files() {
                return this.$store.getters['SkateboardWheelConfigurator/recentFilesByType']('wheel-shape'); 
            },
            shapeImage() {
                if (! this.shape) {
                    this.shape3d = shape3dObjects[0];

                    return shapeImages[12]; // custom
                }

                if (this.shape.shape_id == 3) {
                    this.shape3d = shape3dObjects[0];

                    return shapeImages[2]; //V1

                } else if (this.shape.shape_id == 4) {
                    this.shape3d = shape3dObjects[1];

                    return shapeImages[3]; //V2

                } else if (this.shape.shape_id == 5) {
                    this.shape3d = shape3dObjects[2];

                    return shapeImages[4]; //V3

                } else if (this.shape.shape_id == 6) {
                    this.shape3d = shape3dObjects[3];

                    return shapeImages[5]; //V4

                } else if (this.shape.shape_id == 7) {
                    this.shape3d = shape3dObjects[4];

                    return shapeImages[6]; //V5

                } else if (this.shape.shape_id == 8) {
                    this.shape3d = shape3dObjects[6];

                    return shapeImages[7]; //V6

                } else if (this.shape.shape_id == 9) {
                    this.shape3d = shape3dObjects[7];

                    return shapeImages[8]; // V7

                } else if (this.shape.shape_id == 10) {
                    this.shape3d = shape3dObjects[8];

                    return shapeImages[9]; // X

                } else if (this.shape.shape_id == 11) {
                    this.shape3d = shape3dObjects[9];

                    return shapeImages[10]; // XB

                } else if (this.shape.shape_id == 1) {
                    this.shape3d = shape3dObjects[12];

                    return shapeImages[0]; // N

                } else if (this.shape.shape_id == 2) {
                    this.shape3d = shape3dObjects[11];

                    return shapeImages[1]; //R

                } else if (this.shape.shape_id == 12) {
                    this.shape3d = shape3dObjects[10];

                    return shapeImages[11]; //S

                } else if (this.shape.shape_id == 13) {
                    this.shape3d = shape3dObjects[5];

                    return shapeImages[12]; // custom
                }
            },
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
            filePrint: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getShapePrint'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/setShapePrint', newVal);
                }
            },
            isShpaeFree: {
                get() {
                    return this.$store.getters['SkateboardWheelConfigurator/getShapeFree'];
                },
                set(newVal) {
                    this.$store.commit('SkateboardWheelConfigurator/setShapeFree', newVal);
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
        methods: {
            selectCustomFile(file) {
                this.filePrint = file;

                this.$nextTick(() => {
                    document.getElementById('step-2-recent').innerHTML = file;

                    let uploadInput = document.getElementById('step-2-upload');
                    uploadInput.nextElementSibling.innerHTML = file;
                    // uploadInput.nextElementSibling.classList.remove("unchecked");
                    
                });
            },
            onProgress(event) {

                if (event.loaded === event.total) {
                    let canvas = this.$refs.shapeModel.$refs.canvas;

                    canvas.style.display = "block";
                    canvas.style.margin = "0 auto";
                }
            }
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
        },
        created() {
            this.shape3d = shape3dObjects[0];
        }
    }
</script>
<style scoped>
    /* Center the loader */
    #loader {
      position: absolute;
      left: 50%;
      top: 50%;
      z-index: 1;
      width: 150px;
      height: 150px;
      margin: -75px 0 0 -75px;
      border: 16px solid #f3f3f3;
      border-radius: 50%;
      border-top: 16px solid #3498db;
      width: 120px;
      height: 120px;
      -webkit-animation: spin 2s linear infinite;
      animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
      0% { -webkit-transform: rotate(0deg); }
      100% { -webkit-transform: rotate(360deg); }
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    /* Add animation to "page content" */
    .animate-bottom {
      position: relative;
      -webkit-animation-name: animatebottom;
      -webkit-animation-duration: 1s;
      animation-name: animatebottom;
      animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
      from { bottom:-100px; opacity:0 } 
      to { bottom:0px; opacity:1 }
    }

    @keyframes animatebottom { 
      from{ bottom:-100px; opacity:0 } 
      to{ bottom:0; opacity:1 }
    }

    canvas {
        display: block;
        margin: 0 auto;
    }
    .toggle-view {
        cursor: pointer;
        border: 0;
        width: 100%;
    }
    .nav-fill .nav-item {
        flex: 49%;
    }
</style>