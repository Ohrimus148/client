<template id="post-delete">
    <div>
        <h3>Delete post {{ client.name  }}</h3>
        <form v-on:submit.prevent = "deleteClient">
            <p>The action cannot be undone</p>
            <button class="btn btn-xs btn-danger" type="submit" name="button">Delete</button>
            <router-link class="btn btn-xs btn-primary" v-bind:to="'/'">Back</router-link>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {client: {name: '', email: ''}}
        },
        created: function(){
            let uri = this.$route.params.id+'/edit';
            Axios.get(uri).then((response) => {
                this.client = response.data;
            });
        },
        methods: {
            deleteClient: function() {
                let uri = this.$route.params.id;
                Axios.delete(uri, this.client).then((response) => {
                    this.$router.push({name: 'ClientList'})
                })
            }
        }
    }
    </script>
<style scoped>
    h3{
        margin-bottom: 40px;
    }
    .btn{
        margin: 20px 10px;
    }
</style>