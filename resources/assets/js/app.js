
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
window.Select2 = require('select2');
// window.store = require('./store');


import Simplert from 'vue2-simplert';
import swal from 'sweetalert';
import store from './store';
import {mapGetters} from 'vuex';
import Multiselect from 'vue-multiselect';

window.vuex = require('vuex');
window.store = store;
window.mapGetters = mapGetters;
Vue.use(store)

// Vue.use(store);
// import 'vue-instant/dist/vue-instant.css';
// import VueInstant from 'vue-instant';

// Vue.use(VueInstant);

// Vue.component('alert',require('./components/SweetAlert.vue'));
Vue.component('multiselect',Multiselect);

Vue.component('highlight-search',require('./components/HighlightSearch.vue'));

Vue.component('vue-pagination', require('./components/Pagination.vue'));

Vue.component('autocomplete',require('./components/Autocomplete.vue'));

Vue.component('tab',require('./components/Tab.vue'));

Vue.component('tabs',require('./components/Tabs.vue'));

Vue.component('button-up',require('./components/ButtonUp.vue'));

Vue.component('list-category',require('./components/ListCategory.vue'));

Vue.component('carousel',require('./components/product/ImageCarousel.vue'));

Vue.component('message', require('./components/Message.vue'));

Vue.component('list-cart',require('./components/ListCart.vue'));

Vue.component('notif-cart',require('./components/NotifAmountCart.vue'));

Vue.component('qty',require('./components/Qty-field.vue'));

Vue.component('ongkir',require('./components/Ongkir.vue'));

Vue.component('rating',require('./components/Rating.vue'));

// Vue.component('example',require('./components/Example.vue'));

// const app = new Vue({
// 	store,
//     el: '#app'
// });
