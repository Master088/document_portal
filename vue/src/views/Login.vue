<template>
 <div class="bg-success">
     <h2>Login</h2>
  </div>
</template>

<script setup>
import store from "../store";
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

<style scoped>
 
</style> 