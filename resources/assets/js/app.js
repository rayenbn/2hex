import "./bootstrap";
import Vue from "vue";
import * as VeeValidate from 'vee-validate';
import Notifications from 'vue-notification';

import store from "./store";
import commonComponents from './components';

Vue.use(VeeValidate);
Vue.use(Notifications);

commonComponents.forEach(component => {
    Vue.component(component.name, component);
});

export default new Vue({
  	el: "#app",
  	store
});
