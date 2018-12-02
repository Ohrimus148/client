import Login from './components/auth/Login.vue';
import ClientList from './components/clients/ClientList.vue';
import ClientAdd from './components/clients/ClientAdd.vue';
import ClientDelete from './components/clients/ClientDelete.vue';
import ClientEdit from './components/clients/ClientEdit.vue';
import ClientView from './components/clients/ClientView.vue';
import ContactList from './components/contacts/ContactList.vue';
import ContactAdd from './components/contacts/ContactAdd.vue';
import ContactDelete from './components/contacts/ContactDelete.vue';
import ContactEdit from './components/contacts/ContactEdit.vue';
import ContactView from './components/contacts/ContactView.vue';
import ClientContacts from './components/clients/ClientContacts.vue';

export const routes = [
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
        name: 'ContactList',
        path: '/all',
        component: ContactList,
        meta: {
            requiresAuth: true
        }
    },

    {
        name: 'ClientAdd',
        path: '/create',
        component: ClientAdd,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: 'ClientEdit',
        path: '/clients/edit',
        component: ClientEdit,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: 'ClientDelete',
        path: '/clients/:id',
        component: ClientDelete,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: 'ClientView',
        path: '/clients/:id',
        component: ClientView,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: 'ContactAdd',
        path: '/contacts/create',
        component: ContactAdd,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: 'ContactEdit',
        path: '/contacts/edit',
        component: ContactEdit,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: 'ContactDelete',
        path: '/contacts/:id',
        component: ContactDelete,
        meta: {
            requiresAuth: true
        }
    },
    {
        name: 'ContactView',
        path: '/contacts/:id',
        component: ContactView,
        meta: {
            requiresAuth: true
        }
    },

    {
        name: 'ClientContacts',
        path: '/clients/contacts',
        component: ClientContacts,
        meta: {
            requiresAuth: true
        }
    },

];