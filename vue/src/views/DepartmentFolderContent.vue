<template>
  <!-- <div class="fluid-container p-4"> -->
    <!-- <h1>Dashboard Folder Content</h1>
  </div> -->
  <div class="container p-3">
     <div class="button d-flex justify-content-end">
      <button type="button" class="btn text-white m-1"><b>Create Folder</b></button>
      <button type="button" class="btn text-white m-1"><b>Upload New File</b></button>
     </div>
  </div>
  <div class="container ">
    <div class="input-group mb-2 search">
      <input type="text" class="form-control shadow " placeholder="Search..." aria-label="Search..."
        aria-describedby="basic-addon2"><span class="input-group-text search-icon"><i class="bi bi-search"></i></span>
    </div>
  </div>
  <div class="container pt-2 pb-1">
     <button type="button" class="filter btn btn-light "><i class="bi bi-funnel "></i> <b>Filter</b></button>
  </div>

  <div class="container ">
    <div class="card">
      <div class="card-body ">
          <div class="row">
            <div class="col-2">
              <label for="date-from"><b>Date From</b></label>
              <input type="date" class="form-control " id="date-from" name="date-from">
            </div>
            <div class="col-2">
              <label for="date-to"><b>Date To</b></label>
              <input type="date" class="form-control " id="date-to" name="date-to">
            </div>
            <div class="col-2">
              <label for="file-type"><b>Type</b></label>
                <select class="form-select" aria-label="Default select example" id="file-type" name="file-type">
                  <option selected>Choose..</option>
                  <option value="1">File</option>
                  <option value="2">Folder</option>
                </select>
            </div>
          </div>
      </div>
    </div>
  </div>
  
  <div class="container pt-3 pb-3">
      <div class="card">
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col"></th>
                <th scope="col">Name</th>
                <th scope="col">Last Modified</th>
                <th scope="col">Date Modified</th>
                <th scope="col">Type</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"><i class="bi bi-file-earmark-text fs-5"></i></th>
                <td>Dept.File</td>
                <td>Otto</td>
                <td>13/02/2023</td>
                <td>file</td>
                <td> <div class="dropdown">
                      <a class="btn  " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots "></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-eye"></i> View</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Archive</a></li>
                      </ul>
                    </div>
                </td>
              </tr>
              <tr>
                <th scope="row"><i class="bi bi-folder fs-5"></i></th>
                <td>Dept.File</td>
                <td>Thornton</td>
                <td>13/02/2023</td>
                <td>folder</td>
                <td> <div class="dropdown">
                      <a class="btn  " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots "></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-eye"></i> View</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Archive</a></li>
                      </ul>
                    </div>
                </td>
              </tr>
              <tr>
                <th scope="row"><i class="bi bi-file-earmark-text fs-5"></i></th>
                <td>Dept.File</td>
                <td>Larry</td>
                <td>13/02/2023</td>
                <td>file</td>
                <td>
                    <div class="dropdown">
                      <a class="btn  " href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots "></i>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#"><i class="bi bi-eye"></i> View</a></li>
                        <li><a class="dropdown-item" href="#"><i class="bi bi-trash"></i> Archive</a></li>
                      </ul>
                    </div>
                </td>
              </tr>
              
            </tbody>
          </table>
        </div>
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
  .button .btn{
    background: #21a99b;
  }
  .search{
    height: 7vh;
  }

  .filter{
    /* padding: 8px; */
    border: 1px solid #bfbfbf;
    /* border-color: black; */
    color: #414141;
    background-color: white;
    
  }
  .filter i{
    font-weight: bold;
  }
  .search-icon {
  width: 60px;
  justify-content: center;
  }
  .bi {
    color: #21a99b;
  }
  .dropdown .btn{
    border: 0px;
  }
  .dropdown .btn:hover{
    text-decoration: none; 
    color: #fff;
    border: 0px;
    
  }
</style>
