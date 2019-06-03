import "./bootstrap";
import Vue from "vue";

import store from "./store";

import commonComponents from './components';

commonComponents.forEach(component => {
    Vue.component(component.name, component);
});

export default new Vue({
  	el: "#app",
  	store
});
