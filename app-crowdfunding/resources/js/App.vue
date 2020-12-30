<template>
    <div class="wrapper">
        <router-link to="/">Home</router-link>
        <router-link to="/donations">Donations</router-link>
        <router-link to="/blogs">Blogs</router-link>
        <div class="content-wrapper">
            <router-view></router-view>
        </div>
        <app-footer />
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('component mounted');
        }
    }
</script>
