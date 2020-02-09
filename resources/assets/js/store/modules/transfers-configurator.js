import HeatTransferService from '@/components/transfers/Classes/HeatTransferService.js';

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
        cmykColors: ['CMYK', null, null, null],
        isCMYK: false,
        smallPreview: null,
        largePreview: null,
        reOrder: false,
        recentFiles: null,
        isAdmin: false,
        heatTransfer: null,

        transfersColorsQuantity: 0,
        transfersQuantity: 0,
    },
    getters: {
        getQuantity: state => state.quantity,
        getSize: state => state.size,
        getTransfersColorsQuantity: state => state.transfersColorsQuantity,
        getTransfersQuantity: state => state.transfersQuantity,
        getCMYK: state => state.isCMYK,
        getCMYKColors: state => state.cmykColors,
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
                getters.currentCountColors,
                getters.totalQuantity
            );

            if (state.size && state.size.hasOwnProperty('percent')) {
                price = state.quantity * (price + getters.heatTransferPrice) * state.size.percent / 100;
            } else {
                price = state.quantity * (price + getters.heatTransferPrice);
            }

            return parseFloat(price.toFixed(2));
        },
        screensPrice: (state, getters) => {
            let cost = heatTransferService.calculateScreensPrice(
                getters.currentCountColors,
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
        heatTransferPrice: (state, getters) => {
            if (! state.heatTransfer) {
                return 0;
            }

            return heatTransferService.calculateHeatTransferPrice(
                state.heatTransfer,
                getters.totalQuantity
            );
        },
        transparentPrice: (state, getters) => {
            return heatTransferService.transparentPrice(getters.totalColors);
        },
        totalQuantity: state => {
            return state.quantity + state.transfersQuantity;
        },
        currentCountColors: state => {
            if (state.isCMYK) {
                return state.cmykColors.length;
            }

            return state.countColors;
        },
        currentColors: state => {
            if (state.isCMYK) {
                return state.cmykColors;
            }

            return state.colors;
        },
        totalColors: (state, getters) => {
            return getters.currentCountColors + state.transfersColorsQuantity;
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
        setHeatTransfer(state, payload) {
            state.heatTransfer = payload;
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
        setCMYKColors(state, payload) {
            state.cmykColors = payload;
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
                    colors_count: getters.currentCountColors,
                    cmyk: state.isCMYK,
                    heat_transfer: state.heatTransfer ? state.heatTransfer.name : null,
                    colors: getters.currentColors.join(';'),
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