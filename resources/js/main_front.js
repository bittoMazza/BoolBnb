import Vue from 'vue';
import VueRouter from 'vue-router';
import App from './views/App';

window.Vue = require('vue');
Vue.use(VueRouter)

import router from './router';

const app = new Vue({
    el: '#root',
    render: h => h(App), //mostriamo App all'avvio di Vue
    router
});