<template>
  <div class="container p-3">
    <h3>Dashboard Folder</h3>
  </div>
  <div class="container justify-content-end d-flex px-3">
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
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container p-3">
    <div class="input-group mb-3 search">
      <input type="text" class="form-control shadow " placeholder="Search..." aria-label="Search..."
        aria-describedby="basic-addon2"><span class="input-group-text search-icon"><i class="bi bi-search"></i></span>
    </div>
  </div>
  <div class="container">
    <div class="row row-cols-1 row-cols-md-4 text-center">
      <div class="col mb-4">
        <a href="#">
          <div class="card card-box shadow">
            <div class="card-body">
              <h4 class="card-title">2023</h4>
            </div>
          </div>
        </a>
      </div>
      <div class="col mb-4">
        <a href="#">
          <div class="card card-box">
            <div class="card-body shadow">
              <h4 class="card-title">2022</h4>
            </div>
          </div>
        </a>
      </div>
      <div class="col mb-4">
        <a href="#">
          <div class="card card-box shadow">
            <div class="card-body">
              <h4 class="card-title">2021</h4>
            </div>
          </div>
        </a>
      </div>
      <div class="col mb-4 ">
        <a href="#">
          <div class="card card-box shadow">
            <div class="card-body">
              <h5 class="card-title">2019</h5>
            </div>
          </div>
        </a>
      </div>
      <div class="col mb-4">
        <a href="#">
          <div class="card card-box shadow">
            <div class="card-body">
              <h4 class="card-title">2018</h4>
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
.search {
  height: 7vh;
}
.card-box {
  height: 30vh;
  transition: .4s;
}

.card-box:hover {
  background: #ADC9C5;
  color: aliceblue;
  transition: all .4s ease;
}
.search-icon {
  width: 60px;
  justify-content: center;
}
</style>
