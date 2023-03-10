/**
 * Created by Zura on 12/25/2021.
 */
import axios from "axios";
import store from "./store";
import router from "./router";

const axiosClient = axios.create({
  baseURL: `http://localhost:8000/api/`,
});

axiosClient.interceptors.request.use((config) => {
  config.headers.Authorization = `Bearer ${store.state.auth.token}`;
  return config;
});

axiosClient.interceptors.response.use(
  (response) => {
    return response;
  },
  (error) => {
    console.log("axios err", error);
    // if (error.response.status === 401) {
    //   sessionStorage.removeItem("TOKEN");
    //   router.push({ name: "Login" });
    // } else if (error.response.status === 404) {
    //   router.push({ name: "NotFound" });
    // }
    return error;
  }
);

export default axiosClient;
