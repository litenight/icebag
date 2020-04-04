require('./bootstrap');

window.Vue = require('vue');

Vue.component('finder', require('./components/Finder.vue').default);

const app = new Vue({
    el: '#app',
});
