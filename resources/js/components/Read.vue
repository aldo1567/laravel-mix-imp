<template>
    <div class="card">
        <div class="card-header">

        </div>
        <div class="card-body">
            <h2>Title: {{ lists.title }}</h2>
            <p>Name: {{ lists.name }}</p>
            <p>Description: {{ lists.description }}</p>
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
        let id = this.$route.params.id;
        axios.get('/to-do-list/' + id)
        .then(response => {
            console.log(response.data);
            this.lists = response.data;
        })
        .catch(e => {
            this.errors.push(e)
        })
    }
}
</script>