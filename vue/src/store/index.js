import { createStore } from "vuex";

import auth from "./modules/auth";
import documents from "./modules/documents";


const store = createStore({
  state: {},
  getters: {},
  actions: {},
  mutations: {},
  modules: { auth,documents },
});

export default store;
