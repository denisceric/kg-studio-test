import Vue from 'vue'

import Subscribe from './components/Subscribe.vue';
import Payment from './components/Payment.vue';

const app = new Vue({
    el: '#app',
    components: { 
        Subscribe,
        Payment
    },
});