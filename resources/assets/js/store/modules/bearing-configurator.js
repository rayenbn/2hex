export default {
    namespaced: true,
    state: {
        quantity: 0,
        material: null
    },
    getters: {
        getBearingQuantity: state => state.quantity,
        getBearingMaterial: state => state.material,
        getRace: state => state.race,
        getAbec: state => state.abec,
        getRetainer: state => state.retainer,

    },
    mutations: {
        setQuantity(state, payload) {
            state.quantity = payload;
        },
        setMaterial(state, payload) {
            state.size = payload;
        },
        setAbec(state, payload) {
            state.abec = payload;
        },
        setRace(state, payload) {
            state.race = payload;
        },
        setRetainer(state, payload) {
            state.retainer = payload;
        },
        setSpamaterial(state, payload) {
            state.spamaterial = payload;
        },
        setSpacolor(state, payload) {
            state.step_spacolor = payload;
        },
        setPackfirst(state, payload) {
            state.step_packfirst = payload;
        },
        setBrandfirst(state, payload) {
            state.step_brandfirst = payload;
        },
        setPacksecond(state, payload) {
            state.step_packsecond = payload;
        },
        setPackthird(state, payload) {
            state.step_packthird = payload;
        },
        setBrandsecond(state, payload) {
            state.step_brandsecond = payload;
        },
    },
    actions: {}
};