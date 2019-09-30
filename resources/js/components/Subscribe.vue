<template>
    <div class="container d-flex justify-content-center">
        <div class="jumbotron bg-dark2 shadow-sm my-auto text-center w-50">
            <div class="pb-5">Enter your e-mail and get lifetime of great daily quotes!</div>
            <input class="form-control form-control-lg w-100" type="text" placeholder="email@example.com">
            <div class="w-75 mx-auto">
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
                }
            }
        },
        methods: {
            paymentCompleted() {
                console.log('Completed!');
            },
            paymentCancelled() {
                console.log('Cancelled!');
            }
        }
    }
</script>
