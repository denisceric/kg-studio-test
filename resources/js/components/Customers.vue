<template>
    <div>
        
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col" @click="sortBy('id')" class="sort">#</th>
                    <th scope="col" @click="sortBy('email')" class="sort">E-mail</th>
                    <th scope="col" @click="sortBy('paid')" class="sort">Paid</th>
                    <th scope="col" @click="sortBy('status')" class="sort">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers.data" :key="customer.id">
                    <th scope="row">{{ customer.id }}</th>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.paid ? 'Yes' : 'No' }}</td>
                    <td>{{ customer.status ? 'Active' : 'Inactive' }}</td>
                    <td><a href="#" @click.prevent="actions(customer.status ? 'deactivate' : 'activate', customer.id)">{{ customer.status ? 'Deactivate' : 'Activate' }}</a></td>
                </tr>
            </tbody>
        </table>
        <div class="px-3">
            <pagination :data="customers" @pagination-change-page="getResults"></pagination>
        </div>

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
                sort: 'id'
            }
        },
    created() {
        this.getResults();
    },
    methods: {
        actions(act, id) {
            axios.post('/action', {
                action: act,
                id: id
            })
            .then((response) => {
                this.getResults();
            })
            .catch((error) => {
                console.log(error)
            })
        },
        sortBy(sort) {
            this.sort = sort;
            this.getResults();
        },
        getResults(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }

            axios.post('/api/get-customers', {
                sort: this.sort,
                page: page
            })
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

<style scoped>
.sort {
    cursor: pointer;
}
.sort:hover {
    background-color: black;
}
</style>