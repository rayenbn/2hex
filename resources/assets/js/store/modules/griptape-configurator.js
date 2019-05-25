export default {
    namespaced: true,
    state: {
        price: 0,
        quantity: 0,
        size: null,
    },
    getters: {
        getGriptapePrice: state => state.price,
        getGriptapeQuantity: state => state.quantity,
        getGriptapeSize: state => state.size,
    },
    mutations: {
        changePrice(state, payload) {
            state.price = state.price + payload;
        },
        setQuantity(state, payload) {
            state.quantity = payload;
        },
        setSize(state, payload) {
            state.size = payload;
        }
    },
    actions: {}
};