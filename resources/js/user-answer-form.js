import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'

Vue.component('user-answer-form', require('./components/Ui/UserAnswerForm').default);
Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

new Vue({
    el: '#user-form'
});
