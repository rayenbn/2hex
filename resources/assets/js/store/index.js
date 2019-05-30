import Vue from "vue";
import Vuex from "vuex";

import gripTapeConfigurator from './modules/griptape-configurator';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
    	currentStep: 0
    },
    mutations: {
    	changeStep(state, payload) {
    		state.currentStep = payload;
    	}
    },
    actions: {},
    getters: {
    	getCurrentStep: state => state.currentStep
    },
    modules: {
    	gripTapeConfigurator
    }
});
