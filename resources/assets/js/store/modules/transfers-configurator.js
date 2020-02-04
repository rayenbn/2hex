import HeatTransferService from '@/components/transfers/Classes/HeatTransferService.js';
import {CMYK_COLORS_COUNT} from '@/constants.js';

let heatTransferService = new HeatTransferService();

export default {
    namespaced: true,
    state: {
        quantity: 6000,
        size: null,
        designName: '',
        transparency: false,
        pantoneColor: null,
        colors: null,
        countColors: 0,
        isCMYK: false,
        smallPreview: null,
        largePreview: null,
        reOrder: false,
        recentFiles: null,
        isAdmin: false,

        transfersColorsQuantity: 0,
        transfersQuantity: 0,
    },
    getters: {
        getQuantity: state => state.quantity,
        getSize: state => state.size,
        getCMYK: state => state.isCMYK,
        getPantoneColor: state => state.pantoneColor,
        getDesignName: state => state.designName,
        getTransparency: state => state.transparency,
        getSmallPreview: state => state.smallPreview,
        getLargePreview: state => state.largePreview,
        getReOrder: state => state.reOrder,
        getRecentFiles: state => state.recentFiles,
        getIsAdmin: state => state.isAdmin,
        hasChange: state => !state.reOrder || (state.isAdmin &&  state.reOrder),
        transferPrice: (state, getters) => {
            let price =  heatTransferService.calculateTransferPrice(
                state.countColors + +state.transparency,
                getters.totalQuantity,
                state.quantity,
                state.isCMYK
            );

            if (state.size && state.size.hasOwnProperty('percent')) {
                return price * state.size.percent / 100;
            }

            return price;
        },
        screensPrice: (state, getters) => {
            let cost = heatTransferService.calculateScreensPrice(
                state.countColors + +state.transparency,
                getters.totalColors,
                state.isCMYK
            );

            if (state.transparency) {
                cost += getters.transparentPrice;
            }

            if (state.size && state.size.hasOwnProperty('percent')) {
                return cost * state.size.percent / 100;
            }

            return cost;
        },
        transparentPrice: (state, getters) => {
            return heatTransferService.transparentPrice(getters.totalColors);
        },
        totalQuantity: state => {
            return state.quantity + state.transfersQuantity;
        },
        totalColors: state => {
            if (state.isCMYK) {
               return CMYK_COLORS_COUNT + state.transfersColorsQuantity;
            }

            return state.countColors + state.transfersColorsQuantity + +state.transparency;
        },
        pricePerSheet: (state, getters) => {
            return getters.screensPrice + getters.transferPrice;
        }
    },
    mutations: {
        setQuantity(state, payload) {
            state.quantity = parseInt(payload);
        },
        setSize(state, payload) {
            state.size = payload;
        },
        setTransfersColorsQuantity(state, payload) {
            state.transfersColorsQuantity = payload;
        },
        setTransfersQuantity(state, payload) {
            state.transfersQuantity = payload;
        },
        setCMYK(state, payload) {
            state.isCMYK = Boolean(payload);
        },
        setDesignName(state, payload) {
            state.designName = payload;
        },
        setTransparency(state, payload) {
            state.transparency = Boolean(payload);
        },
        setPantoneColor(state, payload) {
            state.pantoneColor = payload;
            state.colors = payload.colors;
            state.countColors = parseInt(payload.countFields);
        },
        setSmallPreview(state, payload) {
            state.smallPreview = payload;
        },
        setLargePreview(state, payload) {
            state.largePreview = payload;
        },
        setReOrder(state, payload) {
            state.reOrder = payload;
        },
        setRecentFiles(state, payload) {
            state.recentFiles = payload;
        },
        setIsAdmin(state, payload) {
            state.isAdmin = payload;
        },
    },
    actions: {
        saveBatch({commit, state , getters}) {
            return new Promise((resolve, reject) => {

                let formParam = {
                    quantity: state.quantity,
                    size: state.size.fullname,
                    size_margin: state.size.percent,
                    design_name: state.designName,
                    transparency: state.transparency,
                    colors_count: state.isCMYK ? CMYK_COLORS_COUNT : state.countColors + +state.transparency,
                    cmyk: state.isCMYK,
                    // colors: state.colors,
                    colors: null,
                    small_preview: state.smallPreview,
                    large_preview: state.largePreview,
                    price: getters.screensPrice,
                    total: getters.pricePerSheet,
                    reorder: state.reOrder,
                };

                let path = '/transfers-configurator';

                axios({method: 'POST', url: path, data: formParam})
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