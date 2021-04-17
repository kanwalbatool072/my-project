export const state = () => ({})

export const mutations = {}
export const actions = {
    async handleLogin({
        commit
    }, {email, password}) { // try {
        const {data} = await this.$auth.loginWith('local', {
            data: {
                email: email,
                password: password
            }
        });
        return Promise.resolve(data);
    }
}
export const getters = {}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
};
