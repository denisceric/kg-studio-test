<template>
    <div class="container d-flex justify-content-center">
        <div class="jumbotron bg-dark2 shadow-sm my-auto text-center w-50">
            <div class="pb-5">Enter your e-mail and get a lifetime of great daily quotes!</div>

            <div class="form-group">
            <input type="text" :class="['form-control', isEmailValid()]" id="inputSuccess1" v-model="email" placeholder="user@example.com">
            </div>

            <div class="w-75 mx-auto">
                <button type="button" class="btn btn-success p-2 mt-2" :disabled="isEmailValid() != 'is-valid'" @click.prevent="openModal()">SUBSCRIBE 10$</button>
            </div>

            <transition name="modal">
                <payment v-if="showModal" @close="showModal = false" @update="getCards()" :email="email"></payment>
            </transition>

        </div>
    </div>
</template>

<script>
    import Payment from './Payment';

    export default {
        name: 'subscribe',
        components: { 
            Payment
        },
        data() {
            return {
                email: '',
                isValidated: false,
                reg: /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,24}))$/,
                showModal: false
            }
        },
        methods: {
            isEmailValid() {
                return (this.email == "")? "" : (this.reg.test(this.email)) ? 'is-valid' : 'is-invalid';
            },
            openModal() {
                axios.post('/api/add-customer', {
                    email: this.email
                })
                .then((response) => {})
                .catch((error) => {
                    console.log(error)
                })

                this.showModal = true;
            }
        }
    }
</script>
