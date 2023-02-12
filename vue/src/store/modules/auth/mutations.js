import { SET_USER_DATA, SET_USER_TOKEN } from "../../store-constants";

export default {
  //  add other data
  [SET_USER_TOKEN](state, payload) {
    state.token = payload.token;
  },

  [SET_USER_DATA](state, payload) {
    state.id = payload.id;
    state.email = payload.email;
    state.name = payload.name;
  },
};
