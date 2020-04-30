
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// Support vuex
import Vuex from 'vuex'
Vue.use(Vuex);

import storeData from "./store/index"
const store = new Vuex.Store(
    storeData
)


// vue router
import VueRouter from 'vue-router';
Vue.use(VueRouter);

import {routes} from './routes';


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('home', require('./components/admin/AdminHome.vue').default);
Vue.component('admin-main', require('./components/admin/AdminMaster.vue').default);


// V-form
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
window.Form = Form;

////////////////////////////////////////////////////
// Sweet alert 2
// import swal from 'sweetalert2'
// window.swal = swal;
// const toast = swal.mixin({
//     toast: true,
//     position: 'top-end',
//     showConfirmButton: false,
//     timer: 3000
// });
// window.toast = toast;

//message
import VueSwal from 'vue-swal';
Vue.use(VueSwal);
////////////////////////////////////////////////////

const router = new VueRouter({
    routes, // short for `routes: routes`
    // mode:'hash',
    mode:'history',
})

const app = new Vue({
    el: '#app',
    router,
    store,
});
