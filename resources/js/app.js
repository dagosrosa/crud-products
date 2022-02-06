/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');
import moment from 'moment';
window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('products-list-component', require('./components/product/ProductsListComponent.vue').default);
Vue.component('products-upload-component', require('./components/product/ProductsUploadComponent.vue').default);
Vue.component('product-edit-component', require('./components/product/ProductEditComponent.vue').default);
Vue.component('product-delete-component', require('./components/product/ProductDeleteComponent.vue').default);

Vue.filter('formatDate', function(value) {
    if (value) {
        return moment(String(value)).format('DD/MM/YYYY')
    }
});

Vue.filter('currency', function (value) {
    return parseFloat(value).toLocaleString('pt-br',{style: 'currency', currency: 'BRL'});
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
