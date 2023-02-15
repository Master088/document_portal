<template>
  <div class="px-lg-5" >
    <div class="container-fluid p-3">
      <h4>Department Office</h4>
      <div class="right-menu"  @click="toggleSidebar">
        <i class="bi bi-list icon"></i>
      </div>
    </div>
    <div class="fluid-container sidebar" :style="{ width: sidebarWidth }">
      <p>
        <span v-if="!collapsed">
          <span class="collapsed-icon" @click="toggleSidebar" >
            <i class="bi bi-x-circle"></i> Activity Log
          </span>
        </span>
      </p>
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
        <div class="col mb-4 ">
          <a href="#">
            <div class="card border-0 card-box">
              <img src="../assets/img/folder.svg" class="card-img-top" alt="...">
              <div class="card-img-overlay">
                <h4 class="card-title fw-normal"><u class="underline">2023</u> </h4>
              </div>
            </div>
          </a>
        </div>
        
        <div class="col mb-4">
          <a href="#">
            <div class="card border-0 card-box ">
              <img src="../assets/img/folder.svg" class="card-img-top" alt="...">
              <div class="card-img-overlay">
                <h4 class="card-title fw-normal"><u class="underline">2022</u> </h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col mb-4">
          <a href="#">
            <div class="card border-0 card-box ">
              <img src="../assets/img/folder.svg" class="card-img-top" alt="...">
              <div class="card-img-overlay">
                <h4 class="card-title fw-normal"><u class="underline">2020</u> </h4>
              </div>
            </div>
          </a>
        </div>
        <div class="col mb-4">
          <a href="#">
            <div class="card border-0 card-box ">
              <img src="../assets/img/folder.svg" class="card-img-top" alt="...">
              <div class="card-img-overlay">
                <h4 class="card-title fw-normal"><u class="underline">View More</u> </h4>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-2">
      <h5>New Files</h5>
      <div class="table-container mt-4 mb-4">
        <table class="table table-hover table-responsive fw">
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
            <tr>
              <td scope="row">
                <a type="button" class="btn f-icon"
                  ><i class="bi bi-file-earmark-text"></i
                ></a>
              </td>
              <td>Mark</td>
              <td>Otto</td>
              <td>02/12/2023</td>
              <td>File</td>
              <td class="action">
                <a type="button" class="btn m-1 view"
                  ><i class="bi bi-eye-fill"></i
                ></a>
                <a type="button" class="btn edit m-1"
                  ><i class="bi bi-pencil-square"></i
                ></a>
                <a type="button" class="btn del m-1"
                  ><i class="bi bi-trash"></i
                ></a>
              </td>
            </tr>
            <tr>
              <td scope="row">
                <a type="button" class="btn f-icon"
                  ><i class="bi bi-folder2-open"></i
                ></a>
              </td>
              <td>Jacob</td>
              <td>Thornton</td>
              <td>02/12/2023</td>
              <td>Folder</td>
              <td class="action">
                <a type="button" class="btn m-1 view"
                  ><i class="bi bi-eye-fill"></i
                ></a>
                <a type="button" class="btn edit m-1"
                  ><i class="bi bi-pencil-square"></i
                ></a>
                <a type="button" class="btn del m-1"
                  ><i class="bi bi-trash"></i
                ></a>
              </td>
            </tr>
            <tr>
              <td scope="row">
                <a type="button" class="btn f-icon"
                  ><i class="bi bi-folder2-open"></i
                ></a>
              </td>
              <td>Larry the Bird</td>
              <td>Ladish</td>
              <td>02/12/2023</td>
              <td>Folder</td>
              <td class="action">
                <a type="button" class="btn m-1 view"
                  ><i class="bi bi-eye-fill"></i
                ></a>
                <a type="button" class="btn edit m-1"
                  ><i class="bi bi-pencil-square"></i
                ></a>
                <a type="button" class="btn del m-1"
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
import { ref, computed } from "vue";

const router = useRouter();

const user = {
  email: "",
  password: "",
};
let loading = ref(false);
let errorMsg = ref("");

const collapsed = ref(true)
const toggleSidebar = () => (collapsed.value = !collapsed.value)

const SIDEBAR_WIDTH = 200
const SIDEBAR_WIDTH_COLLAPSED = 0
const sidebarWidth = computed(
  () => `${collapsed.value ? SIDEBAR_WIDTH_COLLAPSED : SIDEBAR_WIDTH}px`
)
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
.f-icon {
  background: #21a99b;
  color: rgb(255, 255, 255);
  transition: 0.4s ease;
}
.f-icon:hover {
  background: #4aaba1;
  color: rgb(255, 255, 255);
  transition: 0.4s ease;
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
  color: white;
  background-color: #16796F;
  float: right;
  position: fixed;
  z-index: 1;
  top: 0;
  right: 0;
  bottom: 0;
  padding: 0;
  transition: 0.6s ease;
  display: flex;
  flex-direction: column;
}

.collapsed-icon {
  position: absolute;
  top: 0;
  padding: 10px;
  transition: 0.2s linear;
  /* border: solid 1px red; */
}
</style>
