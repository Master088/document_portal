<template>
  <div class="px-lg-5">
    <div class="container-fluid p-3">
      <h3>Department Office</h3>
      <div class="right-menu">
        <i class="bi bi-list icon"></i>
      </div>
    </div>
    <div class="container-fluid p-3">
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
        <div class="col mb-4">
          <a href="#">
            <div class="card card-box shadow">
              <div class="card-body">
                <h5 class="card-title"><u class="underline">View More</u></h5>
              </div>
            </div>
          </a>
        </div>
      </div>
    </div>
    <div class="container-fluid mt-2">
      <h5>New Files</h5>
      <div class="table-container mt-4 mb-4">
        <table class="table table-hover table-responsive">
          <thead>
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
    <div class="container mb-5">
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
  font-family: "Poppins", sans-serif;
}
a {
  color: inherit;
}
.search {
  height: 7vh;
}
.underline {
  text-decoration: underline;
}
.right-menu {
  /* border: solid 1px red; */
  width: 40px;
  float: right;
  margin-top: -50px;
  position: relative;
}
.icon {
  font-size: 2.5rem;
}
.card-box {
  height: 30vh;
  transition: 0.4s;
}
.card-box:hover {
  background: #adc9c5;
  color: aliceblue;
  transition: all 0.4s ease;
}
.view {
  background: #1c9b8e;
  color: rgb(255, 255, 255);
}
.view:hover {
  background: #21a99b;
  color: aliceblue;
}
.edit {
  background: #ff8300;
  color: rgb(255, 255, 255);
}

.edit:hover {
  background: #f58f22;
  color: aliceblue;
}
.del {
  background: #df362d;
  color: rgb(255, 255, 255);
}

.del:hover {
  background: #e04c44;
  color: aliceblue;
}
.action {
  padding: 0;
  margin: 0;
  /* border: solid 1px red; */
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
</style>
