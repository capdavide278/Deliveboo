

require('./bootstrap');

// window.Vue = require('vue');


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
import Vue from 'vue'; //importiamo la libreria vue
// import VueRouter from 'vue-router'; //importiamo la libreria vue router

import App from './App.vue'; //importiamo il file App.vue


const app = new Vue({
    el: '#app',
    render: h => h(App),
});
