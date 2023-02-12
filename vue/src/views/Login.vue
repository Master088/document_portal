<template>
  <div class="container">
    <form @submit="login">
      <div class="row">
        <div class="col-7 pt-5 d-none d-md-block">
          <h1 class="clsu-title text-center">CLSU DOCUMENT PORTAL</h1>
          <div class="img-div text-center">
            <img src="../assets/img/vector-image.png" alt="pic" />
          </div>
          <h4 class="text-center">
            To keep connected with us please login your <br />account
          </h4>
        </div>
        <div class="col-md-5 pt-5 test">
          <div class="card">
            <div class="card-body form-body">
              <div class="clsu-logo text-center">
                <img
                  class="img-logo"
                  src="../assets/logos/clsu-logo.png"
                  alt="logo"
                />
              </div>
              <h3 class="text-center pb-2">Welcome Back</h3>

              <div class="form pt-4">
                <input
                  id="email-address"
                  name="email"
                  type="email"
                  autocomplete="email"
                  v-model="user.email"
                  class="input"
                  placeholder="Username"
                  required=""
                /><i class="bi bi-envelope-fill text-white text-center"></i>
              </div>
              <div class="form pt-4">
                <input
                  id="password"
                  name="password"
                  type="password"
                  autocomplete="current-password"
                  required=""
                  v-model="user.password"
                  class="input"
                  placeholder="Password"
                /><i class="bi bi-lock-fill text-white text-center"></i>
              </div>

              <a href="#" class="forgot"
                ><p class="forgot-txt pt-2">Forgot password?</p></a
              >
              <div class="submit-container pb-4 pt-2">
                <button type="submit" class="btn btn-success">
                  Login

                  <span
                    v-show="loading"
                    class="spinner-border spinner-border-sm"
                  ></span>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
</template>

<script setup>
import store from "../store";
import { useRouter } from "vue-router";
import { ref } from "vue";
import { LOGIN_ACTION } from "../store/store-constants";

const router = useRouter();

const user = {
  email: "",
  password: "",
};

let loading = ref(false);
let errorMsg = ref("");

function login(ev) {
  console.log("hello", user);
  ev.preventDefault();

  loading.value = true;

  store
    .dispatch(`auth/${LOGIN_ACTION}`, user)
    .then(() => {
      loading.value = false;

      //   console.log("data here ", data.data);
      router.push({
        name: "DepartmentDashBoard",
      });
    })
    .catch((err) => {
      console.log("error", err);
      loading.value = false;
      //   errorMsg.value = err.response.data.error;
    });
}
</script>

<style scoped>
.test {
  margin: auto 0px;
}
.form-body {
  padding: 20px 70px;
}
.submit-container {
  display: flex;
  justify-content: center;
  align-items: center;
}
.clsu-title {
  text-shadow: 3px 3px #e0e0e0;
}
.card {
  box-shadow: 25px 25px 10px -10px rgba(0, 0, 0, 0.3);
}
h1 {
  color: #1f5f5b;
}
h3 {
  color: #1f5f5b;
}
.img-logo {
  width: 155px;
  height: 155px;
}
.btn {
  min-width: 100%;
  min-height: 45px;
}
.forgot {
  text-decoration: none;
  display: flex;
  justify-content: end;
  padding: 0px 40px;
}
.input {
  text-align: left;
  padding-left: 40px;
  outline: none;
  border: none;
  border-bottom: 2px solid #1f5f5b;
  width: 100%;
}
.form {
  position: relative;
}
.form i {
  position: absolute;
  left: 1%;
  border-radius: 100%;
  top: 40%;
  background-color: #1f5f5b;
  padding: 1px 5px 10px 5px;
}
.bi {
  height: 27px;
  width: 27px;
}
.forgot-txt {
  color: #1f5f5b;
}
</style>
