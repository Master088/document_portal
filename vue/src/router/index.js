import { createRouter, createWebHistory } from "vue-router";
 
import Login from "../views/Login.vue";

import Dashboard from "../views/Dashboard.vue";

 
import NotFound from "../views/NotFound.vue";
 
 
// import store from "../store";

const routes = [
  {
    path: '/',
    name: 'dashboard',
    component: Dashboard
  },  
  {
    path: '/auth/login',
    name: 'login',
    component: Login
  },  
  {
    path: '/404',
    name: 'NotFound',
    component: NotFound
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

 

export default router;
