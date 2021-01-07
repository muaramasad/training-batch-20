import Vue from 'vue'
import Vuex from 'vuex'
import router from "./router";
import transaction from "./stores/transaction";
import alert from "./stores/alert";
import auth from "./stores/auth";
import dialog from "./stores/dialog";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        transaction,
        alert,
        auth,
        dialog
    }
});

export default  store
