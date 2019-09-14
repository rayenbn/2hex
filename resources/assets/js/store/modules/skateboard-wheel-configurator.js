export default {
    namespaced: true,
    state: {
        quantity: 2000,
        type: null
    },
    getters: {},
    mutations: {
    	changeQuantity(state, payload) {
    		console.log(payload);
    		state.quantity = payload;
    	},
    	changeType(state, payload) {
    		console.log(payload);
    		state.type = payload;
    	}
    },
    actions: {}
};