/*
|-------------------------------------------------------
| To declare route.. here is 3 step
| 1. Make a view component
| 2. import it in here
| 3. make routes object
*/



import { createRouter, createWebHistory } from "vue-router";

// import components for rounters
import AuthLayout from '../components/AuthLayout.vue'
import Register from '../views/Register.vue'


// check store data for user token
import store from '../store'
const routes = [
    {
        path: '/auth',
        redirect: '/login',
        name: 'Auth',
        component: AuthLayout,
        meta: {isGuest: true},
        children: [
            // {
            //     path: '/login',
            //     name: 'Login',
            //     component: Login
            // },
            {
                path: '/register',
                name: 'Register',
                component: Register
            }
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
})

// router.beforeEach((to, from, next) => {
//     if (to.meta.rquiresAuth && !store.state.user.token) {
//         // redirecting to login route. alias 'Login'
//         next({name: 'Login'});
//     } else if (store.state.user.token && to.meta.isGuest) {
//         next({name: 'Dashboard'});
//     } else {
//         next();
//     }
// })

export default router