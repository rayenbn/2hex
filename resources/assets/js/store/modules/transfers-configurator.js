export default {
    namespaced: true,
    state: {
        quantity: 6000,
        size: null,
        designName: '',
        transparencies: false,
        pantoneColor: null,
        smallPreview: null,
        largePreview: null,
        reOrder: false,
        recentFiles: null,
        isAdmin: false
    },
    getters: {
        getQuantity: state => state.quantity,
        getSize: state => state.size,
        getPantoneColor: state => state.pantoneColor,
        getDesignName: state => state.designName,
        getTransparencies: state => state.transparencies,
        getSmallPreview: state => state.smallPreview,
        getLargePreview: state => state.largePreview,
        getReOrder: state => state.reOrder,
        getRecentFiles: state => state.recentFiles,
        getIsAdmin: state => state.isAdmin,
        hasChange: state => !state.reOrder || (state.isAdmin &&  state.reOrder),
    },
    mutations: {
        setQuantity(state, payload) {
            state.quantity = payload;
        },
        setSize(state, payload) {
            state.size = payload;
        },
        setDesignName(state, payload) {
            state.designName = payload;
        },
        setTransparencies(state, payload) {
            state.transparencies = payload;
        },
        setPantoneColor(state, payload) {
            state.pantoneColor = payload;
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