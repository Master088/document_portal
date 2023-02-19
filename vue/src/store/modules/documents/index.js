import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

const token = JSON.parse(localStorage.getItem("token")) || null;
const userData = JSON.parse(localStorage.getItem("user")) || null;

export default {
  namespaced: true,
  state() {
    return {
      documents:[],
      folders:[],
      files:[],
      parent:{}
    };
  },
  mutations,
  getters,
  actions,
};
