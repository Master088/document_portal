import { createRouter, createWebHistory } from "vue-router";

import Login from "../views/Login.vue";
import DefaultLayout from "../components/DefaultLayout.vue";
import AuthenticatedLayout from "../components/AuthenticatedLayout.vue";

import DepartmentDashboard from "../views/DepartmentDashboard.vue";
import DepartmentFolder from "../views/DepartmentFolder.vue";
import DepartmentFolderContent from "../views/DepartmentFolderContent.vue";

import NotFound from "../views/NotFound.vue";

import store from "../store";

const routes = [
  {
    path: "/department",
    redirect: "/department/dashboard",
    component: AuthenticatedLayout,
    meta: { requiresAuth: true },
    children: [
      {
        path: "/department/dashboard",
        name: "DepartmentDashBoard",
        component: DepartmentDashboard,
      },
      {
        path: "/department/folder",
        name: "DepartmentFolder",
        component: DepartmentFolder,
      },
      {
        path: "/department/folder/:left",
        name: "DepartmentFolderContent",
        component: DepartmentFolderContent,
      },
    ],
  },

  {
    path: "/auth",
    redirect: "/login",
    name: "Auth",
    component: DefaultLayout,
    meta: { isGuest: true },
    children: [
      {
        path: "/login",
        name: "Login",
        component: Login,
      },
    ],
  },

  {
    // path: "/404",
    path: "/:catchAll(.*)", //lopez: try ko lang
    name: "NotFound",
    component: NotFound,
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

router.beforeEach((to, from, next) => {
  if (to.meta.requiresAuth && !store.state.auth.token) {
    next({ name: "Login" });
  } else if (store.state.auth.token && to.meta.isGuest) {
    next({ name: "DepartmentDashBoard" });
  } else {
    next();
  }
});

export default router;
