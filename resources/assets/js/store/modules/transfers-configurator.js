export default {
    namespaced: true,
    state: {
        sizeList: [
            {
                "fullname": "9\" x 33\" Transfer-paper on Skateboard Deck",
                "size": 33,
                "name": "Transfer-paper on Skateboard Deck",
                "image": ''
            },
            {
                "fullname": "8\" x 23\"  Transfer-paper on Mini Cruiser Deck",
                "size": 23,
                "name": "Transfer-paper on Mini Cruiser Deck",
                "image": ''
            },
            {
                "fullname": "12\" x 42\" Transfer-paper on  Longboard 1 Deck",
                "size": 42,
                "name": "Transfer-paper on  Longboard 1 Deck",
                "image": ''
            },
            {
                "fullname": "14\" x 48\"  Transfer-paper on Longboard 2 Deck",
                "size": 42,
                "name": "Transfer-paper on Longboard 2 Deck",
                "image": ''
            },
            {
                "fullname": "23\" x 45\"  Transfer-paper on Skimboard Deck",
                "size": 45,
                "name": "Transfer-paper on Skimboard Deck",
                "image": ''
            },
        ],
        quantity: 6000,
        size: null,
        designName: '',
        transparencies: true
    },
    getters: {
        getQuantity: state => state.quantity,
        getSize: state => state.size,
        getDesignName: state => state.designName,
        getTransparencies: state => state.transparencies,
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
        }
    },
    actions: {}
};