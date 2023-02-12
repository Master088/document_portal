import { createStore } from "vuex";

import auth from "./modules/auth/index";

const store = createStore({
  state: {},
  getters: {},
  actions: {},
  mutations: {},
  modules: { auth },
});

export default store;
