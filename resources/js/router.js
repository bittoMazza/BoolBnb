import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import HomePage from './pages/HomePage';
import ApartmentPage from './pages/ApartmentPage';
import ApartmentShow from './pages/ApartmentShow';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: HomePage,
        },
        {
            path: '*',
            name: 'error',
            component: HomePage,
        },
        {
            path: '/apartment/',
            name: 'apartmentPage',
            component: ApartmentPage,
            
        },
        {
            path: '/apartment/:id',
            name: 'apartmentShow',
            component: ApartmentShow,
            
        }


    ],
});

export default router