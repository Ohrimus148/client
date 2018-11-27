<template id="client">
    <div>
        <h3>{{client.first_name}}</h3>
        <strong>Client : </strong>
        <div>
            {{client.email}}
        </div>
        <span class="glyphicon glyphicon-arrow-left"></span>
        <router-link v-bind:to="'/'">Back Client List</router-link>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {client: {first_name: '', email: ''}}
        },
        created: function(){
            let uri = this.$route.params.id;
            Axios.get(uri).then((response) => {
                this.client = response.data;
            });
        },
    }
</script>