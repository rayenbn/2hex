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
        changeQuantity(state, payload) {
            state.quantity = payload;
        },
        changeSize(state, payload) {
            state.size = payload;
        }
    },
    actions: {
        setQuantity: ({ commit }, payload) => {
            commit('changeQuantity', payload)
        },
        setSize: ({ commit }, payload) => {
            commit('changeSize', payload)
        }
    }
};