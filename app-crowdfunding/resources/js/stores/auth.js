export default {
    namespaced: true,
    state: {
        user: {}
    },
    mutations: {
        set: (state, payload) => {
            state.user = payload;
        }
    },
    actions: {
        set: ({commit}, payload) => {
            commit('set', payload);
        },
        checkToken: ({commit}, payload) => {
            let config = {
                headers: {
                    'Authorization': 'Bearer ' + payload.token,
                }
            };
            let url = '/api/auth/check-token';
            axios.post(url,{},config)
                .then((response) => {
                    commit('set',payload);
                })
                .catch((error) => {
                    commit('set',{});
                })
        }
    },
    getters: {
        user: state => state.user,
        guest: state => Object.keys(state.user).length == 0
    }
}
