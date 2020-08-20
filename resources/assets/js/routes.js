import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// 2. Define some routes
// Each route should map to a component. The "component" can
// either be an actual component constructor created via
// `Vue.extend()`, or just a component options object.
// We'll talk about nested routes later.

import Home from './pages/Home';
import Seller from './pages/Seller';
import NotFound from './components/404';

let routes = [
    { path: '/', component: Home, name: 'Home', },
    { path: '/seller', component: Seller, name: 'Seller', },
];

// default
routes.push(
    { path: '/404', component: NotFound },  
    { path: '*', redirect: '/404' }
);

const router = new VueRouter({
    mode: 'history',
    linkActiveClass: 'active',
    routes: routes
});


export default router;