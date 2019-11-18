import {PLACEMENTS, HARDNESS} from '@/constants.js';
import WheelService from '@/components/skateboard-wheel-configurator/Classes/WheelService.js';
import Vue from 'vue';

export default {
    namespaced: true,
    state: {
        wheelId: null,
        isAuth: false,
        totalQuantity: 0,
        totalSum: 0,
        basePrice: 0,
        cartonPrice: 0,
        cardboardPrice: 0,
        placementPrice: 0,
        profitMargin: 0,
        colorMargin: 0,
        colorPrice: 0,
        types: [],
        shapes: [],
        shapePrint: null,
        quantity: 2000,
        perSet: 0,
        perSetPrice: 0,
        type: null,
        shape: null,
        size: null,
        sizePrices: [],
        hardness: '94A',
        shr: false,
        isFrontPrint: false,
        frontPrintColors: '1 color',
        frontPrintFile: null,
        isBackPrint: false,
        backPrintColors: '1 color',
        backPrintFile: null,
        placement: PLACEMENTS.SQUARE,
        isPrintCardboard: false,
        printCardboardFile: null,
        isPrintCarton: false,
        printCartonColors: null,
        printCartonFile: null,
        hardnessList: [
            '78A', '79A', '80A', '81A', '82A', '83A', '84A', '85A', '86A','87A', 
            '88A', '89A', '90A', '91A', '92A', '93A', '94A', '95A', '96A', '97A', 
            '98A', '99A', '100A', '101A', '102A', '83B', '84B', '84B', '84B', '84B', 
            '84B', '84B'
        ]
    },
    getters: {
        getSHR: state => state.shr,
        getTypes: state => state.types,
        getShapes: state => state.shapes,
        getShapePrint: state => state.shapePrint,
        getPerSet: state => state.perSet,
        getPlacement: state => state.placement,
        getShape: state => state.shape,
        getSize: state => state.size,

        getFrontPrint: state => state.isFrontPrint,
        getFrontPrintColors: state => state.frontPrintColors,
        getFrontPrintFile: state => state.frontPrintFile,

        getBackPrint: state => state.isBackPrint,
        getBackPrintColors: state => state.backPrintColors,
        getBackPrintFile: state => state.backPrintFile,

        getPrintCardboard: state => state.isPrintCardboard,
        getPrintCardboardFile: state => state.printCardboardFile,

        getPrintCarton: state => state.isPrintCarton,
        getPrintCartonColors: state => state.printCartonColors,
        getPrintCartonFile: state => state.printCartonFile,

        getQuantity: state => state.quantity,
        getType: state => state.type,
        getHardness: state => state.hardness,
        getHardnessPrice: (state, getters) => {
            if (! state.shape || ! state.size) {
                return state.basePrice;
            }

            let match = state.hardness.match(/([0-9]+)([a-zA-Z]+)/i);

            let hardnessNum = parseInt(match[1]);
            let hardness = HARDNESS.HS_100A;

            if (getters.getSHR == true) {

                if (hardnessNum >= 83 && hardnessNum <= 84 && match[2] == 'B') {
                    // 83-84B
                    hardness = HARDNESS.HS_83B;
                } else {
                    // 102A SHR
                    hardness = HARDNESS.HS_102A;
                }
            } else {
                if (hardnessNum <= 94 && match[2] == 'A') {
                    // 90-94A
                    hardness = HARDNESS.HS_90_94A;
                } else if (hardnessNum == 95 && match[2] == 'A') {
                    // <= 95A
                    hardness = HARDNESS.HS_95A;
                } else if (hardnessNum > 95 && hardnessNum <= 100 && match[2] == 'A') {
                    // less 102A
                    hardness = HARDNESS.HS_100A;
                } else if (hardnessNum > 100 && hardnessNum <= 102 && match[2] == 'A') {
                    // 102A SHR
                    hardness = HARDNESS.HS_102A;

                } else if (hardnessNum >= 83 && match[2] == 'B') {
                    // 83-84B SHR
                    hardness = HARDNESS.HS_83B;
                } else {
                    // 102A SHR
                    hardness = HARDNESS.HS_102A;
                }
            }

            let hardnessprice = state.sizePrices.find(price => {
                return price.hardness_id == hardness && price.size_id == state.size.size_id
            }) || null;

            if (hardnessprice == null) {
                hardnessprice = state.basePrice;
            } else {
                hardnessprice = hardnessprice.price;
            }

            return parseFloat(hardnessprice);
        },
        getPerSetPrice: (state, getters) => {
            state.perSetPrice =  state.perSet 
                + getters.typePrice 
                + getters.getHardnessPrice
                + getters.frontPrice
                + getters.backPrice
                + state.placementPrice
                + (state.isPrintCardboard ? state.cardboardPrice : 0)
                + (state.isPrintCarton ? state.cartonPrice : 0);

            return state.perSetPrice;
        },
        typePrice: state => {
            return (state.type ? parseFloat(state.type.price) : 0) * state.profitMargin;
        },
        frontPrice: state => {
            if (state.isFrontPrint == false) {
                return 0;
            }

            return WheelService.calculateColorPrice(state.frontPrintColors, state.colorMargin, state.colorPrice);
        },
        backPrice: state => {
            if (state.isBackPrint == false) {
                return 0;
            }

            return WheelService.calculateColorPrice(state.backPrintColors, state.colorMargin, state.colorPrice);
        },
    },
    mutations: {
        setHardnessList(state, payload) {
            state.hardnessList = payload
        },
        setWheel(state, payload) {
            state.wheelId = payload.wheel_id;
            state.quantity = payload.quantity;
            state.totalQuantity -= payload.quantity;
            let typeIndex = state.types.findIndex(type => type.name == payload.type);

            state.type = state.types[typeIndex];

            state.type.colors = payload.type_colors ? payload.type_colors.split(',') : [];

            let shapeIndex = state.shapes.findIndex(shape => shape.name == payload.shape);
            state.shape = state.shapes[shapeIndex];

            let shapeSizeIndex = state.shape.sizes.findIndex(size => size.size == payload.size);

            Vue.nextTick(() => {
                state.size = state.shape.sizes[shapeSizeIndex];
                $("#shape_size").val(shapeSizeIndex).trigger('change');
            });

            state.hardness = payload.hardness;
            state.shr = payload.is_shr;

            if (payload.top_print) {
                state.isFrontPrint = 1;
                state.frontPrintFile = payload.top_print;
                state.frontPrintColors = payload.top_colors;

                Vue.nextTick(() => {
                    document.getElementById('step-4-recent').innerHTML = payload.top_print;
                });
            }

            if (payload.back_print) {
                state.isBackPrint = 1;
                state.backPrintFile = payload.back_print;
                state.backPrintColors = payload.back_colors;

                Vue.nextTick(() => {
                    document.getElementById('step-5-recent').innerHTML = payload.back_print;
                });
            }

            state.placement = payload.placement;
            state.placementPrice = WheelService.calculatePlacementPrice(payload.placement);

            if (payload.cardboard_print) {
                state.isPrintCardboard = 1;
                state.printCardboardFile = payload.cardboard_print;

                Vue.nextTick(() => {
                    document.getElementById('step-7-recent').innerHTML = payload.cardboard_print;
                });
            }

            if (payload.carton_print) {
                state.isPrintCarton = 1;
                state.printCartonFile = payload.carton_print;
                state.printCartonColors = payload.carton_colors;

                Vue.nextTick(() => {
                    document.getElementById('step-8-recent').innerHTML = payload.carton_print;
                });
            }

            Vue.nextTick(() => {
                $("#type").val(typeIndex).trigger('change'); 
                $("#shape").val(shapeIndex).trigger('change');
            });
        },
        setSessionInfo(state, payload) {
            state.isAuth = payload.isAuth;
            state.totalQuantity = payload.totalQuantity;
            state.totalSum = payload.totalSum;

            state.perSet = WheelService.calculatePerSet(
                state.totalSum + (state.quantity * state.perSetPrice), 
                state.totalQuantity + state.quantity
            );
        },
        setTypes(state, payload) {
            state.types = payload;

            state.types.map(type => {
                type.colors = Array(type.count_colors).fill(null);
            });
        },
        setOptions(state, payload) {
            state.basePrice = parseFloat(payload.wheel_base_price);
            state.profitMargin = parseFloat(payload.wheel_profit_margin);
            state.colorPrice = parseFloat(payload.wheel_color_price);
            state.colorMargin = parseFloat(payload.wheel_color_profit_margin);
            state.cartonPrice = parseFloat(payload.wheel_carton_price);
            state.cardboardPrice = parseFloat(payload.wheel_cardboard_price);
        },
        setShapes(state, payload) {
            state.shapes = payload;
        },
        setShapePrint(state, payload) {
            state.shapePrint = payload;
        },
        setColorPrice(state, payload) {
            state.colorPrice = payload;
        },
        setColorMargin(state, payload) {
            state.colorMargin = payload;
        },
        setprofitMargin(state, payload) {
            state.profitMargin = payload;
        },
        setSizePrices(state, payload) {
            state.sizePrices = payload;
        },
    	changeQuantity(state, payload) {
    		state.quantity = payload;

            state.perSet = WheelService.calculatePerSet(
                state.totalSum + (state.quantity * state.perSetPrice), 
                state.totalQuantity + state.quantity
            );
    	},
    	changeType(state, payload) {
    		state.type = payload;
    	},
        changeShape(state, payload) {
            state.shape = payload;
            state.size = null;
        },
        changeSize(state, payload) {
            state.size = payload;

            if (!state.size) {
                return;
            }

            let meta = state.size.size.match(/\d{2}/);
            let hardnessMatch = state.hardness.match(/(\d{2})(\w){1}/);

            meta = parseInt(meta[0]);

            // wheels size =< 53mm, only enable 90A to 84B
            if (meta <= 53 && parseInt(hardnessMatch[1]) < 90 && hardnessMatch[2] == 'A') {
                state.hardness = '90A';

            // wheels size 54 - 56mm, enable 85A to 84B
            } else if (meta > 53 && meta <= 56 && parseInt(hardnessMatch[1]) < 85 && hardnessMatch[2] == 'A') {
                state.hardness = '85A';
            }
        },
        changeHardness(state, payload) {
            state.hardness = payload;
        },
        changeSHR(state, payload) {
            state.shr = payload;
        },
        changeFrontPrint(state, payload) {
            state.isFrontPrint = payload; 
        },
        changeFrontPrintColors(state, payload) {
            state.frontPrintColors = payload;
        },
        changeFrontPrintFile(state, payload) {
            state.frontPrintFile = payload;

            if (state.isBackPrint == false) {

                state.isBackPrint = true;
                state.backPrintFile = state.frontPrintFile;
                state.backPrintColors = state.frontPrintColors;

                let input = document.getElementById('step-5-upload');
                input.nextElementSibling.innerHTML = state.frontPrintFile;
                input.nextElementSibling.classList.remove("unchecked");
                document.getElementById('step-5-recent').innerHTML = state.frontPrintFile;
            }
        },
        changeBackPrint(state, payload) {
            state.isBackPrint = payload;
        },
        changeBackPrintColors(state, payload) {
            state.backPrintColors = payload;
        },
        changeBackPrintFile(state, payload) {
            state.backPrintFile = payload;
        },
        changePlacement(state, payload) {
            state.placement = payload;

            state.placementPrice = WheelService.calculatePlacementPrice(state.placement);
        },
        changePrintCardboard(state, payload) {
            state.isPrintCardboard = payload;
        },
        changePrintCartonColors(state, payload) {
            state.printCartonColors = payload;
        },
        changePrintCardboardFile(state, payload) {
            state.printCardboardFile = payload;
        },
        changePrintCarton(state, payload) {
            state.isPrintCarton = payload;
        },
        changePrintCartonFile(state, payload) {
            state.printCartonFile = payload;
        }
    },
    actions: {
        getHanbook({commit, state }) {
            return new Promise((resolve, reject) => {
                axios.get('/api/v1/wheels/handbook')
                    .then(repsonse => repsonse.data)
                    .then(repsonse => {
                        commit('setTypes', repsonse.types);
                        commit('setShapes', repsonse.shapes);
                        commit('setSizePrices', repsonse.hardnessPrices);

                        commit('setOptions', repsonse.options);

                    })
                    .then(response => {

                        if (state.wheelId == null) {
                            // Base White by default
                            state.type = state.types[0];
                            let shapeIndex = state.shapes.findIndex(shape => shape.shape_id == 1) || 0;
                            // Set N Wheel by default
                            state.shape = state.shapes[shapeIndex];

                            // Set base
                            Vue.nextTick(() => {
                                $("#type").val(0).trigger('change');
                                $("#shape").val(shapeIndex).trigger('change');
                            });
                        }
                    })
                    .then(response => {

                        if (state.wheelId == null) {
                            state.size = state.shape.sizes[0];

                            Vue.nextTick(() => {
                                // 50*30 mm by default
                                $("#shape_size").val(0).trigger('change');
                            });
                        }
                    })
                    .then(response => {
                        resolve(response);
                    })
                    .catch(error => {
                        reject(error);
                    });
            })
        },
        saveWheel({commit, state , getters}) {
            return new Promise((resolve, reject) => {

                var formData = new FormData();
                formData.append('quantity', state.quantity);
                formData.append('type', state.type.name);
                formData.append('type_colors', state.type.colors.length ? state.type.colors.join(',') : '');
                formData.append('shape', state.shape.name);

                if (state.shape.is_custom) {
                    formData.append('shape_print', getters.getShapePrint);
                }
                
                formData.append('size', state.size.size);
                formData.append('contact_patch', state.size.contact_patch);
                formData.append('hardness', state.hardness);
                formData.append('is_shr', state.shr ? 1 : 0);

                if (state.isFrontPrint && state.frontPrintFile) {
                    formData.append('top_print', state.frontPrintFile);
                    formData.append('top_colors', state.frontPrintColors);
                }

                if (state.isBackPrint && state.backPrintFile) {
                    formData.append('back_print', state.backPrintFile);
                    formData.append('back_colors', state.backPrintColors);
                }

                formData.append('placement', state.placement);

                if (state.isPrintCardboard && state.printCardboardFile) {
                    formData.append('cardboard_print', state.printCardboardFile);
                }

                if (state.isPrintCarton && state.printCartonFile) {
                    formData.append('carton_print', state.printCartonFile);
                    formData.append('carton_colors', state.printCartonColors);
                }

                formData.append('price', getters.getPerSetPrice);
                formData.append('total', getters.getPerSetPrice * state.quantity);

                let path = '/skateboard-wheel-configurator';

                if (state.wheelId !== null) {
                    path = `/skateboard-wheel-configurator/${state.wheelId}`;
                }
    
                axios({
                    method: 'POST',
                    url: path,
                    data: formData
                })
                    .then(repsonse => {
                        resolve(repsonse);
                    })
                    .catch(error => {
                        reject(error);
                    });
            })
        }
    }
};