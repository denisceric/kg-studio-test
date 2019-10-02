<template>
    <div>
        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">E-mail</th>
                    <th scope="col">Paid</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers.data" :key="customer.id" :style="customer.paid ? 'background:#edffed' : 'background:#fff2f2'">
                    <th scope="row">{{ customer.id }}</th>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.paid ? 'Yes' : 'No' }}</td>
                    <td>active</td>
                    <td>activate</td>
                </tr>
            </tbody>
        </table>

        <pagination :data="customers" @pagination-change-page="getResults"></pagination>

    </div>
</template>

<script>
import Pagination from 'laravel-vue-pagination';

export default {
    name: 'customers',
    components: { Pagination },
    data() {
            return {
                customers: {},
            }
        },
    created() {
        this.getResults();
    },
    methods: {
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            axios.get('/api/get-customers', { params: {
                page: page
            }})
            .then((response) => {
                this.customers = response.data
            })
            .catch((error) => {
                console.log(error)
            })
        }
    }
}
</script>