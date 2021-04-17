import 'es6-promise/auto'
import Vue from 'vue'
import Vuex from 'vuex'
import auth from './modules/auth'
import company from './modules/company'
import validation from './modules/validation'

Vue.use(Vuex);
export const store = new Vuex.Store({
    modules: {
        auth,
        company,
        validation
    }
})
