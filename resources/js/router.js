import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter)

import HomePage from './pages/HomePage';
import ApartmentShow from './pages/ApartmentShow';
import ApartmentCards from './components/ApartmentCards';

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
            path: '/apartments/',
            name: 'apartmentsCards',
            component: ApartmentCards,
            
        },
        {
            path: '/apartment/:id',
            name: 'apartmentShow',
            component: ApartmentShow,
            
        }


    ],
});

export default router