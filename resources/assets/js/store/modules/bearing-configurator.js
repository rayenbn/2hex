export default {
    namespaced: true,
    state: {
        quantity: null,
        material: null,
        abec: null,
        race: null,
        shield: null,
        spamaterial: null,
        step_spacolor: null,
        step_packfirst: null,
        step_brandfirst: null,
        step_packsecond: null,
        step_packthird: null,
        step_brandsecond: null,
    },
    getters: {
        getBearingQuantity: state => state.quantity ? state.quantity.value : 0,
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
            state.material = payload;
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
        setShield(state, payload) {
            state.shield = payload;
        },
        setShieldBrand(state, payload) {
            state.shieldbrand = payload;
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
        setDesignName(state, payload) {
            state.step_designName = payload;
        },
        setReorder(state, payload){
            state.step_reorder = payload;
        },
        setPantoneColor(state, payload){
            state.step_pantoneColor = payload;
        }
    },
    actions: {}
};