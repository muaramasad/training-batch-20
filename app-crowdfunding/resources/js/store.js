import Vue from 'vue'
import Vuex from 'vuex'
import router from "./router";
import transaction from "./stores/transaction";
import alert from "./stores/alert";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        transaction,
        alert
    }
});

export default  store
