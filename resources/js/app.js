require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
window.VueAxios=require('vue-axios').default;
window.Axios=require('axios').default;

import {routes} from './routes';
import StoreData from './store';
import AppLayout from './components/App.vue';
import {initialize} from './helpers/general';

Vue.use(VueRouter);
Vue.use(Vuex);

const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes: routes,
    mode:'history'
});

initialize(store, router);
new Vue(
    Vue.util.extend(
        { router, store },
        AppLayout
    )
).$mount('#app');


