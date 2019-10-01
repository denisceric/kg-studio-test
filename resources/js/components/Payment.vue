<template>
<div class="modal-mask" @click="$emit('close')">
    <div class="modal-wrapper">
        <div class="modal-container container" @click.stop>
            <div>
                <div class="card">
                    <div class="card-header">
                        <h3>Choose payment method</h3>
                    </div>
                    
                    <div class="card-body" style="height: 200px; padding:0">
                        <div v-if="paid" class="h-100 justify-content-center text-center">
                            <svg version="1.1" class="m-3" width="68" hieght="68" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
                            <circle style="fill:#25AE88;" cx="25" cy="25" r="25"/>
                            <polyline style="fill:none;stroke:#FFFFFF;stroke-width:2;stroke-linecap:round;stroke-linejoin:round;stroke-miterlimit:10;" points="
                                38,15 22,33 12,25 "/>
                            </svg><br>
                            <h1 class="my-auto">You have completed the payment!</h1>
                        </div>
                        <div v-else>
                            <PayPal
                                ref="myBtn"
                                class="mt-5"
                                amount="10.00"
                                currency="USD"
                                :client="paypal"
                                env="sandbox"
                                :button-style="btnStyle"
                                @payment-completed="paymentCompleted"
                                @payment-cancelled="paymentCancelled">
                            </PayPal>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
import PayPal from 'vue-paypal-checkout';
import axios from 'axios'
    export default {
        name: 'payment',
        props: ['email'],
        components: {
            PayPal
        },
        data() {
            return {
                paypal: {
                    sandbox: 'ASl2s1url0eCesOPuiS6Va93vCRnYk_-fmWMH5FHde9WJQetaaAe9uZJkJmQOJ4x6F2NsZkP2o8IHTzJ'
                },
                btnStyle: {
                    label: 'pay',
                    size:  'responsive',
                    shape: 'rect',
                    color: 'blue'
                },
                paid: false
            }
        },
        mounted() {
            this.paymentStatus()
        },
        methods: {
            paymentStatus() {
                axios.get('/api/payment-status/', { params: {
                    email: this.email
                }})
                .then((response) => {
                    this.paid = response.data.paid;
                })
                .catch((error) => {
                    console.log(error)
                })
            },
            paymentCompleted() {
                this.userPaid();
            },
            paymentCancelled() {
                console.log('Cancelled!');
            },
            userPaid() {
                this.paid = true;
                axios.post('/api/customer-paid', {
                    email: this.email
                })
                .then((response) => {})
                .catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>

<style scoped>
.container {
    padding: 0;
}
.modal-mask {
    position: fixed;
    z-index: 9998;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, .5);
    display: table;
    transition: opacity .3s ease;
}

.modal-wrapper {
    display: table-cell;
    vertical-align: middle;
}

.modal-container {
    box-shadow: 0 2px 8px rgba(0, 0, 0, .33);
    transition: all .3s ease;
}

.modal-enter {
    opacity: 0;
}

.modal-leave-active {
    opacity: 0;
}


</style>