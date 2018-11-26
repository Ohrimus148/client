<template>
    <div class="container">
        <transaction name="fade">
            <router-view></router-view>
        </transaction>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted')
        }
    }
</script>