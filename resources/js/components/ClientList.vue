<template id="client-list">
    <div class="row">
        <div class="pull-right">
            <router-link class="btn btn-xs btn-primary" v-bind:to="{path: '/create'}">
                <span class="glyphicon glyphicon-plus"></span>
                Add new Client
            </router-link>

        </div>
        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <!--<th>Created At</th>-->
                <!--<th>Updated At</th>-->
                <th class="col-md-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(client, index) in filteredClients">
                <td>{{ index + 1 }}</td>
                <td>{{ client.first_name }}</td>
                <td>{{ client.email }}</td>
                <td>
                    <router-link class="btn btn-info btn-xs" v-bind:to="{name: 'ClientView', params: {id: client.id}}"><i class="fa fa-eye" aria-hidden="true"></i> Show</router-link>
                    <router-link class="btn btn-warning btn-xs" v-bind:to="{name: 'ClientEdit', params: {id: client.id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</router-link>
                    <router-link class="btn btn-danger btn-xs" v-bind:to="{name: 'ClientDelete', params: {id: client.id}}"><i class="fa fa-trash-o" aria-hidden="true"></i>Delete</router-link>
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