
require('./bootstrap');

window.Vue = require('vue').default;


// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('vueForm', require('./components/CustomForm.vue').default);
// Vue.component('vueModal', require('./components/CustomModal.vue').default);
Vue.component('vue-table', require('./components/CustomTable.vue').default);
Vue.component('vue-modal-link', require('./components/ModalLink.vue').default);

const app = new Vue({
    el: '#app',
});
