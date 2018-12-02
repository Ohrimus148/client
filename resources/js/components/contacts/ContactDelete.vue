<template id="contact-delete">
    <div>
        <h3>Delete Contact {{ contact.address  }}</h3>
        <form v-on:submit.prevent = "deleteContact">
            <p>The action cannot be undone</p>
            <button class="btn btn-xs btn-danger" type="submit" name="button">Delete</button>
            <router-link class="btn btn-xs btn-primary" v-bind:to="'/all'">Back</router-link>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {contact: {postcode: '', address: ''}}
        },
        created: function(){
            let uri = this.$route.params.id+'/edit';
            Axios.get(uri).then((response) => {
                this.client = response.data;
            });
        },
        methods: {
            deleteContact: function() {
                let uri = this.$route.params.id;
                Axios.delete(uri, this.contact).then((response) => {
                    this.$router.push({name: 'ContactList'})
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