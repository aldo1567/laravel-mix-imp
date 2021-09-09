<template>
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Data</div>
                    <div class="card-body">
                        <form v-on:submit="submitToDoListEdit()">
                            <div class="form-group">
                                <input type="text" v-model="lists.name" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" v-model="lists.title" class="form-control">
                            </div>
                            <div class="form-group">
                                <textarea name="" v-model="lists.description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <router-link to="/" class="btn btn-warning">Kembali</router-link>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            lists:{
                name: "",
                title: "",
                description: "",
            },
            errors: [],
        }
    },

    created() {
        let id = this.$route.params.id
        axios.get('/to-do-list/' + id + '/edit')
        .then(response => {
            console.log(response.data)
            this.lists = response.data
        })
        .catch(e => {
            this.errors.push(e)
        })
    },

    methods: {
        submitToDoListEdit() {
            let id = this.$route.params.id
            axios.patch('/to-do-list/' + id, this.lists)
            .then(response => {
                console.log(response.data)
                this.lists = response.data
                this.$router.push({ path: '/' })
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
}
</script>