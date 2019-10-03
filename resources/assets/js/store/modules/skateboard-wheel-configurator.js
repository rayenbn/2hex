import {PLACEMENTS, HARDNESS} from '@/constants.js';
import WheelService from '@/components/skateboard-wheel-configurator/Classes/WheelService.js'

export default {
    namespaced: true,
    state: {
        isAuth: false,
        totalQuantity: 0,
        totalSum: 0,
        basePrice: 0,
        cartonPrice: 0,
        placementPrice: 0,
        profitMargin: 0,
        colorMargin: 0,
        colorPrice: 0,
        types: [],
        shapes: [],
        quantity: 2000,
        perSet: 0,
        type: null,
        shape: null,
        size: null,
        sizePrices: [],
        hardness: '98A',
        shr: false,
        isFrontPrint: false,
        frontPrintColors: null,
        frontPrintFile: null,
        isBackPrint: false,
        backPrintColors: null,
        backPrintFile: null,
        placement: PLACEMENTS.SQUARE,
        isPrintCardboard: false,
        printCardboardColors: null,
        printCardboardFile: null,
        isPrintCarton: false,
        printCartonFile: null,
        hardnessList: [
            '78A', '79A', '80A', '81A', '82A', '83A', '84A', '85A', '86A','87A', 
            '88A', '89A', '90A', '91A', '92A', '93A', '94A', '95A', '96A', '97A', 
            '98A', '99A', '100A', '101A', '102A', '83B', '84B',
        ],
    },
    getters: {
        getSHR: state => state.shr,
        getTypes: state => state.types,
        getShapes: state => state.shapes,
        getPerSet: state => state.perSet,
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
        getPrintCardboardColors: state => state.printCardboardColors,
        getPrintCardboardFile: state => state.printCardboardFile,

        getPrintCarton: state => state.isPrintCarton,
        getPrintCartonFile: state => state.printCartonFile,

        getQuantity: state => state.quantity,
        getType: state => state.type,
        getHardness: state => state.hardness,
        getHardnessPrice: state => {
            let index = state.hardnessList.findIndex(h => h == state.hardness);
            console.log(index, name);
            let hardness_id = 1;

            if (index == -1 || state.size == null) {
                return 0;
            }

            // <= 94A
            if (index <= 16) {
                hardness_id = 1;

            // = 95A
            } else if (index == 17) {
                hardness_id = 2;

            // > 95A and <= 101A
            } else if (index > 17 && index <= 23) {
                hardness_id = 3;

            // >= 102A
            } else if (index > 23 && index <= 24) {
                hardness_id = 4;

            // 84B
            } else {
                hardness_id = 5;
            }

            let hardness = state.sizePrices.find(size => {
                return size.size_id == state.size.size_id && size.hardness_id == hardness_id
            }) || null;

            if (hardness == null) {
                return 0;
            }

            return parseFloat(hardness.price);
        },
        getPerSetPrice: (state, getters) => {
            // If shr enabled, calculate without base price
            return (state.shr == false ? state.basePrice : 0) 
                + state.perSet 
                + getters.typePrice 
                + getters.getHardnessPrice
                + getters.frontPrice
                + getters.backPrice
                + state.placementPrice
                + (state.isPrintCarton ? state.cartonPrice : 0);
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
        setSessionInfo(state, payload) {
            state.isAuth = payload.isAuth;
            state.totalQuantity = payload.totalQuantity;
            state.totalSum = payload.totalSum;

            state.perSet = WheelService.calculatePerSet(payload.totalSum, payload.totalQuantity);
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
        },
        setShapes(state, payload) {
            state.shapes = payload;
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

            state.perSet = WheelService.calculatePerSet(state.totalSum, state.totalQuantity + payload);
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
                state.backPrintFile = payload;
                state.backPrintColors = state.frontPrintColors;

                let input = document.getElementById('step-5-upload');
                input.nextElementSibling.innerHTML = payload;
                input.nextElementSibling.classList.remove("unchecked");
                document.getElementById('step-5-recent').innerHTML = payload;

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

            switch(payload) {
                case PLACEMENTS.SQUARE: state.placementPrice = 0; break;
                case PLACEMENTS.ROLL: state.placementPrice = 0.05; break;
                case PLACEMENTS.LINE: state.placementPrice = 0.08; break;
                default: state.placementPrice = 0;
            }
        },
        changePrintCardboard(state, payload) {
            state.isPrintCardboard = payload;
        },
        changePrintCardboardColors(state, payload) {
            state.printCardboardColors = payload;
        },
        changePrintCardboardFile(state, payload) {
            state.printCardboardFile = payload;
        },
        changePrintCarton(state, payload) {
            state.isPrintCarton = payload;
        },
        changePrintCartonFile(state, payload) {
            state.printCartonFile = payload;
        },
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

                        resolve();
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
                formData.append('type_id', state.type.type_id);
                formData.append('type_colors', JSON.stringify(state.type.colors));
                formData.append('shape_id', state.shape.shape_id);
                formData.append('shape_print', null); // TODO need implements
                formData.append('hardness', state.hardness);
                formData.append('is_shr', state.shr ? 1 : 0);

                if (state.isFrontPrint) {
                    formData.append('top_print', state.frontPrintFile ? state.frontPrintFile : null);
                    formData.append('top_colors', state.frontPrintColors);
                }

                if (state.isBackPrint) {
                    formData.append('back_print', state.backPrintFile ? state.frontPrintFile : null);
                    formData.append('back_colors', state.backPrintColors);
                }

                formData.append('placement', state.placement);

                if (state.isPrintCardboard) {
                    formData.append('cardboard_print', state.printCardboardFile ? state.printCardboardFile : null);
                    formData.append('cardboard_colors', state.printCardboardColors);
                }

                if (state.isPrintCarton) {
                    formData.append('carton_print', state.printCartonFile ? state.printCartonFile : null);
                }

                formData.append('price', getters.getPerSetPrice);
                formData.append('total', getters.getPerSetPrice * state.quantity);

                axios.post('/skateboard-wheel-configurator', formData)
                    .then(repsonse => repsonse.data)
                    .then(repsonse => {
                        resolve();
                    })
                    .catch(error => {
                        reject(error);
                    });
            })
        }
    }
};