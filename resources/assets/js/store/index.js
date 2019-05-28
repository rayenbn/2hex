import Vue from "vue";
import Vuex from "vuex";

import gripTapeConfigurator from './modules/griptape-configurator';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {},
    mutations: {},
    actions: {},
    getters: {},
    modules: {
    	gripTapeConfigurator
    }
});
