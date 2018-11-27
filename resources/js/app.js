
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
// import Axios from 'axios';

window.Axios=require('axios').default;
window.VueRouter=require('vue-router').default;
let AppLayout = require('./components/App.vue');

// show the list client component

const ClientList = Vue.component('ClientList', require('./components/ClientList.vue'));

// add client component

const ClientAdd = Vue.component('ClientAdd', require('./components/ClientAdd.vue'));

// edit client component

const ClientEdit = Vue.component('ClientEdit', require('./components/ClientEdit.vue'));

// delete client component

const ClientDelete = Vue.component('ClientDelete', require('./components/ClientDelete.vue'));

// view single component

const ClientView = Vue.component('ClientView', require('./components/ClientView.vue'));

//registering Modules

Vue.use(VueRouter, VueAxios, axios);

const routes = [
    {
        name: 'ClientList',
        path: '/',
        component: ClientList
    },
    {
        name: 'ClientAdd',
        path: '/create',
        component: ClientAdd
    },
    {
        name: 'ClientEdit',
        path: '/clients/edit',
        component: ClientEdit
    },
    {
        name: 'ClientDelete',
        path: '/clients/:id',
        component: ClientDelete
    },
    {
        name: 'ClientView',
        path: '/clients/:id',
        component: ClientView
    },

];
const router = new VueRouter({mode:'history', routes: routes});
new Vue(
    Vue.util.extend(
        { router },
        AppLayout
    )
).$mount('#app');


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app'
// });
