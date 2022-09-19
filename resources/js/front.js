

require('./bootstrap');



import Vue from 'vue'; //importiamo la libreria vue
import VueRouter from 'vue-router'; //importiamo la libreria vue router

import App from './App.vue'; //importiamo il file App.vue

//importiamo i componenti delle pagine
import PageHome from './pages/PageHome.vue';
import PageAbout from './pages/PageAbout.vue';
import PageContacts from './pages/PageContacts.vue';
import Page404 from './pages/Page404.vue';
import PageShowDish from './pages/PageShowDish.vue';
import PageCart from './pages/PageCart.vue';

const routes = [
    {
        path: '/',
        name: 'home',
        component: PageHome,
    },
    {
        path: '/about',
        name: 'about',
        component: PageAbout,
    },
    {
        path: '/contacts',
        name: 'contacts',
        component: PageContacts,
    },
    {
        path: '/cart',
        name: 'cart',
        component: PageCart,
    },
    {
        //pagina di dettaglio dinamica del riasstorante con piatti
        path: '/:idRest',
        name: 'PageShowDish',
        component: PageShowDish,
        props: true //per le rotte dinamiche
    },

    {
        path: '*',
        name: 'page404',
        component: Page404,
    },
];

const router = new VueRouter({
    routes,
    mode: 'history',
});

Vue.use(VueRouter); //diciamo a vue di usare il pluggin vue router


const app = new Vue({
    el: '#app',
    render: h => h(App),
    router, //diciamo avue di inizializzare la nostra app usando il router
});
