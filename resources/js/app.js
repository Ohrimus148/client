require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';
import VueAxios from 'vue-axios';
import {routes} from './routes';
import StoreData from './store';
import AppLayout from './components/App.vue';
import {initialize} from './helpers/general';

//window.Axios=require('axios').default;
//window.VueRouter=require('vue-router').default;

// let AppLayout = require('./components/App.vue');
// const ClientList = Vue.component('ClientList', require('./components/clients/ClientList.vue'));
// const ClientAdd = Vue.component('ClientAdd', require('./components/clients/ClientAdd.vue'));
// const ClientEdit = Vue.component('ClientEdit', require('./components/clients/ClientEdit.vue'));
// const ClientDelete = Vue.component('ClientDelete', require('./components/clients/ClientDelete.vue'));
// const ClientView = Vue.component('ClientView', require('./components/clients/ClientView.vue'));
// const Login = Vue.component('Login', require('./components/auth/Login.vue'));

Vue.use(VueRouter, VueAxios);
Vue.use(Vuex);
console.log('Hello');
const store = new Vuex.Store(StoreData);

const router = new VueRouter({
    routes: routes,
    mode:'history'
});

initialize(store, router);
const app = new Vue({
    el: '#app',
    router,
    store,
    components: {
        AppLayout
    }
});




