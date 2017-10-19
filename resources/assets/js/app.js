
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
window.Flickity = require('vue-flickity');
window.VueInstant = require('vue-instant')
import Simplert from 'vue2-simplert';
Vue.use(Simplert)
// import 'vue-instant/dist/vue-instant.css';
// import VueInstant from 'vue-instant';

// Vue.use(VueInstant);

// Vue.component('alert',require('./components/SweetAlert.vue'));

Vue.component('autocomplete',require('./components/Autocomplete.vue'));

Vue.component('tab',require('./components/Tab.vue'));

Vue.component('tabs',require('./components/Tabs.vue'));

Vue.component('list-category',require('./components/ListCategory.vue'));

Vue.component('carousel',require('./components/product/ImageCarousel.vue'));

Vue.component('message', require('./components/Message.vue'));

// const app = new Vue({
//     el: '#app'
// });
