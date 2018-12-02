<template id="contact">
    <div>
        <div class="info">
            <span >Address:</span> {{contact.address}}
        </div>
        <div class="info">
            <span>Postcode:</span>  {{contact.postcode}}
        </div>
        <router-link v-bind:to="'/all'">Back to Contact List</router-link>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {contact: { address: '', postcode: ''}}
        },
        created: function(){
            let uri = this.$route.params.id;
            Axios.get(uri).then((response) => {
                this.contact = response.data;
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