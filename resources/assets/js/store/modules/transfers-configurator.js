import HeatTransferService from '@/components/transfers/Classes/HeatTransferService.js';

let heatTransferService = new HeatTransferService();

export default {
    namespaced: true,
    state: {
        transferBatch: null,
        quantity: 6000,
        size: null,
        designName: '',
        transparency: false,
        pantoneColor: null,
        colors: null,
        countColors: 0,
        cmykColors: ['CMYK-Cyan', 'CMYK-Magenta', 'CMYK-Yellow', 'CMYK-Key Black'],
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
        getHeatTransfer: state => state.heatTransfer,
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
                state.quantity,
                getters.currentCountColors,
                getters.totalQuantity,
                getters.heatTransferPrice
            );

            if (state.size && state.size.hasOwnProperty('percent')) {
                price = price * state.size.percent / 100;
            }

            return heatTransferService.toNumber(price);
        },
        screensPrice: (state, getters) => {
            let cost = heatTransferService.calculateScreensPrice(
                getters.currentCountColors,
                getters.totalColors,
                state.isCMYK,
                state.transparency
            );

            if (state.size && state.size.hasOwnProperty('percent')) {
                cost = cost * state.size.percent / 100;
            }

            return heatTransferService.toNumber(cost);
        },
        heatTransferPrice: (state, getters) => {
            if (! state.heatTransfer) {
                return 0;
            }

            let price = heatTransferService.calculateHeatTransferPrice(
                state.heatTransfer,
                getters.totalQuantity
            );

            return heatTransferService.toNumber(price);
        },
        totalQuantity: state => {
            return state.quantity + state.transfersQuantity;
        },
        currentCountColors: state => {
            if (state.isCMYK) {
                return state.cmykColors.length;
            }

            return state.countColors + +state.transparency;
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
        },
        costPerTransfer: (state, getters) => {
            if (state.quantity > 0) {
                return heatTransferService.toNumber(getters.transferPrice / state.quantity);
            }

            return 0;
        },
        costPerScreen: (state, getters) => {
            return heatTransferService.toNumber(getters.screensPrice / getters.currentCountColors);
        },
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
        setTransfer(state, payload) {
            state.transferBatch = payload;
            state.quantity = payload.quantity;
            state.size = payload.size;
            state.designName = payload.design_name;
            state.transparency = Boolean(payload.transparency);
            state.countColors = payload.colors_count;
            state.reOrder = payload.reorder;
            state.smallPreview = payload.small_preview;
            state.largePreview = payload.large_preview;
            state.isCMYK = Boolean(payload.cmyk);

            // if (state.isCMYK) {
            //     state.cmykColors = payload.colors.split(';');
            //     // state.pantoneColor = {
            //     //     countFields: payload.colors_count - 4 - +payload.transparency,
            //     //     colors: payload.colors.split(';'),
            //     //     title: `3 field to enter Pantone Color`
            //     // };
            // } else {
            //     state.colors = payload.colors.split(';');
            // }

        }
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
                    colors: getters.currentColors.filter(Boolean).join(';'),
                    small_preview: state.smallPreview,
                    large_preview: state.largePreview,
                    total_screens: getters.screensPrice,
                    total: getters.transferPrice,
                    reorder: state.reOrder,
                    cost_per_transfer: getters.costPerTransfer,
                    cost_per_screen: getters.costPerScreen
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