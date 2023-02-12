<template>
  <div class="fluid-container p-3">
    <h3>Dashboard Folder</h3>
  </div>
  <div class="fluid-container">
    <button>Create Folder</button>
  </div>
</template>

<script setup>
// import store from "../store";
import { useRouter } from "vue-router";
import { ref } from "vue";

const router = useRouter();

const user = {
  email: "",
  password: "",
};
let loading = ref(false);
let errorMsg = ref("");
</script>
<style scoped></style>
