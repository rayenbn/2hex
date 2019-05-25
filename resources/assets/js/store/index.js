import Vue from "vue";
import Vuex from "vuex";

import griptapeConfigurator from "./modules/griptape-configurator";

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    getters: {},
    modules: {
        griptapeConfigurator
    }
});
