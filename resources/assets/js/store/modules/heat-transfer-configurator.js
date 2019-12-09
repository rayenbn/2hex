export default {
    namespaced: true,
    state: {
        quantity: 0,
        size: null
    },
    getters: {
        getHeatTransferQuantity: state => state.quantity,
        getHeatTransferSize: state => state.size,
    },
    mutations: {
        setQuantity(state, payload) {
            state.quantity = payload;
        },
        setSize(state, payload) {
            state.size = payload;
        }
    },
    actions: {}
};