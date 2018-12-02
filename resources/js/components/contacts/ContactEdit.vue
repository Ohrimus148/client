<template id="contact-edit">
    <div>
        <h3>Edit New Contact</h3>
        <form v-on:submit.prevent = "updateContact">
            <div class="form-group col-md-6">
                <label for="edit-title">Address</label>
                <input id="edit-title" v-model="contact.address" class="form-control" required />
            </div>
            <div class="form-group col-md-6">
                <label for="edit-body">Postcode</label>
                <input class="form-control" rows="10" v-model="contact.postcode" />
            </div>
            <button type="submit" class="btn btn-xs btn-primary">Update Contact</button>
            <router-link class="btn btn-xs btn-warning" v-bind:to="'/all'">Cancel</router-link>
        </form>
    </div>
</template>

<script>
    export default{
        data: function () {
            return {contact: {postcode: '', address: ''}}
        },
        created: function(){
            let uri = this.$route.params.id+'/edit';
            Axios.get(uri).then((response) => {
                this.contact = response.data;
            });
        },
        methods: {
            updateContact: function() {
                let uri = this.$route.params.id;
                Axios.patch(uri, this.contact).then((response) => {
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