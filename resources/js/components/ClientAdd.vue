<template id="add-client">
    <div>
        <h3>Add new Client</h3>
        <form v-on:submit.prevent = "createClient">
            <div class="form-group">
                <label for="add-title">Name</label>
                <input id="add-title" v-model="client.first_name" class="form-control" required />
            </div>
            <div class="form-group">
                <label for="add-body">Email</label>
                <textarea class="form-control" rows="10" v-model="client.email"></textarea>
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Create </button>
            <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return { client: {first_name: '', email: ''}}
        },
        methods: {
            createClient: function() {
                Axios.post('clients', this.client).then((response) => {
                    this.$router.push({name: 'ClientList'})
                });
            }
        },
    }
</script>