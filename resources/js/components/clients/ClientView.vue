<template id="client">
    <div>
        <div class="info">
            <span >Name:</span> {{client.first_name}}
        </div>
        <div class="info">
            <span>E-mail:</span>  {{client.email}}
        </div>
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
<style scoped>
    .info{
        margin-bottom: 25px;
    }
    .info span{
        text-transform: uppercase;
        padding-right: 15px;
    }
    a{
        padding: 10px 15px;
        color: #ffffff;
        background-color: #3490dc;
        border-color: #3490dc;
        border-radius: 5px;
        text-decoration: none;
    }

</style>