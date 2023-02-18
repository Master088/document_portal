<template>
  <!-- <div class="fluid-container p-4"> -->
    <!-- <h1>Dashboard Folder Content</h1>
  </div> -->
  
  <div class="container p-3">
     <h5>Document > 2022</h5>
     <div class="button d-flex justify-content-end">
      <button type="button" class="btn text-white m-1" data-bs-toggle="modal" data-bs-target="#new-folder"><b>Create NewFolder</b></button>
      <button type="button" class="btn text-white m-1" data-bs-toggle="modal" data-bs-target="#upload"><b>Upload New File</b></button>
     </div>
  </div>
  <div class="container ">
    <div class="input-group mb-2 search">
      <input type="text" class="form-control shadow " placeholder="Search..." aria-label="Search..."
        aria-describedby="basic-addon2"><span class="input-group-text search-icon"><i class="bi bi-search"></i></span>
    </div>
  </div>
  <div class="container pt-2 pb-1">
     <button type="button" class="filter btn btn-light" data-bs-toggle="collapse" data-bs-target="#collapseFilter" aria-expanded="false" aria-controls="collapseFilter"><i class="bi bi-funnel "></i> <b>Filter</b></button>
  </div>

  <div class="container collapse" id="collapseFilter" >
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
  
  <div class="container pt-2 pb-3">
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
                <td>Dept.Folder</td>
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
<div class="modal fade" id="new-folder">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Create New Folder</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <label for="email"><b>Folder Name</b></label>
        <input type="text" class="form-control" id="new-folder" placeholder="Enter Folder Name" name="new-folder">
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary"><b><i class="bi bi-folder text-white"></i> Create</b></button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal fade" id="upload">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Upload File to Attach</h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="container">
        <div class="row">
          <div class="col text-center">
            <div class="drop">
              <img src="../assets/img/cloud-icon.svg" alt="" >
              <h6>Drag and drop files here or <span>browse</span></h6>
            </div>
            <h6 class="p-3">or</h6>
            <div class="bfile pb-4">
              <button class="btn text-white">Choose File</button>
            </div>
          </div>
          <div class="col">
            <h6><i class="bi bi-cloud-arrow-up fs-3"></i> Uploading...</h6>
            <div class="container pt-4">
              <h6>Temporary Example 2.pdf</h6>
              <div class="progress" role="progressbar" aria-label="Info striped " aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" style="width: 50%"></div>
              </div>
            </div>
            <div class="container pt-3">
              <h6>Temporary Example 1.pdf</h6>
              <div class="progress" role="progressbar" aria-label="Info striped " aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">
                <div class="progress-bar progress-bar-striped bg-info progress-bar-animated" style="width: 75%"></div>
              </div>
            </div>    
          </div>
        </div>

       </div>
       
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger " data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary"> Upload</button>
      </div>

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
  span{
    color:#21a99b;
  }
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
  .drop{
    display: inline-block;
    border: 1px solid ;
    border:  7px dashed #bfbfbf; ;
    padding: 50px;
    border-radius: 10px;
   
    margin: 0 30px;
  }
  .bfile .btn{
    background: #21a99b;
     min-width: 70%;
    min-height: 45px;
  }
</style>
