import Vue from 'vue'

window.axios = require('axios');

import Subscribe from './components/Subscribe.vue';
import Payment from './components/Payment.vue';
import Customers from './components/Customers.vue';

const app = new Vue({
    el: '#app',
    components: { 
        Subscribe,
        Payment,
        Customers
    },
});