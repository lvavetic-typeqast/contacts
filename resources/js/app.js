require('./bootstrap');

import VueRouter from 'vue-router'
import Routes from './routes/routes'
import App from './App.vue'

window.Vue = require('vue');

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: Routes
});

const app = new Vue({
    el: '#app',
    render: h => h(App),
    router: router,
});
