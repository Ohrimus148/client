import Home from './components/Home.vue';
import Login from './components/auth/Login.vue';
import ClientList from './components/clients/ClientList.vue';
import ClientAdd from './components/clients/ClientAdd.vue';
import ClientDelete from './components/clients/ClientDelete.vue';
import ClientEdit from './components/clients/ClientEdit.vue';
import ClientView from './components/clients/ClientView.vue';

export const routes = [
    // {
    //     path: '/',
    //     component: Home,
    //     meta: {
    //         requiresAuth: true
    //     }
    // },
    {
        name: 'Login',
        path: '/login',
        component: Login
    },
    {
        name: 'ClientList',
        path: '/',
        component: ClientList,
        meta: {
            requiresAuth: true
        }
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
    // children: [
    // {
    //     name: 'ClientAdd',
    //     path: '/create',
    //     component: ClientAdd
    // },
    // {
    //     name: 'ClientEdit',
    //     path: '/clients/edit',
    //     component: ClientEdit
    // },
    // {
    //     name: 'ClientDelete',
    //     path: '/clients/:id',
    //     component: ClientDelete
    // },
    // {
    //     name: 'ClientView',
    //     path: '/clients/:id',
    //     component: ClientView
    // },

    // ]


];