import { createRouter, createWebHistory } from "vue-router";
 
import Login from "../views/Login.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import AuthenticatedLayout from "../components/AuthenticatedLayout.vue";

import Dashboard from "../views/Dashboard.vue";
import NotFound from "../views/NotFound.vue";
 
 
// import store from "../store";

const routes = [

  {
    path: "/",
    redirect: "/dashboard",
    component: AuthenticatedLayout,
    meta: { requiresAuth: true },
    children: [
      { path: "/dashboard", name: "Dashboard", component: Dashboard },
    ],
  },

  {
    path: "/auth",
    redirect: "/login",
    name: "Auth",
    component: DefaultLayout,
    meta: {isGuest: true},
    children: [
      {
        path: "/login",
        name: "Login",
        component: Login,
      }
    ],
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
