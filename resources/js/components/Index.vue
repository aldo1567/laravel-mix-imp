<template>
    <div class="card">
        <div class="card-haeder">
            <router-link to="/create" class="btn btn-primary float-right">Tambah Buku</router-link>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Desc</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="items, index in lists" :key="index">
                        <td>{{ index+1 }}</td>
                        <td>{{ items.name }}</td>
                        <td>{{ items.title }}</td>
                        <td>{{ items.description }}</td>
                        <td>
                            <router-link :to="{ name: 'readList', params: {id: items.id} }" class="btn btn-info">
                                Lihat
                            </router-link>
                            <router-link :to="{ name: 'editList', params: {id: items.id} }" class="btn btn-warning">
                                Edit
                            </router-link>
                            <button class="btn btn-danger" v-on:click="deleteToDoList(items.id, index)">
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    data() {
        return {
            lists: [],
            errors: [],
        }
    },
    
    created() {
        axios.get('to-do-list')
        .then(response => {
            console.log(response.data)
            this.lists = response.data
        })
        .catch(e => {
            this.errors.push(e)
        })
    },
    
    methods: {
        deleteToDoList(id, index){
            axios.delete('/to-do-list/' + id)
            .then(response => {
                console.log(response.data)
                this.lists.splice(index, 1)
            })
            .catch(e => {
                this.errors.push(e)
            })
        }
    }
}
</script>