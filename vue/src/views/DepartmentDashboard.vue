<template>
  <div class="px-lg-5">
    <div class="container-fluid p-3">
      <h4>Department Office</h4>
      <div class="right-menu"  @click="toggleSidebar">
        <i class="bi bi-list icon"></i>
      </div>
    </div>
    <div v-if="collapsed" class="fluid-container sidebar shadow-lg">
      <span class="collapsed-icon" @click="toggleSidebar">
        <i class="bi bi-x-lg " style="font-size: larger;"></i>
      </span>
      <div class="p-3 mt-5">
        <div class="justify-content-center d-flex mb-3">
          <h5>Activity Log</h5>
        </div>
        <p>Lorem ipsum dolor sit amet consectetur asasasadipisicing elit. Eum natus commodi enim nostrum repellat repellendus earum aspernatur odit distinctio ducimus obcaecati mollitia consequatur, ea explicabo ipsa ipsam cum, vel doloremque?</p>
      </div>
    </div>
    <div class="container-fluid p-3 d-flex justify-content-center">
      <div class="input-group mb-3 search">
        <input
          type="text"
          class="form-control shadow"
          placeholder="Search..."
          aria-label="Search..."
          aria-describedby="basic-addon2"
        /><span class="input-group-text search-icon"
          ><i class="bi bi-search"></i
        ></span>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-4 text-center ">
       
        <div  v-for="folder in folders" :key="folder.id" class="col mb-4">
            <div class="card border-0 card-box "  v-on:click="redirect(folder.doc_left)">
              <img src="../assets/img/folder.svg" class="card-img-top" alt="...">
              <div class="card-img-overlay">
                <h2 class="card-title fw-normal"><u class="underline">{{ folder.name }}</u> </h2>
              </div>
            </div>
        </div>

        <div class="col mb-4">
          <router-link to="/department/folder">
            <div class="card border-0 card-box ">
              <img src="../assets/img/folder.svg" class="card-img-top" alt="...">
              <div class="card-img-overlay">
                <h5 class="card-title fw-normal"><u class="underline">View More</u> </h5>
              </div>
            </div>
          </router-link>
        </div>
      </div>

    </div>
    <div class="container-fluid mt-2">
      <h5>New Files</h5>
      <div class="table-container mt-4 mb-4">
        <table class="table table-responsive">
          <thead >
            <tr>
              <th scope="col">Icon</th>
              <th scope="col">Name</th>
              <th scope="col">Last Modified</th>
              <th scope="col">Date modified</th>
              <th scope="col">Type</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <tr  v-for="file in files" :key="file.id">
              <td scope="row">
                <a type="button" class="btn f-icon"
                  ><i class="bi bi-file-earmark-text"></i
                ></a>
              </td>
              <td class="fw-bold">{{ file.name }}</td>
              <td>{{ file.last_modified_id }}</td>
              <td>{{ file.date_modified }}</td>
              <td>{{ file.type }}</td>
              <td class="action">
                <a type="button" class="btn m-1"
                  ><i class="bi bi-eye-fill"></i
                ></a>
                <a type="button" class="btn m-1"
                  ><i class="bi bi-pencil-square"></i
                ></a>
                <a type="button" class="btn m-1"
                  ><i class="bi bi-trash"></i
                ></a>
              </td>
            </tr>
            
            
          </tbody>
        </table>
      </div>
    </div>
    <div class="container-fluid mb-5">
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-end">
          <li class="page-item disabled">
            <a class="page-link" href="#" tabindex="-1" aria-disabled="true"
              >Previous</a
            >
          </li>
          <li class="page-item"><a class="page-link" href="#">1</a></li>
          <li class="page-item"><a class="page-link" href="#">2</a></li>
          <li class="page-item"><a class="page-link" href="#">3</a></li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>

<script setup>
// import store from "../store";
import { useRouter } from "vue-router";
import { ref, computed, watchEffect } from "vue";
import { GET_DOCUMENTS , CREATE_FOLDER_ACTION} from "../store/store-constants";
import store from '../store';

const router = useRouter();

const folders = ref(computed(() => store.state.documents.folders))|| [];
const files = ref(computed(() => store.state.documents.files))|| [];



const user = {
  email: "",
  password: "",
};
let loading = ref(false);
let errorMsg = ref("");



const getFolders=()=>{
  console.log("helo")
  store
    .dispatch(`documents/${GET_DOCUMENTS}`, {
      left:1,
      type:"folder",
      limit:3
    })
    .then(() => {
      // loading.value = false;
      //   console.log("data here ", data.data);
    })
    .catch((err) => {
      console.log("error", err);
      // loading.value = false;
      //   errorMsg.value = err.response.data.error;
    });
   
    
}

const getFiles=()=>{
  store
    .dispatch(`documents/${GET_DOCUMENTS}`, {
      left:1,
      type:"file",
      // limit:3
    })
    .then(() => {
      // loading.value = false;
      //   console.log("data here ", data.data);
    })
    .catch((err) => {
      console.log("error", err);
      // loading.value = false;
      //   errorMsg.value = err.response.data.error;
    });
   
    
}
 
    watchEffect(() => getFolders())
    watchEffect(() => getFiles())

    const redirect=(id)=>{
  console.log("hello123")
  router.push(`/department/folder/${id}`)
}
</script>

<script>
export default {
  data(){
    return{
      collapsed: false,
    }
  },
  methods:{
    toggleSidebar(){
      this.collapsed = !this.collapsed
    },
  }
}
</script>

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: "Poppins", sans-serif;
}
a {
  color: inherit;
}
.search {
  width: 90%;
}
.right-menu {
  width: 40px;
  float: right;
  margin-top: -50px;
  position: relative;
}
.icon {
  font-size: 2.5rem;
}
.card-box {
  transition: 0.4s;
}
.card-box:hover {
  color: aliceblue;
  transition: all 0.4s ease;
  
}
.card-box .underline:hover{
  color: rgb(255, 255, 255);
  text-decoration: underline;
}
.action {
  padding: 0;
  margin: 0;
  width: 17%;
}
.action a:hover {
  border: solid grey 1px;
  transition: all .4s ease;
}
.f-icon {
  /* background: #21a99b; */
  color: #4aaba1;
}
.f-icon:hover {
  color: #4aaba1;
}
.search-icon {
  width: 60px;
  justify-content: center;
}
.card-title{
  /* font-size: 1.7em; */
  margin: 0;
  padding: 0;
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%) translateY(-50%);
}
.fw{
  font-weight: 500;
}
.sidebar {
  color: rgb(0, 0, 0);
  background-color: #ffffff;
  float: right;
  position: fixed;
  z-index: 1;
  top: 10px;
  right: 10px;
  bottom: 0;
  padding: 0;
  transition: all 0.5s ease-in-out;
  display: flex;
  flex-direction: column;
  width: 15%;
  border-radius: 10px;
  height: 97%;
  box-sizing: content-box;
  overflow: hidden;
}

.collapsed-icon {
  display: flex;
  flex-direction: column;
  position: fixed;
  top: 10px;
  padding: 10px;
  transition: 0.2s linear;
  transition-duration: 400ms;
  /* border: solid 1px red; */
}
.collapsed-icon:hover{
  transform: rotate(90deg);
}
</style>
