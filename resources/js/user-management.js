window.Vue = require('vue');
Vue.component('user-management', require('./components/pages/userManagemant').default);
new Vue({
    el: '#app'
});

