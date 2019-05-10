import Vue from "vue";
import Vuex from "vuex";

import configurator from "./modules/configurator";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    getters: {},
    modules: {
        configurator
    }
});
