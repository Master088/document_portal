<template>
  <div class="fluid-container p-3">
    <h4>Dashboard Folder</h4>
  </div>
  <div class="fluid-container justify-content-end d-flex px-3">
    <button type="button" class="btn f-create shadow" data-bs-toggle="modal" data-bs-target="#create">
      <i class="bi bi-folder-plus"></i> Create Folder
    </button>
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="create"
      aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="create">Create New Folder</h5>
            <button type="button" class="btn" data-bs-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="year">Year <span class="text-danger">*</span></label>
                <input type="text" class="form-control" id="year" placeholder="Enter Year">
                
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container-fluid p-3 d-flex justify-content-center mt-3">
    <div class="input-group mb-3 search">
      <input type="text" class="form-control shadow " placeholder="Search..." aria-label="Search..."
        aria-describedby="basic-addon2"><span class="input-group-text search-icon"><i class="bi bi-search"></i></span>
    </div>
  </div>
  <div class="container-fluid">
      <div class="row row-cols-1 row-cols-md-4 text-center ">
        <div class="col mb-4 ">
          <a href="#">
            <div class="card border-0 card-box ">
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

<style scoped>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  list-style: none;
  text-decoration: none;
  font-family: 'Poppins', sans-serif;
}

a {
  color: inherit;
}
.f-create{
  background: #1C9B8E;
  color: aliceblue;
}
.f-create:hover {
  background: #2d978c;
  color: aliceblue;
}
.card-box {
  transition: 0.4s;
}

.card-box:hover {
  color: aliceblue;
  transition: all 0.4s ease;

}

.card-box .underline:hover {
  color: rgb(255, 255, 255);
  text-decoration: underline;
}
.search-icon {
  width: 60px;
  justify-content: center;
}
.search {
  width: 90%;
}
.card-title {
  /* font-size: 1.7em; */
  margin: 0;
  padding: 0;
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%) translateY(-50%);
}
</style>
