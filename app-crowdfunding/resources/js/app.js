import Vue from 'vue'
import router from './router.js'
import store from './store.js'
import App from './App.vue'

const app = new Vue({
   el: '#app',
   router,
    store,
   components: {
       App
   },
    methods: {
        increment() {
            this.$store.commit('increment')
            console.log(this.$store.state.count)
        }
    }
});
