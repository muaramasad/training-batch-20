import Vue from 'vue'
import Vuex from 'vuex'
import router from "./router";
import transaction from "./stores/transaction";
import alert from "./stores/alert";
import auth from "./stores/auth";
import dialog from "./stores/dialog";
import VuexPersist from 'vuex-persist';

const vuexPersist = new VuexPersist({
    key: 'crowdfunding',
    storage: localStorage
});

Vue.use(Vuex);

const store = new Vuex.Store({
    plugins: [vuexPersist.plugin],
    modules: {
        transaction,
        alert,
        auth,
        dialog
    }
});

export default  store
