<template>
    <div class="container">
        <div class="row">
            <div class="col-6 pt-5 d-none d-md-block">
                <h1 class="clsu-title text-center ">CLSU DOCUMENT PORTAL</h1>
                <div class="img-div text-center">
                    <img src="../assets/img/vector-image.png" alt="pic">
                </div>
                <h4 class="text-center">To keep connected with us please login your <br>account</h4>
            </div>
            <div class="col-md-6 pt-5">
                <div class="card">
                    <div class="card-body">
                        <div class=" clsu-logo text-center">
                            <img class="img-logo" src="../assets/logos/logo.png" alt="logo">
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
                            <button type="button" class="btn btn-success">Login  </button>
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

 .clsu-title {
      text-shadow: 3px 3px #e0e0e0;
    }
    .card{
        box-shadow: 25px 25px 10px -10px rgba(0,0,0,0.3) ;
    }
    h1{
        color:#1f5f5b;
    }
    h3{
        color:#1f5f5b;
    }
    .img-logo{
        width: 200px;
        height: 185px;
    }
    .btn {
        min-width: 80%;
        min-height: 45px;
    }
    .forgot{
        text-decoration:none;
        top:50%;
    }
    .input{
        outline: none;
        border:none;
        border-bottom: 2px solid #1f5f5b;
        width: 79%;
        margin-left: 65px;
    }
    .form{
        position: relative;
    }
    .form i{
        position:absolute;
        left:85%;
        border-radius: 100%;
        top :17px;
        
    }
    .bi{
        background-color: #1f5f5b;
        padding: 5px 5px 5px 5px;
    
    }
    .forgot-txt{
        padding-left: 69%;
        color: #1f5f5b;
    }
   
</style> 