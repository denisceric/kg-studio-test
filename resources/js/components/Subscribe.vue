<template>
    <div class="container d-flex justify-content-center">
        <div class="jumbotron bg-dark2 shadow-sm my-auto text-center w-50">
            <div class="pb-5">Enter your e-mail and get a lifetime of great daily quotes!</div>

            <div class="form-group">
            <input type="text" :class="['form-control', isEmailValid()]" id="inputSuccess1" v-model="email">
            </div>

            <div class="w-75 mx-auto" v-if="isEmailValid() !== 'is-valid'">
                <div class="paypal-button paypal-button-color mt-5"> <span class="paypal-button-text"> Buy Now</span></div>
            </div>
            <div class="w-75 mx-auto" v-else>
                <PayPal
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
</template>

<script>
    import PayPal from 'vue-paypal-checkout'
    export default {
        name: 'subscribe',
        components: { 
            PayPal
        },
        data() {
            return {
                paypal: {
                    sandbox: 'ASl2s1url0eCesOPuiS6Va93vCRnYk_-fmWMH5FHde9WJQetaaAe9uZJkJmQOJ4x6F2NsZkP2o8IHTzJ'
                },
                btnStyle: {
                    label: 'buynow',
                    size:  'responsive',
                    shape: 'rect',
                    color: 'blue'
                },
                email: '',
                isValidated: false,
                reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/
            }
        },
        methods: {
            isEmailValid() {
                return (this.email == "")? "" : (this.reg.test(this.email)) ? 'is-valid' : 'is-invalid';
            },
            paymentCompleted() {
                console.log('Completed!');
            },
            paymentCancelled() {
                console.log('Cancelled!');
            }
        }
    }
</script>

<style scoped>

.paypal-button {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 20px;
    font-weight:900;
    height: 48px;
    border-radius: 4px;
    color: white;
    cursor: no-drop;
}

.paypal-button-text {
    display: inline-block;
    white-space: pre-wrap;
}

.paypal-button .paypal-button-text {
    vertical-align: top;
    position: relative;
    top: 50%;
    transform: translateY(-50%);
    -webkit-transform: translateY(-50%);
    -moz-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    -o-transform: translateY(-50%);
    text-align: left;
}

.paypal-button-color {
    background-color: silver;
}


</style>