import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
    user: {
      data: {},
      token: sessionStorage.getItem("TOKEN"),
    },
  },  
  getters: {},
  actions: {},
  mutations: {},
  modules: {},
});

export default store;
