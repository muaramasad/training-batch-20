<template>
    <div class="wrapper">
        <router-link to="/">Home</router-link>
        <router-link to="/donations">Donations</router-link>
        <router-link to="/blogs">Blogs</router-link>
        <div class="content-wrapper">
            <router-view></router-view>
        </div>
        Donations {{this.$store.state.count}}
        <button @click="increment()">Donation</button>
    </div>
</template>

<script>
    export default {
        data: function(){
            return {
                store: 0
            }
        },
        methods: {
            increment() {
                this.$store.commit('increment')
                console.log(this.$store.state.count)
            }
        },
        mounted() {
            console.log('component mounted');
        }
    }
</script>
