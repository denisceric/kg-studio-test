<template>
    <div>
        <div class="card m-5 border border-success">
            <h5 class="card-header">Add new quote</h5>
            <div class="card-body">
                <p class="card-text">Author:</p>
                <input type="text" name="quote" class="w-100 form-control" v-model="author">
                <p class="card-text pt-3">Quote:</p>
                <textarea type="text" name="quote" class="w-100 form-control mb-3" style="height: 90px" v-model="quote"></textarea>
            </div>
                <a href="#" class="btn btn-success card-footer bg-success m-0" @click="addQuote()"><span class="h3">Save</span></a>
        </div>

        <div><hr>
            <div class="h3 px-3">
                Quotes:
            </div>
            <div class="card my-3 mx-3 border border-info" v-for="quot in quotes.data" v-bind:key="quot.id">
                <div class="card-body">

                    <div class="card m-5 border border-success" v-if="editMode == quot.id">
                        <h5 class="card-header">Add new quote</h5>
                        <div class="card-body">
                            <p class="card-text">Author:</p>
                            <input type="text" name="quote" class="w-100 form-control" v-model="editAuthor">
                            <p class="card-text pt-3">Quote:</p>
                            <textarea type="text" name="quote" class="w-100 form-control mb-3" style="height: 90px" v-model="editQuote"></textarea>
                        </div>
                            <a href="#" class="btn btn-success card-footer bg-success m-0" @click="editQuote(quot.id)"><span class="h3">Save</span></a>
                    </div>

                    <blockquote class="blockquote mx-auto text-dark text-left" v-else>
                        <div class="actions">
                            <a href="#" @click.prevent="editModeActivated(quot.id, quot.author, quot.quote)" class="btn edit py-1 m-1 text-white">Edit</a>
                            <a href="#" @click.prevent="deleteQuote(quot.id)" class="btn delete py-1 m-1 text-white">Delete</a>
                        </div>
                        <p class="mb-0">{{ quot.quote }}</p>
                        <footer class="blockquote-footer text-right text-dark">
                            <cite title="Source Title">
                                {{ quot.author }}
                            </cite>
                            </footer>
                    </blockquote>
                </div>
            </div>
            <div class="px-3">
                <pagination :data="quotes" @pagination-change-page="getQuotes"></pagination>
            </div>

        </div>
    </div>
</template>

<script>
import Pagination from 'laravel-vue-pagination';

export default {
    name: 'quotes',
    props: ['userid'],
    components: { Pagination },
    data() {
        return {
            quotes: {},
            quote: null,
            author: null,
            editQuote: null,
            editAuthor: null,
            editMode: false
        }
    },
    created() {
        this.getQuotes();
    },
    methods: {
        addQuote() {
            axios.post('/add-quote', {
                id: this.userid,
                quote: this.quote,
                author: this.author
            })
            .then((response) => {
                this.getQuotes()
            })
            .catch((error) => {
                console.log(error)
            })
        },
        editModeActivated(id, author, quote) {
            this.editMode = id;
            this.editAuthor = author;
            this.editQuote = quote;
        },
        editQuotes(quoteid) {
            editMode = false;
            axios.post('/edit-quote', {
                id: this.userid,
                quote_id: quoteid,
                author: this.editAuthor,
                quote: this.editQuote
            })
            .then((response) => {
                console.log(response.data);
            })
            .catch((error) => {
                console.log(error);
            })
        },
        deleteQuote(quoteid) {
            axios.post('/delete-quote', {
                id: this.userid,
                quote_id: quoteid
            })
            .then((response) => {
                this.getQuotes()
            })
            .catch((error) => {
                console.log(error);
            })
        },
        getQuotes(page) {
            if (typeof page === 'undefined') {
                page = 1;
            }
            axios.post('/get-quotes', {
                id: this.userid,
                page: page
            })
            .then((response) => {
                this.quotes = response.data
            })
            .catch((error) => {
                console.log(error)
            })
        }
    }
}
</script>

<style scoped>
.actions {
    position: absolute;
    right: 0;
    bottom: 0;
}
.edit {
    background-color: rgba(99, 181, 253, 0.452);
}
.edit:hover {
    background-color: rgba(99, 181, 253);
}
.delete {
    background-color: rgba(253, 99, 99, 0.452);
}
.delete:hover {
    background-color: rgba(253, 99, 99);
}
</style>