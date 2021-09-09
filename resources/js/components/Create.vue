<template>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    Tambah Buku
                </div>
                <div class="card-body">
                    <form v-on:submit="submitToDoList()">
                        <div class="form-group">
                            <input type="text" name="name" v-model="to_do_lists.name" id="" placeholder="Masukan Nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="title" v-model="to_do_lists.title" id="" placeholder="Masukan Judul" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="description" v-model="to_do_lists.description" id="" cols="30" rows="10" class="form-control" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="form-group">
                            <router-link to="/" class="btn btn-warning">Kembali</router-link>
                            <button class="btn btn-success">Simpan</button>
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

    export default{
        data() {
            return {
                to_do_lists: {
                    name: "",
                    title: "",
                    description: "",
                },
                errors: {}
            }
        },
        methods: {
            submitToDoList() {
                axios.post('/to-do-list', this.to_do_lists)
                .then(response => {
                    console.log(response);
                    this.$router.push({path: '/'})
                    this.to_do_lists = response.data;
                })
                .catch(e => {
                    this.errors.push(e)
                })
            }
        }
    }
</script>