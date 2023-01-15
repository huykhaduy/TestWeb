import Vue from 'vue'
import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import UserAnswerForm from "./components/Ui/UserAnswerForm.vue";

Vue.use(BootstrapVue)
Vue.use(IconsPlugin)

new Vue({
    el: '#user-form',
    render: h => h(UserAnswerForm)
});
