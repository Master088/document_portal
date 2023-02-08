import { createStore } from "vuex";
import axiosClient from "../axios";

const store = createStore({
  state: {
    user: {
      data: {},
      token:"",
    },
  },  
  getters: {},
  actions: {},
  mutations: {},
  modules: {},
});

export default store;
