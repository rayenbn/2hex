export default {
    namespaced: true,
    state: {
        quantity: 6000,
        size: null,
        designName: '',
        transparencies: false,
        pantoneColor: null,
        smallPreview: null
    },
    getters: {
        getQuantity: state => state.quantity,
        getSize: state => state.size,
        getPantoneColor: state => state.pantoneColor,
        getDesignName: state => state.designName,
        getTransparencies: state => state.transparencies,
        getSmallPreview: state => state.smallPreview,
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
        }
    },
    actions: {}
};