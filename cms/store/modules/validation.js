export const state = () => ({
    errors:{}
})

export const getters = {
    errors(state) {
        return state.errors
    }
}

export const mutations = {
    SET_VALIDATION_ERRORS(state, payload) {
        this._vm.$toast.error(payload);
        // state.errors = payload
    }
}
export const actions = {
   async setErrors({ commit }, payload) {
        commit('SET_VALIDATION_ERRORS', payload);
    }
}

export default {
    namespaced: true,
    state,
    mutations,
    getters,
    actions
};
