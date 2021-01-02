import Vue from 'vue'
import Router from 'vue-router'

Vue.use(Router);

//DEFINE ROUTE
const router = new Router({
   mode: 'history',
   routes: [
       {
           path: '/',
           name: 'home',
           alias: '/home',
           component: () => import('./views/Home.vue')
       },
       {
           path: '/donations',
           name: 'donations',
           component: () => import('./views/Donations.vue')
       },
       {
           path: '/blog',
           name: 'blogs',
           component: () => import('./views/Blog.vue')
       },
       {
           path: '/campaigns',
           name: 'campaigns',
           component: () => import('./views/Campaigns.vue')
       },
       {
           path: '*',
           redirect: '/'
       }
   ]
});

export default  router
