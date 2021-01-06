import Vue from 'vue'
import Vuex from 'vuex'
import router from "./router";
import transaction from "./stores/transaction";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        transaction
    }
});

export default  store
