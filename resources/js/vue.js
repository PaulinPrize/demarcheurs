window.Vue = require('vue');

Vue.component('ad', require('./components/LogementComponent.vue').default);

const app = new Vue({
    el: '#app'
});  
  