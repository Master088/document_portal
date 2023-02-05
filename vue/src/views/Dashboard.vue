<template>
 <h1>Dashboard content here</h1>
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
