/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

//EN ARGON YA SE LLAMA BOOSTRAP
//require('./bootstrap');

//se trae lo de bootstrap que es de AXIOS
/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require("axios");

window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common["X-CSRF-TOKEN"] = token.content;
} else {
    console.error(
        "CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token"
    );
}

window.Vue = require("vue");

//importacion de libreria Vue Router
import VueRouter from "vue-router";
Vue.use(VueRouter);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//LOS COMPONENTES DE VUEJS
//componentes de templateAdmin
Vue.component(
    "footeradmin",
    require("./components/templateAdmin/footerAdmin.vue").default
);
Vue.component(
    "navigation",
    require("./components/templateAdmin/navigation.vue").default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// 1. Define route components.
// These can be imported from other files
const home = require("./components/contentAdmin/home.vue").default;
const editarPerfil = require("./components/contentAdmin/editarPerfil.vue")
    .default;
// 2. definimos las rutas
const routes = [
    { path: "/", component: home },
    { path: "/editarPerfil", component: editarPerfil }
];

// 3. Create the router instance and pass the `routes` option
// You can pass in additional options here, but let's
// keep it simple for now.
const router = new VueRouter({
    //mode: "history", //quitando el hash # que viene por defecto con vue-router
    routes, // short for `routes: routes`
    base: "/"
});

const app = new Vue({
    el: "#app",
    router
});
