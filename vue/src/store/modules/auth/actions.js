import {
  LOGIN_ACTION,
  LOGOUT_ACTION,
  SET_USER_DATA,
  SET_USER_TOKEN,
} from "../../store-constants";
import axiosClient from "../../../axios";

export default {
  async [LOGIN_ACTION](context, payload) {
    return axiosClient
      .post("login", payload)
      .then((response) => {
        let data = response.data;
        axiosClient.defaults.headers["Authorization"] = "Bearer " + data.token;

        localStorage.setItem("token", JSON.stringify(data.token));
        localStorage.setItem("user", JSON.stringify(data.user));

        context.commit(SET_USER_TOKEN, {
          token: data.token,
        });
        context.commit(SET_USER_DATA, data.user);

        return Promise.resolve(response);
      })
      .catch((err) => {
        console.log(err);

        return Promise.reject(err);
      });
  },
  async [LOGOUT_ACTION](context) {
    return axiosClient
      .post("logout")
      .then((response) => {
        context.commit(SET_USER_TOKEN, {
          token: null,
        });

        context.commit(SET_USER_DATA, {
          id: null,
          email: null,
          name: null,
          password: null,
        });

        localStorage.removeItem("token");
        localStorage.removeItem("user");

        return Promise.resolve(response);
      })
      .catch((err) => {
        console.log(err);
        return Promise.reject(err);
      });
  },
};
