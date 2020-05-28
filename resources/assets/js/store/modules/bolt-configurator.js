export default {
    namespaced: true,
    state: {
        quantity: null,
        color: null,
        costset: null,
    },
    getters: {
        getCostSet: state => state.costset ? state.costset :  {name: 'Cost 8 pcs', value: 0}

    },
    mutations: {
        setQuantity(state, payload) {
            state.quantity = payload;
        },
        setColor(state, payload) {
            state.color = payload;
        },
        setMaterial(state, payload) {
            state.material = payload;
        },
        setSize(state, payload) {
            state.size = payload;
        },
        setPhilAllen(state, payload) {
            state.phil_allen = payload;
        },
        setCostSet(state, payload) {
            state.costset = payload;
        },
        setAllenType(state, payload) {
            state.allen_type = payload;
        },
        setPack(state, payload) {
            state.pack = payload;
        },
        setDesignName(state, payload) {
            state.step_designName = payload;
        },
        setReorder(state, payload){
            state.step_reorder = payload;
        },
        setPackColor(state, payload){
            state.step_pantoneColor = payload;
        }
    },
    actions: {}
};