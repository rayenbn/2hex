import HeatTransferService from '@/components/transfers/Classes/HeatTransferService.js';

let heatTransferService = new HeatTransferService();

export default {
    namespaced: true,
    state: {
        quantity: 6000,
        size: null,
        designName: '',
        transparent: false,
        pantoneColor: null,
        colors: [],
        countColors: 0,
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
        getPantoneColor: state => state.pantoneColor,
        getDesignName: state => state.designName,
        getTransparencies: state => state.transparent,
        getSmallPreview: state => state.smallPreview,
        getLargePreview: state => state.largePreview,
        getReOrder: state => state.reOrder,
        getRecentFiles: state => state.recentFiles,
        getIsAdmin: state => state.isAdmin,
        hasChange: state => !state.reOrder || (state.isAdmin &&  state.reOrder),
        costPerTransfer: state => {
            return heatTransferService.calculateCostPerTransfer(
                state.countColors,
                state.transfersQuantity
            );
        },
        costPerSheet: (state, getters) => {
            let cost = heatTransferService.calculateCostPerSheet(
                state.countColors,
                state.transfersColorsQuantity,
                Boolean(state.transparent),
                state.countColors === 0
            );

            if (state.size && state.size.hasOwnProperty('percent')) {
                console.log(cost, state.size.percent);
                return heatTransferService.priceWithMargin(cost, state.size.percent);
            }

            return cost;
        },
        totalQuantity: state => {
            return state.quantity + state.transfersQuantity;
        },
        totalColors: state => {
            return state.countColors + state.transfersColorsQuantity;
        },
        pricePerSheet: (state, getters) => {
            return getters.costPerSheet * getters.costPerTransfer;
        }
    },
    mutations: {
        setQuantity(state, payload) {
            state.quantity = parseInt(payload);
        },
        setSize(state, payload) {
            state.size = payload;
        },
        setDesignName(state, payload) {
            state.designName = payload;
        },
        setTransparencies(state, payload) {
            state.transparent = payload;
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
    actions: {}
};