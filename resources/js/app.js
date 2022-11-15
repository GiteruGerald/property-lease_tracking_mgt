/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import "admin-lte/plugins/bootstrap/js/bootstrap";
require('./bootstrap');

window.Vue = require('vue');

// NPM Imports
import { createRouter, createWebHistory } from 'vue-router'
import { createApp } from 'vue'
import Routes from "./routes";
import Swal from "sweetalert";




  
const router = new createRouter({
    history:createWebHistory(),
    routes: Routes, // short for `routes: routes`
    linkActiveClass: 'active',

})


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const app = createApp({})
// const app = new Vue({
//     el: '#app',
//     router
// });
app.use(router)
app.mount('#app')


