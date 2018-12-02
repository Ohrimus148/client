<template id="client-list">
    <div class="row justify-content-between">
        <div class="pull-right ">
            <router-link class="btn btn-xs btn-primary add-client" v-bind:to="{path: '/create'}">
                <span class="glyphicon glyphicon-plus"></span>
                Add new Client
            </router-link>
        </div>
        <div>
            <router-link class="btn btn-success" v-bind:to="{name: 'ContactList'}">Contacts</router-link>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="head">#</th>
                <th>Name</th>
                <th>Email</th>
                <th class="col-md-2 actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(client, index) in filteredClients">
                <td>{{ index + 1 }}</td>
                <td>{{ client.first_name }}</td>
                <td>{{ client.email }}</td>
                <td class="btn-wrapper">
                    <router-link class="btn btn-success" v-bind:to="{name: 'ClientContacts', params: {id: client.id}}">Contacts</router-link>
                    <router-link class="btn btn-xs" v-bind:to="{name: 'ClientView', params: {id: client.id}}"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
                    <router-link class="btn btn-xs" v-bind:to="{name: 'ClientEdit', params: {id: client.id}}"><i class="fa fa-pencil" aria-hidden="true"></i></router-link>
                    <router-link class="btn btn-xs" v-bind:to="{name: 'ClientDelete', params: {id: client.id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></router-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data:function(){
            return {clients: ''};
        },
        created: function() {
            Axios.get('clients').then((response) => {
                console.log(response);
                this.clients = response.data;
            });
        },

        computed: {
            filteredClients: function(){
                if(this.clients.length) {
                    return this.clients;
                }
            }
        }
    }
</script>
<style scoped>
   .add-client{
       margin: 0px 0px 40px 10px;
       font-size: 22px;
   }
   .actions{
       text-align: right;
       padding-right: 50px;
   }

   .btn-wrapper{
        text-align: right;
    }
    .btn-wrapper .btn{
        margin-left: 20px;
    }
</style>
