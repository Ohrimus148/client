<template id="contact-list">
    <div class="row justify-content-between">
        <div class="pull-right">
            <router-link class="btn btn-xs btn-primary add-client" v-bind:to="{path: '/contacts/create'}">
                <span class="glyphicon glyphicon-plus"></span>
                Add new Contact
            </router-link>
        </div><div class="pull-right">
            <router-link class="btn btn-xs btn-success " v-bind:to="{path: '/'}">
                <span class="glyphicon glyphicon-plus"></span>
                Clients List
            </router-link>
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th class="head">#</th>
                <th>Code</th>
                <th>Address</th>
                <th class="col-md-2 actions">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(contact, index) in filteredContacts">
                <td>{{ index + 1 }}</td>
                <td>{{ contact.address }}</td>
                <td>{{ contact.postcode }}</td>
                <td class="btn-wrapper">
                    <router-link class="btn btn-xs" v-bind:to="{name: 'ContactView', params: {id: contact.id}}"><i class="fa fa-eye" aria-hidden="true"></i></router-link>
                    <router-link class="btn btn-xs" v-bind:to="{name: 'ContactEdit', params: {id: contact.id}}"><i class="fa fa-pencil" aria-hidden="true"></i></router-link>
                    <router-link class="btn btn-xs" v-bind:to="{name: 'ContactDelete', params: {id: contact.id}}"><i class="fa fa-trash-o" aria-hidden="true"></i></router-link>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data:function(){
            return {contacts: '', clients:''};
        },
        created: function() {
            Axios.get('contacts').then((response) => {
                this.contacts = response.data;
            });
        },

        computed: {
            filteredContacts: function(){
                if(this.contacts.length) {
                    return this.contacts;
                }
            }
        },
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