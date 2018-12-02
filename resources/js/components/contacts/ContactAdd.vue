<template id="add-client">
    <div>
        <h3>Add new Contact</h3>
        <form class="add-form" v-on:submit.prevent = "createContact">
            <div class="form-group col-md-6">
                <label for="add-title">Post Code</label>
                <input id="add-title" v-model="contact.postcode" class="form-control" required />
            </div>
            <div class="form-group col-md-6">
                <label for="add-body">Address</label>
                <input  class="form-control" rows="10" v-model="contact.address"/>
            </div>
            <div class="form-group col-md-6">
                <label for="add-body">clients</label>
                <select   name = ""  @change="onChange()" :value="selected" required = "true">
                    <option  v-for="(client, index) in clients"  :value="client.id" selected>{{client.first_name}}</option>
                </select>

            </div>
            <button type="submit" class="btn btn-xs btn-primary create">Create </button>
            <router-link class="btn btn-xs btn-warning" v-bind:to="'/'">Cancel</router-link>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return { contact: {postcode: '', address: '', client_id: ''},clients:'', id:'', selected: 'Choose Clients'}
        },
        methods: {
            createContact: function() {
                this.contact.client_id = this.onChange();
                Axios.post('/contacts',  this.contact).then((response) => {
                    this.$router.push({name: 'ContactList'})
                });
            },

            getAllClient: function(){
                Axios.get('/clients').then((response) => {
                    this.clients = response.data;
                })
            },

            onChange: function() {
                return this.id;
            }


            },
            computed: {
                filteredClients: function(){
                    if(this.clients.length) {
                        return this.clients;
                    }
                }
             },
             mounted() {
                 this.clients =  this.getAllClient();
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