<template id="post-edit">
    <div>
        <h3>Edit New Client</h3>
        <form v-on:submit.prevent = "updateClient">
            <div class="form-group col-md-6">
                <label for="edit-title">Name</label>
                <input id="edit-title" v-model="client.first_name" class="form-control" required />
            </div>
            <div class="form-group col-md-6">
                <label for="edit-body">Email</label>
                <input class="form-control" rows="10" v-model="client.email"></input>
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Update Client</button>
            <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>
        </form>
    </div>
</template>

<script>
    export default{
        data: function () {
            return {client: { first_name: '', email: ''}}
        },
        created: function(){
            let uri = this.$route.params.id+'/edit';
            Axios.get(uri).then((response) => {
                this.client = response.data;
            });
        },
        methods: {
            updateClient: function() {
                let uri = this.$route.params.id;
                Axios.patch(uri, this.client).then((response) => {
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