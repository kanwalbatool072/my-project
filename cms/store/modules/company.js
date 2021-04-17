export const state = () => ({companies: [], offices: [], departments: [],chartAccount:[],chartAccountOptions:[],chartAccountChildOptions:[]})

export const getters = {
    companies(state) {
        return state.companies;
    },
    offices(state) {
        return state.offices;
    },
    departments(state) {
        return state.departments;
    },
    chartAccountCategory(state) {
        return state.chartAccount;
    },
    chartAccountOptions(state) {
        return state.chartAccountOptions;
    },
    chartAccountCategoryChild(state) {
        return state.chartAccountChildOptions;
    }
}
export const mutations = {
    SET_COMPANIES(state, payload) {
        state.companies = payload;
    },
    SET_OFFICES(state, payload) {
        state.offices = payload;
    },
    SET_DEPARTMENT(state, payload) {
        state.departments = payload;
    },
    SET_CHART_OF_ACCOUNT_CATEGORY(state, payload) {
        state.chartAccount = payload;
    },
    SET_CHART_OF_ACCOUNT_CATEGORY_CHILD(state, payload) {
        state.chartAccountChildOptions = payload;
    },
    // SET_CHART_OF_ACCOUNT_OPTIONS(state, payload) {
    //     state.chartAccountOptions = payload;
    // }
 
}
export const actions = {
    async getCompanies({commit}) {
        let resp = await this.$axios.get(this.$URL.COMPANY);
        commit('SET_COMPANIES', resp.data);
    },
    async getOffices({commit}) {
        let resp = await this.$axios.get(this.$URL.OFFICE);
        // console.log(resp)
        commit('SET_OFFICES', resp.data);
    },
    async getDepartments({commit}) {
        let resp = await this.$axios.get(this.$URL.DEPARTMENT);
        commit('SET_DEPARTMENT', resp.data);
    },
    async getChartAccountCategoryChild({commit},parent_id) {
        let resp = await this.$axios.get(this.$URL.CHART_OF_ACCOUNT_CHILD_CATEGORY + parent_id);
        return resp;
        //  commit('SET_CHART_OF_ACCOUNT_CATEGORY_CHILD',child);
    },
    // async getChartAccountCategory({commit,dispatch,getters}) {
    //     let resp = await this.$axios.get(this.$URL.CHART_OF_ACCOUNT_CATGEORY);
    //     let options = [];
    //     resp.data.data.forEach((key, index) => {
    //             options.push({
    //                 id: key.id,
    //                 label: key.account_name,
    //                 type:"parent",
    //                 children: null,
    //             });
    //         });
    //     commit('SET_CHART_OF_ACCOUNT_CATEGORY', resp.data);
    //     commit('SET_CHART_OF_ACCOUNT_OPTIONS', options);
    // },
    async saveChartAccounts({ commit }, postData) {
        let resp = await this.$axios.post(this.$URL.CHART_OF_ACCOUNT_CATEGORY, postData);
        return Promise.resolve(resp);
      
    }
}

export default { // namespaced: true,
    state,
    mutations,
    getters,
    actions
};
