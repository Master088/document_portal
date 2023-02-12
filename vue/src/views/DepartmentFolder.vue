<template>
  <div class="fluid-container p-4">
    <h1>Dashboard Folder</h1>
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
