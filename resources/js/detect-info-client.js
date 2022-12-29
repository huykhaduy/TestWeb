window.Vue = require('vue');
Vue.component('detect-info-client', require('./components/layout/detectInfoClient').default);
new Vue({
    el: '#detect'
});

