<template>
  <header class="bg-light">
    <div class="fluid-container p-1">
      <div class="btn-group logout py-3 justify-content-end" role="group">
        <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
          John Doe
        </button>
        <div class="dropdown-menu mt-1" aria-labelledby="btnGroupDrop1">
          <a class="dropdown-item text-center" href="#" @click="logout"><i class="bi bi-box-arrow-left"></i> Logout</a>
        </div>
      </div>
    </div>
  </header>
</template>

<script setup>
import store from "../store";
import { useRouter } from "vue-router";
import { ref } from "vue";
import { LOGOUT_ACTION } from "../store/store-constants";

const router = useRouter();

function logout(ev) {
  ev.preventDefault();

  store
    .dispatch(`auth/${LOGOUT_ACTION}`)
    .then(() => {
      router.push({
        name: "Login",
      });
    })
    .catch((err) => {
      console.log("error", err);
    });
}
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: "Poppins", sans-serif;
}
.logout {
  float: right;
  /* border: solid 1px red; */
  transition: .4s ease;
  margin-right: 30px;
}
.icon-size {
  font-size: 1.2rem;
}
header{
  height: 70px;
}
</style>
