<template>
    <v-app>
        <v-navigation-drawer app>
            <!-- -->
        </v-navigation-drawer>

        <v-app-bar app>
            <!-- -->
        </v-app-bar>

        <!-- Sizes your content based upon application components -->
        <v-main>

            <!-- Provides the application the proper gutter -->
            <v-container fluid>

                <!-- If using vue-router -->
                <router-view></router-view>
            </v-container>
        </v-main>

        <v-footer app>
            Sanbercode 2020
        </v-footer>
    </v-app>
</template>

<script>
    export default {
        data: function(){
            return {
                donationCounter: 0
            }
        },
        methods: {
            increment() {
                donationCounter = this.$store.state.count
                this.$store.commit('increment')
                console.log(this.$store.state.count)
            }
        },
        mounted() {
            console.log('component mounted');
        }
    }
</script>
