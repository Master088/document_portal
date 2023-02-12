import mutations from "./mutations";
import actions from "./actions";
import getters from "./getters";

const token = JSON.parse(localStorage.getItem("token")) || null;
const userData = JSON.parse(localStorage.getItem("user")) || null;

export default {
  namespaced: true,
  state() {
    return {
      token: token || null,
      id: userData?.id || "",
      email: userData?.id || "",
      name: userData?.id || "",
      password: "",
    };
  },
  mutations,
  getters,
  actions,
};
