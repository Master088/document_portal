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
              <tr  v-for="document in documents" :key="document.id">
              <td scope="row">
                <a type="button" class="btn f-icon">
                  <i v-if="document.type=='file'" class="bi bi-file-earmark-text"></i>
                  <i v-if="document.type=='folder'"  class="bi bi-folder fs-5"></i>
                </a>
              </td>
              <td class="fw-bold">{{ document.name }}</td>
              <td>{{ document.last_modified_id }}</td>
              <td>{{ document.date_modified }}</td>
              <td>{{ document.type }}</td>
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

   
    <div class="modal fade" id="new-folder" tabindex="-1" role="dialog" aria-labelledby="new-folder"
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
            <form @submit.prevent="handleSubmit">
              <div class="form-group">
                <label for="year">Year <span class="text-danger">*</span></label>
                <input v-model="name" type="text" class="form-control" id="year" placeholder="Enter Year">
                <div v-if="name" class="text-danger">
                  {{ errorMsg }}
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
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
import { useRoute, useRouter } from "vue-router";
import { ref, computed, watchEffect } from "vue";
import { CREATE_FOLDER_ACTION, GET_DOCUMENTS } from "../store/store-constants";
import store from '../store';


const router = useRouter();

const route = useRoute();
 
let loading = ref(false);
let errorMsg = ref("");
const name=ref("")

const left = ref (route.params.left ||0);
const parentData = ref(computed(() => store.state.documents.parentData))|| {};
const documents = ref(computed(() => store.state.documents.documents))|| [];

const getdocuments=()=>{
  console.log("helo",left.value)
  store
    .dispatch(`documents/${GET_DOCUMENTS}`, {
      left:left.value,
      type:"",
      limit:0
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
const handleSubmit= ()=>{
      console.log("hello",name.value)
       
      /** set validation laster */
      if(name.value){
        errorMsg.value=""
        store
        .dispatch(`documents/${CREATE_FOLDER_ACTION}`, {
          name:name.value,
          type:"folder",
          parent:parentData.value?.id,
        })
        .then(() => {
          // loading.value = false;
          //   console.log("data here ", data.data);
        })
        .catch((err) => {
          console.log("error", err);
          loading.value = false;
          //   errorMsg.value = err.response.data.error;
        });

      }else{
        errorMsg.value="Please enter year"
      }

      // this.yearValidation = this.year.length < 4 || this.year.length > 4 ? 'The year must at least 4 number only' : ''
     
}

const redirect=(id)=>{
  console.log("hello123",id)
  router.push(`/department/folder/${id}`)
}
 
watchEffect(() => getdocuments())
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
