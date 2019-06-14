import "./bootstrap";
import Vue from "vue";
import Notifications from 'vue-notification';

import store from "./store";

import commonComponents from './components';

 
Vue.use(Notifications);

commonComponents.forEach(component => {
    Vue.component(component.name, component);
});

export default new Vue({
  	el: "#app",
  	store
});
