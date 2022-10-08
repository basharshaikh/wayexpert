import {createStore} from 'vuex'

const store = createStore({
    state: {
        user: {
            data: {},
            token: sessionStorage.getItem('TOKEN')
        },
    },
    getters: {},
    actions: {
        
    },
    mutations: {
    },
    modules: {}
})

export default store