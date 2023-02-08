<template>
    <div class="container">
        <div class="row">
            <div class="col-6 pt-5">
                <h1 class="clsu-title text-center ">CLSU DOCUMENT PORTAL</h1>
                <div class="img-div text-center">
                    <img src="vector-image.svg" alt="pic">
                </div>
                <h4 class="text-center">To keep connected with us please login your <br>account</h4>
            </div>
            <div class="col-6 pt-5">
                <div class="card">
                    <div class="card-body">
                        <div class=" clsu-logo text-center">
                            <img src="clsu-logo.png" alt="" class="picture-img">
                        </div>
                        <h3 class="text-center pb-4">Welcome Back</h3>
                        <!-- <h1 class="text-center text-success pt-5">_______________________________</h1> -->
                        <div class="form pt-4 ">
                            <input class="input" placeholder="Username" required="" type="text"><i class="bi bi-envelope-fill text-white"></i>
                            
                        </div>
                        <div class="form pt-4">
                            <input class="input " placeholder="Password" required="" type="password"><i class="bi bi-lock-fill text-white "></i>
                        </div>
                        <!-- <h1 class="text-center text-success pt-2">_______________________________</h1> -->
                        <a href="#" class="forgot"><p class="forgot-txt pt-2">Forgot password?</p></a>
                        <div class=" text-center pb-5 pt-5">
                            <button type="button" class="btn btn-success">Login a1 </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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